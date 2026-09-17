import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { label, title, description, linkUrl, linkText } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-pillar-card' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Link" initialOpen>
						<TextControl
							label="URL"
							value={ linkUrl }
							onChange={ ( v ) => setAttributes( { linkUrl: v } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText
						tagName="div"
						className="mpl-label"
						value={ label }
						onChange={ ( val ) => setAttributes( { label: val } ) }
						placeholder="Label…"
					/>
					<RichText
						tagName="h3"
						className="mpl-title"
						value={ title }
						onChange={ ( val ) => setAttributes( { title: val } ) }
						placeholder="Pillar title…"
					/>
					<RichText
						tagName="p"
						className="mpl-desc"
						value={ description }
						onChange={ ( val ) => setAttributes( { description: val } ) }
						placeholder="Description…"
					/>
					<div className="mpl-link">
						<RichText
							tagName="span"
							value={ linkText }
							onChange={ ( val ) => setAttributes( { linkText: val } ) }
							placeholder="Link text…"
						/>
						<span className="mpl-arrow" aria-hidden="true">→</span>
					</div>
				</div>
			</>
		);
	},
} );
