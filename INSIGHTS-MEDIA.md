# Insights & Media

The new editorial hub extends the existing website. The static preview is `insights-media.html`; the WordPress page uses `/insights-media/`. Existing `/insights/`, `/media/`, article URLs and all other destinations are preserved.

## WordPress setup and publishing

The page template and its supporting functions are included in the existing `qav-advocate` theme. A fresh theme activation creates the page. On an existing installation, an administrator's next dashboard visit creates it once. An existing page with this slug is preserved, including its publication status. No new plugin, post type, taxonomy, dependency or permalink rule is introduced.

- Publish Insights through the existing native posts editor. The newest featured Insight leads the hub; when none is featured, the latest published Insight is used. The next three Insights appear below it.
- Publish recordings and appearances through the existing Media & Interviews editor. Entries with a video URL populate Video & Media. Media & Interviews lists all published media entries, including recordings. These are two views of the same existing media library.
- The existing featured toggle prioritizes selected media entries. Dates, excerpts, featured images, image alt text, categories, channel and duration use the current WordPress fields. Article reading time is calculated from the text.
- Only published, non-password-protected entries appear. Removing, unpublishing or making an entry private removes it from the hub. Topic links use ordinary WordPress queries and work without JavaScript; unused categories are not presented as filters.
- Read Insight, Watch and View Interview links open the existing detail pages. The hub loads no external video player or remote video thumbnail. The detail page retains its existing explicit player activation and no-autoplay behavior.

No authentic publications or recordings have been supplied, so the delivered hub intentionally shows editorial empty states without invented titles, dates or appearances. The static preview has no publishing simulation. Use WordPress for real publishing.

## Implementation boundaries

`insights-media.css` contains only new-page styling and its active mobile link treatment. WordPress loads that stylesheet only on the hub. Existing core styles, JavaScript, footer, professional information, contact details, portrait, images, plugin and page bodies are unchanged. Existing static primary-navigation wording is retained and linked to the hub; mobile and WordPress navigation gain the new page link.

The WordPress template is `page-insights-media.php`; supporting queries and components are in `insights-media.php`. Both use the existing theme and publishing plugin. The supplied installation and handover archives include the page. The existing one-time generation/build scripts are unchanged; no regeneration step is required to publish through WordPress.

## Verification

The page is checked at 1440, 1280, 1024, 768, 480, 390, 375 and 320 pixels, with visual review, overflow checks, keyboard/mobile navigation, focus, reduced motion, no-JavaScript rendering, metadata and local link checks. Automated axe checks cover WCAG 2 A/AA, WCAG 2.1 AA and best-practice rules at desktop and mobile widths.

WordPress testing uses an isolated local copy and clearly labelled temporary fixtures. No development publication is delivered in the public page or installation archives. This does not replace final deployment checks on the chosen WordPress host and domain.
