<?php
$eyebrow    = maverick_kses_inline( $attributes['eyebrow']   ?? '' );
$heading    = wp_kses( $attributes['heading']    ?? '', [ 'em' => [], 'strong' => [], 'br' => [] ] );
$subheading = wp_kses( $attributes['subheading'] ?? '', [ 'em' => [], 'strong' => [] ] );
$background = in_array( $attributes['background'] ?? '', [ 'navy', 'navy-deep' ], true )
	? $attributes['background'] : 'navy';
$min_height = absint( $attributes['minHeight'] ?? 480 );
?>
<div <?php echo get_block_wrapper_attributes( [
	'class' => "maverick-hero maverick-hero--{$background} alignfull",
	'style' => "--mhero-min-height:{$min_height}px",
] ); ?>>
	<div class="mhero-inner">
		<?php if ( $eyebrow ) : ?>
			<p class="mhero-eyebrow"><?php echo $eyebrow; ?></p>
		<?php endif; ?>

		<h1 class="mhero-heading"><?php echo $heading; ?></h1>

		<?php if ( $subheading ) : ?>
			<p class="mhero-sub"><?php echo $subheading; ?></p>
		<?php endif; ?>
	</div>
</div>