# Viajes Ukiyo — WordPress REST API Plan

> Practical implementation plan for connecting AI agents and external tools to the WordPress backend.
> Last updated: 2026-05-16 (generated from codebase audit).

---

## 1. Authentication Approach

### Method: Application Passwords (Recommended)

WordPress 5.6+ includes native Application Passwords. No plugin required.

**Setup steps:**
1. Go to `wp-admin → Users → Your Profile`
2. Scroll to "Application Passwords"
3. Create a new password named `ai-agent` (or `claude-agent`)
4. Store the generated password securely — it is shown only once

**Using in requests:**
```http
Authorization: Basic base64(username:application_password)
```

Example with curl:
```bash
curl -X GET \
  https://viajesukiyo.com/wp-json/wp/v2/viaje_autor \
  -H "Authorization: Basic $(echo -n 'admin:xxxx xxxx xxxx xxxx xxxx xxxx' | base64)"
```

**Security notes:**
- Use HTTPS only — Application Passwords are base64 encoded, not encrypted
- Create a dedicated WordPress user with `Editor` role for the AI agent (not Admin)
- Rotate the password periodically
- Do not commit passwords to git — use environment variables or a secrets manager

### Alternative: JWT Authentication
If Application Passwords are not sufficient (e.g., for stateful sessions), the `JWT Authentication for WP REST API` plugin adds bearer token support. Not currently installed — requires evaluation.

---

## 2. Current REST API State

### Known Issues That Must Be Fixed First

#### Issue 1: `viaje_autor` CPT may not be in REST API
**File:** `inc/cpt-viaje-autor.php`  
**Required change:**
```php
register_post_type('viaje_autor', [
    // ... existing args ...
    'show_in_rest' => true,           // ADD THIS
    'rest_base'    => 'viaje_autor',  // ADD THIS (optional, sets the endpoint slug)
]);
```

#### Issue 2: Custom meta fields not exposed in REST API
Each meta key must be registered with `show_in_rest: true`:
```php
register_post_meta('viaje_autor', 'ukiyo_hero_title', [
    'show_in_rest'  => true,
    'single'        => true,
    'type'          => 'string',
    'auth_callback' => function() { return current_user_can('edit_posts'); },
]);
```

This must be done for each field in `inc/meta-viaje-autor.php`.

**Note:** Serialized/array fields require a more complex REST schema (`type: array`). Itinerary, gallery, testimonials, and highlights will need custom REST schemas.

#### Issue 3: `ukiyo_viaje` CPT must stay private
`show_in_rest: false` is already set in `inc/portal/register-cpt.php`. **Do not change this.**

---

## 3. Required Endpoints

### 3.1 Author Trips (`viaje_autor`)

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `GET` | `/wp-json/wp/v2/viaje_autor` | List all trips (published) |
| `GET` | `/wp-json/wp/v2/viaje_autor?status=draft` | List drafts (requires auth) |
| `GET` | `/wp-json/wp/v2/viaje_autor/{id}` | Single trip |
| `POST` | `/wp-json/wp/v2/viaje_autor` | Create new trip draft |
| `PATCH` | `/wp-json/wp/v2/viaje_autor/{id}` | Update existing trip |
| `DELETE` | `/wp-json/wp/v2/viaje_autor/{id}` | Delete trip (use sparingly) |

### 3.2 Media / Images

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/wp-json/wp/v2/media` | Upload image |
| `GET` | `/wp-json/wp/v2/media/{id}` | Get image metadata and URLs |

### 3.3 Taxonomy — Destinations

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `GET` | `/wp-json/wp/v2/destino` | List all destination terms |
| `POST` | `/wp-json/wp/v2/destino` | Create new destination term |
| `GET` | `/wp-json/wp/v2/destino/{id}` | Single term |

### 3.4 Blog Posts (Standard Posts)

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/wp-json/wp/v2/posts` | Create blog post draft |
| `PATCH` | `/wp-json/wp/v2/posts/{id}` | Update post |
| `GET` | `/wp-json/wp/v2/posts?per_page=10` | List posts |

### 3.5 Pages (optional)
Standard WP pages are accessible at `/wp-json/wp/v2/pages` but destination pages are PHP templates with hardcoded content — **REST API updates will not affect template content.** Only use this endpoint to update SEO meta fields on existing pages.

---

## 4. Draft Publishing Workflow

### Step-by-Step

```
1. [AI Agent] POST /wp-json/wp/v2/viaje_autor
   Body: { title, excerpt, status: "draft", meta: {...} }
   Response: { id: 201, link: "...", status: "draft" }

2. [AI Agent] POST /wp-json/wp/v2/media
   Body: image binary (Content-Type: image/jpeg)
   Response: { id: 302, source_url: "..." }

3. [AI Agent] PATCH /wp-json/wp/v2/viaje_autor/201
   Body: { featured_media: 302, meta: { ukiyo_hero_image: 302 } }

4. [AI Agent] PATCH /wp-json/wp/v2/viaje_autor/201
   Body: { destino: [term_id] }

5. [AI Agent] → Notify staff (via email or webhook) that draft 201 is ready for review

6. [Staff] Reviews in wp-admin → edits if needed → sets status: "publish"
```

**AI agents must never set `"status": "publish"` directly.**

---

## 5. Media Upload Workflow

```bash
# Upload an image
curl -X POST \
  https://viajesukiyo.com/wp-json/wp/v2/media \
  -H "Authorization: Basic {token}" \
  -H "Content-Type: image/jpeg" \
  -H "Content-Disposition: attachment; filename=indonesia-hero.jpg" \
  --data-binary @/path/to/image.jpg
```

Response includes:
- `id` — use as `featured_media` or meta value
- `source_url` — full URL
- `media_details.sizes` — thumbnail, medium, large, full URLs

**Image naming conventions observed in theme:**
```
heroimages/viajes-personalizados-ukiyo-{country}{descriptor}.jpg
{country}/viajes-{country}-{descriptor}.jpg
autores/{expert-name}-ukiyo.jpg
```
Follow this pattern when naming uploaded files.

---

## 6. Proposal Creation Workflow

A "proposal" in Ukiyo terms is a curated `viaje_autor` post delivered to a specific client before booking. The portal (`ukiyo_viaje` CPT) holds the private version.

### Public Trip Page Workflow (via REST API)
This is for creating a new author trip page — **not** a private client proposal.

```json
POST /wp-json/wp/v2/viaje_autor
{
  "title": "Colombia con Ojos de Fotógrafo",
  "excerpt": "12 días de Colombia auténtica guiados por la mirada de nuestra experta local.",
  "status": "draft",
  "meta": {
    "ukiyo_seo_title": "Viaje de Autor a Colombia — Fotografía y Cultura | Viajes Ukiyo",
    "ukiyo_meta_description": "12 días de Colombia profunda...",
    "ukiyo_hero_title": "Colombia con Ojos de Fotógrafo",
    "ukiyo_hero_subtitle": "Un viaje que cambia la forma de mirar",
    "ukiyo_expert_name": "Lucía Fernández",
    "ukiyo_expert_bio": "Lucía lleva diez años...",
    "ukiyo_price_per_person": "3200",
    "ukiyo_duration_days": "12",
    "ukiyo_group_size": "4-8 personas",
    "ukiyo_season": "Enero — Marzo, Julio — Agosto",
    "ukiyo_itinerary": "[{\"day\":1,\"title\":\"...\",\"description\":\"...\"}]",
    "ukiyo_highlights": "[{\"icon\":\"camera\",\"title\":\"...\",\"description\":\"...\"}]"
  }
}
```

**Important:** Serialized fields (`ukiyo_itinerary`, `ukiyo_highlights`, etc.) are currently stored as PHP serialized arrays in the database. If exposed via REST API they must be converted to JSON. This requires adjusting `register_post_meta()` to use `type: 'array'` and a REST schema — this is a non-trivial migration.

**Assumption:** For the initial integration, simpler scalar fields (title, bio, SEO) can be targeted first. Itinerary and highlights via REST API require the serialization migration.

---

## 7. SEO and Meta Handling Strategy

### When Creating a New Post via REST API

Always include these meta fields:
```json
{
  "ukiyo_seo_title": "...",
  "ukiyo_meta_description": "...",
  "ukiyo_primary_keyword": "...",
  "ukiyo_og_title": "...",
  "ukiyo_og_description": "..."
}
```

### OG Image
After uploading the hero image, also set:
```json
{
  "ukiyo_og_image": "https://viajesukiyo.com/wp-content/uploads/.../image.jpg",
  "ukiyo_og_image_id": 302
}
```

### SEO Fallback Chain
The existing `inc/seo.php` will use meta values if set. If not set, it falls back to post title/excerpt. **Always set meta explicitly** — do not rely on fallback behavior for new content.

### Template-Level Overrides
Certain pages in `inc/seo.php` have hardcoded SEO strings (e.g., the front page, pricing page). REST API updates to post meta on these pages will be **ignored** because the template override fires first. This is a known limitation of the current SEO architecture.

---

## 8. Security Considerations

| Risk | Mitigation |
|------|-----------|
| Application Password exposed | Store in `.env` or secrets manager, never in git |
| Over-privileged AI user | Use `Editor` role, not `Administrator` |
| Accidental publish | AI must always use `status: "draft"` |
| Mass content overwrite | Check existing meta before PATCH; never PATCH `status: "publish"` |
| `ukiyo_viaje` data exposure | CPT has `show_in_rest: false` — do not change |
| Google OAuth file exposure | `client_secret_*.json` is in theme root — move to outside webroot immediately |
| CORS (if headless/external agent) | May need to configure allowed origins in `functions.php` |
| Nonce-based AJAX (existing) | `ukiyo_filter_blog` AJAX uses `admin-ajax.php` — separate from REST API, not affected |

### Recommended `.env` Pattern (for external AI agent)
```bash
UKIYO_WP_URL=https://viajesukiyo.com
UKIYO_WP_USER=ai-agent
UKIYO_WP_APP_PASSWORD=xxxx xxxx xxxx xxxx xxxx xxxx
```

---

## 9. REST API Testing Checklist

Before any AI agent goes live, verify:

- [ ] `viaje_autor` CPT returns results at `/wp-json/wp/v2/viaje_autor`
- [ ] Auth works: `GET /wp-json/wp/v2/viaje_autor?status=draft` returns drafts with credentials
- [ ] POST creates a new draft with title and meta
- [ ] PATCH updates meta on an existing draft
- [ ] Media upload returns a usable `id`
- [ ] `destino` taxonomy terms are readable at `/wp-json/wp/v2/destino`
- [ ] `ukiyo_viaje` is NOT accessible (404 or empty) at `/wp-json/wp/v2/ukiyo_viaje`
- [ ] SEO meta fields appear in `GET /wp-json/wp/v2/viaje_autor/{id}?context=edit`

---

## 10. Endpoint Reference Summary

```
Base URL: https://viajesukiyo.com/wp-json/wp/v2/

GET    /viaje_autor                    List published trips
GET    /viaje_autor?status=draft       List drafts (auth required)
GET    /viaje_autor/{id}               Single trip
POST   /viaje_autor                    Create draft
PATCH  /viaje_autor/{id}              Update draft
GET    /destino                        List destination terms
POST   /destino                        Create term
GET    /media/{id}                     Image metadata
POST   /media                          Upload image
POST   /posts                          Create blog post draft
PATCH  /posts/{id}                    Update blog post
GET    /pages                          List pages (for SEO meta updates only)
PATCH  /pages/{id}                    Update page meta (SEO only)
```

---

## 11. Known Unknowns (Assumptions)

> Items marked [ASSUMPTION] need verification against the live WordPress instance.

- [ASSUMPTION] The WordPress REST API is enabled and accessible at `/wp-json/`
- [ASSUMPTION] `viaje_autor` CPT does not currently have `show_in_rest: true` — this needs to be added
- [ASSUMPTION] Serialized meta fields will need migration to JSON for proper REST API schema support
- [ASSUMPTION] The live domain is `viajesukiyo.com` — verify with actual hosting config
- [ASSUMPTION] Google OAuth credentials are for some internal tool (Analytics read access?) — purpose and scope unclear
- [UNKNOWN] Whether any API rate limiting or security plugin (Wordfence, iThemes) is active that might block REST requests
