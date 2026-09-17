import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, SelectControl, Button } from '@wordpress/components';
import metadata from './block.json';

const ICONS = {
	strategy: <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2 2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>,
	mail:     <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M2 5.5A1.5 1.5 0 0 1 3.5 4h17A1.5 1.5 0 0 1 22 5.5v.85l-10 5.83-10-5.83V5.5zm0 3.16V18.5A1.5 1.5 0 0 0 3.5 20h17a1.5 1.5 0 0 0 1.5-1.5V8.66l-9.49 5.53a1 1 0 0 1-1.02 0L2 8.66z"/></svg>,
	ad:       <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 10v4a1 1 0 0 0 1 1h2l5 4V5L6 9H4a1 1 0 0 0-1 1zm13.5 2a4.5 4.5 0 0 0-2.5-4.03v8.06A4.5 4.5 0 0 0 16.5 12zM14 3.23v2.06a7 7 0 0 1 0 13.42v2.06a9 9 0 0 0 0-17.54z"/></svg>,
	chart:    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M5 21V9h3v12H5zm6 0V3h3v18h-3zm6 0v-7h3v7h-3z"/></svg>,
	magnet:   <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9 2h2v9a3 3 0 0 0 6 0V2h2v9a5 5 0 0 1-10 0V2zM5 2h2v9a7 7 0 0 0 14 0V2h2v9a9 9 0 0 1-18 0V2z"/></svg>,
	pen:      <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>,
};

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { icon, title, description, features, iconImageUrl, iconImageActiveUrl, iconImageAlt } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-service-card is-editing' } );
		const list = Array.isArray( features ) ? features : [];

		const updateFeature = ( index, value ) => {
			const next = [ ...list ];
			next[ index ] = value;
			setAttributes( { features: next } );
		};
		const addFeature = () => setAttributes( { features: [ ...list, '' ] } );
		const removeFeature = ( index ) =>
			setAttributes( { features: list.filter( ( _, i ) => i !== index ) } );
		// Pressing Enter inside a feature inserts the next one, so the whole list
		// can be typed straight through without reaching for the button.
		const splitFeature = ( index ) => {
			const next = [ ...list ];
			next.splice( index + 1, 0, '' );
			setAttributes( { features: next } );
		};

		return (
			<>
				<InspectorControls>
					<PanelBody title="Icon" initialOpen>
						<SelectControl
							label="Card icon"
							value={ icon }
							options={ [
								{ label: 'Strategy', value: 'strategy' },
								{ label: 'Mail', value: 'mail' },
								{ label: 'Ad', value: 'ad' },
								{ label: 'Chart', value: 'chart' },
								{ label: 'Magnet', value: 'magnet' },
								{ label: 'Pen', value: 'pen' },
							] }
							onChange={ ( v ) => setAttributes( { icon: v } ) }
							help="Title, description and the feature list are all edited directly on the card."
						/>
					</PanelBody>
					<PanelBody title="Custom icon" initialOpen={ !! iconImageUrl }>
						<p style={ { fontSize: '12px', color: '#757575', marginTop: 0 } }>
							Upload your own icon to replace the built-in one. Add the
							“active” version too and it will show on hover.
						</p>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( m ) => setAttributes( {
									iconImageId: m.id,
									iconImageUrl: m.url,
									iconImageAlt: m.alt || '',
								} ) }
								allowedTypes={ [ 'image' ] }
								value={ attributes.iconImageId }
								render={ ( { open } ) => (
									<div style={ { marginBottom: '12px' } }>
										{ iconImageUrl && (
											<img src={ iconImageUrl } alt="" style={ { width: 52, height: 52, objectFit: 'contain', display: 'block', marginBottom: 6 } } />
										) }
										<Button variant="secondary" onClick={ open }>
											{ iconImageUrl ? 'Replace icon' : 'Select icon' }
										</Button>
										{ iconImageUrl && (
											<Button variant="link" isDestructive style={ { marginLeft: 8 } }
												onClick={ () => setAttributes( { iconImageId: undefined, iconImageUrl: '', iconImageAlt: '' } ) }>
												Remove
											</Button>
										) }
									</div>
								) }
							/>
						</MediaUploadCheck>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ ( m ) => setAttributes( {
									iconImageActiveId: m.id,
									iconImageActiveUrl: m.url,
								} ) }
								allowedTypes={ [ 'image' ] }
								value={ attributes.iconImageActiveId }
								render={ ( { open } ) => (
									<div>
										{ iconImageActiveUrl && (
											<img src={ iconImageActiveUrl } alt="" style={ { width: 52, height: 52, objectFit: 'contain', display: 'block', marginBottom: 6 } } />
										) }
										<Button variant="secondary" onClick={ open } disabled={ ! iconImageUrl }>
											{ iconImageActiveUrl ? 'Replace active icon' : 'Select active (hover) icon' }
										</Button>
										{ iconImageActiveUrl && (
											<Button variant="link" isDestructive style={ { marginLeft: 8 } }
												onClick={ () => setAttributes( { iconImageActiveId: undefined, iconImageActiveUrl: '' } ) }>
												Remove
											</Button>
										) }
									</div>
								) }
							/>
						</MediaUploadCheck>
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<div className={ iconImageUrl ? "msvc-icon msvc-icon--image" : "msvc-icon" }>
						{ iconImageUrl
							? <img className="msvc-icon-img msvc-icon-img--default" src={ iconImageUrl } alt={ iconImageAlt || "" } />
							: ( ICONS[ icon ] || ICONS.strategy ) }
					</div>
					<RichText
						tagName="h3"
						className="msvc-title"
						value={ title }
						onChange={ ( val ) => setAttributes( { title: val } ) }
						placeholder="Service title…"
					/>
					<RichText
						tagName="p"
						className="msvc-desc"
						value={ description }
						onChange={ ( val ) => setAttributes( { description: val } ) }
						placeholder="Description (optional)…"
					/>

					{ /* Feature list — edited inline, directly on the card. */ }
					<ul className="msvc-features">
						{ list.map( ( f, i ) => (
							<li key={ i } className="msvc-feature-edit">
								<RichText
									tagName="span"
									className="msvc-feature-text"
									value={ f }
									onChange={ ( v ) => updateFeature( i, v ) }
									onSplit={ () => splitFeature( i ) }
									onReplace={ () => {} }
									placeholder="Feature…"
								/>
								<Button
									className="msvc-feature-remove"
									isDestructive
									variant="link"
									label="Remove feature"
									showTooltip
									onClick={ () => removeFeature( i ) }
								>
									✕
								</Button>
							</li>
						) ) }
					</ul>
					<Button
						className="msvc-feature-add"
						variant="secondary"
						onClick={ addFeature }
					>
						+ Add feature
					</Button>
				</div>
			</>
		);
	},
} );
