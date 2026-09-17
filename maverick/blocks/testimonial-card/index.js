import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { quote, name, role, initials } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-testimonial-card' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Attribution" initialOpen>
						<TextControl
							label="Initials (avatar)"
							value={ initials }
							onChange={ ( val ) => setAttributes( { initials: val.slice( 0, 3 ) } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText
						tagName="blockquote"
						className="mtc-quote"
						value={ quote }
						onChange={ ( val ) => setAttributes( { quote: val } ) }
						placeholder="Enter testimonial…"
					/>
					<hr className="mtc-divider" />
					<div className="mtc-attribution">
						<div className="mtc-avatar">{ initials }</div>
						<div className="mtc-meta">
							<RichText
								tagName="p"
								className="mtc-name"
								value={ name }
								onChange={ ( val ) => setAttributes( { name: val } ) }
								placeholder="Full Name"
							/>
							<RichText
								tagName="p"
								className="mtc-role"
								value={ role }
								onChange={ ( val ) => setAttributes( { role: val } ) }
								placeholder="Title · Organization"
							/>
						</div>
					</div>
				</div>
			</>
		);
	},
} );
