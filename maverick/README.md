# Maverick Theme

Bespoke WordPress block theme for Maverick Advocacy.

## Requirements
- WordPress 6.9+ (required by the Time to Read block used in `single.html` and `home.html`)
- PHP 8.1+
- Node.js 18+ (for building blocks)

## Setup

### 1. Install the theme
Copy the `maverick/` folder to `wp-content/themes/maverick/` and activate it in wp-admin.

### 2. Build the custom blocks
```bash
cd wp-content/themes/maverick
npm install
npm run build
```

This compiles all five custom blocks into their respective `build/` directories. You must run this before the blocks will appear in the editor.

### 3. Set the homepage
In wp-admin → Settings → Reading, set "Your homepage displays" to a static page and assign the desired page. The theme will use `templates/front-page.html` automatically.

### 4. Assign a logo
In wp-admin → Appearance → Editor → Template Parts → Header, click the Site Logo block and upload the Maverick mark.

---

## Custom Blocks

All blocks appear under the **Maverick** category in the block inserter.

| Block | Description |
|---|---|
| Showcase Card | Case study card — image, badge, category, title, description, link |
| Testimonial Card | Client quote with attribution and avatar initials |
| Stats Strip | Navy bar with 1–6 configurable statistics |
| Logo Grid | Horizontal client logo strip with hover reveal |
| CTA Section | Full-width gradient CTA with two buttons and phone number |
| Newsletter Signup | Navy band with email form — posts to a WordPress handler by default, or a custom ESP URL set per-instance |
| Principle Card | Numbered card with title and description — used in "What We Believe" style grids |
| Team Member | Leadership/team card — photo (optional) or initial avatar, name, title, bio |
| Timeline Item | Single year/milestone row for a company history timeline. Stack several inside a group to build a full timeline; enable "Last item" on the final one to remove trailing spacing |
| Topic Filter | Pill-style category filter row, auto-populated from real WordPress categories with automatic active-state highlighting |
| Pillar Card | Link-out card with label, title, description, and an animated arrow link — used to point to other key pages |
| Office Card | Company office/location card — city, label, address, phone |
| Press Row | Single press mention or award row (year, title, publication). Stack several inside a group with class `press-table` to build a full press/recognition list |
| Contact Form | The main inquiry form — name, organization, email, phone, org type, message. Stores submissions in wp-admin under "Inquiries" by default, or posts to a custom CRM URL set in the inspector |
| Contact Card | Small sidebar card with icon (email/phone/star), heading, description, and a direct contact link. Supports a dark variant |
| FAQ Item | A single expandable question/answer using native `<details>/<summary>` — no JavaScript required. Stack several inside a group with class `faq-list` to build a full FAQ section |
| Lead Card | Compact horizontal team card — round initial avatar beside name, title, bio. Used for mid-tier "discipline lead" style grids, distinct from the larger vertical Team Member card |
| Roster Cell | Compact name + role pair for a large team roster. Stack several inside a group with class `roster-grid` to build a 4-column compact team listing |
| Service Card | Discipline/service card with icon (6 built-in options), title, description, and an editable feature list. Used in the Services page grid |
| Work Filter | Pill-style filter row for the Our Work case study grid. Static for now (editable list of label/link/active pairs) — not tied to WordPress categories, since case study filtering is a different taxonomy than blog topics |
| Featured Case | Large single featured card — photo, badge, title, excerpt, read-more link. Two modes: `case` (result-stat pill, sans headline) and `press` (byline, serif italic headline, no result pill) |
| Case Tile | Smaller case study grid tile — image, tag, result stat, meta, title, excerpt |
| Press Item | A single press mention or release. Two variants: `coverage` (date + headline + outlet row) and `release` (badge + headline + excerpt card) |
| Media Kit Row | A downloadable media kit asset row — label, file type/size, download link |

---

## File Structure

```
maverick/
├── style.css                  # Theme header (required by WordPress)
├── functions.php              # Block registration, fonts, editor styles
├── theme.json                 # Design tokens — colors, typography, spacing
├── package.json               # Build scripts
├── templates/
│   └── front-page.html        # Homepage block template
├── parts/
│   ├── header.html            # Sticky nav header
│   └── footer.html            # Four-column footer + copyright bar
├── blocks/
│   ├── showcase-card/
│   ├── testimonial-card/
│   ├── stats-strip/
│   ├── logo-grid/
│   └── cta-section/
│       ├── block.json         # Block metadata and attributes
│       ├── index.js           # Editor JS (source — run npm build)
│       ├── render.php         # PHP frontend renderer
│       ├── style.css          # Frontend styles (source)
│       └── build/             # Compiled output (generated by npm run build)
└── assets/
    └── css/
        └── editor.css         # Gutenberg editor stylesheet
```

---

## Development

To watch for changes while developing:
```bash
npm run start
```

Note: `wp-scripts start` only watches one entry point at a time. For multi-block development, open separate terminal tabs and run `build:showcase-card`, `build:testimonial-card` etc. with the `--watch` flag, or use a tool like `concurrently`.

---

## Article Content Styling (single.html)

The single post template (`templates/single.html`) uses WordPress's dynamic post blocks (`post-title`, `post-featured-image`, `post-content`, `post-terms`, etc.) so any post created in wp-admin renders automatically — no template editing needed per article.

Several rich content treatments from the original design (pull quotes, stat callouts, numbered/checklist styling) aren't native block styles — they're applied via CSS classes on standard blocks. When writing a post, select a block → open the **Advanced** panel in the sidebar → **Additional CSS class(es)**, and add one of:

| Class | Apply to | Effect |
|---|---|---|
| `pullquote` | `core/quote` or `core/group` | Cream background, gold left border, serif italic |
| `stat-callout` | `core/group` (wrapping 3 nested `core/group.stat` blocks) | Navy background, 3-column stat grid |
| `checks` | `core/list` (unordered) | Gold star bullets |
| `numbered` | `core/list` (ordered) | Gold serif numerals |
| `article-foot` | `core/group` (wrapping tags + share links) | Border-top divider, space-between layout |

This styling lives in `assets/css/article.css`, enqueued only on single post views.

---

## Newsletter Signup

The `maverick/newsletter-signup` block posts to a WordPress `admin-post.php` handler by default, which validates the email and stores it in the `maverick_newsletter_subscribers` option — a placeholder so the form works immediately without any third-party service configured.

**To connect a real email service provider:** open the block in the editor, expand **Form Settings** in the inspector, and set **Form action URL** to your ESP's hosted form endpoint (e.g. Mailchimp, ConvertKit). When set, the block submits directly there instead of the internal WordPress handler.

The internal handler lives in `functions.php` as `maverick_handle_newsletter_signup()` — replace the `update_option()` call with an API request to your ESP if you'd rather every signup sync immediately rather than swapping the form action.

## Related Posts

The "More from the field" section on `templates/single.html` uses a native `core/query` loop (3 most recent posts), styled to match the original card design. The current post is automatically excluded via a `query_loop_block_query_vars` filter in `functions.php`, so it never shows up in its own related-posts list.

---

## Blog Index (home.html)

`templates/home.html` renders the blog posts listing — featured post, topic filter, and a 3-column grid of the latest articles.

**Important setup step:** WordPress only renders `home.html` when a **Posts page** is configured. Go to **Settings → Reading**, choose "A static page," and set the **Posts page** dropdown to a page (e.g. create a page titled "Insights" and assign it there). Without this, WordPress falls back to `index.html` instead.

The featured post is the most recent post (or a manually marked "sticky" post if you want to pin a specific article). The grid below it automatically excludes whichever post is shown as featured, so nothing is duplicated.

**Note on WordPress version:** this theme requires **WordPress 6.9+** because the Time to Read block (used in the article byline and featured post meta) was only added to core in that release.

---

## Company Page

`templates/page-company.html` is a selectable page template (Page → Template → "Company" in the editor). Covers firm overview, three pillar link-out cards, the reused stats strip, office locations, press/recognition list, and a careers callout.

**Note:** this mockup's footer references different navigation links ("Our Team," "Careers," "Press") and a different contact email (`hello@maverickpolitical.com`) than the footer currently built into `parts/footer.html` (`hello@maverickadvocacy.com`). The existing footer was **not** changed — let us know if the footer should be updated to match.

The careers section's photo column is a styled placeholder (`careers-photo-col` in `assets/css/article.css`) — set a real background image via custom CSS or convert it to a `core/cover` block with an uploaded image if you'd prefer it editable from the block editor.

---

## Contact Page

`templates/page-contact.html` is a selectable page template (Page → Template → "Contact"). Covers the hero, a two-column form + sidebar layout, the reused offices grid, and a native-HTML FAQ accordion.

### Contact form submissions

Like the newsletter block, the Contact Form posts to an internal WordPress handler by default. Submissions are stored as a private custom post type — go to **wp-admin → Inquiries** to view them. Each entry shows email, phone, and organization type as sortable admin columns; click into an entry to see the full message in the post content area's custom fields.

To route inquiries to a CRM instead, open the Contact Form block, expand **Form Settings** in the inspector, and set a **Form action URL**.

### Footer / brand discrepancy (still unresolved)

This is the **second** mockup (after the Company page) using "Maverick Political" branding, `maverickpolitical.com` email addresses, and footer nav links ("Our Team," "Careers," "Press") that don't match the existing `parts/footer.html`. The Contact page template uses `maverickadvocacy.com` addresses to stay consistent with the rest of the built site — but with two mockups now pointing the other direction, it's worth confirming which is correct before more pages are built against the current footer.

---

## Our Team Page

`templates/page-team.html` is a selectable page template (Page → Template → "Our Team"). Covers leadership (reuses Team Member), discipline leads (new Lead Card), a 24-person wider-team roster (new Roster Cell, 4-column grid), a culture/values split section, and a careers callout.

The culture section's photo column references a placeholder path (`assets/photos/office-meeting.jpg`) that doesn't exist yet — it gracefully falls back to a solid navy background. Add a real image at that path, or update the CSS in `assets/css/article.css` under "Team page — culture values list + photo split."

### Footer / brand discrepancy — now confirmed across three pages

This is the **third** consecutive mockup (Company, Contact, and now Our Team) using "Maverick Political" branding, `maverickpolitical.com` email addresses, and footer navigation links ("Our Team," "Careers," "Press") that differ from the theme's current `parts/footer.html`. Given the consistency across three separate files, this is very likely the intended branding and footer structure — recommend confirming and updating `parts/footer.html` (and the `hello@maverickadvocacy.com` references built into the Contact and Team page templates) in the next pass, rather than continuing to build new pages against branding that may be superseded.

---

## Services Page

`templates/page-services.html` is a selectable page template (Page → Template → "Services"). Covers the hero, intro, a 6-card services grid (new Service Card block), a featured-discipline split section (reuses the `careers-photo-col` placeholder pattern from the Company page), and a 4-step "How We Work" section.

**Note:** "How We Work" reuses the existing **Principle Card** block rather than introducing a new one — the mockup's numbered-step cards are structurally and visually identical to the About page's "What We Believe" cards (same number/title/description layout, same hover treatment), so no new block was needed.

---

## Our Work Page

`templates/page-our-work.html` is a selectable page template (Page → Template → "Our Work"). Covers the hero, one large featured case study, and a real, paginated grid of case study posts, followed by the reused results stats strip.

## Press Page

`templates/page-press.html` is a selectable page template (Page → Template → "Press"). Covers the hero, a featured press item, a paginated coverage list, a static press releases grid, the reused awards/recognition table (`Press Row`), and media contact + media kit sections.

## Case Studies & Press: categories, not custom post types

Case studies and press mentions are **regular WordPress posts** assigned to a "Case Study" or "Press" category — not custom post types. Both categories are auto-created on theme activation. This was a deliberate simplification: the client expects low volume for both content types, so a full CPT (with its own registration, meta boxes, and migration complexity) wasn't worth the overhead. Posts in these categories get a real URL, RSS, REST API access, and use the existing `single.html` template automatically — no separate single-post template was needed, since `single.html` already renders the featured image, title, category badge, and rich post content correctly for any post regardless of category. Per an explicit decision, the original mockup's hero stat/metric callouts were dropped from this flow entirely.

**How the category-scoped queries work:** `page-our-work.html` and `page-press.html` each contain two `core/query` blocks (a featured single-post query and a paginated grid query), identified by a unique `className` (`featured-case-query`, `case-grid-query`, `featured-press-query`, `press-grid-query`). Since static block-theme template files can't contain PHP and therefore can't reference a database-assigned category ID directly, a `query_loop_block_query_vars` filter in `functions.php` resolves the real "Case Study"/"Press" category ID at render time and injects it into the matching query by className. A second, lower-priority filter then keeps both categories out of the main Insights blog index and any post's "Related Posts" query, unless a query is deliberately targeting one of them by category — so case studies and press mentions never show up mixed into regular blog browsing.

`Featured Case` (covers both a featured case study and a featured press item via a `mode` attribute) and `Case Tile`/`Press Item` render the loop's posts using their featured image, title, excerpt, and category — no manual data entry block needed; publishing a normal WordPress post in the right category is sufficient.

**Not currently wired up:** the `Work Filter` block exists (a static, editable chip row) but isn't used in the current Our Work template — with only one "Case Study" category, there's nothing meaningful to filter between. It's left registered in case sub-categories or tags are introduced later.

