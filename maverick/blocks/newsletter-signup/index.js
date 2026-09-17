import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { eyebrow, heading, body, placeholder, buttonLabel, formAction } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-newsletter-signup' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Form Settings" initialOpen>
						<TextControl
							label="Form action URL"
							help="Where the email submits to (e.g. your ESP's endpoint). Leave blank to use the default WordPress handler."
							value={ formAction }
							onChange={ ( v ) => setAttributes( { formAction: v } ) }
						/>
						<TextControl
							label="Email placeholder text"
							value={ placeholder }
							onChange={ ( v ) => setAttributes( { placeholder: v } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mns-grid">
						<div className="mns-text">
							<RichText
								tagName="span"
								className="mns-eyebrow"
								value={ eyebrow }
								onChange={ ( v ) => setAttributes( { eyebrow: v } ) }
								placeholder="Eyebrow…"
							/>
							<RichText
								tagName="h2"
								className="mns-heading"
								value={ heading }
								onChange={ ( v ) => setAttributes( { heading: v } ) }
								placeholder="Heading…"
							/>
							<RichText
								tagName="p"
								className="mns-body"
								value={ body }
								onChange={ ( v ) => setAttributes( { body: v } ) }
								placeholder="Body copy…"
							/>
						</div>
						<div className="mns-form">
							<input type="email" disabled placeholder={ placeholder } className="mns-input" />
							<RichText
								tagName="span"
								className="mns-submit"
								value={ buttonLabel }
								onChange={ ( v ) => setAttributes( { buttonLabel: v } ) }
								placeholder="Button label…"
							/>
						</div>
					</div>
				</div>
			</>
		);
	},
} );
