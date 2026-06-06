<?php
/**
 * Cirova Studio theme functions.
 *
 * @package Cirova_Studio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

/**
 * Shorthand for the theme directory URI (used by templates for asset paths).
 */
function cs_uri() {
	return get_template_directory_uri();
}

/**
 * Theme setup.
 */
function cirova_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	// Optional: a WP menu location (the design ships with a hardcoded nav, so this is optional).
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'cirova-studio' ),
		)
	);
}
add_action( 'after_setup_theme', 'cirova_setup' );

/**
 * Enqueue styles and scripts.
 */
function cirova_assets() {
	$ver = wp_get_theme()->get( 'Version' );

	// Google Fonts (same families the design uses).
	wp_enqueue_style(
		'cirova-fonts',
		'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap',
		array(),
		null
	);

	// Main stylesheet (the real design lives here).
	wp_enqueue_style(
		'cirova-main',
		cs_uri() . '/assets/css/style.css',
		array(),
		$ver
	);

	// Vanilla JS (loaded in the footer).
	wp_enqueue_script(
		'cirova-main',
		cs_uri() . '/assets/js/main.js',
		array(),
		$ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'cirova_assets' );

/**
 * Per-page SEO titles/descriptions, keyed by page slug.
 * Falls back to the site name/tagline for anything not listed.
 */
function cirova_seo_map() {
	return array(
		'__front__'                    => array(
			'Cirova Studio | Video Editing, SMM, Content Writing & Website Design Agency',
			'Cirova Studio is a digital marketing agency offering video editing, social media management, content writing, website design, and more for growing brands.',
		),
		'about'                        => array(
			'About Cirova Studio | Strategic Marketing & Creative Experts',
			'Cirova Studio is a growth-focused, full-service digital marketing agency — 300+ experts delivering strategy, creative, web and performance marketing.',
		),
		'contact'                      => array(
			'Contact Cirova Studio | Start Your Project',
			'Get in touch with Cirova Studio for digital marketing, websites, social media and paid ads. We reply within one business day.',
		),
		'smm-services'                 => array(
			'SMM Services | Social Media Management Agency — Cirova Studio',
			'Professional SMM services: social media strategy, content, scheduling, engagement and analytics across all major platforms.',
		),
		'video-editing-services'       => array(
			'Video Editing Services | Premiere Pro, Motion & Color Grade — Cirova Studio',
			'Professional video editing: reels, ads, YouTube, motion graphics and cinematic color grading by expert editors.',
		),
		'website-development'          => array(
			'Website Development Services | WordPress, Shopify & Custom — Cirova Studio',
			'Fast, secure, conversion-focused website development: WordPress, Shopify, React and custom builds, mobile-first and SEO-ready.',
		),
		'ppc-services'                 => array(
			'PPC Services | Google & Meta Ads Management — Cirova Studio',
			'Performance-focused PPC services: Google Ads, Meta Ads, search, local and retargeting campaigns for measurable ROAS.',
		),
		'digital-marketing-services'   => array(
			'Digital Marketing Services | Full-Funnel Growth — Cirova Studio',
			'Integrated digital marketing: SEO, paid media, social, content, web and analytics from a 300+ specialist team.',
		),
	);
}

/**
 * Output a meta description + Open Graph tags in <head>.
 */
function cirova_head_meta() {
	$map = cirova_seo_map();
	$key = is_front_page() ? '__front__' : ( is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '' );

	$desc = get_bloginfo( 'description' );
	if ( isset( $map[ $key ] ) ) {
		$desc = $map[ $key ][1];
	}

	echo "\n" . '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( wp_get_document_title() ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:type" content="website">' . "\n";
	echo '<meta property="og:image" content="' . esc_url( cs_uri() . '/assets/img/cs-logo.png' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" href="' . esc_url( cs_uri() . '/assets/img/cs-logo.png' ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( cs_uri() . '/assets/img/cs-logo.png' ) . '">' . "\n";
}
add_action( 'wp_head', 'cirova_head_meta', 5 );

/**
 * Use the curated titles from the SEO map for the document <title>.
 */
function cirova_document_title( $title ) {
	$map = cirova_seo_map();
	$key = is_front_page() ? '__front__' : ( is_page() ? get_post_field( 'post_name', get_queried_object_id() ) : '' );
	if ( isset( $map[ $key ] ) ) {
		return $map[ $key ][0];
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'cirova_document_title', 20 );

/* ============================================================================
 * ACF — key content editability (graceful fallback when ACF is inactive)
 * ========================================================================== */

/**
 * Return an ACF field value with a safe fallback.
 *
 * @param string $name    Field name.
 * @param mixed  $default Fallback if ACF is off or the field is empty.
 * @param bool   $option  True to read from the Site Settings options page.
 */
function cs_field( $name, $default = '', $option = false ) {
	if ( function_exists( 'get_field' ) ) {
		$val = $option ? get_field( $name, 'option' ) : get_field( $name );
		if ( null !== $val && '' !== $val ) {
			return $val;
		}
	}
	return $default;
}

/** Register the "Site Settings" options page (global, editable content). */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		array(
			'page_title' => 'Site Settings',
			'menu_title' => 'Site Settings',
			'menu_slug'  => 'cirova-settings',
			'capability' => 'edit_theme_options',
			'icon_url'   => 'dashicons-admin-customizer',
			'position'   => 3,
		)
	);
}

/** Helper: resolved logo URL (ACF image -> default). */
function cs_logo_url() {
	$logo = cs_field( 'site_logo', '', true );
	if ( is_array( $logo ) && ! empty( $logo['url'] ) ) {
		return $logo['url'];
	}
	if ( is_numeric( $logo ) ) {
		$src = wp_get_attachment_image_url( $logo, 'full' );
		if ( $src ) {
			return $src;
		}
	}
	if ( is_string( $logo ) && $logo ) {
		return $logo;
	}
	return cs_uri() . '/assets/img/cs-logo.png';
}

/* ============================================================================
 * CONTACT FORM — real submissions via wp_mail (nonce + honeypot)
 * ========================================================================== */
function cirova_handle_contact() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );

	// Honeypot: real users leave this empty.
	if ( ! empty( $_POST['cs_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', $redirect ) );
		exit;
	}
	// Nonce.
	if ( ! isset( $_POST['cs_contact_nonce'] ) || ! wp_verify_nonce( $_POST['cs_contact_nonce'], 'cs_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'error', 'security', $redirect ) );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$company = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$budget  = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'error', 'fields', $redirect ) );
		exit;
	}

	$to      = cs_field( 'contact_email', 'cirovastudio@gmail.com', true );
	$subject = sprintf( 'New enquiry from %s — %s', $name, get_bloginfo( 'name' ) );
	$body    = "New contact form submission:\n\n"
		. "Name: {$name}\n"
		. "Email: {$email}\n"
		. "Company: {$company}\n"
		. "Budget: {$budget}\n\n"
		. "Message:\n{$message}\n";
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	$ok = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( $ok ? array( 'sent' => '1' ) : array( 'error' => 'send' ), $redirect ) . '#form' );
	exit;
}
add_action( 'admin_post_nopriv_cirova_contact', 'cirova_handle_contact' );
add_action( 'admin_post_cirova_contact', 'cirova_handle_contact' );
