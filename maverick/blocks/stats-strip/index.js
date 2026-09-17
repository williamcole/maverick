import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { stats } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-stats-strip' } );

		const updateStat = ( index, field, value ) => {
			const updated = stats.map( ( s, i ) =>
				i === index ? { ...s, [ field ]: value } : s
			);
			setAttributes( { stats: updated } );
		};

		const addStat = () => setAttributes( {
			stats: [ ...stats, { number: '0', suffix: '', label: 'New Stat' } ]
		} );

		const removeStat = ( index ) => setAttributes( {
			stats: stats.filter( ( _, i ) => i !== index )
		} );

		return (
			<>
				<InspectorControls>
					<PanelBody title="Stats" initialOpen>
						{ stats.map( ( stat, i ) => (
							<div key={ i } style={ { marginBottom: 16, paddingBottom: 16, borderBottom: '1px solid #e0e0e0' } }>
								<TextControl label="Number" value={ stat.number } onChange={ ( v ) => updateStat( i, 'number', v ) } />
								<TextControl label="Suffix (e.g. +, M, %)" value={ stat.suffix } onChange={ ( v ) => updateStat( i, 'suffix', v ) } />
								<TextControl label="Label" value={ stat.label } onChange={ ( v ) => updateStat( i, 'label', v ) } />
								{ stats.length > 1 && (
									<Button isDestructive variant="link" onClick={ () => removeStat( i ) }>Remove</Button>
								) }
							</div>
						) ) }
						{ stats.length < 6 && (
							<Button variant="secondary" onClick={ addStat }>+ Add Stat</Button>
						) }
					</PanelBody>
				</InspectorControls>

				<div { ...blockProps }>
					{ stats.map( ( stat, i ) => (
						<div key={ i } className="mss-stat">
							<div className="mss-number">
								{ stat.number }
								<span className="mss-suffix">{ stat.suffix }</span>
							</div>
							<div className="mss-label">{ stat.label }</div>
						</div>
					) ) }
				</div>
			</>
		);
	},
} );
