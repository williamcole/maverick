import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, RangeControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { eyebrow, heading, subheading, background, minHeight } = attributes;

		const blockProps = useBlockProps( {
			className: `maverick-hero maverick-hero--${ background }`,
			style: {
				'--mhero-min-height': `${ minHeight }px`,
			},
		} );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Hero Settings" initialOpen>
						<SelectControl
							label="Background"
							value={ background }
							options={ [
								{ label: 'Navy', value: 'navy' },
								{ label: 'Navy Deep', value: 'navy-deep' },
							] }
							onChange={ ( v ) => setAttributes( { background: v } ) }
						/>
						<RangeControl
							label="Min Height (px)"
							value={ minHeight }
							onChange={ ( v ) => setAttributes( { minHeight: v } ) }
							min={ 300 }
							max={ 800 }
							step={ 20 }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mhero-inner">
						{ /* Eyebrow */ }
						<RichText
							tagName="p"
							className="mhero-eyebrow"
							value={ eyebrow }
							onChange={ ( v ) => setAttributes( { eyebrow: v } ) }
							placeholder="Eyebrow label (optional)…"
							allowedFormats={ [] }
						/>
						{ /* Headline */ }
						<RichText
							tagName="h1"
							className="mhero-heading"
							value={ heading }
							onChange={ ( v ) => setAttributes( { heading: v } ) }
							placeholder="Page headline…"
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
						/>
						{ /* Subheading */ }
						<RichText
							tagName="p"
							className="mhero-sub"
							value={ subheading }
							onChange={ ( v ) => setAttributes( { subheading: v } ) }
							placeholder="Subheading / lede (optional)…"
							allowedFormats={ [ 'core/bold', 'core/italic' ] }
						/>
					</div>
				</div>
			</>
		);
	},
} );
