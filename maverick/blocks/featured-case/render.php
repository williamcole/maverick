<?php
$mode        = in_array( $attributes['mode'] ?? '', [ 'case', 'press' ], true ) ? $attributes['mode'] : 'case';
$is_press    = 'press' === $mode;
$image_url   = esc_url( $attributes['imageUrl']   ?? '' );
$image_alt   = esc_attr( $attributes['imageAlt']  ?? '' );
$badge_text  = maverick_kses_inline( $attributes['badgeText']  ?? '' );
$result_text = maverick_kses_inline( $attributes['resultText'] ?? '' );
$category    = esc_html( $attributes['category']   ?? '' );
$byline      = esc_html( $attributes['byline']     ?? '' );
$title       = maverick_kses_inline( $attributes['title']      ?? '' );
$excerpt     = maverick_kses_inline( $attributes['excerpt']    ?? '' );
$link_url    = esc_url( $attributes['linkUrl']     ?? '#' );
$link_text   = maverick_kses_inline( $attributes['linkText']   ?? ( $is_press ? 'Read the coverage' : 'Read the case study' ) );
$bg_style    = $image_url ? "background-image:url({$image_url})" : '';
$meta_text   = $is_press ? $byline : $category;
$class       = 'maverick-featured-case is-mode-' . $mode;
?>
<a href="<?php echo $link_url; ?>" <?php echo get_block_wrapper_attributes( [ 'class' => $class ] ); ?>>
	<div class="mfc-photo" style="<?php echo $bg_style; ?>">
		<?php if ( $badge_text ) : ?><span class="mfc-badge"><?php echo $badge_text; ?></span><?php endif; ?>
		<?php if ( ! $is_press && $result_text ) : ?><span class="mfc-result"><?php echo $result_text; ?></span><?php endif; ?>
	</div>
	<div class="mfc-text">
		<?php if ( $meta_text ) : ?><div class="mfc-meta"><?php echo $meta_text; ?></div><?php endif; ?>
		<h2 class="mfc-title"><?php echo $title; ?></h2>
		<p class="mfc-excerpt"><?php echo $excerpt; ?></p>
		<span class="mfc-read"><?php echo $link_text; ?></span>
	</div>
</a>
