# Verification record — Qurat-ul-Ain Viirk

## Multi-page expansion — 30 September 2026

Created the Practice, Experience, Advocacy and Contact destinations, with shared editorial styles, six-item desktop/mobile navigation, active states, metadata, sitemap entries and homepage exploration links. The corresponding WordPress templates use native page URLs and the existing professional-profile fields.

- Browser layout checks passed for all nine public static pages at **1440, 1280, 1024, 768, 480, 414, 390, 375 and 320 pixels**. No horizontal page/menu overflow, clipped main content, duplicate IDs or overlapping menu/consultation controls were found. Desktop and mobile screenshots of all four new pages were visually inspected. The final typography adjustment was rechecked at 1440, 390 and 320 pixels.
- All 36 primary mobile-navigation journeys between the homepage and five destinations passed. Menu open/close, Escape, keyboard focus containment, active links and the existing footer admin-access entry were checked.
- The contact form rejects incomplete entries, preserves the existing details/disclaimer, prepares the correct `mailto:` draft and explicitly reports that nothing was sent. Draft invalidation on edit and all nine practice-category prefills passed. No submission request was made. Normal and reduced-motion behavior passed; no page JavaScript exceptions or console errors were recorded.
- Source comparison confirms that homepage factual content is retained and the Insights & Media main markup changes only in its consultation-link destination. The dedicated Contact form preserves the existing form markup. All nine practice descriptions, eight experience timeline statements, dates, institutions, qualifications and contact details were reviewed against the homepage. No new professional claims were added.
- JavaScript syntax and targeted WordPress generation checks passed. The generator was run repeatedly without duplicating homepage CTAs. PHP/WordPress runtime validation was unavailable in this checkout and remains a host-side verification step. No deployment was performed.

### Existing asset gaps found during this audit

The checkout already lacks `assets/fonts/cormorant-garamond-medium.woff2`, `assets/fonts/cormorant-garamond-italic.woff2` and `assets/fonts/manrope-variable.woff2`; local previews therefore use the existing fallback fonts. The approved Insights & Media markup also already references missing `assets/images/selected-media/architecture.jpg`, `architecture-640.webp` and `broadcast-backdrop-640.jpg`. These are pre-existing source gaps, not new page assets. Original approved files are needed to resolve them without changing the approved typography/gallery. No gallery content or image references were changed in this task.

## Previous publishing-system verification

Verified locally on **13 September 2026**, using **WordPress 7.1**, **PHP 8.3**, the official WordPress Playground development runtime and installed Google Chrome through Playwright. The in-app browser connection was unavailable. Production MySQL/MariaDB hosting has not been configured.

## Sources and visual preservation

The full client PDF, six competitor screenshots, both supplied briefs and genuine client photograph were inspected. The CV remained the professional factual source; the corrected full name comes from the upgrade request. The approved navy/ivory/gold identity, typography, practice areas, timeline, institutional work, advocacy and credentials were preserved.

The supplied image remains the unmodified master. Web derivatives remove only its black top border, with no facial retouching or changed proportions. Actual desktop, tablet and mobile hero crops were inspected. The homepage uses the portrait once; author modules use a compact version. Enrolment dates and the source qualification wording “Foreign Sciences” are preserved.

## Responsive and accessibility checks

All seven page types were rendered at **1440, 1280, 1024, 768, 480, 390, 375 and 320 pixels**: homepage, Insights archive, Media archive, article, YouTube media detail, Vimeo media detail and privacy notice. This is 56 layout combinations.

- No horizontal page overflow or clipped text found.
- One H1 per page; full professional name in page titles; valid JSON-LD syntax.
- No JavaScript page errors recorded.
- No automated axe violations across WCAG 2 A/AA, WCAG 2.1 AA and the included best-practice checks, at desktop and mobile widths for each page type.
- Mobile navigation opens, contains keyboard focus, closes with Escape and restores focus to its trigger. Reduced-motion rendering was checked.
- Native no-JavaScript rendering preserves public content, direct contact and server-rendered article search.

Automated checks are complemented by visual review; they do not claim universal accessibility certification or testing in every browser.

## Publishing and administration

- Real login tested. Anonymous `/wp-admin/` access redirects to WordPress login.
- An article was created using the block editor, assigned a category, given a featured image uploaded through the native picker, and published using WordPress's final confirmation.
- Image upload generated WordPress image sizes; alt text and featured-image selection were tested.
- A Media & Interviews entry was created in the native editor with video URL, channel, duration and SEO description. Publishing persisted those fields.
- Public archives exclude drafts, private entries and future scheduled posts. Direct anonymous requests for each returned 404.
- Unauthenticated publishing/upload requests returned 401. An authenticated request with an invalid nonce returned 403.
- An unapproved video-provider URL was rejected by the field sanitizer; a valid same-site video attachment was accepted.
- Professional Profile updates propagated to public email links and the form's email recipient. Original contact details were restored.
- A portrait selected through the native media picker updated both hero and author modules. The supplied responsive portrait was then restored.
- All 16 theme/plugin PHP files passed PHP 8.3 syntax parsing. Runtime logs showed no theme/plugin PHP errors during verification.
- Fresh local authentication salts were installed, login was rechecked, and plugin deactivation/reactivation was verified while the theme remained active.

## Public functionality

- Keyword search and category filtering returned the expected publications.
- Featured content appeared correctly; real archive pagination worked. Testing uncovered and fixed a mismatch between WordPress's default pagination count and the six-entry archive layout.
- Article body width stayed within 780 pixels; related items matched category and were limited to three.
- Practice cards selected the intended enquiry type. Required-field, email, telephone and consent validation were checked. Email drafting showed that nothing had been sent; no enquiry was actually sent.
- YouTube and Vimeo iframe creation was verified after explicit visitor activation, with descriptive titles and no autoplay parameter.
- A genuine test WebM was uploaded to WordPress and played through native browser controls. Playback advanced beyond 0.5 seconds, with no autoplay attribute.

External player frames loaded without failed requests in the additional provider check. The Vimeo test recording then reported a provider-side “Rights issue” when Play was selected, so successful Vimeo streaming is not claimed. No actual client interview URL was provided. Availability, permissions, captions and playback of future YouTube/Vimeo recordings must be checked when supplied. External playback depends on the provider and browser/network environment; local WebM playback was confirmed independently.

## Handover state and production checks

The temporary DEVELOPMENT SAMPLE publications and test uploads were removed. The final homepage and archives contain zero published Insights and zero Media entries, and their intended empty states passed a fresh accessibility check. Original contact details and the supplied portrait are restored; all homepage images, including lazy-loaded images, were checked for successful loading. Test login state, local credentials, the SQLite database and debugging files are excluded from installation archives.

Production still requires a WordPress host, domain/HTTPS, client account and real publication content. Recheck uploads, URL rewriting, video-provider permissions, scheduling, backup/restore and indexing on that host. The consultation form prepares an email draft; no backend mail delivery has been claimed. No public deployment or third-party message sending was performed.
