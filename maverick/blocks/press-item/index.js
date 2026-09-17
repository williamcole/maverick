import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { variant, date, outlet, title, excerpt, linkUrl, linkText } = attributes;
		const isRelease = variant === 'release';
		const blockProps = useBlockProps( { className: `maverick-press-item is-${ variant }` } );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Type" initialOpen>
						<SelectControl
							value={ variant }
							options={ [
								{ label: 'Coverage row', value: 'coverage' },
								{ label: 'Release card', value: 'release' },
							] }
							onChange={ ( v ) => setAttributes( { variant: v } ) }
						/>
					</PanelBody>
					<PanelBody title="Link" initialOpen={ false }>
						<TextControl label="URL" value={ linkUrl } onChange={ ( v ) => setAttributes( { linkUrl: v } ) } />
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					<RichText tagName="span" className="mpi-date" value={ date } onChange={ ( v ) => setAttributes( { date: v } ) } placeholder={ isRelease ? 'Date…' : 'Date…' } />
					<div className="mpi-body">
						<RichText tagName="span" className="mpi-title" value={ title } onChange={ ( v ) => setAttributes( { title: v } ) } placeholder="Headline…" />
						{ isRelease && (
							<RichText tagName="p" className="mpi-excerpt" value={ excerpt } onChange={ ( v ) => setAttributes( { excerpt: v } ) } placeholder="Short excerpt…" />
						) }
					</div>
					{ ! isRelease && (
						<RichText tagName="span" className="mpi-outlet" value={ outlet } onChange={ ( v ) => setAttributes( { outlet: v } ) } placeholder="Outlet…" />
					) }
					<RichText tagName="span" className="mpi-link" value={ linkText } onChange={ ( v ) => setAttributes( { linkText: v } ) } placeholder="Link text…" />
				</div>
			</>
		);
	},
} );
