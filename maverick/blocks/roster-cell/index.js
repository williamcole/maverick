import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { name, role } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-roster-cell' } );

		return (
			<div { ...blockProps }>
				<RichText
					tagName="div"
					className="mrc-name"
					value={ name }
					onChange={ ( val ) => setAttributes( { name: val } ) }
					placeholder="Full Name"
				/>
				<RichText
					tagName="div"
					className="mrc-role"
					value={ role }
					onChange={ ( val ) => setAttributes( { role: val } ) }
					placeholder="Job Title · Department"
				/>
			</div>
		);
	},
} );
