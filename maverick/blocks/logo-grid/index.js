import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, MediaUpload, MediaUploadCheck, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { logos } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-logo-grid' } );

		const addLogos = ( media ) => {
			const newLogos = Array.isArray( media )
				? media.map( ( m ) => ( { url: m.url, alt: m.alt, id: m.id } ) )
				: [ { url: media.url, alt: media.alt, id: media.id } ];
			setAttributes( { logos: [ ...logos, ...newLogos ] } );
		};

		const removeLogo = ( index ) =>
			setAttributes( { logos: logos.filter( ( _, i ) => i !== index ) } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Logos" initialOpen>
						<p style={ { fontSize: 12, color: '#757575' } }>Upload SVG or PNG logos. They will display at 60% opacity and full opacity on hover.</p>
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ addLogos }
								allowedTypes={ [ 'image' ] }
								multiple
								gallery={ false }
								render={ ( { open } ) => (
									<Button variant="secondary" onClick={ open }>+ Add Logos</Button>
								) }
							/>
						</MediaUploadCheck>
						{ logos.length > 0 && (
							<div style={ { marginTop: 12 } }>
								{ logos.map( ( logo, i ) => (
									<div key={ i } style={ { display: 'flex', alignItems: 'center', gap: 8, marginBottom: 8 } }>
										<img src={ logo.url } alt={ logo.alt } style={ { height: 28, objectFit: 'contain', opacity: 0.6 } } />
										<Button isDestructive variant="link" onClick={ () => removeLogo( i ) }>✕</Button>
									</div>
								) ) }
							</div>
						) }
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					{ logos.length === 0 ? (
						<MediaUploadCheck>
							<MediaUpload
								onSelect={ addLogos }
								allowedTypes={ [ 'image' ] }
								multiple
								render={ ( { open } ) => (
									<Button className="mlg-placeholder" onClick={ open }>
										+ Add Client Logos
									</Button>
								) }
							/>
						</MediaUploadCheck>
					) : (
						logos.map( ( logo, i ) => (
							<div key={ i } className="mlg-cell">
								<img src={ logo.url } alt={ logo.alt } />
							</div>
						) )
					) }
				</div>
			</>
		);
	},
} );
