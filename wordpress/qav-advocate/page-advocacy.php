<?php
/* Template Name: Advocacy */
if (!defined('ABSPATH')) exit;
get_header(); ?>
<main id="main" class="detail-main advocacy-main" tabindex="-1">
      <section class="detail-hero" aria-labelledby="advocacy-page-title">
        <div class="container">
          <p class="eyebrow">03 / ADVOCACY</p>
          <div class="detail-hero-grid">
            <h1 id="advocacy-page-title">The law carries<br /><em>a human responsibility.</em></h1>
            <div class="detail-hero-copy">
              <p>A commitment to human rights, women’s rights and legal education alongside litigation and advisory practice.</p>
              <a class="text-link" href="<?php echo esc_url(qav_page_url('contact')); ?>">Begin a conversation<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </div>
          </div>
          <div class="detail-hero-meta"><span>RIGHTS &amp; RESPONSIBILITY</span><span>LAHORE, PAKISTAN</span></div>
          <nav class="detail-index" aria-label="Advocacy areas">
            <a href="#human-rights">Human rights</a>
            <a href="#womens-rights">Women’s rights</a>
            <a href="#workplace-protections">Workplace protections &amp; redressal</a>
            <a href="#legal-education">Legal education</a>
            <a href="#social-work">Social work</a>
          </nav>
        </div>
      </section>

      <section class="detail-section advocacy-principles dark" aria-labelledby="advocacy-principles-title">
        <div class="container advocacy-principles-grid">
          <div class="advocacy-principles-statement">
            <h2 class="eyebrow" id="advocacy-principles-title">A COMMITMENT BEYOND THE COURTROOM</h2>
            <p>For dignity.<br />For equality.<br /><em>For people.</em></p>
            <span class="advocacy-principles-note">THE HUMAN SIDE OF LAW</span>
          </div>
          <div class="advocacy-rights">
            <article id="human-rights">
              <span class="detail-number">01 / HUMAN RIGHTS</span>
              <h3>Human rights</h3>
              <p>Qurat-ul-Ain Viirk’s commitment to human rights sits alongside her litigation and advisory practice.</p>
              <p>This rights-focused advocacy includes workplace protections, gender-based violence redressal and public legal education.</p>
            </article>
            <article id="womens-rights">
              <span class="detail-number">02 / WOMEN’S RIGHTS</span>
              <h3>Women’s rights</h3>
              <p>Women’s rights are an active focus of her advocacy, with attention to anti-harassment law, workplace grievances and gender-based violence redressal.</p>
              <a class="text-link light-link" href="<?php echo esc_url(qav_page_url('practice')); ?>">Explore the legal practice<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </article>
          </div>
        </div>
      </section>

      <section class="detail-section advocacy-protections" id="workplace-protections" aria-labelledby="advocacy-protections-title">
        <div class="container">
          <div class="detail-heading">
            <div>
              <p class="eyebrow">PROTECTION &amp; REDRESSAL</p>
              <h2 class="detail-section-title" id="advocacy-protections-title">Rights-focused counsel.<br /><em>Considered support.</em></h2>
            </div>
            <p class="detail-intro">Workplace protections and gender-based violence redressal form part of the practice’s commitment to human rights and women’s rights.</p>
          </div>
          <div class="advocacy-focus-list">
            <article class="advocacy-focus-row" id="anti-harassment">
              <span class="detail-number">03</span>
              <div class="advocacy-focus-heading">
                <svg class="advocacy-focus-icon" aria-hidden="true"><use href="#icon-shield" /></svg>
                <h3>Anti-Harassment Law<br />&amp; Compliance</h3>
              </div>
              <div class="advocacy-focus-copy">
                <p>Anti-harassment law, workplace grievances and institutional compliance advice.</p>
                <p>This area brings together rights-focused advocacy and the workplace compliance concerns addressed within the legal practice.</p>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Workplace / Anti-Harassment',qav_page_url('contact'))); ?>" data-matter="Workplace / Anti-Harassment">Discuss a workplace matter<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
            </article>
            <article class="advocacy-focus-row" id="gbv-redressal">
              <span class="detail-number">04</span>
              <div class="advocacy-focus-heading">
                <svg class="advocacy-focus-icon" aria-hidden="true"><use href="#icon-scales" /></svg>
                <h3>Gender-Based<br />Violence Redressal</h3>
              </div>
              <div class="advocacy-focus-copy">
                <p>Rights-focused advocacy concerning women’s rights and gender-based violence redressal.</p>
                <p>This focus sits alongside litigation and advisory practice, as part of an ongoing commitment to women’s rights.</p>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Women\'s Rights / GBV',qav_page_url('contact'))); ?>" data-matter="Women's Rights / GBV">Discuss your matter<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
            </article>
            <article class="advocacy-focus-row" id="workplace-grievances">
              <span class="detail-number">05</span>
              <div class="advocacy-focus-heading">
                <svg class="advocacy-focus-icon" aria-hidden="true"><use href="#icon-people" /></svg>
                <h3>Workplace Grievance<br />Counselling</h3>
              </div>
              <div class="advocacy-focus-copy">
                <p>Workplace grievance counselling is a focus of the rights and responsibility practice.</p>
                <p>It accompanies the existing work in anti-harassment law, workplace protections and institutional compliance advice.</p>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Workplace / Anti-Harassment',qav_page_url('contact'))); ?>" data-matter="Workplace / Anti-Harassment">Discuss a workplace grievance<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="detail-section advocacy-education" id="legal-education" aria-labelledby="advocacy-education-title">
        <div class="container advocacy-education-grid">
          <div class="advocacy-education-intro">
            <p class="eyebrow">06 / KNOWLEDGE SHARED</p>
            <h2 class="detail-section-title" id="advocacy-education-title">Public Legal Education<br /><em>&amp; Media Advocacy</em></h2>
            <p class="detail-intro">Teaching, academic mentorship and capacity building form another part of Qurat-ul-Ain Viirk’s professional journey.</p>
            <img src="<?php echo esc_url(qav_asset('assets/svg/legal-study.svg')); ?>" alt="Editorial illustration of an open volume resting on bound legal books" width="800" height="520" loading="lazy" />
          </div>
          <div class="advocacy-education-copy">
            <article>
              <p class="eyebrow">IN THE CLASSROOM</p>
              <h3>Experience in practice.<br /><em>Perspective in the classroom.</em></h3>
              <p>As a Law Lecturer at Islamia Law College, Peshawar, from 2016 to 2019, she taught core law subjects to LLB students and developed course materials and examination papers.</p>
              <p>Her teaching appointment at Quaid-e-Azam Law College, Okara, from 2007 to 2012 also contributed to legal education alongside her professional journey.</p>
              <a class="text-link" href="<?php echo esc_url(qav_page_url('experience')); ?>">Explore the professional journey<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </article>
            <article>
              <p class="eyebrow">IN PUBLIC CONVERSATION</p>
              <h3>Perspectives on law<br /><em>and responsibility.</em></h3>
              <p>Insights and recorded perspectives on law, justice, human rights, women’s rights, institutional accountability and emerging legal developments.</p>
              <a class="text-link" href="<?php echo esc_url(qav_hub_url()); ?>">Explore Insights &amp; Media<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </article>
          </div>
        </div>
      </section>

      <section class="detail-section advocacy-community" id="social-work" aria-labelledby="advocacy-social-title">
        <div class="container">
          <div class="advocacy-community-grid">
            <div>
              <p class="eyebrow">07 / BEYOND THE COURTROOM</p>
              <h2 class="detail-section-title" id="advocacy-social-title">Social work.<br /><em>A human commitment.</em></h2>
            </div>
            <div class="advocacy-community-copy">
              <p>Social work sits alongside human rights and women’s rights in Qurat-ul-Ain Viirk’s commitment beyond the courtroom.</p>
              <p class="advocacy-community-line">For dignity. For equality. For people.</p>
            </div>
          </div>
          <div class="detail-cta">
            <div><p class="eyebrow">BEGIN A CONVERSATION</p><h2>A considered approach<br /><em>to your matter.</em></h2></div>
            <a class="button button-gold" href="<?php echo esc_url(qav_page_url('contact')); ?>">Request Consultation<svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
          </div>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
