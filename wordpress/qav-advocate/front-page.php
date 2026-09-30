<?php get_header(); ?><main id="main" tabindex="-1">
      <section class="hero dark" id="home" aria-labelledby="hero-title">
        <div class="container hero-grid">
          <div class="hero-copy">
            <p class="eyebrow hero-enter">
              <span class="eyebrow-line"></span>ADVOCATE HIGH COURT
              <span class="label-dot">·</span> LAHORE
            </p>
            <h1 id="hero-title" class="hero-enter">
              Legal insight.<br />Strategic advocacy.<br /><em>Human-centred</em
              ><br /><em>justice.</em>
            </h1>
            <p class="hero-description hero-enter">
              Experienced counsel. Considered advice. A commitment to rights.<br
                class="desktop-break"
              />
              Qurat-ul-Ain Viirk brings over eighteen years of legal practice to the
              matters that shape lives and institutions.
            </p>
            <div class="hero-actions hero-enter">
              <a class="button button-gold" href="<?php echo esc_url(qav_page_url('contact')); ?>"
                >Request a Consultation<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></a
              ><a class="text-link light-link" href="<?php echo esc_url(qav_page_url('practice')); ?>"
                >Explore Practice Areas<svg class="icon">
                  <use href="#icon-arrow" /></svg
              ></a>
            </div>
            <div class="hero-enrolments hero-enter">
              <span>LOWER COURTS <b>2007</b></span
              ><i aria-hidden="true"></i><span>HIGH COURTS <b>2009</b></span>
            </div>
          </div>
          <figure class="hero-visual hero-enter">
            <div class="visual-frame">
              <!-- Supplied client portrait; original facial detail preserved. -->
              <?php qav_portrait(true); ?>
              <div class="profile-caption">
                <span class="caption-rule"></span>
                <h2>Qurat-ul-Ain Viirk</h2>
                <p>ADVOCATE HIGH COURT</p>
                <span class="caption-location"
                  ><svg class="icon"><use href="#icon-pin" /></svg>Lahore,
                  Pakistan</span
                >
              </div>
            </div>
            <span class="visual-side-note"
              >INDEPENDENT PRACTICE. ENDURING PRINCIPLES.</span
            >
            <span class="visual-corner" aria-hidden="true"></span>
          </figure>
        </div>
        <div class="container hero-bottom">
          <span>LEGAL ADVOCACY <i>·</i> ADVISORY <i>·</i> HUMAN RIGHTS</span
          ><a href="<?php echo esc_url(qav_home_anchor('about')); ?>"
            >DISCOVER THE PRACTICE <span aria-hidden="true">↓</span></a
          >
        </div>
      </section>

      <div class="credibility-strip" aria-label="Professional overview">
        <div class="container credibility-grid">
          <div>
            <p>18<span>+</span></p>
            <span>YEARS OF LEGAL PRACTICE</span>
          </div>
          <div>
            <p>2007</p>
            <span>LOWER COURTS ENROLMENT</span>
          </div>
          <div>
            <p>2009</p>
            <span>HIGH COURTS ENROLMENT</span>
          </div>
          <div>
            <p>2024<span>— PRESENT</span></p>
            <span>INSTITUTIONAL LEGAL ADVISORY</span>
          </div>
        </div>
      </div>

      <section
        class="section profile-section"
        id="about"
        aria-labelledby="about-title"
      >
        <div class="container">
          <div class="section-label">
            <span>01 / THE PROFESSIONAL</span
            ><span>EXPERIENCE WITH PURPOSE</span>
          </div>
          <div class="profile-grid">
            <div data-reveal>
              <p class="eyebrow">THE PERSON BEHIND THE PRACTICE</p>
              <h2 id="about-title">
                A considered approach.<br /><em>A committed advocate.</em>
              </h2>
              <a class="text-link" href="<?php echo esc_url(qav_page_url('experience')); ?>"
                >Explore the Professional Journey<svg class="icon">
                  <use href="#icon-arrow" /></svg
              ></a>
            <dl class="profile-facts"><div><dt>HIGH COURT ENROLMENT</dt><dd>24 August 2009</dd></div><div><dt>BASED IN</dt><dd>Lahore, Pakistan</dd></div><div><dt>ADVOCACY FOCUS</dt><dd>Human rights &amp; women’s rights</dd></div></dl></div>
            <div class="profile-copy" data-reveal>
              <p class="lead">
                Courtroom experience.<br />Clarity in counsel.<br />People at
                the centre.
              </p>
              <p>
                Qurat-ul-Ain Viirk is an independent Advocate High Court based in
                Lahore, with 18+ years of experience in Pakistan’s legal system.
                Her practice spans civil, criminal, corporate and banking law.
              </p>
              <p>
                From court pleading and legal drafting to contract vetting and
                due diligence, her work brings together litigation and advisory
                experience. Alongside professional practice, she maintains a
                commitment to human rights, women’s rights and legal education.
              </p>
              <div class="profile-signoff">
                <span>Qurat-ul-Ain Viirk</span><small>ADVOCATE HIGH COURT</small>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section
        class="section practice-section dark"
        id="practice"
        aria-labelledby="practice-title"
      >
        <div class="container">
          <div class="section-label">
            <span>02 / AREAS OF PRACTICE</span
            ><span>COUNSEL. REPRESENTATION. RESOLUTION.</span>
          </div>
          <div class="section-heading" data-reveal>
            <div>
              <p class="eyebrow">FOCUSED EXPERIENCE</p>
              <h2 id="practice-title">
                The right perspective.<br /><em>For the matter at hand.</em>
              </h2>
            </div>
            <p>
              Legal counsel across litigation, corporate advisory, regulatory
              matters and rights-focused practice.
            </p>
          </div>
          <div class="practice-grid">
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Civil Matter',qav_page_url('contact'))); ?>"
              data-matter="Civil Matter"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-columns" /></svg
                ><span>01</span>
              </div>
              <h3>Civil &amp; High Court<br />Litigation</h3>
              <p>
                Representation, pleadings and applications across civil
                proceedings and High Court matters.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Criminal Matter',qav_page_url('contact'))); ?>"
              data-matter="Criminal Matter"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-scales" /></svg
                ><span>02</span>
              </div>
              <h3>Criminal<br />Litigation</h3>
              <p>
                Court representation, legal drafting and advocacy in criminal
                proceedings in Punjab.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Corporate / Contract Matter',qav_page_url('contact'))); ?>"
              data-matter="Corporate / Contract Matter"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-document" /></svg
                ><span>03</span>
              </div>
              <h3>Corporate Advisory<br />&amp; Contracts</h3>
              <p>
                Contract review, legal documentation, due diligence and advisory
                support for corporate clients.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Banking Matter',qav_page_url('contact'))); ?>"
              data-matter="Banking Matter"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-building" /></svg
                ><span>04</span>
              </div>
              <h3>Banking &amp;<br />Financial Litigation</h3>
              <p>
                Banking disputes, loan recovery matters, financial litigation
                and regulatory documentation.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Property / LDA Matter',qav_page_url('contact'))); ?>"
              data-matter="Property / LDA Matter"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-columns" /></svg
                ><span>05</span>
              </div>
              <h3>Property, Land<br />&amp; LDA Matters</h3>
              <p>
                Property, planning, land acquisition, zoning regulations and LDA
                compliance.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Workplace / Anti-Harassment',qav_page_url('contact'))); ?>"
              data-matter="Workplace / Anti-Harassment"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-shield" /></svg
                ><span>06</span>
              </div>
              <h3>Anti-Harassment &amp;<br />Workplace Compliance</h3>
              <p>
                Anti-harassment law, workplace grievances and institutional
                policy formulation.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Women\'s Rights / GBV',qav_page_url('contact'))); ?>"
              data-matter="Women's Rights / GBV"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-people" /></svg
                ><span>07</span>
              </div>
              <h3>Women’s Rights<br />&amp; GBV Redressal</h3>
              <p>
                Rights-focused advocacy concerning women’s rights and
                gender-based violence redressal.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Other',qav_page_url('contact'))); ?>"
              data-matter="Other"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-pen" /></svg
                ><span>08</span>
              </div>
              <h3>Legal Drafting<br />&amp; Due Diligence</h3>
              <p>
                Legal opinions, affidavits, notices, agreements, document review
                and legal research.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
            <a
              class="practice-card"
              href="<?php echo esc_url(add_query_arg('matter','Arbitration & Dispute Resolution',qav_page_url('contact'))); ?>"
              data-matter="Arbitration &amp; Dispute Resolution"
              data-reveal
              ><div class="card-top">
                <svg class="practice-icon"><use href="#icon-scales" /></svg
                ><span>09</span>
              </div>
              <h3>Arbitration &amp; Dispute Resolution</h3>
              <p>
                Arbitration proceedings, dispute resolution, legal
                representation and advisory support in commercial and civil
                disputes.
              </p>
              <span class="card-link"
                >Discuss your matter<svg class="icon">
                  <use href="#icon-arrow-up" /></svg></span
            ></a>
          </div>
          <p class="practice-note">
            Every legal matter begins with understanding its context.<a
              href="<?php echo esc_url(qav_page_url('practice')); ?>"
              >Explore Practice <span aria-hidden="true">↗</span></a
            >
          </p>
        <?php qav_practice_insights(); ?></div>
      </section>

      <section
        class="section advisory-section"
        aria-labelledby="advisory-title"
      >
        <div class="container">
          <div class="section-label">
            <span>03 / INSTITUTIONAL ADVISORY</span><span>2024 — PRESENT</span>
          </div>
          <div class="advisory-intro" data-reveal>
            <h2 id="advisory-title">
              Legal insight.<br /><em>Institutional perspective.</em>
            </h2>
            <div>
              <p>
                Serving as Legal Adviser to RUDA, Allied Bank Limited and Urban
                Developers since 2024, with work spanning regulatory compliance,
                land development and project documentation.
              </p>
              <p>
                Advisory responsibilities include reviewing contracts,
                agreements and legal instruments for urban development
                initiatives.
              </p>
            </div>
          </div>
          <div class="institutions" data-reveal>
            <div>
              <span class="institution-index">01</span>
              <h3>RUDA</h3>
              <p>Ravi Urban Development Authority</p>
            </div>
            <div>
              <span class="institution-index">02</span>
              <h3>ABL</h3>
              <p>Allied Bank Limited</p>
            </div>
            <div>
              <span class="institution-index">03</span>
              <h3>Urban Developers</h3>
              <p>Central Park, Lahore</p>
            </div>
          </div>
        </div>
      </section>

      <section
        class="section experience-section dark"
        id="experience"
        aria-labelledby="experience-title"
      >
        <div class="container">
          <div class="section-label">
            <span>04 / PROFESSIONAL JOURNEY</span
            ><span>PRACTICE &amp; RESPONSIBILITY</span>
          </div>
          <div class="experience-grid">
            <div class="experience-intro" data-reveal>
              <p class="eyebrow">EXPERIENCE THAT INFORMS</p>
              <h2 id="experience-title">
                A career built<br />in practice.<br /><em
                  >A perspective<br />earned over time.</em
                >
              </h2>
              <p>
                Independent court practice and institutional counsel across
                Lahore and Punjab.
              </p>
              <div class="journey-mark">
                <span>2007</span><span aria-hidden="true">——</span
                ><span>Today</span>
              </div>
              <a class="text-link light-link home-destination-link" href="<?php echo esc_url(qav_page_url('experience')); ?>">Explore the Professional Journey <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </div>
            <ol class="timeline">
              <li data-reveal>
                <span class="timeline-date">2024 — PRESENT</span>
                <h3>Legal Adviser</h3>
                <p class="timeline-context">
                  RUDA, ABL &amp; Urban Developers · Lahore
                </p>
                <ul>
                  <li>
                    Strategic counsel on regulatory compliance, land development
                    and project documentation.
                  </li>
                  <li>
                    Review and vetting of contracts, agreements and legal
                    instruments.
                  </li>
                </ul>
              </li>
              <li data-reveal>
                <span class="timeline-date">2023 — PRESENT</span>
                <h3>Banking Law Practitioner</h3>
                <p class="timeline-context">
                  Civil Courts &amp; Banking Courts · Lahore
                </p>
                <ul>
                  <li>
                    Representation in banking disputes, loan recovery matters
                    and financial litigation.
                  </li>
                  <li>
                    Pleadings, applications and legal opinions relating to
                    banking regulations.
                  </li>
                </ul>
              </li>
              <li data-reveal>
                <span class="timeline-date">2022 — 2023</span>
                <h3>LDA Matters Specialist</h3>
                <p class="timeline-context">
                  Lahore Development Authority Courts
                </p>
                <ul>
                  <li>
                    Property, planning and regulatory matters before LDA
                    tribunals.
                  </li>
                  <li>
                    Advice on land acquisition, zoning regulations and LDA
                    compliance.
                  </li>
                </ul>
              </li>
              <li data-reveal>
                <span class="timeline-date">2010 — PRESENT</span>
                <h3>Independent Advocate</h3>
                <p class="timeline-context">
                  Civil, Criminal &amp; Corporate · Lahore &amp; Punjab
                </p>
                <ul>
                  <li>
                    Independent representation of individuals and companies in
                    Lower Courts and High Courts.
                  </li>
                  <li>
                    Legal drafting, case follow-up, status reporting and
                    corporate legal support.
                  </li>
                </ul>
              </li>
            </ol>
          </div>
        </div>
      </section>

      <section
        class="section advocacy-section"
        id="advocacy"
        aria-labelledby="advocacy-title"
      >
        <div class="container">
          <div class="section-label">
            <span>05 / RIGHTS &amp; RESPONSIBILITY</span
            ><span>THE HUMAN SIDE OF LAW</span>
          </div>
          <div class="advocacy-grid">
            <div class="advocacy-statement" data-reveal>
              <span class="statement-top"
                >A COMMITMENT BEYOND THE COURTROOM</span
              >
              <p>For dignity.<br />For equality.<br /><em>For people.</em></p>
              <div class="statement-bottom">
                <span class="small-star" aria-hidden="true">✳</span
                ><span>HUMAN RIGHTS<br />WOMEN’S RIGHTS · SOCIAL WORK</span>
              </div>
            </div>
            <div class="advocacy-copy" data-reveal>
              <p class="eyebrow">RIGHTS-FOCUSED ADVOCACY</p>
              <h2 id="advocacy-title">
                The law carries<br /><em>a human responsibility.</em>
              </h2>
              <p>
                Qurat-ul-Ain Viirk’s commitment to human rights and women’s rights
                sits alongside her litigation and advisory practice. Her areas
                of focus include workplace protections, gender-based violence
                redressal and public legal education.
              </p>
              <div class="advocacy-points">
                <div>
                  <svg class="icon"><use href="#icon-shield" /></svg
                  ><span>Anti-Harassment Law &amp; Compliance</span>
                </div>
                <div>
                  <svg class="icon"><use href="#icon-scales" /></svg
                  ><span>Gender-Based Violence Redressal</span>
                </div>
                <div>
                  <svg class="icon"><use href="#icon-people" /></svg
                  ><span>Workplace Grievance Counselling</span>
                </div>
                <div>
                  <svg class="icon"><use href="#icon-book" /></svg
                  ><span>Public Legal Education &amp; Media Advocacy</span>
                </div>
              </div>
            <a class="text-link home-destination-link" href="<?php echo esc_url(qav_page_url('advocacy')); ?>">Explore Advocacy <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
            </div>
          </div>
        </div>
      </section>

<section class="section publication-section home-insights-media" id="insights" aria-labelledby="insights-title">
        <div class="container">
          <div class="section-label"><span>06 / INSIGHTS &amp; MEDIA</span><span>FROM THE PRACTICE</span></div>
          <div class="publication-heading home-media-intro" data-reveal>
            <div><h2 id="insights-title">Law, considered.<br><em>Perspectives, shared.</em></h2></div>
            <p>Legal perspectives, professional commentary and selected media appearances, brought together in one place.</p>
          </div>
          <ol class="home-media-previews" role="list" aria-label="Explore the three content areas">
            <li class="home-media-preview" data-reveal>
              <p class="eyebrow home-media-kicker"><span aria-hidden="true">01</span><span>INSIGHTS</span></p>
              <h3><a href="<?php echo esc_url(qav_hub_url().'#hub-latest'); ?>">Perspectives — Forthcoming</a></h3>
              <p>Informed perspectives on law, justice, human rights, women’s rights, institutional accountability, and emerging legal developments.</p>
            </li>
            <li class="home-media-preview" data-reveal>
              <p class="eyebrow home-media-kicker"><span aria-hidden="true">02</span><span>VIDEO &amp; MEDIA</span></p>
              <h3><a href="<?php echo esc_url(qav_hub_url().'#hub-video'); ?>">Video &amp; Media</a></h3>
              <p>Recorded perspectives on law, rights and professional practice.</p>
            </li>
            <li class="home-media-preview" data-reveal>
              <p class="eyebrow home-media-kicker"><span aria-hidden="true">03</span><span>MEDIA &amp; INTERVIEWS</span></p>
              <h3><a href="<?php echo esc_url(qav_hub_url().'#hub-interviews'); ?>">Media &amp; Interviews</a></h3>
              <p>Interviews, discussions and professional appearances, brought together in one place.</p>
            </li>
          </ol>
          <div class="home-media-footer" data-reveal><a class="text-link" href="<?php echo esc_url(qav_hub_url()); ?>">Explore Insights &amp; Media <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a></div>
        </div>
      </section>      <section
        class="section capabilities-section"
        aria-labelledby="capabilities-title"
      >
        <div class="container">
          <div class="section-label">
            <span>07 / LEGAL CAPABILITIES</span
            ><span>FROM PREPARATION TO REPRESENTATION</span>
          </div>
          <div class="capabilities-grid">
            <div data-reveal>
              <p class="eyebrow">THE WORK BEHIND THE COUNSEL</p>
              <h2 id="capabilities-title">
                Considered strategy.<br /><em>Careful execution.</em>
              </h2>
              <p>
                Legal work shaped by research, clear documentation and attention
                to each matter’s procedural progress.
              </p>
              <img
                src="<?php echo esc_url(qav_asset('assets/svg/legal-study.svg')); ?>"
                alt="Editorial illustration of an open volume resting on bound legal books"
                width="800"
                height="520"
                loading="lazy"
                class="study-image"
              />
            </div>
            <div class="capability-list" data-reveal>
              <details>
                <summary>
                  <span>01</span>
                  <h3>Court Advocacy &amp; Pleading</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Representation, pleading and argument before competent courts,
                  with ongoing follow-up on case progress.
                </p>
              </details>
              <details>
                <summary>
                  <span>02</span>
                  <h3>Legal Drafting &amp; Writing</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Applications, affidavits, chamber summons, notices of motion,
                  replies and property-related documents.
                </p>
              </details>
              <details>
                <summary>
                  <span>03</span>
                  <h3>Legal Research &amp; Analysis</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Research and review of legal questions to inform opinions,
                  drafting and court submissions.
                </p>
              </details>
              <details>
                <summary>
                  <span>04</span>
                  <h3>Client Counsel &amp; Relations</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Legal opinions, client advisory and case-status reports for
                  individuals, companies and senior counsel.
                </p>
              </details>
              <details>
                <summary>
                  <span>05</span>
                  <h3>Contract Vetting &amp; Due Diligence</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Review of agreements and legal documents, with opinions and
                  suggestions for corporate and institutional matters.
                </p>
              </details>
              <details>
                <summary>
                  <span>06</span>
                  <h3>Institutional Policy Formulation</h3>
                  <span class="expand-icon" aria-hidden="true">+</span>
                </summary>
                <p>
                  Policy formulation and advisory work relating to institutional
                  responsibilities, compliance and workplace concerns.
                </p>
              </details>
            </div>
          </div>
        </div>
      </section>

      <section
        class="section teaching-section dark"
        aria-labelledby="teaching-title"
      >
        <div class="container">
          <div class="section-label">
            <span>09 / LEGAL EDUCATION</span><span>KNOWLEDGE SHARED</span>
          </div>
          <div class="teaching-intro" data-reveal>
            <svg class="teaching-icon"><use href="#icon-book" /></svg>
            <h2 id="teaching-title">
              Experience in practice.<br /><em
                >Perspective in the classroom.</em
              >
            </h2>
            <p>
              Teaching, academic mentorship and capacity building form another
              part of Qurat-ul-Ain Viirk’s professional journey.
            </p>
          </div>
          <div class="teaching-grid">
            <article data-reveal>
              <span class="eyebrow">2016 — 2019</span>
              <h3>Islamia Law College</h3>
              <p class="teaching-location">
                Peshawar <span>·</span> Law Lecturer
              </p>
              <p>
                Taught core law subjects to LLB students and developed course
                materials and examination papers.
              </p>
            </article>
            <article data-reveal>
              <span class="eyebrow">2007 — 2012</span>
              <h3>Quaid-e-Azam Law College</h3>
              <p class="teaching-location">Okara <span>·</span> Law Lecturer</p>
              <p>
                Contributed to legal education through a teaching appointment
                alongside her professional journey.
              </p>
            </article>
          </div>
        </div>
      </section>

      <section
        class="section credentials-section"
        id="credentials"
        aria-labelledby="credentials-title"
      >
        <div class="container">
          <div class="section-label">
            <span>10 / PROFESSIONAL FOUNDATIONS</span
            ><span>ENROLMENTS &amp; EDUCATION</span>
          </div>
          <div class="section-heading" data-reveal>
            <h2 id="credentials-title">
              Grounded in knowledge.<br /><em>Established in practice.</em>
            </h2>
            <p>
              Professional enrolments and academic qualifications that underpin
              the practice.
            </p>
          </div>
          <div class="credentials-grid" data-reveal>
            <div class="credential-column">
              <h3 class="eyebrow">BAR ENROLMENTS</h3>
              <div class="credential">
                <p>Advocate Lower Courts</p>
                <span>15 May 2007</span>
              </div>
              <div class="credential">
                <p>Advocate High Courts</p>
                <span>24 August 2009</span>
              </div>
            </div>
            <div class="credential-column">
              <h3 class="eyebrow">EDUCATION &amp; QUALIFICATIONS</h3>
              <div class="credential">
                <p>LLB <span class="credential-year">2006</span></p>
                <span>QLC / Punjab University, Lahore</span>
              </div>
              <div class="credential">
                <p>
                  M.A. Political Science
                  <span class="credential-year">2007</span>
                </p>
                <span>Punjab University, Lahore</span>
              </div>
              <div class="credential">
                <p>
                  P.G. Dip. in Foreign Sciences
                  <span class="credential-year">2024–25</span>
                </p>
                <span>Punjab University evening program, Lahore</span>
              </div>
            </div>
            <div class="credential-column languages">
              <h3 class="eyebrow">LANGUAGES</h3>
              <div class="credential">
                <p>Urdu</p>
                <span>Native</span>
              </div>
              <div class="credential">
                <p>English</p>
                <span>Professional</span>
              </div>
              <div class="credential">
                <p>Punjabi</p>
                <span>Fluent</span>
              </div>
            </div>
          </div>
          <div class="highlights" data-reveal>
            <span class="eyebrow">ALONG THE WAY</span>
            <p>Multiple debating competition winner during legal education.</p>
            <span class="highlight-divider" aria-hidden="true"></span>
            <p>Active human rights and women’s rights advocacy.</p>
          </div>
        </div>
      </section>

      <section
        class="section contact-section dark"
        id="contact"
        aria-labelledby="contact-title"
      >
        <div class="container">
          <div class="section-label">
            <span>11 / BEGIN A CONVERSATION</span><span>LAHORE, PAKISTAN</span>
          </div>
          <div class="contact-grid">
            <div class="contact-copy" data-reveal>
              <p class="eyebrow">CONSIDER YOUR NEXT STEP</p>
              <h2 id="contact-title">
                Your matter deserves<br /><em>a considered approach.</em>
              </h2>
              <p>
                Contact the office to discuss your legal matter and consultation
                requirements.
              </p>
              <a class="text-link light-link home-destination-link" href="<?php echo esc_url(qav_page_url('contact')); ?>">Begin a Conversation <svg class="icon" aria-hidden="true"><use href="#icon-arrow-up" /></svg></a>
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
              <span class="contact-language"
                >Urdu <i>·</i> English <i>·</i> Punjabi</span
              >
            </div>
            <form class="enquiry-form" id="enquiry-form" data-contact-email="<?php echo esc_attr(qav_profile('email')); ?>" novalidate data-reveal>
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
        </div>
      </section>
    </main>

    <?php get_footer(); ?>