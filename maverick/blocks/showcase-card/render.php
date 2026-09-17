<?php
/** @var array $attributes */
$image_url   = esc_url( $attributes['imageUrl'] ?? '' );
$image_alt   = esc_attr( $attributes['imageAlt'] ?? '' );
$badge       = maverick_kses_inline( $attributes['badgeLabel'] ?? '' );
$category    = maverick_kses_inline( $attributes['category'] ?? '' );
$title       = maverick_kses_inline( $attributes['title'] ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
$link_url    = esc_url( $attributes['linkUrl'] ?? '#' );
$link_text   = esc_html( $attributes['linkText'] ?? 'Read case study →' );
$bg_style    = $image_url ? "background-image:url({$image_url})" : '';
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-showcase-card' ] ); ?>>
	<div class="msc-image" style="<?php echo $bg_style; ?>">
		<?php if ( $badge ) : ?>
			<span class="msc-badge"><?php echo $badge; ?></span>
		<?php endif; ?>
	</div>
	<div class="msc-body">
		<?php if ( $category ) : ?>
			<p class="msc-category"><?php echo $category; ?></p>
		<?php endif; ?>
		<h3 class="msc-title"><?php echo $title; ?></h3>
		<p class="msc-desc"><?php echo $description; ?></p>
		<a href="<?php echo $link_url; ?>" class="msc-link"><?php echo $link_text; ?></a>
	</div>
</div>
