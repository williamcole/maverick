import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { imageUrl, imageAlt, badgeLabel, category, title, description, linkUrl, linkText } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-showcase-card' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Image" initialOpen>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
								allowedTypes={ [ 'image' ] }
								value={ imageUrl }
								render={ ( { open } ) => (
									<Button onClick={ open } variant="secondary" style={ { marginBottom: 8 } }>
										{ imageUrl ? 'Replace Image' : 'Select Image' }
									</Button>
								) }
							/>
						</MediaUploadCheck>
						{ imageUrl && (
							<TextControl
								label="Alt text"
								value={ imageAlt }
								onChange={ ( val ) => setAttributes( { imageAlt: val } ) }
							/>
						) }
					</PanelBody>
					<PanelBody title="Link" initialOpen={ false }>
						<TextControl
							label="URL"
							value={ linkUrl }
							onChange={ ( val ) => setAttributes( { linkUrl: val } ) }
						/>
						<TextControl
							label="Link text"
							value={ linkText }
							onChange={ ( val ) => setAttributes( { linkText: val } ) }
						/>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="msc-image" style={ imageUrl ? { backgroundImage: `url(${ imageUrl })` } : {} }>
						{ ! imageUrl && (
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
									allowedTypes={ [ 'image' ] }
									render={ ( { open } ) => (
										<Button onClick={ open } className="msc-image-placeholder">
											+ Add Image
										</Button>
									) }
								/>
							</MediaUploadCheck>
						) }
						<RichText
							tagName="span"
							className="msc-badge"
							value={ badgeLabel }
							onChange={ ( val ) => setAttributes( { badgeLabel: val } ) }
							placeholder="Badge…"
						/>
					</div>
					<div className="msc-body">
						<RichText
							tagName="p"
							className="msc-category"
							value={ category }
							onChange={ ( val ) => setAttributes( { category: val } ) }
							placeholder="Category…"
						/>
						<RichText
							tagName="h3"
							className="msc-title"
							value={ title }
							onChange={ ( val ) => setAttributes( { title: val } ) }
							placeholder="Title…"
						/>
						<RichText
							tagName="p"
							className="msc-desc"
							value={ description }
							onChange={ ( val ) => setAttributes( { description: val } ) }
							placeholder="Description…"
						/>
						<p className="msc-link">{ linkText }</p>
					</div>
				</div>
			</>
		);
	},
} );
