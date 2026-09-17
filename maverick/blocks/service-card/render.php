<?php
$valid_icons = [ 'strategy', 'mail', 'ad', 'chart', 'magnet', 'pen' ];
$icon        = in_array( $attributes['icon'] ?? '', $valid_icons, true ) ? $attributes['icon'] : 'strategy';
$title       = maverick_kses_inline( $attributes['title']       ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
$features    = is_array( $attributes['features'] ?? null ) ? $attributes['features'] : [];

// Optional custom icon from the media library. When a default image is set it
// replaces the built-in SVG; an optional second image is shown on hover so the
// client's two-state icon artwork (default / active) works as designed.
$icon_url        = esc_url( $attributes['iconImageUrl']       ?? '' );
$icon_active_url = esc_url( $attributes['iconImageActiveUrl'] ?? '' );
$icon_alt        = esc_attr( $attributes['iconImageAlt']      ?? '' );
$has_custom_icon = '' !== $icon_url;

$icons = [
	'strategy' => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2 2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
	'mail'     => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h17A1.5 1.5 0 0 1 22 5.5v.85l-10 5.83-10-5.83V5.5zm0 3.16V18.5A1.5 1.5 0 0 0 3.5 20h17a1.5 1.5 0 0 0 1.5-1.5V8.66l-9.49 5.53a1 1 0 0 1-1.02 0L2 8.66z"/></svg>',
	'ad'       => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 10v4a1 1 0 0 0 1 1h2l5 4V5L6 9H4a1 1 0 0 0-1 1zm13.5 2a4.5 4.5 0 0 0-2.5-4.03v8.06A4.5 4.5 0 0 0 16.5 12zM14 3.23v2.06a7 7 0 0 1 0 13.42v2.06a9 9 0 0 0 0-17.54z"/></svg>',
	'chart'    => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M5 21V9h3v12H5zm6 0V3h3v18h-3zm6 0v-7h3v7h-3z"/></svg>',
	'magnet'   => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 2h2v9a3 3 0 0 0 6 0V2h2v9a5 5 0 0 1-10 0V2zM5 2h2v9a7 7 0 0 0 14 0V2h2v9a9 9 0 0 1-18 0V2z"/></svg>',
	'pen'      => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>',
];
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-service-card' ] ); ?>>
	<div class="msvc-icon<?php echo $has_custom_icon ? ' msvc-icon--image' : ''; ?>">
		<?php if ( $has_custom_icon ) : ?>
			<img class="msvc-icon-img msvc-icon-img--default" src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" loading="lazy" decoding="async" />
			<?php if ( '' !== $icon_active_url ) : ?>
				<img class="msvc-icon-img msvc-icon-img--active" src="<?php echo $icon_active_url; ?>" alt="" aria-hidden="true" loading="lazy" decoding="async" />
			<?php endif; ?>
		<?php else : ?>
			<?php echo $icons[ $icon ]; ?>
		<?php endif; ?>
	</div>
	<h3 class="msvc-title"><?php echo $title; ?></h3>
	<?php if ( ! maverick_richtext_is_empty( $description ) ) : ?>
		<p class="msvc-desc"><?php echo $description; ?></p>
	<?php endif; ?>
	<?php
	// Drop blank rows so an unfilled feature doesn't render an empty bullet.
	$features = array_values( array_filter(
		$features,
		static function ( $f ) {
			return ! maverick_richtext_is_empty( $f );
		}
	) );
	?>
	<?php if ( $features ) : ?>
		<ul class="msvc-features">
			<?php foreach ( $features as $feature ) : ?>
				<li><?php echo maverick_kses_inline( $feature ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
