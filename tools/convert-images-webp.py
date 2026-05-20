#!/usr/bin/env python3
"""Convert theme raster images to optimized WebP sidecars."""

from __future__ import annotations

import argparse
import json
from pathlib import Path
from typing import Iterable

from PIL import Image, ImageOps


SUPPORTED_EXTENSIONS = {".jpg", ".jpeg", ".png"}


def iter_images(paths: Iterable[Path]) -> Iterable[Path]:
    for path in paths:
        if not path.exists():
            continue

        if path.is_file() and path.suffix.lower() in SUPPORTED_EXTENSIONS:
            yield path
            continue

        if path.is_dir():
            for child in path.rglob("*"):
                if child.is_file() and child.suffix.lower() in SUPPORTED_EXTENSIONS:
                    yield child


def get_output_path(source: Path, output_root: Path | None, base_dir: Path) -> Path:
    if not output_root:
        return source.with_suffix(".webp")

    relative = source.resolve().relative_to(base_dir.resolve())
    return output_root / relative.with_suffix(".webp")


def convert_image(source: Path, quality: int, max_dimension: int, force: bool, output_root: Path | None, base_dir: Path) -> dict:
    output = get_output_path(source, output_root, base_dir)

    if not force and output.exists() and output.stat().st_mtime >= source.stat().st_mtime:
        return {
            "status": "skipped",
            "source": str(source),
            "output": str(output),
            "before": source.stat().st_size,
            "after": output.stat().st_size,
            "reason": "up-to-date",
        }

    before = source.stat().st_size
    output.parent.mkdir(parents=True, exist_ok=True)

    with Image.open(source) as image:
        image = ImageOps.exif_transpose(image)

        if max(image.size) > max_dimension:
            image.thumbnail((max_dimension, max_dimension), Image.Resampling.LANCZOS)

        if image.mode not in ("RGB", "RGBA"):
            image = image.convert("RGBA" if "A" in image.getbands() else "RGB")

        save_kwargs = {
            "format": "WEBP",
            "quality": quality,
            "method": 6,
            "metadata": None,
        }

        if image.mode == "RGBA":
            save_kwargs["lossless"] = False

        image.save(output, **save_kwargs)

    after = output.stat().st_size

    return {
        "status": "converted",
        "source": str(source),
        "output": str(output),
        "before": before,
        "after": after,
        "saved": before - after,
        "saved_pct": round(((before - after) / before) * 100, 2) if before else 0,
    }


def main() -> int:
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("paths", nargs="+", type=Path)
    parser.add_argument("--quality", type=int, default=82)
    parser.add_argument("--max-dimension", type=int, default=2560)
    parser.add_argument("--force", action="store_true")
    parser.add_argument("--output-root", type=Path)
    parser.add_argument("--base-dir", type=Path, default=Path.cwd())
    parser.add_argument("--json-report", type=Path)
    args = parser.parse_args()

    results = []
    for source in iter_images(args.paths):
        try:
            results.append(convert_image(source, args.quality, args.max_dimension, args.force, args.output_root, args.base_dir))
        except Exception as exc:  # noqa: BLE001 - report all conversion errors without stopping.
            results.append(
                {
                    "status": "error",
                    "source": str(source),
                    "error": str(exc),
                }
            )

    converted = [item for item in results if item["status"] == "converted"]
    skipped = [item for item in results if item["status"] == "skipped"]
    errors = [item for item in results if item["status"] == "error"]

    summary = {
        "total": len(results),
        "converted": len(converted),
        "skipped": len(skipped),
        "errors": len(errors),
        "before": sum(item.get("before", 0) for item in converted),
        "after": sum(item.get("after", 0) for item in converted),
        "saved": sum(item.get("saved", 0) for item in converted),
        "results": results,
    }

    if args.json_report:
        args.json_report.write_text(json.dumps(summary, indent=2), encoding="utf-8")

    print(
        "Converted {converted}/{total} images; skipped {skipped}; errors {errors}; saved {saved:.2f} MB.".format(
            converted=summary["converted"],
            total=summary["total"],
            skipped=summary["skipped"],
            errors=summary["errors"],
            saved=summary["saved"] / 1024 / 1024,
        )
    )

    return 1 if errors else 0


if __name__ == "__main__":
    raise SystemExit(main())
