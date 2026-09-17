<?php
$image_url = esc_url( $attributes['imageUrl'] ?? '' );
$image_alt = esc_attr( $attributes['imageAlt'] ?? '' );
$initial   = esc_html( $attributes['initial']  ?? '' );
$name      = maverick_kses_inline( $attributes['name']     ?? '' );
$title     = maverick_kses_inline( $attributes['title']    ?? '' );
$bio       = maverick_kses_inline( $attributes['bio']      ?? '' );
$bg_style  = $image_url ? "background-image:url({$image_url})" : '';
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-team-member' ] ); ?>>
	<div class="mtm-avatar" style="<?php echo $bg_style; ?>" <?php echo $image_url ? 'role="img" aria-label="' . $image_alt . '"' : ''; ?>>
		<?php if ( ! $image_url ) : ?>
			<span class="mtm-initial"><?php echo $initial; ?></span>
		<?php endif; ?>
	</div>
	<div class="mtm-info">
		<h5 class="mtm-name"><?php echo $name; ?></h5>
		<div class="mtm-title"><?php echo $title; ?></div>
		<p class="mtm-bio"><?php echo $bio; ?></p>
	</div>
</div>
