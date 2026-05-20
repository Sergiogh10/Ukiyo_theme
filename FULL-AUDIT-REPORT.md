# Full SEO Audit Report: https://viajesukiyo.com

Audit date: 2026-05-01
Scope: full homepage-led audit with shallow internal crawl of `https://viajesukiyo.com`.
Business type detected: travel agency / custom travel planning.
Score confidence: Medium. Core metadata, HTML, robots, security headers, links, social metadata, schema, readability, and broken links were checked. PageSpeed/Core Web Vitals and visual checks were limited by API/tooling issues.

## Audit Summary

Overall SEO health score: 74/100, Good.

Top issues:

1. Security headers are incomplete: HSTS, X-Frame-Options, X-Content-Type-Options, and Referrer-Policy are missing.
2. AI crawler governance and `llms.txt` structure need work.
3. Image/accessibility and internal-link context need cleanup: 4 images with empty/missing alt, 17 images without explicit dimensions, 28 empty-anchor links, and 2 weakly linked destination pages.

Top opportunities:

1. Strengthen entity trust by expanding TravelAgency/Organization schema with contact, areaServed, address/contactPoint, and complete `sameAs`.
2. Fix heading markup so extracted H1/H2 text reads naturally.
3. Improve consumer readability by breaking long review/copy blocks into shorter, scannable sections.

## Evidence Snapshot

| Check | Result |
|---|---|
| Fetch | HTTP 200, homepage saved to `/tmp/viajesukiyo-page.html` |
| Title | `Viajes a medida y experiencias auténticas \| Viajes UKIYO` |
| Meta description | Present: `Diseñamos viajes a medida a destinos que conocemos de verdad...` |
| Meta robots | `follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large` |
| Canonical | `https://viajesukiyo.com/` |
| Word count | 1,330 from parser; 1,179 from readability extraction |
| Schema | JSON-LD graph with TravelAgency/Organization, WebSite SearchAction, ImageObject, WebPage |
| Social metadata | 85/100; Open Graph complete, Twitter Card mostly complete |
| Redirects | No redirect hops; final 200 in 436 ms |
| Broken links | 24 checked; 20 healthy, 0 broken, 4 redirected |
| Internal crawl | 19 pages crawled, 21 unique pages found, 299 internal links |
| robots.txt | Found; sitemap listed at `https://viajesukiyo.com/sitemap_index.xml` |
| llms.txt | Found, quality score 55/100 |
| Security headers | 50/100 |

## Category Scores

| Category | Score | Confidence | Rationale |
|---|---:|---|---|
| Technical SEO | 78 | Medium | HTTPS, robots, sitemap reference, canonical, indexable page, and clean redirect path are positive; missing security headers reduce score. |
| Content Quality | 73 | Medium | Homepage has enough text, clear value proposition, destinations, testimonials, and trust signals; readability is difficult for a consumer travel page. |
| On-Page SEO | 82 | High | Title, description, canonical, robots, H1, and internal CTAs are present; extracted headings show concatenated words. |
| Schema / Structured Data | 78 | Medium | JSON-LD is present and validates locally; entity markup can be richer for TravelAgency trust. |
| Performance / CWV | Insufficient data | Low | PageSpeed Insights was rate limited; missing image dimensions are a confirmed CLS risk but CWV values were not measured. |
| Images | 62 | High | Image usage is strong visually, but alt text and dimensions need cleanup. |
| AI Search Readiness | 55 | High | `llms.txt` exists, but lacks title/description and AI crawlers are not explicitly managed. |

## Findings Table

| Area | Severity | Confidence | Finding | Evidence | Fix |
|---|---|---|---|---|---|
| Technical SEO | Warning | Confirmed | Security headers are incomplete. | `security_headers.py` score 50/100; missing HSTS, X-Frame-Options, X-Content-Type-Options, and Referrer-Policy. | Add `Strict-Transport-Security`, `X-Frame-Options: SAMEORIGIN`, `X-Content-Type-Options: nosniff`, and `Referrer-Policy: strict-origin-when-cross-origin` at server/CDN level. |
| AI Search Readiness | Warning | Confirmed | AI crawlers are not explicitly managed in `robots.txt`. | `robots_checker.py` found 11 unmanaged AI crawlers: GPTBot, ChatGPT-User, ClaudeBot, PerplexityBot, Google-Extended, Applebot-Extended, Bytespider, CCBot, anthropic-ai, FacebookBot, Amazonbot. | Add explicit allow/disallow groups based on Ukiyo's AI indexing/training policy. |
| AI Search Readiness | Warning | Confirmed | `llms.txt` exists but is under-structured. | `/llms.txt` returned HTTP 200, quality score 55/100, no title, no description, no `llms-full.txt`. | Add `# Viajes Ukiyo`, a blockquote summary, curated priority links, and optionally `llms-full.txt`. |
| Images | Warning | Confirmed | Several images lack useful alt text and many lack explicit dimensions. | 21 images detected; 4 missing/empty alt attributes and 17 missing width/height attributes. | Add descriptive alt text to non-decorative images and set dimensions or stable aspect ratios. |
| Internal Linking | Warning | Confirmed | Two destination pages have weak internal link support and several links have no anchor text. | Internal crawl found `/viajes-a-medida-lanzarote` and `/viajes-a-medida-italia` with 1 incoming link each; 28 links have no anchor text. | Add contextual links from destination/category/blog pages and add accessible text or aria-labels to image/card links. |
| Content Quality | Warning | Confirmed | Homepage copy is harder to read than ideal for a consumer travel landing page. | Flesch reading ease 21.6, grade 14.4, 27.4% complex words, and average paragraph length reported as 71 sentences. | Break reviews and long copy blocks into shorter paragraphs; simplify key commercial sections. |
| On-Page SEO | Warning | Confirmed | Heading text extraction shows concatenated words in H1/H2 content. | H1 extracted as `Viajes a medidapara quienesbuscan algo más`; H2 examples include `¿Por quésomosmejores?`. | Add literal whitespace around inline spans or adjust heading markup so parsed text reads naturally. |
| On-Page SEO | Pass | Confirmed | Core homepage metadata is present and aligned. | Title, meta description, index/follow robots, and canonical are present. | Keep this standard on destination, price, itinerary, review, and blog pages. |
| Schema | Pass | Confirmed | Homepage JSON-LD exists and uses useful site-level entities. | JSON-LD graph includes TravelAgency/Organization, WebSite SearchAction, ImageObject, and WebPage; local validator exited successfully. | Enhance TravelAgency with accurate `contactPoint`, `areaServed`, address/contact details, and stronger `sameAs`. |

## Detailed Notes

### Technical SEO

The homepage is crawlable and indexable. The direct fetch returned HTTP 200, canonical points to the preferred HTTPS root URL, robots meta permits indexing, robots.txt exists, and no redirect chain was detected.

The main confirmed technical gap is security headers. This is not usually a direct ranking lever, but it is a trust and browser-safety baseline. It also matters for a site collecting travel leads and communicating through forms/WhatsApp.

### Content Quality and E-E-A-T

The homepage has enough content for a commercial homepage and contains positive E-E-A-T signals: destination expertise, human positioning, author/local travel framing, testimonials, email contact, privacy/terms/cookie pages, and HTTPS.

The readability script indicates the extracted text is difficult. Some of this may be inflated by cookie/legal text and review copy, but the finding is still useful: commercial travel pages should make the value proposition, process, destinations, and trust signals easy to scan on mobile.

### On-Page SEO

The title and meta description are strong and naturally target "viajes a medida" and authentic travel experiences. The title is within the expected range and the meta description is specific.

The H1/H2 extraction issue should be fixed in markup. Even if the visual layout looks correct, parsed text like `medidapara` and `quiénesbuscan` is a quality issue for accessibility and machine interpretation.

### Schema and Structured Data

The site has useful baseline JSON-LD from Rank Math. The graph establishes Organization/TravelAgency, WebSite with SearchAction, WebPage, and ImageObject entities.

Recommended enhancements are additive, not a rewrite: add real contact details, service area/destinations served, richer `sameAs`, and review/aggregate rating markup only if compliant and backed by visible review content.

### Images

The homepage uses relevant travel imagery, which is good for a travel agency. The SEO/accessibility gap is metadata discipline: empty alt values on non-decorative itinerary images and many images without explicit dimensions.

Missing dimensions can contribute to CLS, especially on image-heavy pages. Because PageSpeed was rate limited, CLS was not confirmed, but the implementation risk is confirmed.

### Internal Linking

Internal linking is generally healthy in volume, but two destination pages are weakly linked and empty anchors reduce context. Destination pages such as Lanzarote and Italia need contextual links from related content, not just navigation or sparse references.

### AI Search Readiness

Ukiyo has a good starting point because `llms.txt` exists. It needs basic structure: title, description, and curated canonical references. `robots.txt` should also explicitly state policy for major AI crawlers.

## Environment Limitations

- Direct browser-content fetch through the web tool returned 403, but the bundled direct fetch script succeeded with HTTP 200.
- PageSpeed Insights returned Google API rate limits, so no confirmed LCP, INP, CLS, Lighthouse, or CrUX values are included.
- `analyze_visual.py` could not run because Playwright is not installed.
- The installed SEO skill references a sitemap analyzer command, but the corresponding sitemap script is not present in `/Users/sergiogarcia-heras/.codex/skills/seo/scripts`.
- `generate_report.py` ran silently for an extended period and was stopped; no `SEO-REPORT.html` was produced.

## Unknowns and Follow-Ups

1. Run PageSpeed Insights or Lighthouse later to confirm LCP, INP, and CLS.
2. Run a full crawl beyond depth 1 to find duplicate titles/descriptions, thin destination pages, and indexability issues across the site.
3. Check Google Search Console for indexed pages, queries, Core Web Vitals field data, and sitemap coverage.
4. Validate enhanced structured data in Google's Rich Results Test after schema changes.
