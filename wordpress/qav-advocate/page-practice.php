<?php
/* Template Name: Practice */
if (!defined('ABSPATH')) exit;
get_header(); ?>
<main id="main" class="detail-main practice-main" tabindex="-1">
      <section class="detail-hero" aria-labelledby="practice-page-title">
        <div class="container">
          <div class="detail-hero-meta"><span>01 / PRACTICE</span><span>COUNSEL. REPRESENTATION. RESOLUTION.</span></div>
          <div class="detail-hero-grid">
            <h1 id="practice-page-title">The right perspective.<br /><em>For the matter at hand.</em></h1>
            <div class="detail-hero-copy">
              <p>Legal counsel across litigation, corporate advisory, regulatory matters and rights-focused practice.</p>
              <a class="text-link" href="<?php echo esc_url(qav_page_url('contact')); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </div>
          </div>
          <nav class="detail-index practice-index" aria-label="Practice area groups">
            <a href="#civil-litigation"><span>01–04</span> Court &amp; corporate matters <span aria-hidden="true">↓</span></a>
            <a href="#property-lda"><span>05–07</span> Property &amp; rights <span aria-hidden="true">↓</span></a>
            <a href="#legal-drafting"><span>08–09</span> Drafting &amp; resolution <span aria-hidden="true">↓</span></a>
          </nav>
        </div>
      </section>

      <section class="detail-section practice-directory" aria-labelledby="practice-scope-title">
        <div class="container">
          <div class="detail-heading" data-reveal>
            <div>
              <p class="eyebrow">THE SCOPE OF PRACTICE</p>
              <h2 id="practice-scope-title" class="detail-section-title">Focused experience.<br /><em>Considered counsel.</em></h2>
            </div>
            <p class="detail-intro">Every legal matter begins with understanding its context. Explore the areas of practice, from court representation and institutional advice to rights-focused advocacy.</p>
          </div>

          <div class="practice-ledger">
            <article class="practice-entry" id="civil-litigation" aria-labelledby="civil-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">01</span><svg aria-hidden="true"><use href="#icon-columns" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="civil-title">Civil &amp; High Court Litigation</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Civil Matter',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Representation, pleadings and applications across civil proceedings and High Court matters.</p>
                <p>Representation, pleading and argument before competent courts, with ongoing follow-up on case progress.</p>
                <ul class="practice-scope" aria-label="Civil litigation scope"><li>Pleadings &amp; applications</li><li>Court advocacy</li><li>Case follow-up &amp; status reporting</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="criminal-litigation" aria-labelledby="criminal-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">02</span><svg aria-hidden="true"><use href="#icon-scales" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="criminal-title">Criminal Litigation</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Criminal Matter',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Court representation, legal drafting and advocacy in criminal proceedings in Punjab.</p>
                <p>The practice combines legal drafting, case follow-up and status reporting with representation before competent courts.</p>
                <ul class="practice-scope" aria-label="Criminal litigation scope"><li>Court representation</li><li>Applications &amp; replies</li><li>Case-status reporting</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="corporate-advisory" aria-labelledby="corporate-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">03</span><svg aria-hidden="true"><use href="#icon-document" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="corporate-title">Corporate Advisory &amp; Contracts</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Corporate / Contract Matter',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Contract review, legal documentation, due diligence and advisory support for corporate clients.</p>
                <p>Review of agreements and legal documents, with opinions and suggestions for corporate and institutional matters.</p>
                <ul class="practice-scope" aria-label="Corporate advisory scope"><li>Contract vetting</li><li>Due diligence</li><li>Legal opinions &amp; documentation</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="banking-litigation" aria-labelledby="banking-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">04</span><svg aria-hidden="true"><use href="#icon-building" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="banking-title">Banking &amp; Financial Litigation</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Banking Matter',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Banking disputes, loan recovery matters, financial litigation and regulatory documentation.</p>
                <p>Pleadings, applications and legal opinions relating to banking regulations, with representation in Civil Courts and Banking Courts in Lahore.</p>
                <ul class="practice-scope" aria-label="Banking litigation scope"><li>Banking disputes</li><li>Loan recovery matters</li><li>Banking regulatory documentation</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="property-lda" aria-labelledby="property-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">05</span><svg aria-hidden="true"><use href="#icon-columns" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="property-title">Property, Land &amp; LDA Matters</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Property / LDA Matter',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Property, planning, land acquisition, zoning regulations and LDA compliance.</p>
                <p>Experience includes property, planning and regulatory matters before LDA tribunals, and advice on land acquisition, zoning regulations and LDA compliance.</p>
                <ul class="practice-scope" aria-label="Property and LDA scope"><li>Property &amp; planning matters</li><li>Land acquisition &amp; zoning</li><li>LDA compliance</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="workplace-compliance" aria-labelledby="workplace-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">06</span><svg aria-hidden="true"><use href="#icon-shield" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="workplace-title">Anti-Harassment &amp; Workplace Compliance</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Workplace / Anti-Harassment',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Anti-harassment law, workplace grievances and institutional policy formulation.</p>
                <p>Policy formulation and advisory work relating to institutional responsibilities, compliance and workplace concerns.</p>
                <ul class="practice-scope" aria-label="Workplace compliance scope"><li>Anti-harassment law &amp; compliance</li><li>Workplace grievance counselling</li><li>Institutional policy formulation</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="womens-rights" aria-labelledby="rights-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">07</span><svg aria-hidden="true"><use href="#icon-people" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="rights-title">Women’s Rights &amp; GBV Redressal</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Women\'s Rights / GBV',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Rights-focused advocacy concerning women’s rights and gender-based violence redressal.</p>
                <p>A commitment to human rights and women’s rights sits alongside litigation and advisory practice, with areas of focus including workplace protections, gender-based violence redressal and public legal education.</p>
                <ul class="practice-scope" aria-label="Women's rights scope"><li>Women’s rights advocacy</li><li>Gender-based violence redressal</li><li>Workplace protections</li></ul>
                <a class="practice-context-link" href="<?php echo esc_url(qav_page_url('advocacy')); ?>">Explore the wider advocacy commitment <span aria-hidden="true">↗</span></a>
              </div>
            </article>

            <article class="practice-entry" id="legal-drafting" aria-labelledby="drafting-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">08</span><svg aria-hidden="true"><use href="#icon-pen" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="drafting-title">Legal Drafting &amp; Due Diligence</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Other',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Legal opinions, affidavits, notices, agreements, document review and legal research.</p>
                <p>Drafting includes applications, affidavits, chamber summons, notices of motion, replies and property-related documents. Research and review of legal questions inform opinions, drafting and court submissions.</p>
                <ul class="practice-scope" aria-label="Legal drafting scope"><li>Legal opinions &amp; research</li><li>Applications, affidavits &amp; notices</li><li>Agreements &amp; document review</li></ul>
              </div>
            </article>

            <article class="practice-entry" id="arbitration" aria-labelledby="arbitration-title" data-reveal>
              <div class="practice-entry-mark"><span class="detail-number">09</span><svg aria-hidden="true"><use href="#icon-scales" /></svg></div>
              <div class="practice-entry-heading">
                <h3 id="arbitration-title">Arbitration &amp; Dispute Resolution</h3>
                <a class="text-link" href="<?php echo esc_url(add_query_arg('matter','Arbitration & Dispute Resolution',qav_page_url('contact'))); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
              </div>
              <div class="practice-entry-copy">
                <p class="practice-entry-summary">Arbitration proceedings, dispute resolution, legal representation and advisory support in commercial and civil disputes.</p>
                <p>This area sits alongside the practice’s court advocacy, legal drafting and client counsel capabilities.</p>
                <ul class="practice-scope" aria-label="Arbitration scope"><li>Arbitration proceedings</li><li>Commercial &amp; civil disputes</li><li>Representation &amp; advisory support</li></ul>
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="detail-section practice-perspective dark" aria-labelledby="practice-perspective-title">
        <div class="container practice-perspective-grid">
          <div data-reveal>
            <p class="eyebrow">THE WORK BEHIND THE COUNSEL</p>
            <h2 id="practice-perspective-title" class="detail-section-title">Considered strategy.<br /><em>Careful execution.</em></h2>
          </div>
          <div class="practice-perspective-copy" data-reveal>
            <p>Legal work shaped by research, clear documentation and attention to each matter’s procedural progress.</p>
            <p>Independent court practice and institutional counsel across Lahore and Punjab.</p>
            <a class="text-link light-link" href="<?php echo esc_url(qav_page_url('experience')); ?>">Explore the professional journey <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
          </div>
        </div>
      </section>

      <section class="practice-conversation" aria-labelledby="practice-conversation-title">
        <div class="container detail-cta">
          <div><p class="eyebrow">BEGIN A CONVERSATION</p><h2 id="practice-conversation-title">Your matter. A considered next step.</h2></div>
          <a class="button button-gold" href="<?php echo esc_url(qav_page_url('contact')); ?>">Discuss your matter <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
        </div>
      </section>
    </main>
<?php get_footer(); ?>
