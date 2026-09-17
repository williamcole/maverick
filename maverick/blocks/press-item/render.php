<?php
$variant    = in_array( $attributes['variant'] ?? '', [ 'coverage', 'release' ], true ) ? $attributes['variant'] : 'coverage';
$is_release = 'release' === $variant;
$date       = maverick_kses_inline( $attributes['date']     ?? '' );
$outlet     = maverick_kses_inline( $attributes['outlet']   ?? '' );
$title      = maverick_kses_inline( $attributes['title']    ?? '' );
$excerpt    = maverick_kses_inline( $attributes['excerpt']  ?? '' );
$link_url   = esc_url( $attributes['linkUrl']   ?? '#' );
$link_text  = maverick_kses_inline( $attributes['linkText'] ?? ( $is_release ? 'Download →' : 'Read →' ) );
$class      = 'maverick-press-item is-' . $variant;
?>
<a href="<?php echo $link_url; ?>" <?php echo get_block_wrapper_attributes( [ 'class' => $class ] ); ?>>
	<span class="mpi-date"><?php echo $date; ?></span>
	<div class="mpi-body">
		<span class="mpi-title"><?php echo $title; ?></span>
		<?php if ( $is_release && $excerpt ) : ?><p class="mpi-excerpt"><?php echo $excerpt; ?></p><?php endif; ?>
	</div>
	<?php if ( ! $is_release && $outlet ) : ?><span class="mpi-outlet"><?php echo $outlet; ?></span><?php endif; ?>
	<span class="mpi-link"><?php echo $link_text; ?></span>
</a>
