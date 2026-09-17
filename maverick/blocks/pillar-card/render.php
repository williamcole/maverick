<?php
$label       = maverick_kses_inline( $attributes['label']       ?? '' );
$title       = maverick_kses_inline( $attributes['title']       ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
$link_url    = esc_url( $attributes['linkUrl']       ?? '#' );
$link_text   = maverick_kses_inline( $attributes['linkText']     ?? 'Learn more' );
?>
<a href="<?php echo $link_url; ?>" <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-pillar-card' ] ); ?>>
	<div class="mpl-label"><?php echo $label; ?></div>
	<h3 class="mpl-title"><?php echo $title; ?></h3>
	<p class="mpl-desc"><?php echo $description; ?></p>
	<div class="mpl-link">
		<span><?php echo $link_text; ?></span>
		<span class="mpl-arrow" aria-hidden="true">→</span>
	</div>
</a>
