import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, ToggleControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { question, answer, isOpen } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-faq-item' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Display" initialOpen>
						<ToggleControl
							label="Open by default"
							checked={ isOpen }
							onChange={ ( v ) => setAttributes( { isOpen: v } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mfi-summary">
						<RichText
							tagName="span"
							value={ question }
							onChange={ ( val ) => setAttributes( { question: val } ) }
							placeholder="Question…"
						/>
						<span className="mfi-toggle" aria-hidden="true">+</span>
					</div>
					<RichText
						tagName="p"
						className="mfi-answer"
						value={ answer }
						onChange={ ( val ) => setAttributes( { answer: val } ) }
						placeholder="Answer…"
					/>
				</div>
			</>
		);
	},
} );
