import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { label, meta, fileUrl } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-media-kit-row' } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="File" initialOpen>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( media ) => setAttributes( { fileUrl: media.url } ) }
								render={ ( { open } ) => (
									<Button onClick={ open } variant="secondary">
										{ fileUrl ? 'Replace File' : 'Select File' }
									</Button>
								) }
							/>
						</MediaUploadCheck>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mkr-icon" aria-hidden="true">↓</div>
					<div className="mkr-text">
						<RichText tagName="div" className="mkr-label" value={ label } onChange={ ( v ) => setAttributes( { label: v } ) } placeholder="Asset name…" />
						<RichText tagName="div" className="mkr-meta" value={ meta } onChange={ ( v ) => setAttributes( { meta: v } ) } placeholder="File type · size…" />
					</div>
				</div>
			</>
		);
	},
} );
