# Supplied video feature

The supplied local MP4 is presented in **Insights & Media → Video & Media**. Its initial title is the generic “Featured Video.” No event, programme, channel, publication date, description, or category has been inferred or added.

## Original media

- File: `assets/videos/featured-video.mp4`, mirrored in the WordPress theme assets.
- Size: 6,261,856 bytes.
- SHA-256: `f42ae56c9d5f903daed4cc61335c1d619be7c4b4ef9aa4e69eae4274aa0a91c4`.
- Original dimensions: 1280 × 702; H.264 video, 30 fps.
- Original audio: stereo HE-AAC, 44.1 kHz.
- Duration: approximately 61.25 seconds; the page displays 01:01.

Both delivered MP4 copies are byte-for-byte identical to the supplied file. No re-encoding, cropping, resampling, audio processing, or frame-rate conversion was performed. The source already places its MP4 metadata before the media data, so no fast-start remux was necessary.

The poster is an unaltered full-frame JPEG extracted at five seconds from the same video. Existing text within the footage is preserved. No separate caption file was supplied; no subtitles or transcript have been generated.

## Playback and delivery

The initial presentation has a restrained gold play button over the poster. Playback begins only after activation, with the original audio enabled. Native HTML5 controls then provide play/pause, seeking, volume, and fullscreen. The video stays at its native aspect ratio, and `playsinline` supports inline mobile viewing.

`preload="none"` prevents speculative full-video loading. The local preview server now serves MP4 with its correct MIME type, streams byte ranges for seeking, and supports HEAD requests. On a production host, these files use ordinary static-media delivery; the host should preserve `video/mp4` and byte-range support. No video hosting service, external player, upload, or tracking service is introduced.

Without JavaScript, the native player controls remain available. An “Open video” link also provides direct access to the original. Failed playback shows a small, accessible status message and retains this fallback. No autoplay or permanently muted preview is used.

## Replaceable content

The initial data is in `assets/featured-videos.json` and the matching theme manifest. It is an array of records with:

- `id`, `title`, `video_url`, `poster`.
- `description`, `category`, `publication_date` (currently empty).
- `featured`, `external_url` (currently empty).
- `width`, `height`, `duration_seconds`, `mime_type`.

The first featured item occupies the large frame. Further items use supporting positions in the same composition. Relative asset paths resolve against the site or theme root; hosted URLs are also supported. When replacing a file, update its poster, dimensions, duration, and MIME type together.

For static updates, edit the manifest and run `node tools/render-featured-videos.mjs`. This updates only the marked video feature and mirrors the manifest to WordPress. Keep replacement files in both asset directories.

WordPress renders the manifest on the server. The `qav_featured_video_items` filter lets a future custom admin return the same record structure without redesigning the section. A record with no local `video_url` can use an approved YouTube/Vimeo `external_url` as an ordinary watch link. The existing Media & Interviews publishing and external-player support remain intact; future published recordings continue to appear below the supplied feature. Topic-filtered views continue to use the existing publication query.

Only this section's CSS and script are added to the hub. The photo composition, existing Insights, all other sections, site navigation, global styles, metadata, footer, and publishing plugin are preserved.

## Verification

Both static and WordPress previews were checked at 1440, 1280, 1024, 768, 480, 390, 375 and 320 pixels. Checks cover native keyboard play/pause, mute/unmute, volume, timeline seeking, fullscreen entry/exit, decoded audio during fullscreen, and touch playback with seeking in Chrome mobile emulation. No console errors or horizontal overflow were observed. The browser made no MP4 request before Play was activated.

After seeking to 5, 30 and 55 seconds, displayed-frame timestamps stayed within 31 milliseconds of the browser media clock. Original audio decoded successfully, and both delivered files match the supplied file's hash. These are browser and file-integrity checks, not a listening test on physical phones. No caption/transcript file was supplied; existing text burned into the original footage is retained.

Automated accessibility checks returned no violations for the section at desktop and mobile widths. They do not establish complete caption accessibility. The source and templates were also compared with the previous version to verify that unrelated files and content remain unchanged.
