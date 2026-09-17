<?php
$quote    = wp_kses_post( $attributes['quote'] ?? '' );
$name     = maverick_kses_inline( $attributes['name'] ?? '' );
$role     = maverick_kses_inline( $attributes['role'] ?? '' );
$initials = esc_html( strtoupper( substr( $attributes['initials'] ?? 'AB', 0, 3 ) ) );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-testimonial-card' ] ); ?>>
	<blockquote class="mtc-quote"><?php echo $quote; ?></blockquote>
	<hr class="mtc-divider" />
	<div class="mtc-attribution">
		<div class="mtc-avatar" aria-hidden="true"><?php echo $initials; ?></div>
		<div class="mtc-meta">
			<p class="mtc-name"><?php echo $name; ?></p>
			<p class="mtc-role"><?php echo $role; ?></p>
		</div>
	</div>
</div>
