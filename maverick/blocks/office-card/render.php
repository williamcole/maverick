<?php
$city          = maverick_kses_inline( $attributes['city']         ?? '' );
$label         = maverick_kses_inline( $attributes['label']        ?? '' );
$address_line1 = maverick_kses_inline( $attributes['addressLine1'] ?? '' );
$address_line2 = maverick_kses_inline( $attributes['addressLine2'] ?? '' );
$phone         = esc_html( $attributes['phone']        ?? '' );
$phone_href    = 'tel:' . preg_replace( '/[^\d+]/', '', $phone );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-office-card' ] ); ?>>
	<div class="moc-city"><?php echo $city; ?></div>
	<h4 class="moc-label"><?php echo $label; ?></h4>
	<address class="moc-address"><?php echo $address_line1; ?><br><?php echo $address_line2; ?></address>
	<a href="<?php echo esc_url( $phone_href ); ?>" class="moc-tel"><?php echo $phone; ?></a>
</div>
