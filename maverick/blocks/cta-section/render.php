<?php
$eyebrow        = maverick_kses_inline( $attributes['eyebrow']        ?? '' );
$heading        = wp_kses_post( $attributes['heading']    ?? '' );
$body           = maverick_kses_inline( $attributes['body']           ?? '' );
$primary_label  = maverick_kses_inline( $attributes['primaryLabel']   ?? '' );
$primary_url    = esc_url(  $attributes['primaryUrl']     ?? '' );
$secondary_label = maverick_kses_inline( $attributes['secondaryLabel'] ?? '' );
$secondary_url  = esc_url(  $attributes['secondaryUrl']   ?? '' );
$phone          = trim( (string) ( $attributes['phone']   ?? '' ) );

// A button renders only when it has a destination; a blank label on a real
// link still shows, so fall back to sensible text rather than an empty button.
$has_primary   = '' !== $primary_url && '#' !== $primary_url;
$has_secondary = '' !== $secondary_url && '#' !== $secondary_url;
if ( $has_primary && '' === trim( wp_strip_all_tags( $primary_label ) ) ) {
	$primary_label = 'Partner With Us →';
}
if ( $has_secondary && '' === trim( wp_strip_all_tags( $secondary_label ) ) ) {
	$secondary_label = 'Schedule a Call →';
}

// Only treat the phone as present if it contains actual digits.
$phone_digits = preg_replace( '/[^\d+]/', '', $phone );
$has_phone    = '' !== $phone && '' !== preg_replace( '/[^\d]/', '', $phone_digits );
$phone_url    = 'tel:' . $phone_digits;
$phone        = esc_html( $phone );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-cta-section' ] ); ?>>
	<div class="mcs-inner">
		<div class="mcs-left">
			<?php if ( $eyebrow ) : ?>
				<p class="mcs-eyebrow"><?php echo $eyebrow; ?></p>
			<?php endif; ?>
			<h2 class="mcs-heading"><?php echo $heading; ?></h2>
		</div>
		<div class="mcs-right">
			<?php if ( $body ) : ?>
				<p class="mcs-body"><?php echo $body; ?></p>
			<?php endif; ?>
			<?php if ( $has_primary || $has_secondary ) : ?>
				<div class="mcs-buttons">
					<?php if ( $has_primary ) : ?>
						<a href="<?php echo $primary_url; ?>" class="mcs-btn mcs-btn--primary"><?php echo $primary_label; ?></a>
					<?php endif; ?>
					<?php if ( $has_secondary ) : ?>
						<a href="<?php echo $secondary_url; ?>" class="mcs-btn mcs-btn--secondary"><?php echo $secondary_label; ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<?php if ( $has_phone ) : ?>
				<p class="mcs-phone">Or call us directly: <a href="<?php echo esc_url( $phone_url ); ?>"><strong><?php echo $phone; ?></strong></a></p>
			<?php endif; ?>
		</div>
	</div>
</div>
