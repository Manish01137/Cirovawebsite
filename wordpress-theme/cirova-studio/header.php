<?php
/** Header: document open, wp_head, animation layer, nav, mobile nav. */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#0E0A14">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<!-- Global animation layer (loader + custom cursor + scroll progress) -->
<div class="scroll-progress" id="scrollProgress"></div>
<div class="cursor-dot" id="cursorDot" aria-hidden="true"></div>
<div class="cursor-ring" id="cursorRing" aria-hidden="true"></div>
<div class="page-loader" id="pageLoader"><img src="<?php echo esc_url( cs_logo_url() ); ?>" alt="Loading Cirova Studio" width="80" height="80"></div>

<!-- SECTION: HEADER (shared template part) -->
<header class="site-header">
  <div class="container nav">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Cirova Studio home">
      <img src="<?php echo esc_url( cs_logo_url() ); ?>" alt="Cirova Studio logo" width="30" height="30">
      <span><b>Cirova</b> <i>Studio</i></span>
    </a>

    <!-- desktop nav -->
    <nav class="nav-desktop" aria-label="Primary">
      <ul class="nav-desktop">
        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
        <li class="has-drop">
          <a class="nav-link" href="#">Services <span class="icon i-chevron-down" aria-hidden="true"></span></a>
          <div class="dropdown">
            <a href="<?php echo esc_url(home_url('/smm-services/')); ?>"><span class="svc-badge">SM</span><span class="svc-meta"><b>SMM Services</b><span>Social media management &amp; growth</span></span></a>
            <a href="<?php echo esc_url(home_url('/video-editing-services/')); ?>"><span class="svc-badge">VE</span><span class="svc-meta"><b>Video Editing</b><span>Premiere Pro, color grade, motion</span></span></a>
            <a href="<?php echo esc_url(home_url('/website-development/')); ?>"><span class="svc-badge">WD</span><span class="svc-meta"><b>Website Development</b><span>Fast, scalable, SEO-ready websites</span></span></a>
            <a href="<?php echo esc_url(home_url('/ppc-services/')); ?>"><span class="svc-badge">PPC</span><span class="svc-meta"><b>PPC Services</b><span>Google &amp; Meta paid campaigns</span></span></a>
            <a href="<?php echo esc_url(home_url('/digital-marketing-services/')); ?>"><span class="svc-badge">DM</span><span class="svc-meta"><b>Digital Marketing</b><span>Full-funnel growth strategy</span></span></a>
          </div>
        </li>
        <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
      </ul>
    </nav>
    <a class="btn btn--primary nav-cta" href="<?php echo esc_url(home_url('/contact/')); ?>">Get a Free Quote <span class="icon i-arrow-right" aria-hidden="true"></span></a>

    <!-- hamburger -->
    <button class="hamburger" data-nav-open aria-label="Open menu" aria-controls="mobileNav" aria-expanded="false">
      <span class="icon i-menu" aria-hidden="true"></span>
    </button>
  </div>
</header>

<!-- SECTION: MOBILE NAV -->
<div class="mobile-nav" id="mobileNav" aria-hidden="true">
  <div class="container">
    <div class="mobile-nav__top">
      <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url( cs_logo_url() ); ?>" alt="Cirova Studio logo" width="30" height="30"><span><b>Cirova</b> <i>Studio</i></span></a>
      <button class="mobile-nav__close" data-nav-close aria-label="Close menu"><span class="icon i-x" aria-hidden="true"></span></button>
    </div>
    <ul class="mobile-nav__links">
      <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
      <li class="m-acc">
        <button class="m-acc__btn" aria-expanded="false">Services <span class="icon i-chevron-down" aria-hidden="true"></span></button>
        <div class="m-acc__panel">
          <div class="m-acc__list">
            <a href="<?php echo esc_url(home_url('/smm-services/')); ?>"><span class="svc-badge">SM</span><span class="svc-meta"><b>SMM Services</b><span>Social media management &amp; growth</span></span></a>
            <a href="<?php echo esc_url(home_url('/video-editing-services/')); ?>"><span class="svc-badge">VE</span><span class="svc-meta"><b>Video Editing</b><span>Premiere Pro, color grade, motion</span></span></a>
            <a href="<?php echo esc_url(home_url('/website-development/')); ?>"><span class="svc-badge">WD</span><span class="svc-meta"><b>Website Development</b><span>Fast, scalable, SEO-ready websites</span></span></a>
            <a href="<?php echo esc_url(home_url('/ppc-services/')); ?>"><span class="svc-badge">PPC</span><span class="svc-meta"><b>PPC Services</b><span>Google &amp; Meta paid campaigns</span></span></a>
            <a href="<?php echo esc_url(home_url('/digital-marketing-services/')); ?>"><span class="svc-badge">DM</span><span class="svc-meta"><b>Digital Marketing</b><span>Full-funnel growth strategy</span></span></a>
          </div>
        </div>
      </li>
      <li><a href="<?php echo esc_url(home_url('/about/')); ?>">About</a></li>
      <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
    </ul>
    <a class="btn btn--primary btn--block mobile-nav__cta" href="<?php echo esc_url(home_url('/contact/')); ?>">Get a Free Quote</a>
  </div>
</div>

