<?php
$image_url   = esc_url( $attributes['imageUrl']   ?? '' );
$image_alt   = esc_attr( $attributes['imageAlt']  ?? '' );
$tag_text    = maverick_kses_inline( $attributes['tagText']    ?? '' );
$result_text = maverick_kses_inline( $attributes['resultText'] ?? '' );
$meta_text   = maverick_kses_inline( $attributes['metaText']   ?? '' );
$title       = maverick_kses_inline( $attributes['title']      ?? '' );
$excerpt     = maverick_kses_inline( $attributes['excerpt']    ?? '' );
$link_url    = esc_url( $attributes['linkUrl']     ?? '#' );
$bg_style    = $image_url ? "background-image:url({$image_url})" : '';
?>
<a href="<?php echo $link_url; ?>" <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-case-tile' ] ); ?>>
	<div class="mct-thumb" style="<?php echo $bg_style; ?>">
		<?php if ( $tag_text ) : ?><span class="mct-tag"><?php echo $tag_text; ?></span><?php endif; ?>
		<?php if ( $result_text ) : ?><span class="mct-result"><?php echo $result_text; ?></span><?php endif; ?>
	</div>
	<div class="mct-body">
		<?php if ( $meta_text ) : ?><div class="mct-meta"><?php echo $meta_text; ?></div><?php endif; ?>
		<h3 class="mct-title"><?php echo $title; ?></h3>
		<p class="mct-excerpt"><?php echo $excerpt; ?></p>
	</div>
</a>
