#!/usr/bin/env python3
"""
Small Google Search Console helper for Viajes Ukiyo.

Usage:
  python3 seo-tools/gsc.py auth
  python3 seo-tools/gsc.py sites
  python3 seo-tools/gsc.py search --site-url https://viajesukiyo.com/ --start 2026-04-01 --end 2026-05-01 --dimensions page query
"""

from __future__ import annotations

import argparse
import glob
import json
import os
import sys
import time
import urllib.parse
import urllib.request
from http.server import BaseHTTPRequestHandler, HTTPServer
from pathlib import Path


ROOT = Path(__file__).resolve().parents[1]
DEFAULT_SECRET = next(iter(glob.glob(str(ROOT / "client_secret_*.json"))), "")
DEFAULT_TOKEN = ROOT / "seo-tools" / ".gsc-token.json"
SCOPE = "https://www.googleapis.com/auth/webmasters.readonly"
AUTH_URL = "https://accounts.google.com/o/oauth2/v2/auth"
TOKEN_URL = "https://oauth2.googleapis.com/token"
API_BASE = "https://searchconsole.googleapis.com/webmasters/v3"


def read_json(path: Path) -> dict:
    with path.open(encoding="utf-8") as handle:
        return json.load(handle)


def write_json(path: Path, data: dict) -> None:
    path.parent.mkdir(parents=True, exist_ok=True)
    with path.open("w", encoding="utf-8") as handle:
        json.dump(data, handle, ensure_ascii=False, indent=2)
        handle.write("\n")
    os.chmod(path, 0o600)


def get_client(secret_path: str) -> tuple[str, str]:
    if not secret_path:
        raise SystemExit("No encuentro client_secret_*.json en la raíz del tema.")

    data = read_json(Path(secret_path))
    config = data.get("installed") or data.get("web") or {}
    client_id = config.get("client_id")
    client_secret = config.get("client_secret")

    if not client_id or not client_secret:
        raise SystemExit("El JSON no parece ser un OAuth client_secret válido.")

    return client_id, client_secret


def post_form(url: str, payload: dict) -> dict:
    body = urllib.parse.urlencode(payload).encode()
    request = urllib.request.Request(
        url,
        data=body,
        headers={"Content-Type": "application/x-www-form-urlencoded"},
        method="POST",
    )
    with urllib.request.urlopen(request, timeout=30) as response:
        return json.loads(response.read().decode("utf-8"))


def api_request(path: str, token: dict, method: str = "GET", body: dict | None = None) -> dict:
    url = f"{API_BASE}{path}"
    data = None
    headers = {"Authorization": f"Bearer {token['access_token']}"}

    if body is not None:
        data = json.dumps(body).encode("utf-8")
        headers["Content-Type"] = "application/json"

    request = urllib.request.Request(url, data=data, headers=headers, method=method)
    with urllib.request.urlopen(request, timeout=45) as response:
        return json.loads(response.read().decode("utf-8"))


def refresh_token(secret_path: str, token_path: Path) -> dict:
    token = read_json(token_path)
    if token.get("expires_at", 0) > time.time() + 60:
        return token

    client_id, client_secret = get_client(secret_path)
    refreshed = post_form(
        TOKEN_URL,
        {
            "client_id": client_id,
            "client_secret": client_secret,
            "refresh_token": token["refresh_token"],
            "grant_type": "refresh_token",
        },
    )
    token.update(refreshed)
    token["expires_at"] = int(time.time()) + int(refreshed.get("expires_in", 3600))
    write_json(token_path, token)
    return token


class OAuthHandler(BaseHTTPRequestHandler):
    code = ""
    error = ""

    def log_message(self, *_args) -> None:
        return

    def do_GET(self) -> None:
        parsed = urllib.parse.urlparse(self.path)
        params = urllib.parse.parse_qs(parsed.query)
        OAuthHandler.code = params.get("code", [""])[0]
        OAuthHandler.error = params.get("error", [""])[0]
        self.send_response(200)
        self.send_header("Content-Type", "text/html; charset=utf-8")
        self.end_headers()
        self.wfile.write(
            b"<html><body><h1>Search Console conectado</h1><p>Ya puedes volver a Codex.</p></body></html>"
        )


def auth(args: argparse.Namespace) -> None:
    client_id, client_secret = get_client(args.client_secret)
    redirect_uri = f"http://localhost:{args.port}/"

    params = {
        "client_id": client_id,
        "redirect_uri": redirect_uri,
        "response_type": "code",
        "scope": SCOPE,
        "access_type": "offline",
        "prompt": "consent",
    }
    url = f"{AUTH_URL}?{urllib.parse.urlencode(params)}"

    print("Abre esta URL en tu navegador y autoriza Search Console:")
    print(url)
    print(f"\nEsperando respuesta en {redirect_uri} ...")

    server = HTTPServer(("localhost", args.port), OAuthHandler)
    server.handle_request()

    if OAuthHandler.error:
        raise SystemExit(f"Google devolvió error: {OAuthHandler.error}")
    if not OAuthHandler.code:
        raise SystemExit("No llegó código OAuth.")

    token = post_form(
        TOKEN_URL,
        {
            "client_id": client_id,
            "client_secret": client_secret,
            "code": OAuthHandler.code,
            "grant_type": "authorization_code",
            "redirect_uri": redirect_uri,
        },
    )
    token["expires_at"] = int(time.time()) + int(token.get("expires_in", 3600))
    write_json(args.token, token)
    print(f"Token guardado en {args.token}")


def sites(args: argparse.Namespace) -> None:
    token = refresh_token(args.client_secret, args.token)
    print(json.dumps(api_request("/sites", token), ensure_ascii=False, indent=2))


def search(args: argparse.Namespace) -> None:
    token = refresh_token(args.client_secret, args.token)
    body = {
        "startDate": args.start,
        "endDate": args.end,
        "dimensions": args.dimensions,
        "rowLimit": args.limit,
        "startRow": 0,
    }
    if args.query:
        body["dimensionFilterGroups"] = [
            {
                "filters": [
                    {
                        "dimension": "query",
                        "operator": "contains",
                        "expression": args.query,
                    }
                ]
            }
        ]

    site = urllib.parse.quote(args.site_url, safe="")
    data = api_request(f"/sites/{site}/searchAnalytics/query", token, method="POST", body=body)
    print(json.dumps(data, ensure_ascii=False, indent=2))


def main() -> None:
    parser = argparse.ArgumentParser(description="Google Search Console helper")
    parser.add_argument("--client-secret", default=DEFAULT_SECRET)
    parser.add_argument("--token", type=Path, default=DEFAULT_TOKEN)
    sub = parser.add_subparsers(dest="command", required=True)

    auth_parser = sub.add_parser("auth")
    auth_parser.add_argument("--port", type=int, default=8765)
    auth_parser.set_defaults(func=auth)

    sites_parser = sub.add_parser("sites")
    sites_parser.set_defaults(func=sites)

    search_parser = sub.add_parser("search")
    search_parser.add_argument("--site-url", default="https://viajesukiyo.com/")
    search_parser.add_argument("--start", required=True)
    search_parser.add_argument("--end", required=True)
    search_parser.add_argument("--dimensions", nargs="+", default=["page", "query"])
    search_parser.add_argument("--limit", type=int, default=25)
    search_parser.add_argument("--query", default="")
    search_parser.set_defaults(func=search)

    args = parser.parse_args()
    args.func(args)


if __name__ == "__main__":
    try:
        main()
    except urllib.error.HTTPError as exc:
        print(exc.read().decode("utf-8"), file=sys.stderr)
        raise
