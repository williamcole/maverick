import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { imageUrl, imageAlt, initial, name, title, bio } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-team-member' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Photo (optional)" initialOpen>
						<p style={ { fontSize: 12, color: '#757575' } }>If no photo is set, a navy initial avatar is shown instead.</p>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
								allowedTypes={ [ 'image' ] }
								value={ imageUrl }
								render={ ( { open } ) => (
									<Button onClick={ open } variant="secondary" style={ { marginBottom: 8 } }>
										{ imageUrl ? 'Replace Photo' : 'Select Photo' }
									</Button>
								) }
							/>
						</MediaUploadCheck>
						{ imageUrl && (
							<Button isDestructive variant="link" onClick={ () => setAttributes( { imageUrl: '', imageAlt: '' } ) }>
								Remove photo
							</Button>
						) }
					</PanelBody>
					<PanelBody title="Initial (fallback avatar)" initialOpen={ false }>
						<TextControl
							label="Letter"
							value={ initial }
							onChange={ ( val ) => setAttributes( { initial: val.slice( 0, 1 ).toUpperCase() } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mtm-avatar" style={ imageUrl ? { backgroundImage: `url(${ imageUrl })` } : {} }>
						{ ! imageUrl && <span className="mtm-initial">{ initial }</span> }
					</div>
					<div className="mtm-info">
						<RichText
							tagName="h5"
							className="mtm-name"
							value={ name }
							onChange={ ( val ) => setAttributes( { name: val } ) }
							placeholder="Full Name"
						/>
						<RichText
							tagName="div"
							className="mtm-title"
							value={ title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
							placeholder="Job Title"
						/>
						<RichText
							tagName="p"
							className="mtm-bio"
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
