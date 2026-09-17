import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { initial, name, title, bio } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-lead-card' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Avatar" initialOpen>
						<TextControl
							label="Initial letter"
							value={ initial }
							onChange={ ( v ) => setAttributes( { initial: v.slice( 0, 1 ).toUpperCase() } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mlc-av">{ initial }</div>
					<div className="mlc-who">
						<RichText
							tagName="h5"
							className="mlc-name"
							value={ name }
							onChange={ ( val ) => setAttributes( { name: val } ) }
							placeholder="Full Name"
						/>
						<RichText
							tagName="div"
							className="mlc-title"
							value={ title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
							placeholder="Job Title"
						/>
						<RichText
							tagName="p"
							value={ bio }
							onChange={ ( val ) => setAttributes( { bio: val } ) }
							placeholder="Short bio…"
						/>
					</div>
				</div>
			</>
		);
	},
} );
