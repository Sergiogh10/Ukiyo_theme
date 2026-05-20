# Viajes Ukiyo — Business & Brand Context

> This document defines what Viajes Ukiyo is, what it stands for, and how every future system (human or AI) must treat it.
> Last updated: 2026-05-16 (auto-generated from codebase audit).

---

## 1. What is Viajes Ukiyo?

Viajes Ukiyo is a **boutique, premium, bespoke travel agency** based in Spain. It designs and organizes tailor-made travel experiences for clients who want something beyond package holidays. The word *Ukiyo* (浮世) comes from Japanese — "the floating world" — a reference to the ephemeral, present-moment beauty of life.

The agency is run by a small expert team who have personally visited every destination they sell. This is a central brand promise: **"Solo organizamos viajes que hemos vivido. Y eso lo cambia todo."** (We only organize trips we have lived ourselves. And that changes everything.)

---

## 2. What the Brand Stands For

| Principle | Description |
|-----------|-------------|
| **Authenticity** | No mass tourism. Every destination, guide and experience is personally vetted. |
| **Slow travel** | Prioritizes depth over breadth. Days are not filled for filling's sake. |
| **Emotional storytelling** | Travel is framed as a life-changing personal story, not a list of activities. |
| **Local connection** | Deep relationships with artisans, guides, communities. Real connections, not tourist facades. |
| **Boutique design** | Small-group travel, attention to detail, curated aesthetics. |
| **Personalization** | Every trip is designed from zero around the client's pace, interests, and budget. |
| **Honest pricing** | Priced by organized day. No hidden fees. Value over discount. |

---

## 3. Customer Experience Philosophy

The client journey has distinct emotional phases — the brand communicates differently in each:

1. **Discovery** — The client finds Ukiyo while searching for something different. Brand must inspire, not sell.
2. **Dreaming** — The website creates desire through photography, storytelling and editorial copy.
3. **Inquiry** — Client fills out the trip planning form. Tone shifts to warm, personal, expert.
4. **Proposal** — A custom proposal is delivered (PDF or portal). Tone is bespoke, detail-rich.
5. **Confirmation** — Booking confirmed with warmth, logistics, anticipation-building.
6. **Pre-trip** — Checklist, documents, destination tips. Tone is practical but still poetic.
7. **During** — WhatsApp contact, expert guide on the ground. No digital fuss.
8. **Return** — Feedback collection, welcome back, relationship continues.

The portal system (`ukiyo_viaje` CPT + `template-portal-aventurero.php`) materializes phases 4–7 into a private client area.

---

## 4. Tone of Voice

### Overall Register
- Warm, cultivated, personal
- Emotionally resonant without being sentimental
- Intelligent without being cold
- Spanish language only (current market)

### Active Patterns in the Codebase
- Uses first-person plural: "Organizamos", "Creamos", "Acompañamos"
- Addresses client directly: "Diseñado para ti", "Tu viaje", "Lo que buscas"
- Short, punchy sentences followed by longer evocative descriptions
- Headlines often use contrast: "Viajes a medida para quienes buscan algo más"
- Avoids clichés: not "precios exclusivos" but "Lo auténtico no tiene precio, pero sí un valor"
- Never uses: "paquetes", "todo incluido", "oferta", "descuento"

### Examples from Live Pages
- Hero (pricing page): *"Invertir en recuerdos"*
- Hero (home): *"Viajes a medida y personalizados para quienes buscan algo más"*
- Pricing body: *"En UKIYO no vendemos paquetes ni vacaciones: creamos experiencias personales, honestas y llenas de sentido."*
- Footer tagline: Implicit — the brand presence is the message.

---

## 5. Visual Identity

### Typography
| Role | Family | Weights used |
|------|--------|--------------|
| Headings/Display | **Rowdies** | 300 (light), 400 (regular), 700 (bold) |
| Body / UI | **Satoshi** | 300–900 (10 weights) |
| Accent (assumed) | **Telma** | Limited use (not yet visible in all templates) |

All fonts are self-hosted from `/assets/fonts/` — no external CDN calls.

CSS classes: `font-rowdies`, `font-rowdies-light`, `font-satoshi`.

### Color System (from CSS variables in `functions.php`)
| Role | Name | Hex |
|------|------|-----|
| Primary | Warm Brown | `#8B4513` |
| Secondary | Sage Green | `#9CAF88` |
| Accent | Gold | `#D4A574` |
| Background | Off-white | `#FEFCF8` |
| Surface | Light beige | `#F5F2ED` |
| Text Primary | Near-black | `#2C2C2C` |
| Text Secondary | Medium grey | `#6B6B6B` |
| Success | Muted green | `#7A9471` |
| Warning | Warm amber | `#C4915C` |
| Error | Earthy red | `#A0674B` |

Full scale (50–900) exists for Primary, Secondary, and Accent — used in Tailwind utilities.

### Layout Patterns
- Full-height hero sections with image background, dark gradient overlay, centered white text
- Cards with `border-radius: 30px`, subtle shadow, hover lift (`translateY(-8px)`)
- Grid layouts: 1 col mobile → 3 col desktop
- Transparent header on hero pages, solid on scroll (50px threshold)
- Consistent `container mx-auto px-6` centering pattern
- Breadcrumbs via `ukiyo_render_breadcrumbs()` on inner pages

### Icons
- 50+ inline SVG icons via `ukiyo_icon($name, $class)` — no icon fonts
- Material Design icon aliases mapped to semantic names
- Examples: `calendar`, `arrow_right`, `leaf`, `star`, `map`, `heart`

---

## 6. Destinations

Currently 6 active destinations, each with a dedicated page:

| Destination | Template | Slug (assumed) |
|-------------|----------|----------------|
| Indonesia | `page-indonesia.php` | `/viajes-a-medida-indonesia/` |
| Costa Rica | `page-costarica.php` | `/viajes-a-medida-costa-rica/` |
| Colombia | `page-colombia.php` | `/viajes-a-medida-colombia/` |
| Marruecos | `page-marruecos.php` | `/viajes-a-medida-marruecos/` |
| Italia | `page-italia.php` | `/viajes-a-medida-italia/` |
| Lanzarote | `page-lanzarote.php` | `/viajes-a-medida-lanzarote/` |

Images are organized in `/assets/images/{destination}/`. Hero images live in `/assets/images/heroimages/`.

---

## 7. Author-led Trips (Viajes de Autor)

A distinct product line: curated group trips led by expert guides or cultural figures. Stored as the `viaje_autor` custom post type. Currently 11 live trips (IDs: 59, 86, 88, 119, 131, 133, 135, 143, 145, 175, 179).

Each trip has:
- Hero image + title/subtitle
- Expert guide identity (name, bio, photo)
- Pricing + duration + group size + season
- Day-by-day itinerary (repeatable metabox)
- Photo gallery
- Client testimonials
- Highlight cards
- Logistics (inclusions, what to bring, difficulty)

These are the most content-rich pages in the site and the most likely candidates for AI-assisted content generation.

---

## 8. The Portal (Portal del Aventurero)

A private client portal built entirely within WordPress. Not publicly accessible. Each client gets a unique URL (no login required — magic-link style access via `template-portal-aventurero.php`).

The portal shows:
- Trip proposal with interactive acceptance/rejection
- Trip itinerary and key details
- Trip documents
- Departure countdown
- Post-trip feedback form

Portal trips are stored as the `ukiyo_viaje` private CPT. Admin manages them from wp-admin.

---

## 9. What the System Must Never Do

- Never use the words: *paquete*, *oferta*, *descuento*, *todo incluido*, *vacaciones baratas*
- Never present a destination as a simple list of activities
- Never use stock-feeling generic copy
- Never publish a trip without the expert-guide identity
- Never overwrite manually edited portal pages or itineraries
- Never expose private client portal data (ukiyo_viaje CPT) via REST API
- Never skip the brand voice review on AI-generated content
- Never use generic placeholder images — all images are intentional and emotion-driven
- Never skip SEO fields when creating or updating travel content

---

## 10. What Future AI Agents Must Understand

1. **Brand voice is a hard constraint**, not a style suggestion. AI-generated copy must pass the tone-of-voice test before publishing.
2. **Per-ID templates exist** (`/templates/single-viaje_autor-{ID}.php`). Any AI publishing a new `viaje_autor` post must also create or update this template if custom layout is needed, or accept the default `single-viaje_autor.php`.
3. **The routing system** (`inc/routes.php`) maps semantic keys to real page slugs. AI agents must use `ukiyo_get_route_url($key)` equivalents when referencing internal URLs — never hardcode paths.
4. **Email templates are compiled React files**. Modifying email content means editing TypeScript in `/emails/templates/` and rebuilding the `/emails/out/` directory — PHP reads the compiled HTML.
5. **SEO logic is self-managed** in `inc/seo.php`. This file has hardcoded overrides per page template. Adding new pages or CPT posts may require adding entries to this file.
6. **No plugin dependencies for core functionality** — ACF, Yoast, and other plugins are not required. The theme rolls its own metaboxes, SEO, and routing.
7. **Google OAuth credentials** are stored in the theme root (`client_secret_*.json`). This is a security risk and must be addressed before any production work.
