import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import metadata from './block.json';

// Sample categories shown only in the editor preview —
// the live site renders real categories via render.php.
const SAMPLE_CATEGORIES = [ 'All', 'Fundraising', 'Direct Response', 'Digital', 'Data & Analytics', 'Creative', 'Post-Cycle' ];

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { label } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-topic-filter' } );

		return (
			<div { ...blockProps }>
				<RichText
					tagName="span"
					className="mtf-label"
					value={ label }
					onChange={ ( val ) => setAttributes( { label: val } ) }
					placeholder="Topics"
				/>
				{ SAMPLE_CATEGORIES.map( ( cat, i ) => (
					<span key={ cat } className={ `mtf-chip${ i === 0 ? ' is-active' : '' }` }>
						{ cat }
					</span>
				) ) }
				<p className="mtf-editor-note">Live categories populate automatically on the front end.</p>
			</div>
		);
	},
} );
