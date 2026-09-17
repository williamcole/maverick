<?php
$icon        = in_array( $attributes['icon'] ?? '', [ 'email', 'phone', 'star' ], true ) ? $attributes['icon'] : 'email';
$heading     = maverick_kses_inline( $attributes['heading']     ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
$link_text   = maverick_kses_inline( $attributes['linkText']    ?? '' );
$link_url    = esc_url( $attributes['linkUrl']      ?? '#' );
$is_dark     = ! empty( $attributes['isDark'] );

$icons = [
	'email' => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h17A1.5 1.5 0 0 1 22 5.5v.85l-10 5.83-10-5.83V5.5zm0 3.16V18.5A1.5 1.5 0 0 0 3.5 20h17a1.5 1.5 0 0 0 1.5-1.5V8.66l-9.49 5.53a1 1 0 0 1-1.02 0L2 8.66z"/></svg>',
	'phone' => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.32.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>',
	'star'  => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l2.78 6.78L22 9.5l-5.5 4.78L18.18 22 12 18.27 5.82 22 7.5 14.28 2 9.5l7.22-.72L12 2z"/></svg>',
];

$class = 'maverick-contact-card' . ( $is_dark ? ' is-dark' : '' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $class ] ); ?>>
	<div class="mcc-icon"><?php echo $icons[ $icon ]; ?></div>
	<h4 class="mcc-heading"><?php echo $heading; ?></h4>
	<p class="mcc-desc"><?php echo $description; ?></p>
	<a href="<?php echo esc_url( $link_url ); ?>" class="mcc-link"><?php echo $link_text; ?></a>
</div>
