<?php
/**
 * Maverick theme functions.
 */

defined( 'ABSPATH' ) || exit;

// ── Theme setup ──────────────────────────────────────────────────────────────
add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );
} );

// ── Page content seeder ──────────────────────────────────────────────────────
// inc/page-content.php defines maverick_seed_pages() and maverick_page_definitions().
// On activation it creates the 5 main pages (About, Services, Team, Company,
// Contact) with their full block content pre-loaded and their custom template
// assigned. Existing pages are never overwritten, so client edits are safe.
require_once get_template_directory() . '/inc/page-content.php';

// ── Seed the "Case Study" and "Press" categories on theme activation ────────
// Both are regular posts assigned to one of these categories rather than a
// custom post type — low volume content, so categories + existing templates
// cover everything needed without the overhead of a CPT.
add_action( 'after_switch_theme', function () {
	if ( ! term_exists( 'Case Study', 'category' ) ) {
		wp_insert_term( 'Case Study', 'category', [ 'slug' => 'case-study' ] );
	}
	if ( ! term_exists( 'Press', 'category' ) ) {
		wp_insert_term( 'Press', 'category', [ 'slug' => 'press' ] );
	}
	maverick_seed_pages();
} );

// ── Register custom blocks ───────────────────────────────────────────────────
add_action( 'init', function () {
	$blocks = [
		'showcase-card',
		'testimonial-card',
		'stats-strip',
		'logo-grid',
		'cta-section',
		'newsletter-signup',
		'principle-card',
		'team-member',
		'timeline-item',
		'topic-filter',
		'pillar-card',
		'office-card',
		'press-row',
		'contact-form',
		'contact-card',
		'faq-item',
		'lead-card',
		'roster-cell',
		'service-card',
		'work-filter',
		'featured-case',
		'case-tile',
		'press-item',
		'media-kit-row',
		'hero',
	];
	foreach ( $blocks as $block ) {
		register_block_type( get_template_directory() . '/blocks/' . $block );
	}
} );

// ── Newsletter signup handler (default internal endpoint) ───────────────────
// Swap this out for a real ESP (Mailchimp, ConvertKit, etc.) integration
// by setting a Form Action URL in the block's inspector controls instead.
add_action( 'admin_post_nopriv_maverick_newsletter_signup', 'maverick_handle_newsletter_signup' );
add_action( 'admin_post_maverick_newsletter_signup', 'maverick_handle_newsletter_signup' );
function maverick_handle_newsletter_signup() {
	if (
		empty( $_POST['maverick_newsletter_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['maverick_newsletter_nonce'] ) ), 'maverick_newsletter_signup' )
	) {
		wp_die( esc_html__( 'Security check failed.', 'maverick' ) );
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'newsletter', 'invalid', wp_get_referer() ?: home_url() ) );
		exit;
	}

	// Store as a simple option-backed list for now. Replace with an ESP API call as needed.
	$subscribers = get_option( 'maverick_newsletter_subscribers', [] );
	if ( ! in_array( $email, $subscribers, true ) ) {
		$subscribers[] = $email;
		update_option( 'maverick_newsletter_subscribers', $subscribers );
	}

	wp_safe_redirect( add_query_arg( 'newsletter', 'success', wp_get_referer() ?: home_url() ) );
	exit;
}

// ── Exclude current post from "related posts" query loops on single posts ───
add_filter( 'query_loop_block_query_vars', function ( $query, $block ) {
	if ( is_single() && empty( $query['post__not_in'] ) ) {
		$current_id = get_the_ID();
		if ( $current_id ) {
			$query['post__not_in'] = [ $current_id ];
		}
	}
	return $query;
}, 10, 2 );

// ── Resolve "Case Study" / "Press" category IDs into specific named query
// blocks at render time, by className. Static template files can't contain
// PHP, so the real (database-assigned) term ID can't be hardcoded into the
// .html template — this filter injects it server-side instead. Runs at
// priority 5 so it fires BEFORE the general exclusion filter below checks
// categoryIds, otherwise these deliberately-scoped queries would get
// stripped of the very category they're trying to query.
add_filter( 'query_loop_block_query_vars', function ( $query, $block ) {
	$class_to_slug = [
		'featured-case-query'   => 'case-study',
		'case-grid-query'       => 'case-study',
		'featured-press-query'  => 'press',
		'press-grid-query'      => 'press',
	];

	$class_list = $block->parsed_block['attrs']['className'] ?? '';
	foreach ( $class_to_slug as $needle => $slug ) {
		if ( false !== strpos( $class_list, $needle ) ) {
			$term = get_term_by( 'slug', $slug, 'category' );
			if ( $term ) {
				$query['categoryIds'] = [ $term->term_id ];
			}
			break;
		}
	}

	return $query;
}, 5, 2 );

// ── Keep Case Study & Press posts out of the main blog feed ──────────────────
// Both live as regular posts so they get a real URL, RSS, REST API, etc. for
// free — but they shouldn't appear mixed into the Insights blog index or as
// "related" reading under a normal article. The Our Work and Press pages
// explicitly query these categories themselves (resolved by the filter
// above), so this filter only strips them out when a query ISN'T already
// deliberately targeting one of them.
add_filter( 'query_loop_block_query_vars', function ( $query, $block ) {
	$excluded_slugs = [ 'case-study', 'press' ];
	$excluded_ids   = [];

	foreach ( $excluded_slugs as $slug ) {
		$term = get_term_by( 'slug', $slug, 'category' );
		if ( $term ) {
			$excluded_ids[] = $term->term_id;
		}
	}
	if ( ! $excluded_ids ) {
		return $query;
	}

	$wants_excluded = ! empty( $query['categoryIds'] ) &&
		array_intersect( $excluded_ids, (array) $query['categoryIds'] );

	if ( ! $wants_excluded ) {
		$query['category__not_in'] = array_merge(
			$query['category__not_in'] ?? [],
			$excluded_ids
		);
	}

	return $query;
}, 10, 2 );

// ── Same exclusion for the main blog index (home.html, which uses the
// default WordPress query rather than a block-level core/query) ─────────────
add_action( 'pre_get_posts', function ( $wp_query ) {
	if ( is_admin() || ! $wp_query->is_main_query() ) {
		return;
	}
	if ( ! $wp_query->is_home() ) {
		return;
	}

	$excluded_ids = [];
	foreach ( [ 'case-study', 'press' ] as $slug ) {
		$term = get_term_by( 'slug', $slug, 'category' );
		if ( $term ) {
			$excluded_ids[] = $term->term_id;
		}
	}
	if ( $excluded_ids ) {
		$wp_query->set( 'category__not_in', $excluded_ids );
	}
} );

// ── Contact form inquiries — stored as a private custom post type ───────────
// Visible in wp-admin under "Inquiries." Swap the handler for a CRM API call
// by setting a Form Action URL in the Contact Form block's inspector instead.
add_action( 'init', function () {
	register_post_type( 'maverick_inquiry', [
		'label'        => 'Inquiries',
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-email-alt',
		'supports'     => [ 'title' ],
		'capabilities' => [
			'create_posts' => false, // Inquiries are only ever created by the form handler below, which bypasses capability checks via wp_insert_post().
		],
		'map_meta_cap' => true,
	] );
} );

add_action( 'admin_post_nopriv_maverick_contact_inquiry', 'maverick_handle_contact_inquiry' );
add_action( 'admin_post_maverick_contact_inquiry', 'maverick_handle_contact_inquiry' );

add_filter( 'manage_maverick_inquiry_posts_columns', function ( $columns ) {
	$columns['inquiry_email']   = 'Email';
	$columns['inquiry_phone']   = 'Phone';
	$columns['inquiry_org_type'] = 'Org Type';
	return $columns;
} );
add_action( 'manage_maverick_inquiry_posts_custom_column', function ( $column, $post_id ) {
	switch ( $column ) {
		case 'inquiry_email':
			echo esc_html( get_post_meta( $post_id, '_inquiry_email', true ) );
			break;
		case 'inquiry_phone':
			echo esc_html( get_post_meta( $post_id, '_inquiry_phone', true ) ?: '—' );
			break;
		case 'inquiry_org_type':
			echo esc_html( get_post_meta( $post_id, '_inquiry_org_type', true ) );
			break;
	}
}, 10, 2 );
function maverick_handle_contact_inquiry() {
	if (
		empty( $_POST['maverick_contact_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['maverick_contact_nonce'] ) ), 'maverick_contact_inquiry' )
	) {
		wp_die( esc_html__( 'Security check failed.', 'maverick' ) );
	}

	$name    = isset( $_POST['name'] )    ? sanitize_text_field( wp_unslash( $_POST['name'] ) )    : '';
	$email   = isset( $_POST['email'] )   ? sanitize_email( wp_unslash( $_POST['email'] ) )         : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || ! is_email( $email ) || empty( $message ) ) {
		wp_safe_redirect( add_query_arg( 'inquiry', 'invalid', wp_get_referer() ?: home_url() ) );
		exit;
	}

	$organization = isset( $_POST['organization'] ) ? sanitize_text_field( wp_unslash( $_POST['organization'] ) ) : '';
	$phone        = isset( $_POST['phone'] )        ? sanitize_text_field( wp_unslash( $_POST['phone'] ) )        : '';
	$org_type     = isset( $_POST['org_type'] )      ? sanitize_text_field( wp_unslash( $_POST['org_type'] ) )     : '';

	$post_id = wp_insert_post( [
		'post_type'   => 'maverick_inquiry',
		'post_title'  => sprintf( '%s — %s', $name, $organization ?: 'No organization given' ),
		'post_status' => 'private',
	] );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		update_post_meta( $post_id, '_inquiry_email', $email );
		update_post_meta( $post_id, '_inquiry_phone', $phone );
		update_post_meta( $post_id, '_inquiry_org_type', $org_type );
		update_post_meta( $post_id, '_inquiry_message', $message );
	}

	/*
	 * Email the inquiry. The recipient comes from the block's "Send notifications
	 * to" field, passed as a signed hidden value so a forged POST can't turn this
	 * into an open relay — if the signature doesn't verify we fall back to the
	 * site admin address rather than trusting the submitted value.
	 */
	$notify_to = get_option( 'admin_email' );
	if ( ! empty( $_POST['notify_email'] ) && ! empty( $_POST['notify_sig'] ) ) {
		$candidate = sanitize_email( wp_unslash( $_POST['notify_email'] ) );
		$signature = sanitize_text_field( wp_unslash( $_POST['notify_sig'] ) );
		if (
			is_email( $candidate ) &&
			hash_equals( wp_hash( 'maverick_notify|' . $candidate ), $signature )
		) {
			$notify_to = $candidate;
		}
	}

	if ( is_email( $notify_to ) ) {
		$site    = wp_specialchars_decode( get_bloginfo( 'name' ), ENT_QUOTES );
		$subject = sprintf( '[%s] New inquiry from %s', $site, $name );
		$body    = implode( "\n", [
			'Name:         ' . $name,
			'Email:        ' . $email,
			'Phone:        ' . ( $phone ?: '—' ),
			'Organization: ' . ( $organization ?: '—' ),
			'Type:         ' . ( $org_type ?: '—' ),
			'',
			'Message:',
			$message,
			'',
			'---',
			$post_id && ! is_wp_error( $post_id )
				? 'View in admin: ' . admin_url( 'post.php?post=' . (int) $post_id . '&action=edit' )
				: 'Note: this inquiry was not saved to the database.',
		] );

		// Reply-To lets the team answer the sender directly; the From address is
		// left to WordPress so it stays on the site's own domain (deliverability).
		wp_mail(
			$notify_to,
			$subject,
			$body,
			[ 'Reply-To: ' . $name . ' <' . $email . '>' ]
		);
	}

	wp_safe_redirect( add_query_arg( 'inquiry', 'success', wp_get_referer() ?: home_url() ) );
	exit;
}

// ── Register a custom block category ────────────────────────────────────────
add_filter( 'block_categories_all', function ( $categories ) {
	return array_merge(
		[ [ 'slug' => 'maverick', 'title' => 'Maverick', 'icon' => null ] ],
		$categories
	);
} );

// ── Enqueue Google Fonts ─────────────────────────────────────────────────────
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'maverick-fonts',
		'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap',
		[],
		null
	);

	// global.css: sitewide styles (sticky header, etc.)
	wp_enqueue_style(
		'maverick-global',
		get_template_directory_uri() . '/assets/css/global.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	// Header scroll shadow is handled entirely in CSS via scroll-driven
	// animations (animation-timeline: scroll(root)) — see global.css.
	// No JS listener needed.

	// article.css covers: single post rich-text content, the blog index
	// card/featured layouts, and the decorative hero flourish + careers
	// split-section styling reused on the About and Company page templates.
	if ( is_single() || is_home() || is_404() || is_search() || is_page_template( [ 'page-about.html', 'page-company.html', 'page-contact.html', 'page-team.html', 'page-services.html', 'page-our-work.html', 'page-press.html' ] ) ) {
		wp_enqueue_style(
			'maverick-article',
			get_template_directory_uri() . '/assets/css/article.css',
			[],
			wp_get_theme()->get( 'Version' )
		);
	}
} );

add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_style(
		'maverick-fonts',
		'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter:wght@400;500;600;700;800&display=swap',
		[],
		null
	);

	$screen = get_current_screen();
	if ( $screen && 'post' === $screen->post_type ) {
		wp_enqueue_style(
			'maverick-article-editor',
			get_template_directory_uri() . '/assets/css/article.css',
			[],
			wp_get_theme()->get( 'Version' )
		);
	}
} );

// ── Admin utility: re-seed pages on demand ───────────────────────────────────
// Adds a "Maverick Tools" admin page at Tools → Maverick so a developer can
// force-update page content without reactivating the theme. Pages are updated
// (not just created) when using this utility, making it safe to re-run after
// template changes. Not visible to editors — admin-only.
add_action( 'admin_menu', function () {
	add_management_page(
		'Maverick Tools',
		'Maverick Tools',
		'manage_options',
		'maverick-tools',
		'maverick_tools_page'
	);
} );

function maverick_tools_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$message = '';

	if (
		isset( $_POST['maverick_reseed'] ) &&
		check_admin_referer( 'maverick_reseed_pages' )
	) {
		$count = 0;
		foreach ( maverick_page_definitions() as $def ) {
			$existing = get_page_by_path( $def['slug'], OBJECT, 'page' );
			$data = [
				'post_type'     => 'page',
				'post_title'    => $def['title'],
				'post_name'     => $def['slug'],
				'post_content'  => $def['content'],
				'page_template' => $def['template'],
			];
			if ( $existing ) {
				// Content reset only — preserve the page's current publish/private
				// status so a reset never overrides a choice the client has made.
				$data['ID'] = $existing->ID;
				wp_update_post( $data );
			} else {
				// First creation honors the definition's status (default publish).
				$data['post_status'] = $def['status'] ?? 'publish';
				wp_insert_post( $data );
			}
			$count++;
		}
		$message = "<div class='notice notice-success'><p><strong>Done.</strong> $count pages have been reset to the default theme content. Any previous edits to those pages have been permanently replaced.</p></div>";
	}

	$page_list = implode( ', ', array_column( maverick_page_definitions(), 'title' ) );

	echo '<div class="wrap">';
	echo '<h1>Maverick Tools</h1>';
	echo $message;
	echo '<h2>Reset Pages to Default Theme Content</h2>';

	echo '<div style="background:#fff3cd;border-left:4px solid #f0ad00;padding:14px 18px;margin-bottom:20px;max-width:600px">';
	echo '<p style="margin:0 0 8px"><strong>⚠ Warning — this action cannot be undone.</strong></p>';
	echo '<p style="margin:0">Clicking the button below will <strong>permanently overwrite</strong> the content of the following pages with the original default content built into the theme:</p>';
	echo '<p style="margin:8px 0 0"><strong>' . esc_html( $page_list ) . '</strong></p>';
	echo '<p style="margin:8px 0 0">Any text edits, image changes, or layout adjustments made to those pages will be <strong>permanently lost</strong>. This cannot be reversed. Only use this if you need to restore a page to its original state.</p>';
	echo '</div>';

	echo '<form method="post" onsubmit="return confirm(\'Are you sure? This will permanently replace the content of all 8 main pages with the default theme content. Any edits made to those pages will be lost and cannot be recovered.\')">';
	wp_nonce_field( 'maverick_reseed_pages' );
	submit_button( 'Reset All Pages to Default Theme Content', 'delete', 'maverick_reseed', false );
	echo '</form>';
	echo '</div>';
}

/**
 * Sanitise a block attribute that the editor exposes as a RichText field.
 *
 * RichText stores inline formatting as HTML ("<strong>", "<em>", "<br>"), so
 * running esc_html() on those values makes the client's bold text and line
 * breaks render as literal markup on the front end. This allows through the
 * inline tags RichText can actually produce and strips everything else, so
 * formatting works without opening the door to block-level or script markup.
 *
 * Use this for any attribute edited via <RichText>. Keep esc_html()/esc_url()
 * for plain-value attributes such as URLs, emails and icon slugs.
 *
 * @param mixed $value Raw attribute value.
 * @return string Sanitised HTML safe to echo.
 */
function maverick_kses_inline( $value ) {
	static $allowed = null;

	if ( null === $allowed ) {
		$allowed = [
			'strong' => [],
			'b'      => [],
			'em'     => [],
			'i'      => [],
			'br'     => [],
			's'      => [],
			'del'    => [],
			'ins'    => [],
			'sub'    => [],
			'sup'    => [],
			'mark'   => [],
			'code'   => [],
			'span'   => [ 'class' => [] ],
			'a'      => [
				'href'   => [],
				'target' => [],
				'rel'    => [],
				'title'  => [],
			],
		];
	}

	return wp_kses( (string) $value, $allowed );
}

/**
 * True when a RichText value has no visible text (ignoring any inline markup).
 * Lets render templates skip empty elements that would otherwise leave a gap.
 *
 * @param mixed $value Raw attribute value.
 * @return bool
 */
function maverick_richtext_is_empty( $value ) {
	return '' === trim( wp_strip_all_tags( (string) $value ) );
}
