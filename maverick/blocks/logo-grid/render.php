<?php
$logos = $attributes['logos'] ?? [];
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-logo-grid' ] ); ?>>
	<?php foreach ( $logos as $logo ) : ?>
	<div class="mlg-cell">
		<img src="<?php echo esc_url( $logo['url'] ?? '' ); ?>"
		     alt="<?php echo esc_attr( $logo['alt'] ?? '' ); ?>" />
	</div>
	<?php endforeach; ?>
</div>
