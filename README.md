# Maverick

A production WordPress block theme built for a political advocacy and fundraising firm.

The brief was a site that stakeholders and non-technical content editors could run themselves — add a page, reorder a card grid, swap a hero image — without a developer in the loop, and without the block editor throwing "this block contains unexpected or invalid content" the first time someone touched it.

**Stack:** WordPress 7.0 · PHP 8.4 · 25 custom dynamic blocks · zero custom front-end JavaScript

---

## Architecture

### Every block is server-rendered

All 25 custom blocks are registered with `save: () => null` and a `render.php`. Nothing is serialized into post content except attributes, which means markup changes ship with a theme update instead of requiring a database migration or a block-recovery pass across every existing page.

### No custom front-end JavaScript

Interactivity is handled with CSS-only techniques or WordPress core's Interactivity API. Nothing custom is enqueued on the front end. Less to break, less to audit, and one less build step between an edit and a deploy.

### Native mechanisms over custom CSS

The theme leans on WordPress's own layout, spacing, and color systems rather than fighting them. The rule of thumb throughout: if a custom stylesheet has to override an editor control, the block is modeled wrong. That keeps what an editor sees in the block inspector consistent with what renders on the front end.

---

## Notable engineering

### Block validation

Invalid-content errors in Gutenberg come from a mismatch between a block's JSON attributes and the inline styles in its saved HTML — and WordPress serializes those styles in a fixed order:

```
color → font-size → font-weight → letter-spacing → line-height → text-transform → margins
```

Hand-authored patterns that emit styles in any other order will validate on save and break on the next edit. Every pattern in this theme is authored against that order. A handful of related constraints turned up along the way and are documented in the theme's inline comments:

- `type:flow` is not a valid Gutenberg layout value — use `type:default`.
- `dimensions.maxWidth` is not supported on `core/paragraph` or `core/heading`.
- Per-block custom `contentSize` generates non-deterministic `wp-container-[hash]` classes, so it can't be used in hand-authored patterns at all.
- `has-global-padding` on a cover block's inner container gets zeroed out by WordPress's nested-padding rule. Padding is restored explicitly from the `--wp--style--root--padding-left/right` custom properties.

### Escaping RichText

`esc_html()` on a RichText value destroys the inline markup the editor just produced. The theme uses a shared `maverick_kses_inline()` helper in `functions.php` — an allow-list of inline tags — so bold, links, and line breaks survive escaping intact.

### Heroes

Hero sections use `core/cover` with a two-gradient system: an opaque `navy-to-navy-deep` gradient as the default, and a translucent `hero-overlay` that takes over when an editor sets a background image. One block, both cases, no editor decision required.

### Drag-to-reorder card grids

Card grids were originally several independent `core/columns` blocks, which meant reordering cards was a copy-paste job. They're now single flexbox `core/group` blocks, so cards reorder by dragging in the list view.

### Spacing utilities

Deliberately minimal: `mw-240`, `mw-360`, `mw-480`, `mw-640`. Consolidating to four even increments beat letting utility classes proliferate one arbitrary value at a time.

---

## Development

```bash
bash release.sh patch    # or: minor
```

Builds a versioned zip for upload.

The theme has to work on activation, with no reseed step — the client's content edits are live, and a "Reset All Pages" routine would overwrite them. Every fix ships as something that applies to existing content in place.

A private **Block Showcase** page in the site's admin renders every block grouped by purpose, as a reference for editors and a visual regression check before release.
