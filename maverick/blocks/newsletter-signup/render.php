<?php
$eyebrow      = maverick_kses_inline( $attributes['eyebrow']      ?? '' );
$heading      = wp_kses_post( $attributes['heading']  ?? '' );
$body         = maverick_kses_inline( $attributes['body']         ?? '' );
$placeholder  = esc_attr( $attributes['placeholder']  ?? 'you@yourcampaign.org' );
$button_label = maverick_kses_inline( $attributes['buttonLabel']  ?? 'Subscribe →' );
$form_action  = esc_url( $attributes['formAction']    ?? '' );

// Default to the WordPress admin-post.php endpoint if no external ESP URL was set.
$action_url = $form_action ?: admin_url( 'admin-post.php' );
$is_internal = empty( $form_action );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-newsletter-signup' ] ); ?>>
	<div class="mns-grid">
		<div class="mns-text">
			<?php if ( $eyebrow ) : ?>
				<span class="mns-eyebrow"><?php echo $eyebrow; ?></span>
			<?php endif; ?>
			<h2 class="mns-heading"><?php echo $heading; ?></h2>
			<?php if ( $body ) : ?>
				<p class="mns-body"><?php echo $body; ?></p>
			<?php endif; ?>
		</div>
		<form class="mns-form" method="post" action="<?php echo esc_url( $action_url ); ?>">
			<?php if ( $is_internal ) : ?>
				<input type="hidden" name="action" value="maverick_newsletter_signup" />
				<?php wp_nonce_field( 'maverick_newsletter_signup', 'maverick_newsletter_nonce' ); ?>
			<?php endif; ?>
			<input type="email" name="email" required placeholder="<?php echo $placeholder; ?>" class="mns-input" />
			<button type="submit" class="mns-submit"><?php echo $button_label; ?></button>
		</form>
	</div>
</div>
