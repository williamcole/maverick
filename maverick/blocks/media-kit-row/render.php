<?php
$label    = maverick_kses_inline( $attributes['label']   ?? '' );
$meta     = maverick_kses_inline( $attributes['meta']    ?? '' );
$file_url = esc_url( $attributes['fileUrl']  ?? '#' );
?>
<a href="<?php echo $file_url; ?>" download <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-media-kit-row' ] ); ?>>
	<div class="mkr-icon" aria-hidden="true">↓</div>
	<div class="mkr-text">
		<div class="mkr-label"><?php echo $label; ?></div>
		<div class="mkr-meta"><?php echo $meta; ?></div>
	</div>
</a>
