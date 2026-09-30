<?php
/* Template Name: Contact */
if (!defined('ABSPATH')) exit;
get_header(); ?>
<main id="main" class="detail-main contact-main" tabindex="-1">

      <section class="detail-hero" aria-labelledby="contact-page-title">
        <div class="container">
          <div class="detail-hero-grid">
            <div><p class="eyebrow">04 / CONTACT</p><h1 id="contact-page-title">Your matter deserves<br><em>a considered approach.</em></h1></div>
            <p class="detail-hero-copy">Contact the office to discuss your legal matter and consultation requirements.</p>
          </div>
          <div class="detail-hero-meta"><span>Qurat-ul-Ain Viirk · Advocate High Court</span><span>Lahore, Pakistan</span></div>
        </div>
      </section>
      <section class="detail-section" id="consultation" aria-labelledby="office-title">
        <div class="container contact-destination-grid">
          <div class="contact-office" data-reveal>
            <p class="eyebrow">BEGIN A CONVERSATION</p>
            <h2 id="office-title">The office.<br><em>Your next step.</em></h2>
            <p>Every legal matter begins with understanding its context.</p>
            <address class="contact-details">
                <div>
                  <svg class="icon"><use href="#icon-phone" /></svg>
                  <div>
                    <span class="contact-label">CALL THE OFFICE</span
                    ><a href="<?php echo esc_url(qav_tel('phone')); ?>"><?php echo esc_html(qav_profile('phone')); ?></a
                    ><a href="<?php echo esc_url(qav_tel('phone_secondary')); ?>"><?php echo esc_html(qav_profile('phone_secondary')); ?></a>
                  </div>
                </div>
                <div>
                  <svg class="icon"><use href="#icon-mail" /></svg>
                  <div>
                    <span class="contact-label">EMAIL</span
                    ><a
                      class="email-address"
                      href="mailto:<?php echo esc_attr(qav_profile('email')); ?>"
                      ><?php echo esc_attr(qav_profile('email')); ?></a
                    >
                  </div>
                </div>
                <div>
                  <svg class="icon"><use href="#icon-pin" /></svg>
                  <div>
                    <span class="contact-label">OFFICE ADDRESS</span>
                    <p>
                      <?php echo nl2br(esc_html(qav_profile('address'))); ?>
                    </p>
                  </div>
                </div>
              </address>
            <dl class="contact-languages"><dt>LANGUAGES</dt><dd><span>Urdu<small>Native</small></span><span>English<small>Professional</small></span><span>Punjabi<small>Fluent</small></span></dd></dl>
          </div>
          <form class="enquiry-form contact-enquiry dark" id="enquiry-form" data-contact-email="<?php echo esc_attr(qav_profile('email')); ?>" novalidate data-reveal>
              <h3>Request a consultation</h3>
              <p class="form-intro" id="form-intro">
                Share a brief overview. You can review your enquiry in your
                email app before sending.
              </p>
              <div class="form-row">
                <div class="field">
                  <label for="full-name"
                    >Full name <span aria-hidden="true">*</span></label
                  ><input
                    id="full-name"
                    name="name"
                    autocomplete="name"
                    required
                    maxlength="100"
                    placeholder="Your full name"
                    aria-describedby="name-error"
                  /><span class="field-error" id="name-error"></span>
                </div>
                <div class="field">
                  <label for="email"
                    >Email address <span aria-hidden="true">*</span></label
                  ><input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    required
                    maxlength="254"
                    placeholder="you@example.com"
                    aria-describedby="email-error"
                  /><span class="field-error" id="email-error"></span>
                </div>
              </div>
              <div class="form-row">
                <div class="field">
                  <label for="phone"
                    >Phone number
                    <span class="optional">(optional)</span></label
                  ><input
                    id="phone"
                    name="phone"
                    type="tel"
                    autocomplete="tel"
                    maxlength="30"
                    placeholder="+92"
                    aria-describedby="phone-error"
                  /><span class="field-error" id="phone-error"></span>
                </div>
                <div class="field">
                  <label for="matter"
                    >Nature of legal matter
                    <span aria-hidden="true">*</span></label
                  ><select
                    id="matter"
                    name="matter"
                    required
                    aria-describedby="matter-error"
                  >
                    <option value="">Select a practice area</option>
                    <option>Civil Matter</option>
                    <option>Criminal Matter</option>
                    <option>Corporate / Contract Matter</option>
                    <option>Banking Matter</option>
                    <option>Property / LDA Matter</option>
                    <option>Workplace / Anti-Harassment</option>
                    <option>Women's Rights / GBV</option>
                    <option>Arbitration &amp; Dispute Resolution</option>
                    <option>Other</option></select
                  ><span class="field-error" id="matter-error"></span>
                </div>
              </div>
              <div class="field">
                <label for="message"
                  >Your message <span aria-hidden="true">*</span></label
                ><textarea
                  id="message"
                  name="message"
                  rows="4"
                  required
                  minlength="10"
                  maxlength="1500"
                  placeholder="A brief outline of the matter you would like to discuss…"
                  aria-describedby="message-help message-error"
                ></textarea
                ><span class="field-help" id="message-help"
                  >Please avoid including sensitive documents or detailed case
                  information.</span
                ><span class="field-error" id="message-error"></span>
              </div>
              <div class="consent-field">
                <label class="consent" for="consent"
                  ><input
                    id="consent"
                    name="consent"
                    type="checkbox"
                    required
                    aria-describedby="consent-error"
                  /><span
                    >I understand that submitting an enquiry does not by itself
                    create a lawyer-client relationship.</span
                  ></label
                ><span class="field-error" id="consent-error"></span>
              </div>
              <button
                class="button button-gold submit-button"
                type="submit"
                disabled
              >
                <span id="submit-label">Prepare Email Enquiry</span
                ><svg class="icon"><use href="#icon-arrow-up" /></svg>
              </button>
              <p class="form-note">Fields marked * are required.</p>
              <div
                class="form-status"
                id="form-status"
                role="status"
                aria-live="polite"
                hidden
              ></div>
              <div class="email-fallback" id="email-fallback" hidden>
                <a
                  class="button button-outline"
                  id="email-draft"
                  href="mailto:<?php echo esc_attr(qav_profile('email')); ?>"
                  >Open Email Draft<svg class="icon">
                    <use href="#icon-arrow-up" /></svg></a
                ><button type="button" class="copy-enquiry" id="copy-enquiry">
                  Copy enquiry
                </button>
              </div>
              <noscript
                ><style>
                  .menu-toggle,
                  .enquiry-form > :not(h3):not(noscript) {
                    display: none !important;
                  }
                </style>
                <p class="form-note">
                  This form needs JavaScript to prepare an enquiry. Please
                  <a href="mailto:<?php echo esc_attr(qav_profile('email')); ?>"
                    >email the office directly</a
                  >
                  or call <?php echo esc_html(qav_profile('phone')); ?>.
                </p></noscript
              >
            </form>
        </div>
      </section>
      <section class="detail-section contact-note" aria-labelledby="enquiry-note-title">
        <div class="container contact-note-grid">
          <div><p class="eyebrow">BEFORE YOU SEND</p><h2 id="enquiry-note-title">A first enquiry.<br><em>A considered beginning.</em></h2></div>
          <div class="contact-note-copy">
            <p>Preparing an email enquiry does not send those details to the office. Selecting “Open Email Draft” passes the enquiry to your email application so you can review it and decide whether to send it.</p>
            <p>Please avoid including sensitive documents or detailed case information. Submitting an enquiry does not by itself create a lawyer-client relationship.</p>
            <a class="text-link" href="<?php echo esc_url(qav_page_url('privacy')); ?>">Read the privacy notice <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
          </div>
        </div>
      </section>
      <section class="detail-section" aria-labelledby="contact-practice-title">
        <div class="container detail-cta">
          <div><p class="eyebrow">THE PRACTICE</p><h2 id="contact-practice-title">The right perspective.<br><em>For the matter at hand.</em></h2><p>Legal counsel across litigation, corporate advisory, regulatory matters and rights-focused practice.</p></div>
          <a class="text-link" href="<?php echo esc_url(qav_page_url('practice')); ?>">Explore Practice <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
        </div>
      </section>

    </main>
<?php get_footer(); ?>
