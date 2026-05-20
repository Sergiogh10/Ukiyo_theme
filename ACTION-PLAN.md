# SEO Action Plan: https://viajesukiyo.com

Audit date: 2026-05-01
Priority model: confirmed impact first, then quick wins, then strategic improvements.

## Immediate Fixes

1. Add missing security headers.
   - Impact: Medium
   - Effort: Low
   - Evidence: security score 50/100; HSTS, X-Frame-Options, X-Content-Type-Options, and Referrer-Policy missing.
   - Implementation: configure headers in Apache/Nginx/CDN or WordPress security layer:
     - `Strict-Transport-Security: max-age=31536000; includeSubDomains`
     - `X-Frame-Options: SAMEORIGIN`
     - `X-Content-Type-Options: nosniff`
     - `Referrer-Policy: strict-origin-when-cross-origin`

2. Fix heading markup whitespace.
   - Impact: Medium
   - Effort: Low
   - Evidence: H1 extracted as `Viajes a medidapara quienesbuscan algo más`; H2 text also concatenates words.
   - Implementation: add literal spaces around inline heading spans or move spacing outside styled spans.

3. Add image dimensions and alt text cleanup.
   - Impact: Medium
   - Effort: Low to Medium
   - Evidence: 4 images have empty/missing alt; 17 images lack explicit width/height.
   - Implementation: add descriptive alt text to itinerary/review/destination images; keep `alt=""` only for decorative graphics; add `width`/`height` or CSS `aspect-ratio`.

## Quick Wins

4. Improve `llms.txt`.
   - Impact: Medium
   - Effort: Low
   - Evidence: quality score 55/100; missing title and description.
   - Implementation:
     - Start with `# Viajes Ukiyo`
     - Add a short blockquote description.
     - Prioritize homepage, destinations, viajes de autor, prices, reviews, about, and contact/planning pages.
     - Add `llms-full.txt` if you want richer AI citation context.

5. Explicitly manage AI crawlers in `robots.txt`.
   - Impact: Medium
   - Effort: Low
   - Evidence: 11 AI crawlers inherit generic `*` rules.
   - Implementation: decide allow/disallow policy for GPTBot, ChatGPT-User, ClaudeBot, PerplexityBot, Google-Extended, Applebot-Extended, Bytespider, CCBot, anthropic-ai, FacebookBot, and Amazonbot.

6. Strengthen weak internal links.
   - Impact: Medium
   - Effort: Medium
   - Evidence: `/viajes-a-medida-lanzarote` and `/viajes-a-medida-italia` have only one incoming link each.
   - Implementation: add contextual links from destination hub pages, relevant blog posts, footer destination lists, and "ideas de viaje" sections.

7. Add accessible labels to empty-anchor card/image links.
   - Impact: Medium
   - Effort: Low
   - Evidence: 28 links with no anchor text.
   - Implementation: make the linked title part of the anchor, or add accurate `aria-label` values.

## Strategic Improvements

8. Expand TravelAgency/Organization schema.
   - Impact: Medium
   - Effort: Medium
   - Evidence: JSON-LD exists and validates, but can carry stronger trust/entity signals.
   - Implementation: add accurate `contactPoint`, `areaServed`, address/contact details if applicable, fuller `sameAs`, and optionally review markup only when visible and policy-compliant.

9. Rewrite difficult homepage sections for scanning.
   - Impact: Medium
   - Effort: Medium
   - Evidence: Flesch 21.6, grade 14.4, 27.4% complex words.
   - Implementation: shorten reviews, split long paragraphs, use plain travel-consulting language, and keep destination/process sections concise.

10. Run a performance pass after PageSpeed is available.
    - Impact: Unknown to High
    - Effort: Medium
    - Evidence: PageSpeed was rate limited; 17 images lack dimensions, so CLS risk exists.
    - Implementation: measure mobile LCP/INP/CLS, preload the hero image if needed, compress/serve AVIF/WebP where possible, defer non-critical scripts, and reserve image space.

## Follow-Up Checks

1. Re-run PageSpeed Insights or Lighthouse for mobile Core Web Vitals.
2. Run a depth 2-3 crawl for duplicate metadata and thin destination pages.
3. Check Google Search Console for sitemap coverage, indexing, queries, and CWV field data.
4. Validate updated schema in Google's Rich Results Test.
