<?php
$number      = maverick_kses_inline( $attributes['number']      ?? '' );
$title       = maverick_kses_inline( $attributes['title']       ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-principle-card' ] ); ?>>
	<div class="mpc-num"><?php echo $number; ?></div>
	<h4 class="mpc-title"><?php echo $title; ?></h4>
	<p class="mpc-desc"><?php echo $description; ?></p>
</div>
