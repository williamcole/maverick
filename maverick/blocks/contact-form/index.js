import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

const ORG_TYPES = [
	'Federal campaign (Senate / House / Presidential)',
	'State / Gubernatorial campaign',
	'501(c)(4) advocacy organization',
	'PAC / Super PAC',
	'Party committee',
	'Other / Tell us below',
];

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { eyebrow, heading, subheading, buttonLabel, formAction, privacyUrl, contactEmail, notifyEmail } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-contact-form' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Form Settings" initialOpen>
						<TextControl
							label="Form action URL"
							help="Where the inquiry submits to (e.g. a CRM endpoint). Leave blank to use the default WordPress handler."
							value={ formAction }
							onChange={ ( v ) => setAttributes( { formAction: v } ) }
						/>
						<TextControl
							label="Privacy policy URL"
							value={ privacyUrl }
							onChange={ ( v ) => setAttributes( { privacyUrl: v } ) }
						/>
						<TextControl
							label="Contact email (shown in the form)"
							value={ contactEmail }
							onChange={ ( v ) => setAttributes( { contactEmail: v } ) }
							help="Displayed as the “contact us directly” link. Leave empty to hide that line."
						/>
						<TextControl
							label="Send notifications to"
							type="email"
							value={ notifyEmail }
							onChange={ ( v ) => setAttributes( { notifyEmail: v } ) }
							help="Where submissions are emailed. Leave empty to use the site admin email."
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText
						tagName="span"
						className="mcf-eyebrow"
						value={ eyebrow }
						onChange={ ( v ) => setAttributes( { eyebrow: v } ) }
						placeholder="Eyebrow…"
					/>
					<RichText
						tagName="h2"
						className="mcf-heading"
						value={ heading }
						onChange={ ( v ) => setAttributes( { heading: v } ) }
						placeholder="Heading…"
					/>
					<RichText
						tagName="p"
						className="mcf-sub"
						value={ subheading }
						onChange={ ( v ) => setAttributes( { subheading: v } ) }
						placeholder="Subheading…"
					/>

					<div className="mcf-grid" aria-hidden="true">
						<div className="mcf-field"><label>Your name</label><input type="text" disabled placeholder="Jane Smith" /></div>
						<div className="mcf-field"><label>Organization</label><input type="text" disabled placeholder="Smith for Senate" /></div>
						<div className="mcf-field"><label>Email</label><input type="email" disabled placeholder="jane@campaign.org" /></div>
						<div className="mcf-field"><label>Phone (optional)</label><input type="tel" disabled placeholder="(202) 555-0100" /></div>
						<div className="mcf-field mcf-full">
							<label>Type of organization</label>
							<input type="text" disabled placeholder={ ORG_TYPES[ 0 ] } />
						</div>
						<div className="mcf-field mcf-full">
							<label>What are you working on?</label>
							<textarea disabled placeholder="Cycle dates, current fundraising stage, what you'd like help with…" />
						</div>
						<div className="mcf-submit mcf-full">
							<span className="mcf-btn">{ buttonLabel }</span>
							<p className="mcf-privacy">
								We respond within one business day. By submitting, you agree to our <a href={ privacyUrl }>privacy policy</a>.
							</p>
						</div>
					</div>
					{ contactEmail && <p className="mcf-direct">
						You can also contact us directly at:{ ' ' }
						<a href={ `mailto:${ contactEmail }` }>{ contactEmail }</a>
					</p> }
					<p className="mcf-editor-note">Form fields render live on the front end. Editable here: eyebrow, heading, subheading, button label, and settings in the sidebar.</p>
				</div>
			</>
		);
	},
} );
