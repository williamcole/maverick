import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, Button, SelectControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { mode, imageUrl, imageAlt, badgeText, resultText, category, byline, title, excerpt, linkUrl, linkText } = attributes;
		const isPress = mode === 'press';
		const blockProps = useBlockProps( { className: `maverick-featured-case is-mode-${ mode }` } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Display Mode" initialOpen>
						<SelectControl
							label="Mode"
							help="Case: result-stat pill + sans headline. Press: byline/outlet + serif italic headline, no result pill."
							value={ mode }
							options={ [
								{ label: 'Case Study', value: 'case' },
								{ label: 'Press', value: 'press' },
							] }
							onChange={ ( v ) => setAttributes( { mode: v } ) }
						/>
					</PanelBody>
					<PanelBody title="Photo" initialOpen>
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
					</PanelBody>
					<PanelBody title="Link" initialOpen={ false }>
						<TextControl label="URL" value={ linkUrl } onChange={ ( v ) => setAttributes( { linkUrl: v } ) } />
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className="mfc-photo" style={ imageUrl ? { backgroundImage: `url(${ imageUrl })` } : {} }>
						{ ! imageUrl && (
							<MediaUploadCheck>
								<MediaUpload
									onSelect={ ( media ) => setAttributes( { imageUrl: media.url, imageAlt: media.alt } ) }
									allowedTypes={ [ 'image' ] }
									render={ ( { open } ) => (
										<Button onClick={ open } className="mfc-photo-placeholder">+ Add Photo</Button>
									) }
								/>
							</MediaUploadCheck>
						) }
						<RichText tagName="span" className="mfc-badge" value={ badgeText } onChange={ ( v ) => setAttributes( { badgeText: v } ) } placeholder="Badge…" />
						{ ! isPress && (
							<RichText tagName="span" className="mfc-result" value={ resultText } onChange={ ( v ) => setAttributes( { resultText: v } ) } placeholder="Result stat…" />
						) }
					</div>
					<div className="mfc-text">
						<RichText
							tagName="div"
							className="mfc-meta"
							value={ isPress ? byline : category }
							onChange={ ( v ) => setAttributes( isPress ? { byline: v } : { category: v } ) }
							placeholder={ isPress ? 'Outlet / byline…' : 'Category…' }
						/>
						<RichText tagName="h2" className="mfc-title" value={ title } onChange={ ( v ) => setAttributes( { title: v } ) } placeholder="Title…" />
						<RichText tagName="p" className="mfc-excerpt" value={ excerpt } onChange={ ( v ) => setAttributes( { excerpt: v } ) } placeholder="Excerpt…" />
						<RichText tagName="span" className="mfc-read" value={ linkText } onChange={ ( v ) => setAttributes( { linkText: v } ) } placeholder="Link text…" />
					</div>
				</div>
			</>
		);
	},
} );
