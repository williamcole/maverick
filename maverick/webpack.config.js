const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const path = require( 'path' );

module.exports = [
	'showcase-card',
	'testimonial-card',
	'stats-strip',
	'logo-grid',
	'cta-section',
	'newsletter-signup',
	'principle-card',
	'team-member',
	'timeline-item',
	'topic-filter',
	'pillar-card',
	'office-card',
	'press-row',
	'contact-form',
	'contact-card',
	'faq-item',
	'lead-card',
	'roster-cell',
	'service-card',
	'work-filter',
	'featured-case',
	'case-tile',
	'press-item',
	'media-kit-row',
	'hero',
].map( ( block ) => ( {
	...defaultConfig,
	entry: {
		index: path.resolve( __dirname, `blocks/${ block }/index.js` ),
	},
	output: {
		...defaultConfig.output,
		path: path.resolve( __dirname, `blocks/${ block }/build` ),
	},
} ) );
