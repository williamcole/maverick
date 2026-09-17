import './style.css';
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import metadata from './block.json';

registerBlockType( metadata.name, {
	save: () => null,
	edit( { attributes, setAttributes } ) {
		const { number, title, description } = attributes;
		const blockProps = useBlockProps( { className: 'maverick-principle-card' } );

		return (
			<div { ...blockProps }>
				<RichText
					tagName="div"
					className="mpc-num"
					value={ number }
					onChange={ ( val ) => setAttributes( { number: val } ) }
					placeholder="01"
				/>
				<RichText
					tagName="h4"
					className="mpc-title"
					value={ title }
					onChange={ ( val ) => setAttributes( { title: val } ) }
					placeholder="Principle title…"
				/>
				<RichText
					tagName="p"
					className="mpc-desc"
					value={ description }
					onChange={ ( val ) => setAttributes( { description: val } ) }
					placeholder="Description…"
				/>
			</div>
		);
	},
} );
