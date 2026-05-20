# Viajes Ukiyo — AI Integration Plan

> Strategic plan for integrating AI-assisted content generation into the Viajes Ukiyo system.
> Last updated: 2026-05-16 (generated from codebase audit).

---

## 0. Guiding Principles

Before any implementation:

1. **AI generates drafts, humans approve.** No AI content goes live without editorial review.
2. **Brand voice is enforced structurally.** Prompts must embed the Ukiyo tone-of-voice rules.
3. **Never overwrite.** AI must check for existing manual content before updating.
4. **Itineraries are sacred.** Day-by-day itineraries especially must not be touched once approved by staff.
5. **Private portal data stays private.** `ukiyo_viaje` CPT must never appear in AI pipelines.

---

## 1. What AI Could Generate

### 1.1 Author Trip Content (`viaje_autor` CPT)
The highest-value AI use case. Each author trip needs:
- A hero title and subtitle (short, emotional)
- An expert bio (150–250 words, first person or third person)
- A day-by-day itinerary (structured, 8–14 days typically)
- Highlight cards (icon + title + 1-sentence description, ~6 per trip)
- An excerpt/teaser for archive listings
- SEO title + meta description
- OG title + OG description

**AI Inputs Required:**
- Destination name
- Duration
- Expert guide identity (name, background, specialty)
- Trip theme/angle (e.g., "gastronomic Colombia", "remote beaches Indonesia")
- Key stops/locations
- Group size and difficulty level

**AI Output Format:**
JSON object matching the custom field schema (see `TECHNICAL_MAP.md §6`).

### 1.2 Destination Page Copy
Each destination page (`page-colombia.php`, etc.) currently has hardcoded PHP copy. AI could generate:
- Updated destination descriptions
- Seasonal recommendations
- Cultural context paragraphs
- "Why Ukiyo?" copy specific to each destination

**Caveat:** These are currently hardcoded in PHP templates. AI output would need to be applied manually or via a future CMS-driven structure.

### 1.3 Blog Posts
The blog (`/blog/`) follows standard WordPress posts. AI could:
- Generate draft posts given a topic and destination
- Suggest SEO titles and meta descriptions
- Generate structured content (H2 → sections → short paragraphs)

**SEO fields must always be populated:** `ukiyo_seo_title`, `ukiyo_meta_description`, `ukiyo_primary_keyword`.

### 1.4 Email Templates
17 email templates exist as compiled React/TypeScript. AI could:
- Generate personalized content blocks for a specific traveler
- Fill dynamic placeholders (destination, dates, expert name, traveler name)
- Suggest improved copy for existing templates

**Caveat:** Structural changes require editing `/emails/templates/*.tsx` + rebuilding. Dynamic variable insertion can be done via PHP at send time without rebuilding.

---

## 2. Proposed AI Workflow for Proposal Generation

```
[Staff triggers AI via admin UI or CLI]
    ↓
[AI receives: destination, duration, theme, traveler notes, guide info]
    ↓
[AI generates: itinerary JSON + hero copy + highlights JSON + SEO fields]
    ↓
[Staff reviews draft in wp-admin custom UI]
    ↓
[Staff approves → system calls WP REST API to create viaje_autor draft]
    ↓
[Staff publishes (or schedules) manually]
    ↓
[viaje_autor post is live at /viajes/{slug}/]
```

No AI step should trigger a published post directly.

---

## 3. Recommended Data Structures for AI Output

### Itinerary (matches existing metabox schema)
```json
{
  "itinerary": [
    {
      "day": 1,
      "title": "Llegada a Medellín — La Ciudad de la Eterna Primavera",
      "description": "Bienvenida en el aeropuerto José María Córdova. Traslado al barrio El Poblado. Paseo introductorio por Parque Lleras y cena de bienvenida en restaurante local.",
      "meals": ["dinner"],
      "accommodation": "Hotel Charlee, Medellín"
    }
  ]
}
```

### Highlights (matches existing metabox schema)
```json
{
  "highlights": [
    {
      "icon": "leaf",
      "title": "Naturaleza sin filtros",
      "description": "Acceso a reservas privadas lejos de los circuitos turísticos."
    }
  ]
}
```

### SEO Fields
```json
{
  "ukiyo_seo_title": "Viaje de Autor a Colombia con María García | Viajes Ukiyo",
  "ukiyo_meta_description": "Descubre Colombia desde dentro con nuestra experta local. 12 días de gastronomía, cultura y naturaleza sin masificación. Grupos reducidos.",
  "ukiyo_primary_keyword": "viaje de autor Colombia"
}
```

---

## 4. How AI Should Publish to WordPress

### Step 1: Authenticate
Use WordPress Application Passwords (see `WORDPRESS_API_PLAN.md`).

### Step 2: Create Draft Post
```
POST /wp-json/wp/v2/viaje_autor
{
  "title": "Trip Title",
  "status": "draft",
  "excerpt": "Short teaser text",
  "meta": {
    "ukiyo_seo_title": "...",
    "ukiyo_meta_description": "...",
    "ukiyo_hero_title": "...",
    "ukiyo_expert_name": "...",
    "ukiyo_itinerary": "[...]",
    ...
  }
}
```

**Note:** The `viaje_autor` CPT must have `show_in_rest: true` enabled for this to work. Currently this is not confirmed — see `TECHNICAL_MAP.md §3`. This change must be made in `inc/cpt-viaje-autor.php`.

### Step 3: Upload Featured Image (if any)
```
POST /wp-json/wp/v2/media
(with image binary in body)
```
Then `PATCH /wp-json/wp/v2/viaje_autor/{id}` with `featured_media: {media_id}`.

### Step 4: Assign Taxonomy
```
POST /wp-json/wp/v2/viaje_autor/{id}
{
  "destino": [term_id]
}
```

### Step 5: Notify Staff
Send email via the existing `inc/portal/emails.php` system (or trigger a webhook). Staff reviews draft in wp-admin before publishing.

---

## 5. How AI Should Avoid Overwriting Manual Work

### Draft-Only Rule
AI must only create posts with `"status": "draft"`. Publishing is a human action.

### Meta Conflict Check
Before writing a meta field, check if it already contains non-empty content:
```
GET /wp-json/wp/v2/viaje_autor/{id}?context=edit
```
If `ukiyo_itinerary` is non-empty and the post is published → **do not overwrite**.

### Revision Safety
The `viaje_autor` CPT supports `revisions`. AI can update a field and WordPress will create a revision, allowing human rollback.

### Locked Fields Convention (proposed)
Introduce a meta flag: `ukiyo_field_locked: ["itinerary", "expert_bio"]` — AI skips locked fields. Not yet implemented; would require a custom metabox checkbox per field.

---

## 6. Where AI-Generated Content Can Be Safely Inserted

| Location | Safety Level | Notes |
|----------|-------------|-------|
| New `viaje_autor` draft (all fields) | ✅ Safe | Draft only, human review before publish |
| Existing `viaje_autor` SEO fields | ⚠️ Conditional | Safe if post is in draft; risky on published |
| Blog post drafts | ✅ Safe | Standard WP posts, easy revision |
| Destination page copy | ❌ Unsafe | Hardcoded in PHP templates — no WP admin control |
| Portal (`ukiyo_viaje`) | ❌ Never | Private data, off-limits |
| Email template content | ⚠️ Compile step | Requires TypeScript edit + rebuild |
| Header/footer nav | ❌ Never | Structural element, not content |

---

## 7. Suggested AI Agent Workflow Per Use Case

### Use Case A: Generate a New Author Trip Post
```
Input:  destination, duration, expert_name, expert_bio, theme, locations[]
Agent:  GenerateTripContent → draft JSON
Human:  Review in admin UI
Agent:  PublishDraft → POST to REST API
Human:  Final approval → Publish in wp-admin
```

### Use Case B: Update SEO Fields for Existing Posts
```
Input:  post_id, current_title, current_content
Agent:  AnalyzeSEO → suggest ukiyo_seo_title, ukiyo_meta_description
Human:  Approve suggestions
Agent:  PATCH meta fields on draft copy
Human:  Merge to published post
```

### Use Case C: Generate Blog Post
```
Input:  topic, destination, angle, primary_keyword
Agent:  GenerateBlogPost → title, content (HTML), seo_fields
Human:  Review in wp-admin editor
Human:  Publish
```

---

## 8. AI Prompt Engineering Requirements

Every AI prompt interacting with Ukiyo content must include:

### Required System Context
```
You are writing travel content for Viajes Ukiyo, a premium boutique travel agency.

Tone: Warm, intelligent, personal. Emotionally evocative without being clichéd.
Language: Spanish (Spain register, tuteo). 
Forbidden words: paquete, oferta, descuento, todo incluido, vacaciones baratas, exclusivo (overused).
Always: Center the human experience, not the destination checklist.
Framing: Ukiyo only organizes trips they have personally done. This is always implicit.
```

### Required Output Format
All AI outputs for WordPress must be structured JSON (not freeform markdown) to match the custom field schema.

---

## 9. Technical Prerequisites Before AI Integration

| Prerequisite | Status | File to modify |
|-------------|--------|---------------|
| Enable REST API for `viaje_autor` | ❌ Not confirmed | `inc/cpt-viaje-autor.php` — add `show_in_rest: true` |
| Enable meta in REST API | ❌ Not done | Need `register_meta()` with `show_in_rest: true` per field |
| Application Password created | ❌ Not set up | WordPress admin → Users → Application Passwords |
| Draft-only webhook or UI | ❌ Not built | New admin tool needed |
| Field-lock mechanism | ❌ Not built | Optional but recommended |
| Image upload endpoint test | ❌ Not tested | `/wp-json/wp/v2/media` |
