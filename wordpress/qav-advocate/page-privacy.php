<?php get_header(); ?><main class="privacy-main" id="main">
      <div class="container privacy-content">
        <a class="text-link" href="<?php echo esc_url(qav_page_url('contact')); ?>"
          >← Return to consultation</a
        >
        <p class="eyebrow">WEBSITE INFORMATION</p>
        <h1>Privacy notice</h1>
        <p>
          This notice describes the website as delivered with email-based
          enquiries.
        </p>
        <h2>Your enquiry information</h2>
        <p>
          The consultation form checks the details you enter in your browser.
          Preparing an email enquiry does not send those details to the office.
          Selecting “Open Email Draft” passes the enquiry to your email
          application so you can review it and decide whether to send it. Your
          email provider’s own privacy practices apply.
        </p>
        <p>
          Information entered into the form is not saved by this website in
          browser storage. Avoid including sensitive documents or detailed case
          information in an initial enquiry.
        </p>
        <h2>Cookies, fonts and analytics</h2>
        <p>
          Public pages do not include analytics or advertising scripts. WordPress uses essential cookies for authenticated administration. Video providers load only after you choose to play an embedded video; their privacy practices then apply. Fonts and imagery are served with the website. The hosting provider may process standard
          connection and access-log information when the site is visited; its
          practices depend on the hosting service used.
        </p>
        <h2>Email and telephone contact</h2>
        <p>
          If you send an email or call, you choose the information you provide
          to the office. For questions about information you have shared,
          contact
          <a href="mailto:<?php echo esc_attr(qav_profile('email')); ?>"
            ><?php echo esc_attr(qav_profile('email')); ?></a
          >
          or <a href="<?php echo esc_url(qav_tel('phone')); ?>"><?php echo esc_html(qav_profile('phone')); ?></a>.
        </p>
        <h2>Professional information</h2>
        <p>
          The website provides general professional information. It is not legal
          advice. Visiting the website or making an enquiry does not by itself
          establish a lawyer-client relationship.
        </p>
      </div>
    </main><?php get_footer(); ?>