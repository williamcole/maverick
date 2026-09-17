import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { year, title, description, isLast } = attributes;
		const blockProps = useBlockProps( {
			className: `maverick-timeline-item${ isLast ? ' is-last' : '' }`,
		} );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Position" initialOpen>
						<ToggleControl
							label="Last item in timeline"
							help="Removes the bottom spacing — enable this on the final timeline item only."
							checked={ isLast }
							onChange={ ( val ) => setAttributes( { isLast: val } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText
						tagName="div"
						className="mti-year"
						value={ year }
						onChange={ ( val ) => setAttributes( { year: val } ) }
						placeholder="2024"
					/>
					<div className="mti-body">
						<RichText
							tagName="h4"
							className="mti-title"
							value={ title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
							placeholder="Milestone title…"
						/>
						<RichText
							tagName="p"
							className="mti-desc"
							value={ description }
							onChange={ ( val ) => setAttributes( { description: val } ) }
							placeholder="Description…"
						/>
					</div>
				</div>
			</>
		);
	},
} );
