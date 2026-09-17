import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { imageUrl, imageAlt, tagText, resultText, metaText, title, excerpt, linkUrl } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-case-tile' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Photo" initialOpen>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
								allowedTypes={ [ 'image' ] }
								value={ imageUrl }
								render={ ( { open } ) => (
									<Button onClick={ open } variant="secondary">{ imageUrl ? 'Replace Photo' : 'Select Photo' }</Button>
								) }
							/>
						</MediaUploadCheck>
					</PanelBody>
					<PanelBody title="Link" initialOpen={ false }>
						<TextControl label="URL" value={ linkUrl } onChange={ ( v ) => setAttributes( { linkUrl: v } ) } />
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mct-thumb" style={ imageUrl ? { backgroundImage: `url(${ imageUrl })` } : {} }>
						{ ! imageUrl && (
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
									allowedTypes={ [ 'image' ] }
									render={ ( { open } ) => (
										<Button onClick={ open } className="mct-thumb-placeholder">+ Add Photo</Button>
									) }
								/>
							</MediaUploadCheck>
						) }
						<RichText tagName="span" className="mct-tag" value={ tagText } onChange={ ( v ) => setAttributes( { tagText: v } ) } placeholder="Tag…" />
						<RichText tagName="span" className="mct-result" value={ resultText } onChange={ ( v ) => setAttributes( { resultText: v } ) } placeholder="Result…" />
					</div>
					<div className="mct-body">
						<RichText tagName="div" className="mct-meta" value={ metaText } onChange={ ( v ) => setAttributes( { metaText: v } ) } placeholder="Meta…" />
						<RichText tagName="h3" className="mct-title" value={ title } onChange={ ( v ) => setAttributes( { title: v } ) } placeholder="Title…" />
						<RichText tagName="p" className="mct-excerpt" value={ excerpt } onChange={ ( v ) => setAttributes( { excerpt: v } ) } placeholder="Excerpt…" />
					</div>
				</div>
			</>
		);
	},
} );
