import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { city, label, addressLine1, addressLine2, phone } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-office-card' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Phone" initialOpen>
						<TextControl
							label="Phone number"
							value={ phone }
							onChange={ ( v ) => setAttributes( { phone: v } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText
						tagName="div"
						className="moc-city"
						value={ city }
						onChange={ ( val ) => setAttributes( { city: val } ) }
						placeholder="City"
					/>
					<RichText
						tagName="h4"
						className="moc-label"
						value={ label }
						onChange={ ( val ) => setAttributes( { label: val } ) }
						placeholder="Office"
					/>
					<div className="moc-address">
						<RichText
							tagName="span"
							value={ addressLine1 }
							onChange={ ( val ) => setAttributes( { addressLine1: val } ) }
							placeholder="Street address"
						/>
						<br />
						<RichText
							tagName="span"
							value={ addressLine2 }
							onChange={ ( val ) => setAttributes( { addressLine2: val } ) }
							placeholder="City, State ZIP"
						/>
					</div>
					<span className="moc-tel">{ phone }</span>
				</div>
			</>
		);
	},
} );
