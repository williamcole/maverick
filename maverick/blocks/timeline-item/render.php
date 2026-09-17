<?php
$year        = maverick_kses_inline( $attributes['year']        ?? '' );
$title       = maverick_kses_inline( $attributes['title']       ?? '' );
$description = maverick_kses_inline( $attributes['description'] ?? '' );
$is_last     = ! empty( $attributes['isLast'] );

$class = 'maverick-timeline-item' . ( $is_last ? ' is-last' : '' );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $class ] ); ?>>
	<div class="mti-year"><?php echo $year; ?></div>
	<div class="mti-body">
		<h4 class="mti-title"><?php echo $title; ?></h4>
		<p class="mti-desc"><?php echo $description; ?></p>
	</div>
</div>
