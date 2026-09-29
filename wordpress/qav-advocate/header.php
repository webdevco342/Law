<?php if (!defined('ABSPATH')) exit; ?><!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#061a2f"><link rel="icon" type="image/svg+xml" href="<?php echo esc_url(qav_asset('assets/svg/favicon.svg')); ?>"><link rel="preload" href="<?php echo esc_url(qav_asset('assets/fonts/cormorant-garamond-medium.woff2')); ?>" as="font" type="font/woff2" crossorigin><link rel="preload" href="<?php echo esc_url(qav_asset('assets/fonts/manrope-variable.woff2')); ?>" as="font" type="font/woff2" crossorigin><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?><a class="skip-link" href="#main">Skip to content</a>
    <svg
      class="icon-defs"
      xmlns="http://www.w3.org/2000/svg"
      aria-hidden="true"
    >
      <defs>
        <symbol id="icon-arrow" viewBox="0 0 24 24">
          <path d="M4 12h15m-6-6 6 6-6 6" />
        </symbol>
        <symbol id="icon-arrow-up" viewBox="0 0 24 24">
          <path d="M6 18 18 6M6 6h12v12" />
        </symbol>
        <symbol id="icon-columns" viewBox="0 0 32 32">
          <path
            d="m3 10 13-7 13 7H3Zm2 18h22M3 31h26M7 13v12m6-12v12m6-12v12m6-12v12"
          />
        </symbol>
        <symbol id="icon-scales" viewBox="0 0 32 32">
          <path
            d="M16 4v24M9 28h14M5 10h22M6 10l-4 10h8L6 10Zm20 0-4 10h8l-4-10ZM2 20c0 5 8 5 8 0m12 0c0 5 8 5 8 0"
          />
          <circle cx="16" cy="6" r="2" />
        </symbol>
        <symbol id="icon-document" viewBox="0 0 32 32">
          <path d="M7 3h12l6 6v20H7V3Zm12 0v7h6M11 15h10m-10 5h10m-10 5h6" />
        </symbol>
        <symbol id="icon-shield" viewBox="0 0 32 32">
          <path d="m16 3 11 4v9c0 7-11 13-11 13S5 23 5 16V7l11-4Z" />
          <path d="m11 15 4 4 7-8" />
        </symbol>
        <symbol id="icon-building" viewBox="0 0 32 32">
          <path
            d="M4 29h24M7 29V9h9V3h9v26M11 13h1m-1 5h1m-1 5h1m8-14h1m-1 5h1m-1 5h1m-1 5h1"
          />
        </symbol>
        <symbol id="icon-people" viewBox="0 0 32 32">
          <circle cx="12" cy="10" r="5" />
          <path
            d="M3 28v-4a9 9 0 0 1 18 0v4M22 6a5 5 0 0 1 0 10m3 3a7 7 0 0 1 4 6v3"
          />
        </symbol>
        <symbol id="icon-book" viewBox="0 0 32 32">
          <path
            d="M16 7v22M3 5c5-1 9 0 13 3 4-3 8-4 13-3v21c-5-1-9 0-13 3-4-3-8-4-13-3V5Z"
          />
        </symbol>
        <symbol id="icon-pen" viewBox="0 0 32 32">
          <path
            d="m8 24 3-9L24 2l6 6-13 13-9 3Zm3-9 6 6M21 5l6 6M3 30h26M8 24l-3 3"
          />
        </symbol>
        <symbol id="icon-pin" viewBox="0 0 24 24">
          <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z" />
          <circle cx="12" cy="10" r="2.5" />
        </symbol>
        <symbol id="icon-phone" viewBox="0 0 24 24">
          <path
            d="m5 3 4 1 1 5-3 2c2 3 3 4 6 6l2-3 5 1 1 4c-1 3-5 3-10-1S2 7 3 5l2-2Z"
          />
        </symbol>
        <symbol id="icon-mail" viewBox="0 0 24 24">
          <rect x="3" y="5" width="18" height="14" rx="1" />
          <path d="m3 6 9 7 9-7" />
        </symbol>
      </defs>
    </svg>

    <header class="site-header" id="site-header">
      <div class="container header-inner">
        <a class="brand" href="<?php echo esc_url(qav_home_anchor('home')); ?>" aria-label="Qurat-ul-Ain Viirk, home"
          ><span class="brand-mark" aria-hidden="true">Q<span>.</span></span
          ><span class="brand-type"
            >QURAT-UL-AIN VIIRK<small>ADVOCATE HIGH COURT</small></span
          ></a
        >
        <nav class="desktop-nav" aria-label="Main navigation"><a href="<?php echo esc_url(qav_home_anchor('about')); ?>">Profile</a><a href="<?php echo esc_url(qav_home_anchor('practice')); ?>">Practice</a><a href="<?php echo esc_url(qav_home_anchor('experience')); ?>">Experience</a><a href="<?php echo esc_url(qav_home_anchor('advocacy')); ?>">Advocacy</a><?php qav_hub_nav(); ?><a href="<?php echo esc_url(qav_insights_url()); ?>">Insights</a><a href="<?php echo esc_url(qav_media_url()); ?>">Media</a><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>">Contact</a></nav>
        <a class="button button-gold header-cta" href="<?php echo esc_url(qav_home_anchor('contact')); ?>"
          >Request Consultation<svg class="icon">
            <use href="#icon-arrow-up" /></svg
        ></a>
        <button
          class="menu-toggle"
          type="button"
          aria-label="Open navigation"
          aria-expanded="false"
          aria-controls="mobile-menu"
        >
          <span>Menu</span><span class="menu-lines" aria-hidden="true"></span>
        </button>
      </div>
      <div class="scroll-progress" aria-hidden="true"></div>
    </header>
    <dialog class="mobile-menu" id="mobile-menu" aria-label="Navigation">
      <div class="mobile-menu-top">
        <span class="eyebrow">QURAT-UL-AIN VIIRK</span
        ><button class="menu-close" type="button" aria-label="Close navigation">
          Close <span aria-hidden="true">×</span>
        </button>
      </div>
      <nav aria-label="Mobile navigation">
        <a href="<?php echo esc_url(qav_home_anchor('home')); ?>">Home</a><a href="<?php echo esc_url(qav_home_anchor('about')); ?>">About</a
        ><a href="<?php echo esc_url(qav_home_anchor('practice')); ?>">Practice Areas</a
        ><a href="<?php echo esc_url(qav_home_anchor('experience')); ?>">Experience</a><a href="<?php echo esc_url(qav_home_anchor('advocacy')); ?>">Advocacy</a
        ><a href="<?php echo esc_url(qav_home_anchor('credentials')); ?>">Credentials</a><?php qav_hub_nav(); ?><a href="<?php echo esc_url(qav_insights_url()); ?>">Insights</a><a href="<?php echo esc_url(qav_media_url()); ?>">Media &amp; Interviews</a><a href="<?php echo esc_url(qav_home_anchor('contact')); ?>">Contact</a>
      </nav>
      <a class="button button-gold" href="<?php echo esc_url(qav_home_anchor('contact')); ?>"
        >Request a Consultation<svg class="icon">
          <use href="#icon-arrow-up" /></svg
      ></a>
      <p class="mobile-menu-location">Lahore, Pakistan · Advocate High Court</p>
    </dialog>

    