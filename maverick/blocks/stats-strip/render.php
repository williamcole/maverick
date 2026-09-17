<?php
$stats = $attributes['stats'] ?? [];
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-stats-strip' ] ); ?>>
	<?php foreach ( $stats as $stat ) :
		$number = esc_html( $stat['number'] ?? '' );
		$suffix = esc_html( $stat['suffix'] ?? '' );
		$label  = esc_html( $stat['label']  ?? '' );
	?>
	<div class="mss-stat">
		<div class="mss-number">
			<?php echo $number; ?>
			<span class="mss-suffix"><?php echo $suffix; ?></span>
		</div>
		<div class="mss-label"><?php echo $label; ?></div>
	</div>
	<?php endforeach; ?>
</div>
