# Publishing guide for Qurat-ul-Ain Viirk

Your website uses WordPress. You can write articles, upload images and add interviews without editing code.

## Sign in

Visit your website address followed by `/wp-admin/`. Enter the account credentials created for you. Use **Lost your password?** when needed. The local preview has separate temporary credentials, which must not be reused for the live website.

## Publish an article

1. Select **Insights → Add New**.
2. Enter a title and write in the editor. Press Enter for a paragraph. Use **+** for a Heading, List, Quote or Image block. Use Heading 2 for main sections and Heading 3 for subsections.
3. Open the **Insight** settings tab on the right. Select the relevant **Category**. Create new categories only when useful.
4. Select **Set featured image → Upload files** or **Media Library**. Enter meaningful **Alt Text**. Use a landscape image for article cards, with important content away from the edges. Confirm **Set featured image**.
5. Select **Add an excerpt** and write two or three sentences summarising the article. This becomes the card introduction.
6. Open **Meta Boxes** near the bottom, then **Publication details**. Display author defaults to **Qurat-ul-Ain Viirk** when blank. Optional fields include SEO title, SEO description and **Feature this entry on the homepage**.
7. Preview the article. Select **Publish**, review the confirmation panel and confirm **Publish** again. It appears automatically in Insights and may appear on the homepage.

Reading time is calculated from word count. The article includes the author profile, date, general-information disclaimer and related reading from the same category.

## Images in the article body

Use **+ → Image → Upload / Media Library**. Add alt text for meaningful images and captions when useful. Select **Replace** to change an image. Alignment and size are available in block settings. Upload only images approved for public use; do not publish confidential client documents.

## Save, edit, schedule or unpublish

- **Save draft** keeps work unpublished. Use Preview while preparing it.
- To schedule, select the publication date beside **Immediately**, choose a future date and confirm **Schedule**. WordPress uses the timezone in Settings; hosting must support scheduled tasks.
- To edit, open **Insights → All Insights**, select the article, make changes and select **Save / Update**. WordPress retains revisions.
- To unpublish, change **Published** to **Draft** in the status settings and save. It leaves public archives and public direct access. **Private** restricts viewing to authorised users.
- **Move to Trash** removes an entry; **Restore** in Trash returns it. Avoid permanently deleting media used by existing publications.

## Publish an interview or recording

1. Select **Media & Interviews → Add New**. This is separate from the general Media Library.
2. Enter a title and context. Include a summary or transcript when available.
3. Select a media category. Add an excerpt and **Featured image**, which serves as the thumbnail.
4. Open **Meta Boxes → Recording details**. Paste the actual **YouTube, Vimeo or uploaded video URL**, not iframe HTML. The provider is detected automatically.
5. Add recording date, publication/channel and duration only when known. These fields are optional.
6. Use **Publication details** for the homepage featured toggle and optional SEO.
7. Preview, select **Publish** and confirm. The entry appears at `/media/` and can appear on the homepage.

Accepted link formats include `youtube.com/watch?v=VIDEO_ID`, `youtu.be/VIDEO_ID`, `vimeo.com/VIDEO_ID` and `player.vimeo.com/video/VIDEO_ID`, each with `https://` and the actual ID. Unlisted Vimeo links with their access hash are supported. The recording owner must allow embedding; private, removed or restricted recordings may not play for visitors.

Visitors select **Load player**, then Play inside the player. Videos never autoplay. Enable captions on the video service where available.

## Upload a local video

Use YouTube or Vimeo for long interviews. For local video, open **Media → Add New Media File**, upload a browser-compatible MP4 or WebM within your host's limit, and copy its **File URL**. Paste it into the recording's video field. The file must belong to this site's Media Library. Standard playback controls are included. Add a transcript in the entry body when available.

## Featured content

Tick **Feature this entry on the homepage** in Publication details. The homepage shows up to three Insights and three Media entries, with a prominent first entry and two smaller entries when available. Featured items take precedence, ordered by publication date; recent published entries fill remaining spaces. The newest featured Insight also appears prominently on the first archive page. Untick an older selection when replacing it. Drafts/private entries never appear publicly.

Only categories with published content appear in filters. Related publications match categories. Empty states appear when nothing is published.

## Change the portrait

An administrator can open **Professional Profile → Choose professional portrait**, select or upload a photograph, and **Save Profile**. It updates the hero and author portraits together. Use a clear vertical image with space around the head; inspect desktop and mobile results. **Use supplied portrait**, then Save, restores the approved photograph and its optimised responsive versions.

## Change contact details

In **Professional Profile**, edit public email, telephone numbers or office address and **Save Profile**. The homepage, footer and enquiry destination use these settings. Keep the professional name and designation as **Qurat-ul-Ain Viirk — Advocate High Court**.

The consultation form prepares an email draft for the visitor to review and send. It does not itself send email or store enquiries in WordPress.

## SEO

Homepage: **Professional Profile → Homepage SEO title / Homepage SEO description → Save Profile**.

Article/recording: **Meta Boxes → Publication details → SEO title / SEO description**, then Save or Update. Blank fields use the publication title and excerpt. Write concise, accurate descriptions; do not add unsupported outcomes or awards.

## Before publishing

Check title, excerpt, names, dates, quotations, legal references, category, image alt text and video link. Preview on a phone-sized screen. Publish only approved public material. Contact the administrator for hosting, domain, backups, account recovery or scheduling issues.
