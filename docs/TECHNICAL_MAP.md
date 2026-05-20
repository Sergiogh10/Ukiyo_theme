# Viajes Ukiyo — Technical Map

> Complete technical reference for the UKIYO WordPress theme.
> Last updated: 2026-05-16 (auto-generated from codebase audit).

---

## 1. Project Location

```
WordPress root:      /Applications/XAMPP/xamppfiles/htdocs/ukiyo/
Theme root:          /wp-content/themes/ukiyo/
Theme URI slug:      ukiyo
WordPress version:   6.0+ required
PHP version:         8.0+ required
```

---

## 2. Folder Structure

```
ukiyo/ (theme root)
├── assets/
│   ├── css/
│   │   ├── main.css                        # Compiled Tailwind + font declarations
│   │   ├── main.min.css                    # Minified version (auto-served when present)
│   │   ├── tailwind.css                    # Tailwind source config
│   │   ├── tailwind.min.css
│   │   ├── legacy-tailwind-compat.css      # v3 compatibility shim (loaded after main)
│   │   ├── legacy-tailwind-compat.min.css
│   │   └── portal-aventurero.css           # Portal-specific styles
│   ├── js/
│   │   ├── scripts.js                      # Mobile menu, parallax, smooth scroll, filters
│   │   ├── scripts.min.js
│   │   ├── experiences-map.js              # Leaflet.js interactive map (only on experiences page)
│   │   ├── trip-route.js                   # Trip itinerary route visualization
│   │   ├── portal-frontend.js              # Client-facing portal interactions
│   │   ├── portal-admin.js                 # Admin portal interface
│   │   └── dhws-data-injector.js           # Debug tool (admin-only, query-param gated)
│   ├── fonts/
│   │   ├── satoshi/                        # Body font (10 weights, self-hosted)
│   │   ├── rowdies/                        # Display font (3 weights, self-hosted)
│   │   └── telma/                          # Accent font (limited use)
│   ├── icons/                              # SVG source files
│   ├── images/
│   │   ├── autores/                        # Author/guide headshots
│   │   ├── colombia/
│   │   ├── costarica/
│   │   ├── destination-mood/
│   │   ├── emotion-based/
│   │   ├── guides/
│   │   ├── heroimages/                     # Full-bleed hero backgrounds (all pages)
│   │   ├── indonesia/
│   │   ├── italia/
│   │   ├── logo/                           # logoukiyo.png, logoblanconuevo.png
│   │   ├── marruecos/
│   │   ├── reviews/                        # Review avatars
│   │   ├── spain/
│   │   ├── travellers/                     # Client photos
│   │   ├── viajesdeautor/                  # Author trip imagery
│   │   └── portal/                         # Portal UI assets
│   └── optimized-webp/                     # WebP conversion cache (auto-generated)
│
├── inc/                                    # Theme PHP logic
│   ├── cpt-viaje-autor.php                 # CPT registration: viaje_autor
│   ├── meta-viaje-autor.php                # Metaboxes for viaje_autor (919 lines)
│   ├── meta-posts.php                      # Post SEO/social metaboxes (435 lines)
│   ├── post-content.php                    # Post content helpers (101 lines)
│   ├── icons.php                           # SVG icon system + alias map (161 lines)
│   ├── routes.php                          # Internal URL routing (202 lines)
│   ├── seo.php                             # Full SEO: meta, OG, JSON-LD (1179 lines)
│   ├── seo-helpers.php                     # SEO utility functions (858 lines)
│   ├── performance.php                     # Asset optimization hooks (659 lines)
│   └── portal/
│       ├── bootstrap.php                   # Portal subsystem initialization
│       ├── helpers.php                     # Portal utility functions
│       ├── register-cpt.php                # CPT: ukiyo_viaje (private trips)
│       ├── clients.php                     # Client/traveler management
│       ├── emails.php                      # Email dispatch + asset embedding
│       ├── importer.php                    # Data import utilities
│       ├── manual-feedbacks.php            # Manual feedback admin
│       ├── feedback.php                    # Post-trip feedback collection
│       ├── metaboxes.php                   # Admin UI for portal trips
│       ├── save-meta.php                   # Portal metadata persistence
│       ├── routes.php                      # Portal page routing
│       └── access-control.php             # Magic-link authentication
│
├── emails/                                 # React Email system (TypeScript)
│   ├── templates/                          # 17 .tsx email templates
│   ├── components/                         # Shared React components
│   ├── data/                               # Data structures for templates
│   ├── styles/                             # Email CSS
│   ├── out/                                # Compiled HTML output (consumed by PHP)
│   │   └── static/                         # Static image assets for emails
│   ├── package.json
│   └── tsconfig.json
│
├── templates/                              # Per-ID viaje_autor templates (11 files)
│   ├── single-viaje_autor-59.php
│   ├── single-viaje_autor-86.php
│   ├── single-viaje_autor-88.php
│   ├── single-viaje_autor-119.php
│   ├── single-viaje_autor-131.php
│   ├── single-viaje_autor-133.php
│   ├── single-viaje_autor-135.php
│   ├── single-viaje_autor-143.php
│   ├── single-viaje_autor-145.php
│   ├── single-viaje_autor-175.php
│   └── single-viaje_autor-179.php
│
├── promotion_one/                          # Standalone Next.js promo site (separate build)
│   ├── src/
│   ├── public/
│   ├── package.json
│   └── next.config.js
│
├── product-intro/                          # HyperFrames video composition
│   └── assets/
│
├── seo-tools/                              # Python SEO audit scripts
├── tools/                                  # Utility scripts
├── components/                             # Empty (reserved)
├── docs/                                   # ← You are here
│
├── ROOT TEMPLATES:
│   ├── functions.php                       # Theme bootstrap (806 lines)
│   ├── style.css                           # Theme metadata header only
│   ├── header.php                          # Global nav (302 lines)
│   ├── footer.php                          # Global footer (119 lines)
│   ├── front-page.php                      # Homepage
│   ├── home.php                            # Blog listing
│   ├── index.php                           # Fallback index
│   ├── page.php                            # Generic page fallback
│   ├── single.php                          # Blog post single
│   ├── single-viaje_autor.php              # Author trip default single
│   ├── single-ukiyo_viaje.php              # Portal trip single
│   ├── archive-guia.php                    # Guide archive
│   ├── page-about.php
│   ├── page-colombia.php
│   ├── page-cookies.php
│   ├── page-costarica.php
│   ├── page-experiences.php               # Leaflet.js interactive map
│   ├── page-formautor.php                  # Author trip inquiry form
│   ├── page-indonesia.php
│   ├── page-italia.php
│   ├── page-lanzarote.php
│   ├── page-marruecos.php
│   ├── page-nuevocliente.php               # New client onboarding
│   ├── page-planifica-tu-viaje.php         # Trip planning form
│   ├── page-pricing.php
│   ├── page-privacidad.php
│   ├── page-reviews2.php
│   ├── page-viajesautor.php                # Author trips grid
│   ├── template-portal-aventurero.php      # Client portal dashboard
│   ├── template-portal-finaliza-viaje.php  # Trip completion
│   ├── template-portal-propuesta.php       # Proposal view
│   ├── 403.php
│   ├── 404.php
│   └── 500.php
│
├── README.md
├── FULL-AUDIT-REPORT.md                    # SEO audit (score: 74/100)
├── ACTION-PLAN.md
└── client_secret_*.json                    # ⚠️ SECURITY RISK — OAuth credentials in theme root
```

---

## 3. Key Files and Their Responsibilities

| File | Lines | Purpose |
|------|-------|---------|
| `functions.php` | 806 | Theme bootstrap, asset loading, email config, AJAX handlers |
| `inc/seo.php` | 1179 | All SEO: meta titles, descriptions, canonical, OG, JSON-LD |
| `inc/seo-helpers.php` | 858 | SEO utilities: post intro extraction, destination detection |
| `inc/meta-viaje-autor.php` | 919 | Metaboxes for all viaje_autor custom fields |
| `inc/meta-posts.php` | 435 | SEO + social metaboxes for standard posts |
| `inc/performance.php` | 659 | Non-blocking CSS, deferred JS, asset versioning |
| `inc/routes.php` | 202 | Semantic key → real page slug resolution |
| `inc/icons.php` | 161 | 50+ SVG icons with Material Design aliases |
| `inc/cpt-viaje-autor.php` | ~50 | CPT registration for viaje_autor |
| `inc/portal/register-cpt.php` | 125 | Private CPT for ukiyo_viaje (portal trips) |
| `header.php` | 302 | Transparent/solid header logic, mobile menu |
| `front-page.php` | ~400 | Homepage with hero slider, section layout |
| `page-pricing.php` | ~300 | Pricing tiers, service philosophy |

---

## 4. Custom Post Types

### `viaje_autor` — Author-led Trips
- **Visibility:** Public, searchable
- **Archive:** Disabled (redirects to `/viajes-de-autor/`)
- **Slug pattern:** `/viajes/{post_name}/`
- **REST API:** Unknown (not explicitly disabled — assume default WP behavior)
- **Taxonomy:** `destino` (hierarchical, multi-value)
- **Supports:** title, editor, thumbnail, excerpt, revisions, custom-fields
- **Template resolution order:**
  1. `/templates/single-viaje_autor-{ID}.php` (per-ID override)
  2. `/single-viaje_autor.php` (default)
- **Current live posts:** 11 (IDs: 59, 86, 88, 119, 131, 133, 135, 143, 145, 175, 179)

### `ukiyo_viaje` — Private Portal Trips
- **Visibility:** Fully private (`public: false`, `publicly_queryable: false`)
- **REST API:** Disabled (`show_in_rest: false`)
- **Archive:** None
- **Supports:** title, thumbnail, revisions
- **Template:** `single-ukiyo_viaje.php` (admin-only)
- **Admin columns:** Dates, Travelers, Proposal status

---

## 5. Custom Taxonomy

### `destino` — Destination
- **Post type:** viaje_autor only
- **Hierarchical:** Yes (like categories)
- **Slug:** `/destino/`
- **Use:** Filter/group author trips by destination

---

## 6. Custom Fields (Meta Keys)

### viaje_autor fields (via `inc/meta-viaje-autor.php`)
| Meta Key | Type | Purpose |
|----------|------|---------|
| `ukiyo_hero_image` | attachment ID | Hero background image |
| `ukiyo_hero_title` | text | Hero heading override |
| `ukiyo_hero_subtitle` | text | Hero subheading |
| `ukiyo_expert_name` | text | Guide/expert name |
| `ukiyo_expert_bio` | textarea | Guide bio |
| `ukiyo_expert_photo` | attachment ID | Guide portrait |
| `ukiyo_price_per_person` | number | Price per person |
| `ukiyo_duration_days` | number | Trip duration |
| `ukiyo_group_size` | text | Min/max group size |
| `ukiyo_season` | text | Best travel season |
| `ukiyo_itinerary` | serialized | Repeater: daily itinerary |
| `ukiyo_gallery` | serialized | Repeater: gallery images |
| `ukiyo_testimonials` | serialized | Repeater: client quotes |
| `ukiyo_highlights` | serialized | Repeater: key highlights |
| `ukiyo_inclusions` | textarea | What's included |
| `ukiyo_what_to_bring` | textarea | Packing/prep notes |
| `ukiyo_difficulty` | select | Physical demand level |

### Posts/Pages SEO fields (via `inc/meta-posts.php`)
| Meta Key | Type | Purpose |
|----------|------|---------|
| `ukiyo_seo_title` | text | Custom `<title>` tag |
| `ukiyo_meta_description` | textarea | Meta description |
| `ukiyo_primary_keyword` | text | Schema keyword hint |
| `ukiyo_og_title` | text | Open Graph title override |
| `ukiyo_og_description` | textarea | Open Graph description |
| `ukiyo_og_image` | URL | Open Graph image URL |
| `ukiyo_og_image_id` | attachment ID | OG image attachment |
| `ukiyo_post_intro` | textarea | First-paragraph override for SEO |

### Portal fields (via `inc/portal/metaboxes.php` + `save-meta.php`)
| Meta Key | Type | Purpose |
|----------|------|---------|
| `ukiyo_portal_dates` | text | Trip date range |
| `ukiyo_portal_travelers` | serialized | Traveler names list |
| `ukiyo_portal_proposal_recipient_name` | text | Primary client name |
| `ukiyo_portal_access_type` | select | `proposal` or `trip` |
| `ukiyo_portal_proposal_response_status` | text | Proposal accepted/rejected/pending |

---

## 7. CSS Architecture

### Loading Order
1. **Critical CSS** — injected inline via `wp_head` (priority 0) — prevents FOUC
   - Contains: CSS custom properties (color palette), font stacks, opacity transition
2. **main.css** — loaded non-blocking via `<link rel="preload">` + inline `onload`
3. **legacy-tailwind-compat.css** — loaded after main (Tailwind v3 compatibility)
4. **portal-aventurero.css** — loaded only on portal pages

### CSS Custom Properties (defined in `functions.php` critical CSS block)
```css
--color-primary: #8B4513;
--color-primary-50 … --color-primary-900: full scale
--color-secondary: #9CAF88;
--color-secondary-50 … --color-secondary-900: full scale
--color-accent: #D4A574;
--color-accent-50 … --color-accent-900: full scale
--color-background: #FEFCF8;
--color-surface: #F5F2ED;
--color-text-primary: #2C2C2C;
--color-text-secondary: #6B6B6B;
--color-success: #7A9471;
--color-warning: #C4915C;
--color-error: #A0674B;
```

### Tailwind Usage
- Tailwind utilities compiled into `main.css`
- Custom Tailwind config injects the color system and font families
- `legacy-tailwind-compat.css` prevents breakage from Tailwind v3 → v4 migration
- No `@apply` dependence found in templates — utilities used directly in class attributes

### Inline Styles
Many templates contain `<style>` blocks for page-specific overrides (e.g., `.hero-responsive` responsive height). This is a known fragility — they are not centralized.

---

## 8. JavaScript Architecture

### Main Script (`assets/js/scripts.js`)
Responsibilities:
1. **Mobile menu toggle** — hamburger open/close, body scroll lock
2. **Scroll-responsive header** — adds `scrolled` class after 50px, triggers logo and nav color swap
3. **Parallax** — transforms `.parallax-element` elements on scroll
4. **Smooth scroll** — intercepts `a[href^="#"]` clicks
5. **Experience filter** — filters destination cards by `data-region` attribute
6. **Marker tooltips** — shows destination info on map pin hover

### Conditional Scripts
| Script | When loaded |
|--------|------------|
| `experiences-map.js` | Only on `page-experiences.php` (Leaflet.js map) |
| `trip-route.js` | Author trip pages (route visualization) |
| `portal-frontend.js` | Portal template pages |
| `portal-admin.js` | WordPress admin for portal |
| `dhws-data-injector.js` | Admin-only, requires `?ukiyo_component_debug` query param |

### External Scripts (Deferred/Lazy)
- Google Analytics / GTM — deferred, lazy-loaded on first user interaction
- Google Ads — same pattern
- Contentsquare — loaded on interaction, not on page load
- Instagram feed detection — handled in `functions.php`

### AJAX Handler
- **Action:** `ukiyo_filter_blog`
- **File:** `functions.php` → `ukiyo_filter_blog_handler()`
- **Method:** POST to `admin-ajax.php`
- **Input:** `cat_id` (category ID)
- **Output:** HTML fragment of 6 blog posts (masonry cards)

---

## 9. SEO Architecture (`inc/seo.php` — 1179 lines)

### Priority Chain for Meta Title
1. Template-level hardcoded override (switch/case on `is_page_template()`)
2. Post meta `ukiyo_seo_title`
3. `get_the_title()`
4. Fallback to bloginfo

### Priority Chain for Meta Description
1. Template-level hardcoded override
2. Post meta `ukiyo_meta_description`
3. Post excerpt
4. `ukiyo_get_post_intro()` (helper)
5. First 28 words of post content
6. Category-specific fallback copy

### JSON-LD Entities Generated
- `TravelAgency` — on every page
- `WebSite` — on every page
- `WebPage` — on every page
- `TouristDestination` — on destination pages
- `Service` — on destination + pricing pages
- `BlogPosting` — on single blog posts
- `ImageObject` — for featured images

### SEO Plugin Compatibility
- Detects: Yoast SEO, Rank Math, AIOSEO
- Disables duplicate plugin JSON-LD output
- Filters plugin fields when they are empty

### Noindex Pages
- Search results (`is_search()`)
- 404 (`is_404()`)
- Legal pages: privacidad, cookies, terminos slugs

---

## 10. Routing System (`inc/routes.php`)

The routing system maps semantic keys to real WordPress page slugs, with fallback candidates:

```php
'destinations'       → tries: ['experiencias', 'destinos']
'pricing'            → tries: ['precios-viajes-a-medida', 'pricing']
'viajes_autor'       → tries: ['viajes-de-autor']
'about'              → tries: ['nosotros', 'sobre-ukiyo', 'about-ukiyo']
'reviews'            → tries: ['resenas', 'reseñas', 'reviews']
'plan_trip'          → tries: ['planifica-tu-viaje', 'planifica-tu-viaje-a-medida']
'privacy'            → tries: ['privacidad', 'politica-de-privacidad']
'terms'              → tries: ['terminos', 'terminos-y-condiciones']
'cookies'            → tries: ['cookies', 'politica-de-cookies']
'destination_*'      → tries: ['viajes-a-medida-{country}', '{country}', 'destino/{country}']
'form_viaje_autor'   → tries: ['formulario-viaje-de-autor', 'formularioautor']
```

Key function: `ukiyo_get_route_url($key)` — returns URL of first matching existing page.

---

## 11. Email System

### Architecture
```
TypeScript source:  /emails/templates/*.tsx
Build tool:         React Email (Next.js based)
Compiled output:    /emails/out/*.html + /emails/out/static/
PHP consumption:    inc/portal/emails.php reads compiled HTML
Asset embedding:    functions.php → ukiyo_email_*() embeds images as CID attachments
```

### 17 Email Templates
| Template | Trigger |
|----------|---------|
| `primer_contacto` | First contact acknowledgment |
| `consulta_recibida` | Query received confirmation |
| `propuesta_enviada` | Proposal delivered |
| `reserva_confirmada` | Booking confirmed |
| `factura` | Invoice |
| `pago_confirmado` | Payment confirmed |
| `interes_viaje_autor` | Author trip interest submitted |
| `invitacion_portal` | Portal access invitation |
| `inicio_viaje` | Trip start reminder |
| `recordatorio_salida` | Departure countdown |
| `preparacion_viaje` | Pre-trip checklist |
| `documentacion_viaje` | Document requirements |
| `feedback_viaje` | Post-trip feedback request |
| `consejos_destino` | Destination tips |
| `bienvenida_de_vuelta` | Welcome back post-trip |
| `aviso_lead_viaje_autor` | Staff notification: author trip lead |
| `consulta_colaboracion_agencia` | Agency partnership inquiry |

### SMTP Configuration
- From address: `info@viajesukiyo.com`
- From name: `Viajes Ukiyo`
- Configured via PHPMailer hooks in `functions.php`

---

## 12. Performance Optimizations

| Technique | Implementation |
|-----------|---------------|
| Critical CSS inline | `wp_head` priority 0, prevents FOUC |
| Non-blocking CSS | `<link rel="preload">` + `onload` swap |
| Font self-hosting | All fonts in `/assets/fonts/` — no Google Fonts |
| Asset minification | `.min.css` / `.min.js` auto-served when available |
| Cache busting | `filemtime()` on asset URLs |
| Script deferral | Non-critical JS uses `defer` attribute |
| Lazy analytics | GA/GTM/Ads/Contentsquare load on first interaction |
| Conditional scripts | Leaflet only on map page; portal JS only on portal |
| Plugin cleanup | WP Block Library, Google Fonts plugin, subscription blocks dequeued |
| Image loading | `fetchpriority="high"` / `loading="lazy"` correctly set on hero slides |
| WebP cache | `/assets/optimized-webp/` directory for converted images |

---

## 13. Current Limitations and Technical Risks

### High Priority
| Risk | Detail |
|------|--------|
| **OAuth credentials in theme root** | `client_secret_*.json` should be outside webroot |
| **Missing HTTP security headers** | No HSTS, X-Frame-Options, X-Content-Type-Options, Referrer-Policy |
| **Hardcoded content in templates** | Hero images, prices, and copy are hardcoded in PHP — not editable via WP admin |
| **Inline `<style>` blocks in templates** | Each page template contains its own `<style>` block — not centralizable without refactor |
| **No REST API for viaje_autor** | `show_in_rest` not explicitly enabled — limits headless/AI integration |

### Medium Priority
| Risk | Detail |
|------|--------|
| **Per-ID template proliferation** | Each new author trip may need a new PHP template in `/templates/` |
| **Serialized repeater data** | Itinerary, gallery, testimonials stored as PHP serialized arrays — not JSON |
| **SEO hardcoding** | `inc/seo.php` contains hardcoded title/description strings per template |
| **Email rebuild required** | Any email content change requires TypeScript edit + React Email rebuild |
| **Image alt text gaps** | SEO audit flagged 21 images with missing alt text |
| **Readability grade** | Body copy averages grade 14.4 — too academic for emotional travel storytelling |

### Low Priority
| Risk | Detail |
|------|--------|
| **`promotion_one/` in theme** | A standalone Next.js site lives inside the theme directory |
| **`seo-tools/` Python scripts** | Dev tools committed to production theme |
| **`emails/node_modules`** | Build dependencies in theme directory increase disk size |
| **Telma font** | Declared but minimally used — unclear purpose |
| **`components/` dir** | Empty — declared intent but no implementation |
| **HTML email templates** | 6 raw HTML email files in theme root (not the React system) — purpose unclear |

---

## 14. Integration Points

| Integration | Current State | File |
|-------------|--------------|------|
| SMTP email | Active | `functions.php` + `inc/portal/emails.php` |
| Leaflet.js maps | Active | `page-experiences.php` + `experiences-map.js` |
| Google Analytics/GTM | Active (deferred) | `functions.php` |
| Google Ads | Active (deferred) | `functions.php` |
| Contentsquare analytics | Active (lazy) | `functions.php` |
| Google OAuth | Present but unclear | `client_secret_*.json` |
| WordPress REST API | Not configured for CPTs | — |
| Instagram feed | Detection only | `functions.php` |
| React Email | Active (compiled) | `/emails/` → `/emails/out/` |
| Next.js promo | Standalone | `/promotion_one/` |
