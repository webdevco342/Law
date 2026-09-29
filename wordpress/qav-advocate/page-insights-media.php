<?php
/* Template Name: Insights & Media */
if(!defined('ABSPATH')) exit;
$hub=qav_hub_data();
get_header();
?>
<main id="main" class="hub-main" tabindex="-1">
  <section class="hub-hero" aria-labelledby="hub-title">
    <div class="container">
      <div class="hub-hero-grid">
        <div><p class="eyebrow">INSIGHTS &amp; MEDIA</p><h1 id="hub-title">Insights <em>&amp; Media</em></h1></div>
        <p class="hub-hero-copy">Legal perspectives, professional commentary and selected media appearances.</p>
      </div>
      <nav class="hub-index" aria-label="On this page">
        <a href="#hub-latest"><span aria-hidden="true">01</span> Insights</a>
        <a href="#hub-video"><span aria-hidden="true">02</span> Video &amp; Media</a>
        <a href="#hub-interviews"><span aria-hidden="true">03</span> Interviews</a>
      </nav>
      <?php qav_hub_filter_status($hub); ?>
    </div>
  </section>

  <section class="hub-section" id="hub-latest" aria-labelledby="hub-latest-title">
    <div class="container">
      <div class="hub-heading"><div><p class="eyebrow">01 / THE WRITTEN WORD</p><h2 id="hub-latest-title">Latest Insights</h2></div><p>Legal analysis, professional reflections and updates from the practice.</p></div>
      <?php if($hub['insights']): qav_hub_grid($hub['insights']); else: ?>
      <div class="hub-empty">
        <svg class="hub-empty-symbol" viewBox="0 0 48 48" aria-hidden="true"><path d="M11 5h18l8 8v30H11zM29 5v9h8M17 22h14M17 29h14M17 36h9" /></svg>
        <div><h3>Perspectives — Forthcoming</h3>
          <p><strong>A space for informed perspectives on law, justice, human rights, women’s rights, institutional accountability, and emerging legal developments.</strong></p>
          <p>Drawing on extensive experience in legal practice, advocacy, policy advisory, and public legal education, forthcoming perspectives will examine contemporary legal and social issues, practical insights from the legal profession, and developments shaping access to justice and institutional governance.</p>
          <p>New insights, professional reflections, and relevant updates will be shared here as they are published.</p>
        </div>
      </div>
      <?php endif; qav_hub_more($hub,'insights'); ?>
    </div>
  </section>

  <?php qav_selected_media_section(); ?>

  <section class="hub-section hub-video-section dark" id="hub-video" aria-labelledby="hub-video-title">
    <div class="container">
      <div class="hub-heading"><div><p class="eyebrow">02 / IN FOCUS</p><h2 id="hub-video-title">Video &amp; Media</h2></div><p>Recorded perspectives on law, rights and professional practice.</p></div>
      <?php $supplied_videos=$hub['selected']?[]:qav_featured_video_data(); qav_featured_video_render($supplied_videos); ?>
      <?php if($hub['videos']): qav_hub_grid($hub['videos'],'video'); elseif(!$supplied_videos): ?>
      <div class="hub-video-empty">
        <div class="hub-video-cover" aria-hidden="true"><span class="hub-play"><svg viewBox="0 0 20 20"><path d="m5 3 11 7-11 7z" /></svg></span><span>THE RECORDED PERSPECTIVE</span></div>
        <div><h3>Conversations worth<br><em>making space for.</em></h3><p>Selected recordings, legal discussions and professional commentary will appear here when available.</p></div>
      </div>
      <?php endif; qav_hub_more($hub,'videos'); ?>
    </div>
  </section>

  <section class="hub-section hub-media-section" id="hub-interviews" aria-labelledby="hub-interviews-title">
    <div class="container">
      <div class="hub-heading"><div><p class="eyebrow">03 / IN CONVERSATION</p><h2 id="hub-interviews-title">Media &amp; Interviews</h2></div><p>Interviews, discussions and appearances, brought together in one place.</p></div>
      <?php $supplied_interviews=$hub['selected']?[]:qav_interview_data(); qav_interview_render($supplied_interviews); ?>
      <?php if($hub['media']): qav_hub_grid($hub['media'],'interview'); elseif(!$supplied_interviews): ?>
      <div class="hub-media-empty">
        <p class="eyebrow">SELECTED APPEARANCES</p>
        <div><h3>Conversations, to come.</h3><p>Selected interviews, panel discussions and professional appearances will be featured here.</p></div>
      </div>
      <?php endif; qav_hub_more($hub,'media'); ?>
    </div>
  </section>

  <section class="hub-cta" aria-labelledby="hub-cta-title">
    <div class="container hub-cta-inner">
      <div><h2 id="hub-cta-title">For a legal enquiry,<br><em>start a conversation.</em></h2><p>Get in touch with the office to discuss your legal matter.</p></div>
      <a class="button button-gold" href="<?php echo esc_url(qav_home_anchor('contact')); ?>">Request Consultation<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
