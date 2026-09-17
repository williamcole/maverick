<?php
$name = maverick_kses_inline( $attributes['name'] ?? '' );
$role = maverick_kses_inline( $attributes['role'] ?? '' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-roster-cell' ] ); ?>>
	<div class="mrc-name"><?php echo $name; ?></div>
	<div class="mrc-role"><?php echo $role; ?></div>
</div>
