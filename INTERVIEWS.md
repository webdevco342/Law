# Media & Interviews

The supplied interview collection lives in `#hub-interviews` on Insights & Media, after the separately maintained Video & Media feature. Its styling and playback script are scoped to that section.

## Initial five recordings

All five MP4s are byte-for-byte copies of the supplied files. No re-encoding, cropping, compression, audio changes or subtitles were applied. Their existing titles, logos, black bars and captions inside the footage remain part of the original recordings. The website adds only generic numbered labels and durations measured from the files; no dates, program names or professional claims are inferred.

| Entry | Native dimensions | Source duration | Poster frame |
| --- | --- | --- | --- |
| Featured Interview | 720 × 1280 | 93.833 seconds | 8 seconds |
| Interview 02 | 720 × 960 | 63.668 seconds | 20 seconds |
| Interview 03 | 436 × 358 | 119.733 seconds | 8 seconds |
| Interview 04 | 1280 × 720 | 240.556 seconds | 20 seconds |
| Interview 05 | 576 × 566 | 71.630 seconds | 8 seconds |

Each JPEG poster is an unretouched, uncropped frame extracted from its corresponding recording.

## Add or update entries

1. Place a new original MP4 and an authentic poster in `assets/videos/interviews/`, and copy them to the same path inside `wordpress/qav-advocate/`.
2. Add an entry to `assets/interviews.json`. Available fields are `id`, `title`, `videoSource`, `poster`, `description`, `category`, `date`, `featured`, `order`, `externalUrl`, `width`, `height`, `durationSeconds` and `mimeType`. Leave unknown metadata blank. Use the source file's actual dimensions and duration.
3. Run `node tools/render-interviews.mjs`. This rebuilds only the static interview collection and synchronizes its manifest, stylesheet and script with the WordPress theme. It does not encode media or rebuild other page sections.
4. Include the changed assets and theme files in deployment packages.

Featured entries sort first, then numeric `order`. Only the first displayed entry uses the lead layout; all later entries automatically continue through the supporting grid. No five-item limit or redesign is required.

For future YouTube entries, leave `videoSource` blank and supply an HTTPS YouTube URL in `externalUrl`. These render as accessible watch links with an optional authentic poster, without loading third-party embeds on page load. The five supplied local recordings remain local.

WordPress reads `wordpress/qav-advocate/assets/interviews.json`. The `qav_interview_items` filter can supply the same array from future publishing fields. Existing WordPress media posts and topic filtering continue through their established workflow. These supplied recordings do not create posts or invented publication dates.

## Presentation and playback

The desktop lead occupies a centered 70% composition, with a bounded portrait frame and adjacent details. Four supporting entries form a two-column grid. `object-fit: contain` preserves every source frame. On phones, supporting frames use their native proportions in a single column. The existing global typography, colors, section heading and spacing system are retained.

Players use `preload="none"`; no MP4 request occurs until interaction. The gold play button starts normal audio playback and exposes the browser's native controls. Starting an interview pauses another playing interview in this collection. The approved Video & Media player remains independent. Without JavaScript, native controls and original-file links are available. Fullscreen, volume and other native controls follow browser support.

No caption or transcript files were supplied. None are fabricated.

## Verification

Local verification covers static and WordPress rendering at 1440, 1280, 1024, 768, 480, 390, 375 and 320 pixels; source and poster hashes; zero initial MP4 downloads; keyboard and native player controls; decoded audio; playback timing after seeking; fullscreen; phone emulation; overflow; future entries; section accessibility checks; and preservation of all other existing source files and sections. Test evidence is retained under `tmp/interviews/` in the development workspace. Phone testing uses Chrome touch emulation, not physical iOS or Android devices. Source A/V tracks are unchanged, and the playback timing check compares decoded video timestamps with the browser media clock.
