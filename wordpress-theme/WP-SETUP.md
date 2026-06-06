# Cirova Studio — WordPress Theme: Install & Setup

You now have a real, installable WordPress theme:
**`wordpress-theme/cirova-studio.zip`**

It contains the exact design + animations from the static site, converted to PHP
(header/footer/page templates), with all images, icons, CSS and JS bundled inside.
Nothing is hot-linked except Google Fonts.

---

## A. What you need first
1. A WordPress site. Either:
   - your domain's hosting with WordPress installed (most hosts have 1-click WP), or
   - a local test install (LocalWP, XAMPP) to preview before going live.
2. Admin access to **wp-admin** (e.g. `https://yourdomain.com/wp-admin`).

> The theme is host-agnostic — once WordPress runs on the domain, this theme works.

---

## B. Install the theme (2 minutes)
1. In wp-admin go to **Appearance → Themes → Add New → Upload Theme**.
2. Choose **`cirova-studio.zip`** → **Install Now** → **Activate**.

That's it — the theme is installed. Next you create the pages so the menu works.

---

## C. Create the pages (this makes the multi-page site + menu work)
The theme auto-applies the right design to each page **by its slug**, so the slugs
must match exactly. The easiest way: create each Page with the **title** below and
WordPress generates the correct slug automatically.

Go to **Pages → Add New** and create these (just title + Publish, leave body empty):

| Page title (type this)        | Slug it must have            | Template used (automatic)            |
|-------------------------------|------------------------------|--------------------------------------|
| Home                          | home (any — it's the front)  | `front-page.php`                     |
| About                         | `about`                      | `page-about.php`                     |
| Contact                       | `contact`                    | `page-contact.php`                   |
| SMM Services                  | `smm-services`               | `page-smm-services.php`              |
| Video Editing Services        | `video-editing-services`     | `page-video-editing-services.php`    |
| Website Development           | `website-development`        | `page-website-development.php`       |
| PPC Services                  | `ppc-services`               | `page-ppc-services.php`              |
| Digital Marketing Services    | `digital-marketing-services` | `page-digital-marketing-services.php`|

> Check the slug under the page title (the "Permalink" box). If it doesn't match the
> table, click **Edit** and fix it. A wrong slug just shows a plain page instead of
> the design.

---

## D. Set the homepage + permalinks (1 minute)
1. **Settings → Reading → Your homepage displays → A static page**
   - Homepage: **Home**
   - (Posts page: leave blank, or set one if you want a blog.)
   - Save.
2. **Settings → Permalinks → Post name → Save Changes.**
   This makes the `/smm-services/`, `/about/`, etc. links work (the nav relies on it).

Now visit your site — the full animated homepage and all nav links work.

---

## E. Connecting your domain
- If WordPress is already installed on the domain, you're done after C–D.
- If WordPress is on a temp/staging URL, migrate or point the domain at that host
  (your host's "Add Domain" / DNS settings), then in **Settings → General** set the
  **WordPress Address** and **Site Address** to the final `https://yourdomain.com`.
- The nav uses WordPress's own `home_url()`, so links auto-update to the live domain —
  no manual link editing needed.

---

## F. Important notes / what to do next

### Contact form — now sends email ✅
The Contact form is fully wired to email you via WordPress (`wp_mail`) with nonce +
spam honeypot. See **"v1.1 → Contact form"** below for the one detail that matters
(SMTP if your host blocks mail). No plugin required.

### Editing the text/images — now editable via ACF ✅
Install the free **ACF** plugin and the key content (logo, contact details, social
links, hero text, stats, testimonials, FAQ) becomes editable from wp-admin. See
**"v1.1 → Make content editable"** below. Anything not yet wired to ACF still lives in
the template files (`front-page.php`, `page-*.php`) and can be edited there.

### Logo / brand / contact details
- **Easiest:** set them in **Site Settings** (after installing ACF — see v1.1).
- **Or** replace `assets/img/cs-logo.png` (keep the filename) for the logo; email/phone/
  address fall back to values in `footer.php` / `page-contact.php` if ACF is off.

### Stock photos & placeholder names
The photos (Unsplash) and testimonial names are placeholders carried from the
reference. Swap in real client work/names before promoting the site.

---

## G. Theme file reference
```
cirova-studio/
├── style.css                 Theme header (required) — real CSS is in assets/css/
├── functions.php             Enqueues CSS/JS/fonts, theme supports, per-page SEO meta
├── header.php                <head>, animation layer, nav, mobile nav
├── footer.php                Footer + scripts
├── front-page.php            Home
├── page-about.php            About
├── page-contact.php          Contact (form)
├── page-smm-services.php
├── page-video-editing-services.php
├── page-website-development.php
├── page-ppc-services.php
├── page-digital-marketing-services.php
├── page.php / index.php      Fallbacks
├── screenshot.png            Theme thumbnail (Appearance → Themes)
└── assets/                   css, js, img (78), icons (79)
```

Tested: all 13 PHP files pass `php -l`; the home template renders with correct theme
asset paths, `home_url()` nav links, SEO meta, the streaming hero and all icons.

---

# v1.1 — Editable content (ACF) + working contact form

Two big additions since v1.0: key content is now editable from wp-admin via **ACF**,
and the contact form **actually emails** you. Both have safe fallbacks — the site
works fully even before you configure them.

## 1. Make content editable (ACF — free plugin)
1. Install & activate **Advanced Custom Fields** (Plugins → Add New → search "ACF").
   The theme already ships the field definitions in `acf-json/`, so they import
   automatically — no manual field building.
2. A new **Site Settings** menu appears in wp-admin (left sidebar). Set:
   - **Logo image** (used in header, footer, favicon, loader)
   - **Booking status badge**, **Footer tagline**
   - **Contact email / phone / address / note**
   - **Instagram / LinkedIn / Facebook URLs**
   These apply across the whole site (header, footer, contact page).
3. Edit the **Home** page → an **"Home — Hero"** box lets you change:
   - Hero status badge, **Hero heading** (wrap accent words in `<em>…</em>` for the
     pink gradient, `<br>` for line breaks), sub-text, and both button labels + links.

> Without ACF the site still renders using the original built-in text (fallbacks),
> so nothing breaks if the plugin is off.

The contact email used by the form is **Site Settings → Contact email**
(falls back to `cirovastudio@gmail.com`).

## 2. Contact form now sends email
The Contact page form posts securely to WordPress (nonce + spam honeypot) and emails
submissions via `wp_mail()` to your **Site Settings → Contact email**. On success the
visitor sees the green "Thanks!" banner; on error, a red notice.

**If emails don't arrive** (many shared hosts block PHP mail): install a free SMTP
plugin — **WP Mail SMTP** or **FluentSMTP** — and connect it to your mailbox /
Gmail / SendGrid. No theme changes needed; the form keeps working.

Fields sent: Name, Email, Company, Project Budget, Message (Reply-To is set to the
sender so you can reply directly).

## 3. What changed visually (v1.1)
- "Designed for today's discovery" → premium 3-card stack (AI-overview skeleton
  shimmer, Local Discovery radar scan, Social Discovery stat boxes).
- "Who we work with" → floating photo collage beside the (emoji-free) icon pills.
- Process steps now have gradient icon badges; hero mockups gently float on desktop.
- All of it is mobile-responsive and respects reduced-motion.

> Reminder: page body content still lives in the templates except the ACF fields
> above. Ask if you want more sections (testimonials, FAQ, stats, service pages)
> wired to ACF too.
