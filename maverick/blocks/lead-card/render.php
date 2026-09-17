<?php
$initial = esc_html( $attributes['initial'] ?? '' );
$name    = maverick_kses_inline( $attributes['name']    ?? '' );
$title   = maverick_kses_inline( $attributes['title']   ?? '' );
$bio     = maverick_kses_inline( $attributes['bio']     ?? '' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-lead-card' ] ); ?>>
	<div class="mlc-av"><?php echo $initial; ?></div>
	<div class="mlc-who">
		<h5 class="mlc-name"><?php echo $name; ?></h5>
		<div class="mlc-title"><?php echo $title; ?></div>
		<p><?php echo $bio; ?></p>
	</div>
</div>
