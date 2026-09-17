import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { eyebrow, heading, body, primaryLabel, primaryUrl, secondaryLabel, secondaryUrl, phone } = attributes;
		// Match the front end: the secondary button needs a destination, and the
		// phone line needs actual digits, or neither renders.
		const hasSecondary = !! ( secondaryUrl && secondaryUrl !== '#' );
		const hasPhone = !! ( phone && /\d/.test( phone ) );
		const blockProps = useBlockProps( { className: 'maverick-cta-section' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Primary Button" initialOpen>
						<TextControl label="URL" value={ primaryUrl } onChange={ ( v ) => setAttributes( { primaryUrl: v } ) } />
					</PanelBody>
					<PanelBody title="Secondary Button" initialOpen={ false }>
						<TextControl label="URL" value={ secondaryUrl } onChange={ ( v ) => setAttributes( { secondaryUrl: v } ) } />
					</PanelBody>
					<PanelBody title="Contact" initialOpen={ false }>
						<TextControl label="Phone number" value={ phone } onChange={ ( v ) => setAttributes( { phone: v } ) } />
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mcs-inner">
					<div className="mcs-left">
						<RichText tagName="p" className="mcs-eyebrow" value={ eyebrow } onChange={ ( v ) => setAttributes( { eyebrow: v } ) } placeholder="Eyebrow…" />
						<RichText tagName="h2" className="mcs-heading" value={ heading } onChange={ ( v ) => setAttributes( { heading: v } ) } placeholder="Heading…" />
					</div>
					<div className="mcs-right">
						<RichText tagName="p" className="mcs-body" value={ body } onChange={ ( v ) => setAttributes( { body: v } ) } placeholder="Body copy…" />
						<div className="mcs-buttons">
							<RichText tagName="span" className="mcs-btn mcs-btn--primary" value={ primaryLabel } onChange={ ( v ) => setAttributes( { primaryLabel: v } ) } placeholder="Primary CTA" />
							{ hasSecondary && (
								<RichText tagName="span" className="mcs-btn mcs-btn--secondary" value={ secondaryLabel } onChange={ ( v ) => setAttributes( { secondaryLabel: v } ) } placeholder="Secondary CTA" />
							) }
						</div>
						{ hasPhone && (
							<p className="mcs-phone">Or call us directly: <strong>{ phone }</strong></p>
						) }
					</div>
					</div>{/* mcs-inner */}
				</div>
			</>
		);
	},
} );
