# Cirova Studio — Static Site (HTML / CSS / vanilla JS)

A from-scratch, **fully self-contained** rebuild of the Cirova Studio website
(reference: https://cirova-studio.vercel.app). No frameworks, no build tools, no
npm — just HTML5, CSS3 and vanilla JavaScript. Every asset (logo, images, fonts*,
icons) is localized; nothing is hot-linked at runtime.

\* Fonts load from Google Fonts via `<link>` (the exact families the original uses).
  Everything else — images, logo, icons, CSS, JS — is local.

---

## How to open locally

It's a static site, so just open the file:

```
open index.html        # macOS
```

Or serve it (recommended so relative paths + the contact form behave exactly like production):

```
cd cirova-websiste
python3 -m http.server 8000
# visit http://localhost:8000
```

No install step, no dependencies.

---

## File tree

```
/
├── index.html                        Home
├── smm-services.html                 SMM Services
├── video-editing-services.html       Video Editing
├── website-development.html          Website Development
├── ppc-services.html                 PPC Services
├── digital-marketing-services.html   Digital Marketing
├── about.html                        About
├── contact.html                      Contact (working-looking form)
├── assets/
│   ├── css/style.css                 Single shared stylesheet (mobile-first)
│   ├── js/main.js                    Single shared script (no dependencies)
│   ├── img/                          All extracted images + logo + MANIFEST.txt
│   └── icons/                        SVG icon set (Lucide + Simple Icons brand logos)
├── design-tokens.md                  Colors / fonts / gradients (extracted from live CSS)
└── README.md                         This file
```

---

## What was built

- **8 multi-page HTML files**, each its own `.html`, sharing one CSS + one JS file.
- **Mobile-first, responsive** at 360 / 390 / 480 / 640 / 768 / 1024 / 1440 — see below.
- **Premium SVG icons everywhere, zero emojis.** Every emoji/glyph from the original
  (🚀 🛒 🎓 👤 🏠 🏥 📚 🏢 🛠️ 💼 ★ ✦ ⚡ ⚙ ◎ ● ↑ → …) is replaced by a clean line/brand
  SVG from **Lucide** (line icons) and **Simple Icons** (platform/brand logos).
- **All copy, stats, mockups, testimonials and FAQs** mirror the live reference,
  section-for-section.
- One consistent contact identity everywhere: **cirovastudio@gmail.com** /
  **+91 9877147660** (the original's `hello@cirovastudio.com` inconsistency is fixed).
- Footer **Services** links point to each correct service page (not all to one).

### Mockups recreated (pure HTML/CSS, scale down gracefully)
Premiere Pro timeline · code editor + Lighthouse badge · desktop/tablet/phone device
preview · Instagram phone · Google search-results (Cirova ad boosted) · live PPC
dashboard + CSS bar chart · digital-marketing ecosystem hub diagram · live-chat.

---

## Icons (premium SVG, no emojis)

- `assets/icons/*.svg` — **Lucide** line icons (ISC license).
- `assets/icons/brand-*.svg` — **Simple Icons** brand/platform logos (CC0):
  Instagram, Facebook, LinkedIn, X, Pinterest, YouTube, TikTok, Threads, WordPress,
  Shopify, React, PHP, JavaScript, Google, Meta, etc.
- Sources logged in `assets/icons/ICONS-SOURCE.txt`.
- Icons are applied with a **CSS mask** technique (`.icon { mask: var(--i) }`) so any
  icon inherits the brand **violet→magenta gradient** (`.icon--grad`) or `currentColor`.
  1.5–2px stroke weight, 18–24px in cards, larger in feature blocks.
- Star ratings use a filled-star SVG (`star-filled.svg`), never the ★ character.

---

## Mobile responsiveness (better than the original)

- **Real hamburger menu** → full-screen slide-in panel, 44px+ tap targets, body-scroll
  lock, **Services accordion** (5 services with 2-letter badges), closes on link/X/Esc.
- **Fluid type** via `clamp()` so headings scale smoothly and never overflow.
- **No horizontal overflow anywhere** (`overflow-x:hidden` safety net; marquees + mockups
  clip inside their own containers; wide code/timeline scroll internally with `overflow-x:auto`).
- Grids collapse 1 → 2 → 3/4 columns; **stat counters 2-up on mobile, 4-up on desktop**.
- Images: `max-width:100%`, `loading="lazy"`, explicit `width`/`height` (no layout shift).
- Forms: full-width, 16px inputs (no iOS zoom), proper `type="email"`/`tel`.
- `prefers-reduced-motion` disables marquees, count-ups, parallax and reveals.

---

## JavaScript (`assets/js/main.js`, no dependencies)

1. Mobile hamburger + slide-in + Services accordion + body-scroll lock (+ Esc/auto-close)
2. Navbar blur/shadow on scroll
3. Count-up stats via `IntersectionObserver` (reads `data-count`, preserves `+ % x h yr` suffix)
4. FAQ accordion (smooth height + rotating +/− via CSS)
5. Seamless infinite marquees (track duplicated in JS)
6. Testimonial auto-scroll
7. Reveal-on-scroll (`.in-view`)
8. Contact form `preventDefault` + inline success message (no backend)
9. Honors `prefers-reduced-motion` throughout

---

## Accessibility

- `alt` on every image, `aria-label` on icon-only buttons/links, `aria-expanded` on the
  menu toggle, Services accordion and every FAQ, `aria-hidden` on the mobile panel.
- Keyboard-operable nav and FAQ; visible focus styles; semantic landmarks
  (`header` / `nav` / `main` / `section` / `footer`).
- No console errors, no external runtime requests, no horizontal scroll.

---

## Porting to WordPress (this is zip-ready for that)

The markup is intentionally modular. Each major block is wrapped in
`<!-- SECTION: x -->` comments so it maps cleanly onto WordPress template parts:

| Static block (HTML comment)            | WordPress target                                  |
|----------------------------------------|---------------------------------------------------|
| `SECTION: HEADER` + `SECTION: MOBILE NAV` | `header.php` (register a nav menu for the links)   |
| `SECTION: FOOTER`                      | `footer.php` (or a `template-parts/footer` part)  |
| `SECTION: HERO` / `SERVICES` / `WHY` … | `template-parts/section-*.php` or ACF Flexible Content / blocks |
| `SECTION: FAQ`                         | repeatable block / ACF repeater                   |
| `SECTION: FORM` (contact)             | **needs a real handler** — see below              |

Suggested approach:
- Move `assets/` into the theme; enqueue `style.css` and `main.js` via
  `wp_enqueue_style` / `wp_enqueue_script` in `functions.php`.
- Convert each `<!-- SECTION -->` into a `get_template_part()` include, or an
  ACF Flexible Content layout, or Gutenberg block patterns.
- Replace hard-coded copy/stats with theme options / ACF fields so the client can edit.

### Contact form — important
`#contact-form` is **front-end only**: `main.js` calls `preventDefault()` and shows an
inline success message — **there is no backend**. In WordPress, wire it to a real
handler before launch, e.g. **Contact Form 7**, **WPForms**, **Fluent Forms**, or an
`admin-post.php` / REST endpoint that emails `cirovastudio@gmail.com`. Keep the field
`name`s (`name`, `email`, `company`, `budget`, `message`) and add server-side
validation + spam protection (honeypot / reCAPTCHA).

---

## Assets & provenance

- `assets/img/MANIFEST.txt` — every original URL → local filename (77 images, 0 failures).
- `assets/icons/ICONS-SOURCE.txt` — every icon → its source (Lucide / Simple Icons).
- `design-tokens.md` — the exact colors, fonts and gradients pulled from the live CSS.
- Photos are Unsplash, avatars are Pravatar (downloaded & localized). Testimonial names
  and brand names are placeholders carried over from the reference — replace with real
  client names/work before launch.
# Cirovawebsite
