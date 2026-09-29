<footer class="site-footer dark">
      <div class="container">
        <div class="footer-grid">
          <div class="footer-about">
            <a class="brand" href="<?php echo esc_url(qav_home_anchor('home')); ?>"
              ><span class="brand-mark" aria-hidden="true">Q<span>.</span></span
              ><span class="brand-type"
                >QURAT-UL-AIN VIIRK<small>ADVOCATE HIGH COURT</small></span
              ></a
            >
            <p>
              Legal advocacy, institutional advisory and rights-focused
              practice.<br />Lahore, Pakistan.
            </p>
          </div>
          <div>
            <h2 class="eyebrow">EXPLORE</h2>
            <nav aria-label="Footer navigation">
              <a href="<?php echo esc_url(qav_home_anchor('home')); ?>">Home</a><a href="<?php echo esc_url(qav_home_anchor('about')); ?>">About</a
              ><a href="<?php echo esc_url(qav_home_anchor('experience')); ?>">Experience</a
              ><a href="<?php echo esc_url(qav_home_anchor('advocacy')); ?>">Advocacy</a
              ><a href="<?php echo esc_url(qav_home_anchor('credentials')); ?>">Credentials</a
              ><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>">Contact</a>
            </nav>
          </div>
          <div>
            <h2 class="eyebrow">THE PRACTICE</h2>
            <nav aria-label="Practice navigation">
              <a href="<?php echo esc_url(qav_home_anchor('contact')); ?>" data-matter="Civil Matter">Civil Litigation</a
              ><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>" data-matter="Criminal Matter"
                >Criminal Litigation</a
              ><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>" data-matter="Corporate / Contract Matter"
                >Corporate Advisory</a
              ><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>" data-matter="Banking Matter">Banking Law</a
              ><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>" data-matter="Property / LDA Matter"
                >Property &amp; LDA Matters</a
              ><a href="<?php echo esc_url(qav_home_anchor('advocacy')); ?>">Anti-Harassment &amp; Women’s Rights</a>
            </nav>
          </div>
          <div class="footer-contact">
            <h2 class="eyebrow">GET IN TOUCH</h2>
            <address>
              <?php echo nl2br(esc_html(qav_profile('address'))); ?>
            </address>
            <a href="<?php echo esc_url(qav_tel('phone')); ?>"><?php echo esc_html(qav_profile('phone')); ?></a
            ><a href="<?php echo esc_url(qav_tel('phone_secondary')); ?>"><?php echo esc_html(qav_profile('phone_secondary')); ?></a
            ><a
              class="email-address"
              href="mailto:<?php echo esc_attr(qav_profile('email')); ?>"
              ><?php echo esc_attr(qav_profile('email')); ?></a
            >
          </div>
        </div>
        <div class="footer-signature" aria-hidden="true">
          QURAT-UL-AIN VIIRK<span>ADVOCATE HIGH COURT</span>
        </div>
        <p class="legal-disclaimer" id="disclaimer">
          The information provided on this website is for general informational
          purposes only and should not be treated as legal advice. Visiting this
          website or submitting an enquiry does not by itself establish a
          lawyer-client relationship.
        </p>
        <div class="footer-bottom">
          <span
            ><span id="admin-login-trigger" style="cursor:pointer;" title="Admin Login">©</span> <span id="copyright-year">2026</span> Qurat-ul-Ain Viirk. All rights
            reserved.</span
          >
          <div>
            <a href="<?php echo esc_url(qav_insights_url()); ?>">Insights</a><a href="<?php echo esc_url(qav_media_url()); ?>">Media</a><a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy Notice</a
            ><a href="#disclaimer">Legal Disclaimer</a
            ><a href="<?php echo esc_url(qav_home_anchor('home')); ?>" class="back-top">Back to top ↑</a>
          </div>
        </div>
      </div>

      <!-- Admin Login Modal -->
      <div id="admin-login-modal" class="admin-modal">
        <div class="admin-modal-content">
          <span class="admin-close">&times;</span>
          <h2>Admin Access</h2>
          <p>Please enter the password to access the dashboard.</p>
          <input type="password" id="admin-password" placeholder="Password" />
          <button id="admin-submit">Login</button>
          <p id="admin-error" class="admin-error-msg">Incorrect password.</p>
        </div>
      </div>
    </footer>
  <?php wp_footer(); ?></body></html>