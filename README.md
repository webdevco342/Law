# Qurat-ul-Ain Viirk — Advocate High Court

The approved editorial website, upgraded with the supplied professional portrait and a real WordPress publishing system.

## Deliverables

- `wordpress/qav-advocate/`: the production WordPress theme.
- `wordpress/qav-publishing/`: companion plugin for Media & Interviews, editorial metadata and Professional Profile settings.
- `index.html`, `insights.html`, `media.html`, `privacy.html`: static design previews. Publishing requires WordPress.
- `assets/images/`: unmodified supplied master and responsive AVIF, WebP and JPEG derivatives.
- `CLIENT-PUBLISHING-GUIDE.md`: client instructions.
- `CONTENT-SOURCES.md`: factual provenance.
- `QA.md`: verification results and deployment checks.
- `dist/`: installation archives and complete handover bundle.

## Install on WordPress

1. Use a current WordPress installation on an HTTPS domain. Recommended hosting: PHP 8.3+, MariaDB 10.11+ or MySQL 8.0+, URL rewriting, backups and image processing. See [WordPress requirements](https://wordpress.org/about/requirements/).
2. In **Plugins → Add Plugin → Upload Plugin**, upload `qav-publishing.zip` and activate **QAV Publishing**.
3. In **Appearance → Themes → Add Theme → Upload Theme**, upload `qav-advocate.zip` and activate it.
4. In **Settings → Reading**, select a static homepage: **Qurat-ul-Ain Viirk** (Home), and **Insights** as the Posts page. Activation creates these pages if absent and configures them when no homepage is selected; an existing site's front-page settings are preserved.
5. In **Settings → Permalinks**, use `/insights/%postname%/` and Save. This refreshes `/media/` routes too. On an existing site, retain established URLs or arrange redirects before changing the structure.
6. Set the site title to **Qurat-ul-Ain Viirk**, tagline to **Advocate High Court**, timezone to **Karachi**, and administration email to the client's chosen administrative address.
7. Review **Professional Profile** for public contact details, portrait and homepage SEO. Supplied details are the defaults. Select **Privacy Notice** under **Settings → Privacy**.
8. Create an individual client account with a strong password. An **Editor** can publish articles and media; an **Administrator** can also change Professional Profile settings. Use the host's supported account protection and backups.
9. Remove WordPress's default sample post/page if present. This theme and plugin create no sample articles or interviews.
10. Verify HTTPS, contact links, uploads, publishing, permalinks and video playback on the actual host. Enable indexing when the domain and content are ready. The native sitemap is `/wp-sitemap.xml`.

Install only the theme and plugin archives. Do not deploy `tmp/`, the test database or the static preview alongside WordPress.

## Architecture

Insights uses native posts: title, slug, block content, excerpt, categories, featured image and alt text, author, dates, scheduling and revisions. Optional SEO title/description, display author and homepage featured toggle appear in **Publication details**.

Media & Interviews uses the `qav_media` post type and separate categories. **Recording details** accepts YouTube, Vimeo or an uploaded video belonging to this site's Media Library. URLs are validated; arbitrary iframe HTML is not used. Recording date, channel and duration are optional.

Archives render on the server, with search, category filtering and pagination. Public queries exclude draft, private and scheduled entries. Related content matches categories and is limited to three entries. Featured selections take precedence on the homepage; recent published entries fill remaining places. Empty states appear until real material is published.

Custom fields use WordPress capabilities and nonces. There is no custom public upload endpoint or client-side password gate. The plugin owns content registration, preserving publication data if the theme changes.

The supplied portrait appears once on the homepage and in compact author profiles. One Professional Profile setting updates both. The master is unmodified; derivatives remove only the 18-pixel black top border. Source: 1186 × 1600 pixels. Derivative widths: 480, 800 and 1186. AVIF sizes: approximately 30 KB, 82 KB and 160 KB. Fonts are local.

SEO includes titles, descriptions, Open Graph, canonical URLs, Person data on the homepage and Article data on insights. No reviews, ratings or achievements are fabricated. Built-in social/structured metadata yields to Yoast, Rank Math or AIOSEO if installed.

## Enquiries and video

The consultation form validates information and prepares an email draft. It clearly states that nothing has been sent; the visitor sends the email from their email application. No server mail-delivery service or enquiry database is configured. A future delivery integration must update the privacy notice and be tested on the live host.

YouTube and Vimeo load only after **Load player** is selected. There are no video players on archive cards or the homepage, and no autoplay. Local video uses browser controls. Long recordings should generally use YouTube or Vimeo; upload limits and bandwidth depend on the production host. Add captions/transcripts when available.

## Local development

Static preview: `node tools/serve.mjs`, then `http://127.0.0.1:4173`.

WordPress preview: `http://127.0.0.1:9400`; dashboard: `/wp-admin/`. Random local credentials are saved only in ignored `tmp/upgrade/local-admin.json`, never in delivery archives. The local site is excluded from indexing.

Local development uses the official [WordPress Playground CLI](https://wordpress.github.io/wordpress-playground/developers/local-development/wp-playground-cli/) with PHP 8.3 and persistent SQLite. Production uses ordinary WordPress hosting. To recreate the developer environment, install `@wp-playground/cli`, `sharp`, `playwright` and `@axe-core/playwright` under `tmp/qa`, extract the official WordPress download into `tmp/upgrade/wp/wordpress`, then run `node tools/start-wordpress.mjs`.

`tools/build-theme.mjs` regenerates header, footer, front page, privacy, shared styles/scripts and assets from the static preview. Handwritten PHP helpers and publication templates remain in the theme directory. `tools/prepare-portrait.mjs` regenerates derivatives from a supplied source path. The original approved backup and one-time migration script are retained locally for traceability and excluded from the delivery bundle.

## Remaining external setup

A WordPress host, domain/HTTPS, client account, host backups and the client's real articles/interview URLs are required. No hosting credentials, domain or actual publications were supplied. Live deployment has not been performed or claimed.
