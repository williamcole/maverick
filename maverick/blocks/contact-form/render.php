<?php
$eyebrow      = maverick_kses_inline( $attributes['eyebrow']     ?? '' );
$heading      = wp_kses_post( $attributes['heading'] ?? '' );
$subheading   = maverick_kses_inline( $attributes['subheading']  ?? '' );
$button_label = esc_html( $attributes['buttonLabel'] ?? 'Send Inquiry →' );
$form_action  = esc_url( $attributes['formAction']   ?? '' );
$privacy_url  = esc_url( $attributes['privacyUrl']   ?? '/privacy' );

// Public address shown in the card, and where submissions are emailed. The
// notify address is signed below so it can't be swapped in a forged POST.
$contact_email = sanitize_email( $attributes['contactEmail'] ?? '' );
$notify_email  = sanitize_email( $attributes['notifyEmail']  ?? '' );

$action_url  = $form_action ?: admin_url( 'admin-post.php' );
$is_internal = empty( $form_action );

// Show a confirmation or error message if redirected back after submission.
$status = isset( $_GET['inquiry'] ) ? sanitize_text_field( wp_unslash( $_GET['inquiry'] ) ) : '';
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => 'maverick-contact-form' ] ); ?>>
	<span class="mcf-eyebrow"><?php echo $eyebrow; ?></span>
	<h2 class="mcf-heading"><?php echo $heading; ?></h2>
	<?php if ( $subheading ) : ?>
		<p class="mcf-sub"><?php echo $subheading; ?></p>
	<?php endif; ?>

	<?php if ( 'success' === $status ) : ?>
		<div class="mcf-status mcf-status--success" role="status">Thanks — your inquiry was sent. We'll reply within one business day.</div>
	<?php elseif ( 'invalid' === $status ) : ?>
		<div class="mcf-status mcf-status--error" role="alert">Please check your name, email, and message, then try again.</div>
	<?php endif; ?>

	<form class="mcf-grid" method="post" action="<?php echo esc_url( $action_url ); ?>">
		<?php if ( $is_internal ) : ?>
			<input type="hidden" name="action" value="maverick_contact_inquiry" />
			<?php wp_nonce_field( 'maverick_contact_inquiry', 'maverick_contact_nonce' ); ?>
			<?php if ( is_email( $notify_email ) ) : ?>
				<?php /* Signed so the recipient can't be altered client-side. */ ?>
				<input type="hidden" name="notify_email" value="<?php echo esc_attr( $notify_email ); ?>" />
				<input type="hidden" name="notify_sig" value="<?php echo esc_attr( wp_hash( 'maverick_notify|' . $notify_email ) ); ?>" />
			<?php endif; ?>
		<?php endif; ?>

		<div class="mcf-field">
			<label for="mcf-name">Your name</label>
			<input type="text" id="mcf-name" name="name" required placeholder="Jane Smith" />
		</div>
		<div class="mcf-field">
			<label for="mcf-org">Organization</label>
			<input type="text" id="mcf-org" name="organization" placeholder="Smith for Senate" />
		</div>
		<div class="mcf-field">
			<label for="mcf-email">Email</label>
			<input type="email" id="mcf-email" name="email" required placeholder="jane@campaign.org" />
		</div>
		<div class="mcf-field">
			<label for="mcf-phone">Phone (optional)</label>
			<input type="tel" id="mcf-phone" name="phone" placeholder="(202) 555-0100" />
		</div>
		<div class="mcf-field mcf-full">
			<label for="mcf-org-type">Type of organization</label>
			<input type="text" id="mcf-org-type" name="org_type" placeholder="Federal campaign (Senate / House / Presidential)" />
		</div>
		<div class="mcf-field mcf-full">
			<label for="mcf-message">What are you working on?</label>
			<textarea id="mcf-message" name="message" required placeholder="Cycle dates, current fundraising stage, what you'd like help with — short or long, whatever's useful."></textarea>
		</div>
		<div class="mcf-submit mcf-full">
			<button type="submit" class="mcf-btn"><?php echo $button_label; ?></button>
			<p class="mcf-privacy">
				We respond within one business day. By submitting, you agree to our
				<a href="<?php echo $privacy_url; ?>">privacy policy</a>.
			</p>
		</div>
	</form>

	<?php if ( is_email( $contact_email ) ) : ?>
		<p class="mcf-direct">
			You can also contact us directly at:
			<a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a>
		</p>
	<?php endif; ?>
</div>
