# Cirova Studio — Design Tokens

Single source of truth, extracted from the live site's `:root` and computed CSS
(https://cirova-studio.vercel.app). Use these in `assets/css/style.css`.

## Fonts
- **Display / headings:** `'Instrument Serif', Georgia, serif` — used italic for the
  gradient-highlighted words in headings.
- **Body / UI:** `'Inter', -apple-system, BlinkMacSystemFont, sans-serif`
  (weights 300, 400, 500, 600, 700, 800).
- **Mono (code mockups):** `'JetBrains Mono', ui-monospace, monospace`.
- Loaded via Google Fonts:
  `Instrument+Serif:ital@0;1` + `Inter:wght@300;400;500;600;700;800`
  (`JetBrains Mono` added for the code-editor mockup).

## Colors (pulled from the logo)
| Token | Value | Use |
|---|---|---|
| `--bg` | `#0E0A14` | page background |
| `--surface` | `#16101F` | cards / sections |
| `--elevated` | `#1F1730` | raised cards, inputs |
| `--border` | `#2A2040` | hairline borders |
| `--border-strong` | `#3A2E54` | stronger borders / dividers |
| `--text` | `#F5F0FA` | body text |
| `--muted` | `#B7A9C8` | secondary text |
| `--muted-2` | `#8C7CA6` | tertiary / labels |
| `--magenta` | `#B254A8` | accent |
| `--magenta-2` | `#C566B9` | accent (brighter) |
| `--violet` | `#7E4D8C` | accent (deep) |
| `--deep` | `#3D2349` | deep tint |
| `--highlight` | `#E0A6D8` | light accent / gradient end |

> Note: the original logo-derived palette is a dusty violet→magenta (not the bright
> `#8B5CF6 → #C026D3` placeholder in the brief). We use the **actual extracted stops**.

## Gradients
- **Heading highlight / buttons / icon tint:**
  `linear-gradient(135deg, var(--magenta-2), var(--highlight))`
  and `linear-gradient(135deg, var(--magenta), var(--violet))`.
- **Brand bar / underline:**
  `linear-gradient(90deg, var(--violet), var(--magenta), var(--highlight))`.
- **Section wash:** `linear-gradient(180deg, var(--bg), var(--surface))`.
- **Marquee edge fade:** `linear-gradient(90deg, transparent, black 10%, black 90%, transparent)`.

## Radii / shadows / motion
- Card radius: **16–20px** (`--r: 18px`, `--r-sm: 12px`, `--r-lg: 24px`).
- Soft glow shadow: `0 20px 60px -20px rgba(178,84,168,.35)`.
- Easing: `--ease-out: cubic-bezier(0.16,1,0.3,1)`, `--ease-in-out: cubic-bezier(0.65,0,0.35,1)`.

## Stat counters (data-count → suffix), per page
- index: 200+ Editors · 100+ Experts · 50+ Projects · 99% Happy Clients
- smm: 50+ Managers · 8 Platforms · 500+ Campaigns · 98% Retention
- video: 100+ Editors · 200+ Videos · 50+ Clients · 99% Satisfaction
- website: 100+ Developers · 7 Tech Stacks · 200+ Sites · 99% Uptime
- ppc: 10+ Experts · 4x ROAS · 300+ Campaigns · 48h Launch
- digital-marketing: 300+ Experts · 6 Channels · 500+ Live · 98% Retention
- about: 300+ Experts · 500+ Projects · 12yr Experience · 98% Retention
- contact: 24h Response · 300+ On Call · 98% Reply · 100% Free Consult
