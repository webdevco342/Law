# Selected Media photographs

The Insights & Media page now contains one photo composition between Latest Insights and Video & Media. No existing page content, navigation, footer, global stylesheet, professional information, or publishing workflow is changed.

## Supplied assets

All five September 29 photographs are used once in the composition. The large architectural photograph leads because its full-height framing suits the editorial layout. This is a visual choice, not a claim about the venue or occasion.

The original JPEG bytes are preserved in `assets/images/selected-media/` and in the matching theme directory. The other files in those directories are proportional, uncropped JPEG and WebP derivatives. No retouching, generated content, filters, or fabricated event information is used. Opening a photo displays its original JPEG.

The images remain at their natural aspect ratios. The primary image and two staggered supporting columns become a centered lead image with two supporting columns on tablet, then a vertical sequence on mobile. Borders, an offset hairline on the lead image, and a restrained hover accent supply the visual depth. The photos have no shadows, zoom, or perspective transforms.

## Replaceable content

`assets/selected-media.json` is the static content source. `wordpress/qav-advocate/assets/selected-media.json` supplies the same initial content to WordPress. Each item has:

- `id`: stable internal key.
- `url`: full-size image path or URL.
- `alt`: concise description; avoid unsupported names, events, affiliations, or dates.
- `order`: display order within featured and supporting content.
- `featured`: places the item first; the first item receives the lead treatment.
- `caption`: optional, currently empty for all five photos.
- `link`: optional destination; when empty, the photo opens in the viewer. A supplied destination behaves as a normal link.
- `width` and `height`: original dimensions, required to reserve space and preserve the frame.
- `sources.webp` and `sources.jpeg`: optional responsive variants, each with a `url` and `width`.

Relative image paths resolve against the static website root or the WordPress theme root. Replace the full-size path, dimensions, and responsive variants together when replacing a photograph.

For the static version, run `node tools/render-selected-media.mjs` after updating the manifest. It replaces only the marked Selected Media section and copies the manifest to the theme. Keep replacement assets in both asset directories. The tool uses native Node and requires no gallery dependency.

WordPress reads the manifest on the server. The `qav_selected_media_photos` filter accepts the same item structure, so the planned CMS can return image URLs, dimensions, alt text, captions, links, order, and featured status from its own fields. Replacing the data does not require changing the page template or composition. No new admin interface or post type is introduced.

## Viewing and loading

The page uses responsive WebP with JPEG fallback, explicit dimensions, lazy loading, and asynchronous decoding. JavaScript enhances ordinary image links with a native modal dialog. Keyboard users can open a photo with Enter, use Previous/Next or Left/Right arrows, and close with Escape. Focus stays inside the open viewer and returns to the opening photo on close. Without JavaScript, links open the originals directly.

The new CSS and viewer script load only on Insights & Media. Reduced-motion preferences disable the border transition. All new styles are scoped to the composition or its viewer.
