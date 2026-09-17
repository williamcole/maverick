import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, ToggleControl, TextControl } from '@wordpress/components';
import metadata from './block.json';

const ICONS = {
	email: <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h17A1.5 1.5 0 0 1 22 5.5v.85l-10 5.83-10-5.83V5.5zm0 3.16V18.5A1.5 1.5 0 0 0 3.5 20h17a1.5 1.5 0 0 0 1.5-1.5V8.66l-9.49 5.53a1 1 0 0 1-1.02 0L2 8.66z"/></svg>,
	phone: <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.32.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1.02l-2.2 2.2z"/></svg>,
	star: <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2l2.78 6.78L22 9.5l-5.5 4.78L18.18 22 12 18.27 5.82 22 7.5 14.28 2 9.5l7.22-.72L12 2z"/></svg>,
};

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { icon, heading, description, linkText, linkUrl, isDark } = attributes;
		const blockProps = useBlockProps( {
			className: `maverick-contact-card${ isDark ? ' is-dark' : '' }`,
		} );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Card Settings" initialOpen>
						<SelectControl
							label="Icon"
							value={ icon }
							options={ [
								{ label: 'Email', value: 'email' },
								{ label: 'Phone', value: 'phone' },
								{ label: 'Star', value: 'star' },
							] }
							onChange={ ( v ) => setAttributes( { icon: v } ) }
						/>
						<ToggleControl
							label="Dark variant"
							checked={ isDark }
							onChange={ ( v ) => setAttributes( { isDark: v } ) }
						/>
						<TextControl
							label="Link URL"
							help="Use mailto: or tel: for direct contact links."
							value={ linkUrl }
							onChange={ ( v ) => setAttributes( { linkUrl: v } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mcc-icon">{ ICONS[ icon ] || ICONS.email }</div>
					<RichText
						tagName="h4"
						className="mcc-heading"
						value={ heading }
						onChange={ ( val ) => setAttributes( { heading: val } ) }
						placeholder="Heading…"
					/>
					<RichText
						tagName="p"
						className="mcc-desc"
						value={ description }
						onChange={ ( val ) => setAttributes( { description: val } ) }
						placeholder="Description…"
					/>
					<RichText
						tagName="span"
						className="mcc-link"
						value={ linkText }
						onChange={ ( val ) => setAttributes( { linkText: val } ) }
						placeholder="Link text…"
					/>
				</div>
			</>
		);
	},
} );
