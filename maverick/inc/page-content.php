<?php
/**
 * Maverick page content seeder
 *
 * Creates the main site pages on theme activation with full block content.
 * Existing pages are NOT overwritten on activation — use Tools > Maverick
 * to force-update pages when template content changes.
 */

function maverick_seed_pages() {
	$pages = maverick_page_definitions();
	foreach ( $pages as $def ) {
		$existing = get_page_by_path( $def['slug'], OBJECT, 'page' );
		if ( $existing ) {
			continue;
		}
		wp_insert_post( [
			'post_type'     => 'page',
			'post_title'    => $def['title'],
			'post_name'     => $def['slug'],
			'post_status'   => $def['status'] ?? 'publish',
			'post_content'  => $def['content'],
			'page_template' => $def['template'],
		] );
	}
}

function maverick_page_definitions() {
	return [
		[
			'title'    => 'Home',
			'slug'     => 'home-page',
			'template' => 'front-page.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","minHeight":66,"minHeightUnit":"vh","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:100px;padding-bottom:100px;min-height:66vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">A Data-Driven <em>Firm Supporting</em> American Values.</h1>
<!-- /wp:heading -->

</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"border":{"top":{"color":"#243a5e","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:maverick/stats-strip /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"var:preset|spacing|120","bottom":"var:preset|spacing|120"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":"40px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide are-vertically-aligned-center">

<!-- wp:column {"width":"290px"} -->
<div class="wp-block-column" style="flex-basis:290px">
<!-- wp:image {"width":270,"height":270,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image is-resized"><img src="" alt="Maverick mark" style="width:270px;height:270px"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"48px","fontWeight":"500","lineHeight":"1.08","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:48px;font-weight:500;letter-spacing:-0.035em;line-height:1.08">A Full-Service Fundraising Firm Dedicated to <em>Outstanding</em> Outcomes for American Causes.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"240px"} -->
<div class="wp-block-column" style="flex-basis:240px">
<!-- wp:heading {"level":3,"textColor":"navy","style":{"typography":{"fontSize":"56px","fontWeight":"700","letterSpacing":"-0.03em","lineHeight":"1"}}} -->
<h3 class="wp-block-heading has-navy-color has-text-color" style="font-size:56px;font-weight:700;letter-spacing:-0.03em;line-height:1">12<span style="color:#BA912E">+</span></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.14em","textTransform":"uppercase"},"color":{"text":"#8a8a8a"}}} -->
<p class="has-text-color" style="color:#8a8a8a;font-size:11px;font-weight:600;letter-spacing:0.14em;text-transform:uppercase">Years of Excellence</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:maverick/logo-grid {"align":"wide"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:columns {"align":"wide","verticalAlignment":"stretch","style":{"spacing":{"blockGap":"60px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide are-vertically-aligned-stretch">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">● Featured Win — 2024</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em"></h1>
<!-- /wp:heading -->

</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase">★ U.S. Senate · Battleground</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.1">How we tripled small-dollar donors in <em>11 months.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.75)"},"typography":{"fontSize":"15px"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.75);font-size:15px">An end-to-end fundraising rebuild — direct mail, email, digital, and major-donor strategy — for a contested U.S. Senate primary that delivered an upset win.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"style":{"spacing":{"blockGap":"28px","padding":{"top":"24px","bottom":"24px"}},"border":{"top":{"color":"#243a5e","width":"1px"},"bottom":{"color":"#243a5e","width":"1px"}}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"textColor":"gold","style":{"typography":{"fontSize":"32px","fontWeight":"700","letterSpacing":"-0.03em","lineHeight":"1"}}} -->
<h3 class="wp-block-heading has-gold-color has-text-color" style="font-size:32px;font-weight:700;letter-spacing:-0.03em;line-height:1">+312%</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"},"color":{"text":"rgba(255,255,255,0.6)"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.6);font-size:11px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Donor file growth</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"textColor":"gold","style":{"typography":{"fontSize":"32px","fontWeight":"700","letterSpacing":"-0.03em","lineHeight":"1"}}} -->
<h3 class="wp-block-heading has-gold-color has-text-color" style="font-size:32px;font-weight:700;letter-spacing:-0.03em;line-height:1">$48M</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"},"color":{"text":"rgba(255,255,255,0.6)"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.6);font-size:11px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase">Raised in cycle</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"textColor":"gold","style":{"typography":{"fontSize":"32px","fontWeight":"700","letterSpacing":"-0.03em","lineHeight":"1"}}} -->
<h3 class="wp-block-heading has-gold-color has-text-color" style="font-size:32px;font-weight:700;letter-spacing:-0.03em;line-height:1">4.1x</h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.1em","textTransform":"uppercase"},"color":{"text":"rgba(255,255,255,0.6)"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.6);font-size:11px;font-weight:600;letter-spacing:0.1em;text-transform:uppercase">ROAS</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"textColor":"navy","backgroundColor":"white","style":{"border":{"radius":"6px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"26px","right":"26px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-navy-color has-white-background-color has-text-color has-background wp-element-button">Read Full Story →</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"constrained","contentSize":"680px","justifyContent":"center"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase">★ Selected Work</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"48px","fontWeight":"500","letterSpacing":"-0.035em","lineHeight":"1.05"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:48px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Showcase of Our <em>Results.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textAlign":"center","textColor":"body","style":{"typography":{"fontSize":"15px"}}} -->
<p class="has-text-align-center has-body-color has-text-color" style="font-size:15px">A snapshot of campaigns and causes we've helped move the needle for.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"24px","margin":{"top":"56px"}}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/showcase-card {"badgeLabel":"U.S. Senate","category":"Fundraising · Direct Response","title":"National Senate Bid","description":"Tripled small-dollar donor base in 11 months ahead of a contested primary.","linkUrl":"#","linkText":"Read case study →"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/showcase-card {"badgeLabel":"Advocacy","category":"Digital · Data","title":"National Advocacy Coalition","description":"Built a multi-channel donor program that funded a five-state ballot initiative push.","linkUrl":"#","linkText":"Read case study →"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/showcase-card {"badgeLabel":"Statewide","category":"Digital Ads · Acquisition","title":"Gubernatorial Acquisition","description":"Cut donor acquisition cost in half across a 14-month statewide campaign.","linkUrl":"#","linkText":"Read case study →"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"48px"}}}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"navy","textColor":"white","style":{"border":{"radius":"6px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"26px","right":"26px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-navy-background-color has-text-color has-background wp-element-button">View All Work →</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|100","bottom":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">

<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"16px","margin":{"bottom":"56px"}}},"layout":{"type":"constrained","contentSize":"640px","justifyContent":"center"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase">★ Client Feedback</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"white","style":{"typography":{"fontSize":"48px","fontWeight":"500","letterSpacing":"-0.035em","lineHeight":"1.05"}}} -->
<h2 class="has-text-align-center wp-block-heading has-white-color has-text-color" style="font-size:48px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Real Results from <em>Valued</em> Clients.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textAlign":"center","style":{"color":{"text":"rgba(255,255,255,0.7)"},"typography":{"fontSize":"15px"}}} -->
<p class="has-text-align-center has-text-color" style="color:rgba(255,255,255,0.7);font-size:15px">The teams behind some of the country's most consequential campaigns.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"24px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/testimonial-card {"quote":"Maverick brought clarity to a moment where everything felt urgent and noisy. They didn't sell us a deck — they built a program, ran it, and showed us the numbers every week.","name":"Jennifer Carlisle","role":"Campaign Manager · Anderson 2026","initials":"JC"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/testimonial-card {"quote":"The single best fundraising team we've worked with. Honest about what's working, faster than anyone we've hired, and the donor file they built will outlast this cycle.","name":"Robert Maxwell","role":"Executive Director · Liberty PAC","initials":"RM"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","eyebrow":"Ready When You Are","heading":"Let's Build Something That Wins.","body":"If your campaign, cause, or organization is facing a moment that matters — we'd like to help.","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'About',
			'slug'     => 'about',
			'template' => 'page-about.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">About Maverick</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">Built by operators,<br><em>for</em> operators.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">We're a fundraising and communications firm for the campaigns, causes, and advocacy organizations who refuse to lose because of how they raised money.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"80px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">Our Mission</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.1">To make donor programs <em>compound</em> — quarter over quarter, cycle over cycle.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">Maverick exists because too many good causes still lose to better-funded ones. We started this firm to fix that — by building fundraising operations the way disciplined campaigns build field programs: with data, with creative judgment, and with the patience to keep what works.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">We don't deliver decks. We deliver donor files, weekly numbers, and a finance plan you can actually run a campaign against. Our clients are U.S. Senate races, gubernatorial campaigns, 501(c)(4) organizations, and policy coalitions that need their dollars to land harder than the opposition's.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:maverick/stats-strip /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"56px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">What We Believe</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Four principles, <em>one</em> playbook.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/principle-card {"number":"01","title":"Operators, not consultants.","description":"We've sat in the seats our clients sit in. Every recommendation we make is something we'd execute ourselves on Monday morning."} /-->
<!-- wp:maverick/principle-card {"number":"02","title":"Truth over comfort.","description":"When the creative isn't working, we'll say so. When the strategy needs to change, we'll bring the data. We'd rather be useful than agreeable."} /-->
<!-- wp:maverick/principle-card {"number":"03","title":"Disciplined creative.","description":"Copy gets tested. Audiences get measured. Channels get cut when they don't earn their place. Conviction beats opinion every time."} /-->
<!-- wp:maverick/principle-card {"number":"04","title":"Built to compound.","description":"A donor file is a balance sheet. We build programs that pay dividends across multiple cycles, not flashy one-quarter spikes."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:columns {"align":"wide","verticalAlignment":"bottom","style":{"spacing":{"margin":{"bottom":"56px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-bottom is-layout-flex wp-block-columns-is-layout-flex alignwide" style="margin-bottom:56px">
<!-- wp:column {"verticalAlignment":"bottom","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:60%">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Leadership</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">The people running <em>the playbook.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%">
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"14px"}},"className":"mw-360"} -->
<p class="mw-360 has-body-color has-text-color" style="font-size:14px">A team of campaign veterans, direct-response operators, and data professionals — most of whom have spent time in a war room before they ever sat across the table from one.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/team-member {"initial":"M","name":"Michael Reeves","title":"Founder &amp; CEO","bio":"Twenty years across U.S. Senate, gubernatorial, and presidential campaign cycles. Built Maverick in 2014 after running fundraising for three Senate cycles."} /-->
<!-- wp:maverick/team-member {"initial":"S","name":"Sarah Chen","title":"Chief Operating Officer","bio":"Former campaign manager turned operator. Runs the day-to-day discipline that keeps client programs on cadence and on budget."} /-->
<!-- wp:maverick/team-member {"initial":"D","name":"David Whitfield","title":"Head of Direct Response","bio":"Direct mail and email copy that has raised more than $500M across the firm's client base. Believes in testing everything and trusting almost nothing."} /-->
<!-- wp:maverick/team-member {"initial":"A","name":"Amanda Foster","title":"Head of Data &amp; Analytics","bio":"Builds the modeling, segmentation, and attribution that drive every spend decision. Skeptic of every dashboard until proven otherwise."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"60px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Our Story</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"white","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-white-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">How we got <em>here.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"880px","justifyContent":"center"},"style":{"spacing":{"blockGap":"0"}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:maverick/timeline-item {"year":"2014","title":"Maverick founded","description":"Started in a one-room office in D.C. with a single Senate client and a conviction that fundraising had become too templated to win modern races."} /-->
<!-- wp:maverick/timeline-item {"year":"2016","title":"First full Senate cycle","description":"Ran fundraising programs for nine federal campaigns. Crossed $50M raised across the client base and won seven of nine cycles."} /-->
<!-- wp:maverick/timeline-item {"year":"2019","title":"Data &amp; Analytics practice launched","description":"Built our in-house modeling team to bring honest attribution, donor scoring, and lift analysis directly into client programs."} /-->
<!-- wp:maverick/timeline-item {"year":"2022","title":"$500M raised milestone","description":"Crossed half a billion in dollars raised across all Maverick programs since founding. Expanded into advocacy and 501(c)(4) work."} /-->
<!-- wp:maverick/timeline-item {"year":"2026","title":"200 campaigns, $840M, and counting","description":"Now serving Senate, gubernatorial, and advocacy clients across 38 states with a team built almost entirely from former campaign operators.","isLast":true} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Services',
			'slug'     => 'services',
			'template' => 'page-services.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Services</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">Six disciplines.<br><em>One</em> playbook.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">Every capability stands on its own — but they compound when we run them together. Here's what we do, and how the parts fit.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- ─────── INTRO ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"100px","bottom":"60px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"80px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">What We Do</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"40px","fontWeight":"500","lineHeight":"1.08","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:40px;font-weight:500;letter-spacing:-0.035em;line-height:1.08">Strategy that's <em>built to execute,</em> not just present.</h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%">
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">Our work falls into six disciplines that operate independently but get sharper when used together — fundraising strategy, direct response, digital advertising, data &amp; analytics, donor acquisition, and creative &amp; messaging.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">Most agencies sell capabilities. We sell <em>outcomes</em>: a deeper donor file, a higher renewal rate, a stronger week-over-week growth curve. Everything below is just the path we take to get there.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- ─────── SERVICES GRID ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"60px","bottom":"110px"},"blockGap":"20px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/service-card {"icon":"strategy","title":"Fundraising Strategy","description":"End-to-end donor program design built on real numbers, not vibes. We diagnose what's broken, prioritize what to fix first, and build a multi-quarter plan you can run a campaign against.","features":["Program audit &amp; benchmarking","Acquisition &amp; retention planning","Major donor cultivation","Cycle-long forecasting"]} /-->
<!-- wp:maverick/service-card {"icon":"mail","title":"Direct Response","description":"Direct mail, email, telephone, and SMS that earn opens, clicks, and gifts. Disciplined creative refined by constant testing, not assumptions about what donors want.","features":["Direct mail design &amp; production","Email program management","Testing &amp; optimization frameworks","Renewal &amp; reactivation series"]} /-->
<!-- wp:maverick/service-card {"icon":"ad","title":"Digital Advertising","description":"Programmatic, paid social, CTV, and search built around persuasion metrics — not reach for reach's sake. We spend like operators, not media planners.","features":["Paid social &amp; programmatic","Connected TV &amp; streaming audio","Audience modeling","Lift &amp; attribution measurement"]} /-->
<!-- wp:maverick/service-card {"icon":"chart","title":"Data &amp; Analytics","description":"Modeling, segmentation, attribution, and honest reporting. Clarity on what's actually working so you can scale what wins and cut what doesn't.","features":["Donor scoring &amp; segmentation","Lift &amp; incrementality studies","Multi-touch attribution","Weekly performance dashboards"]} /-->
<!-- wp:maverick/service-card {"icon":"magnet","title":"Donor Acquisition","description":"Build a sustainable list of supporters who give again, give more, and recruit others to the cause. Acquisition is the top of every funnel — we treat it like one.","features":["Cold acquisition strategy","List rental &amp; co-op programs","Conversion optimization","First-gift &amp; welcome series"]} /-->
<!-- wp:maverick/service-card {"icon":"pen","title":"Creative &amp; Messaging","description":"Copy and visuals that motivate action — sharpened by testing, grounded in conviction. The brand should sound like the campaign, not the consultant.","features":["Voice &amp; tone development","Creative concepting &amp; production","Message testing &amp; refinement","Brand positioning"]} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- ─────── FEATURED DISCIPLINE ─────── -->
<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"navy"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignfull has-navy-background-color has-background" style="min-height:540px">

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"90px","bottom":"90px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding:90px 60px">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">Featured Discipline</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontSize":"40px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:40px;font-weight:500;letter-spacing:-0.035em;line-height:1.1">Fundraising strategy <em>is the spine</em> — everything else hangs off it.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"15px","lineHeight":"1.7"},"spacing":{"margin":{"bottom":"14px"}}},"className":"mw-480"} -->
<p class="mw-480 has-text-color" style="color:rgba(255,255,255,0.78);font-size:15px;line-height:1.7;margin-bottom:14px">Before we recommend a single channel, we audit the whole program: what's working, what's bleeding, what's missing, what's about to break. The output is a multi-quarter plan with weekly numbers attached.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"15px","lineHeight":"1.7"},"spacing":{"margin":{"bottom":"18px"}}},"className":"mw-480"} -->
<p class="mw-480 has-text-color" style="color:rgba(255,255,255,0.78);font-size:15px;line-height:1.7;margin-bottom:18px">It's the difference between &quot;more direct mail&quot; and &quot;direct mail to these 14 segments, in this order, with this control package, against this growth target by November.&quot;</p>
<!-- /wp:paragraph -->
<!-- wp:buttons -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"white","textColor":"navy","style":{"border":{"radius":"6px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"26px","right":"26px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-navy-color has-white-background-color has-text-color has-background wp-element-button" href="#">See How We Plan →</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"careers-photo-col"} -->
<div class="wp-block-column careers-photo-col"></div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- ─────── HOW WE WORK ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"56px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">How We Work</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Four steps from first call <em>to first wins.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/principle-card {"number":"01","title":"Audit &amp; Align","description":"We pressure-test your goals, audience, and current program. You leave with a sharp plan — not a 60-page deck."} /-->
<!-- wp:maverick/principle-card {"number":"02","title":"Build &amp; Launch","description":"Creative, lists, channels, tracking — stood up fast and tested early. We run, you watch the numbers move."} /-->
<!-- wp:maverick/principle-card {"number":"03","title":"Optimize Weekly","description":"Friday numbers, Monday decisions. What's working scales. What isn't gets cut. No quarterly retrospectives."} /-->
<!-- wp:maverick/principle-card {"number":"04","title":"Compound Forward","description":"The donor file gets deeper, the average gift gets larger, the cost per acquired dollar gets lower. Cycle over cycle."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Our Team',
			'slug'     => 'team',
			'template' => 'page-team.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Our Team</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">Sixty operators. <em>One</em> playbook.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">A team of campaign veterans, direct-response operators, and data professionals — most of whom have spent time in a war room before they ever sat across the table from one.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- ─────── LEADERSHIP ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"110px","bottom":"70px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"56px"}}},"layout":{"type":"constrained","contentSize":"880px"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Leadership</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">The people running <em>the playbook.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.7"}},"className":"mw-640"} -->
<p class="mw-640 has-body-color has-text-color" style="font-size:15px;line-height:1.7">The four-person leadership team that owns the cadence, the standards, and the client work — and the people every program ultimately answers to.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/team-member {"initial":"M","name":"Michael Reeves","title":"Founder &amp; CEO","bio":"Twenty years across U.S. Senate, gubernatorial, and presidential campaign cycles. Built Maverick in 2014 after running fundraising for three Senate cycles."} /-->
<!-- wp:maverick/team-member {"initial":"S","name":"Sarah Chen","title":"Chief Operating Officer","bio":"Former campaign manager turned operator. Runs the day-to-day discipline that keeps client programs on cadence and on budget."} /-->
<!-- wp:maverick/team-member {"initial":"D","name":"David Whitfield","title":"Head of Direct Response","bio":"Direct mail and email copy that has raised more than $500M across the firm's client base. Believes in testing everything and trusting almost nothing."} /-->
<!-- wp:maverick/team-member {"initial":"A","name":"Amanda Foster","title":"Head of Data &amp; Analytics","bio":"Builds the modeling, segmentation, and attribution that drive every spend decision. Skeptic of every dashboard until proven otherwise."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- ─────── DISCIPLINE LEADS ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"90px","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"56px"}}},"layout":{"type":"constrained","contentSize":"880px"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Discipline Leads</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">The people who run <em>the work.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.7"}},"className":"mw-640"} -->
<p class="mw-640 has-body-color has-text-color" style="font-size:15px;line-height:1.7">Senior operators who lead the disciplines — each accountable for the methodology, the standards, and the client outcomes inside their practice area.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"mv-card-grid","style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide mv-card-grid">
<!-- wp:maverick/lead-card {"initial":"R","name":"Rachel Patterson","title":"VP, Fundraising Strategy","bio":"Twelve federal cycles. Built the firm's fundraising audit framework now used on every new client engagement."} /-->
<!-- wp:maverick/lead-card {"initial":"J","name":"James Holbrook","title":"VP, Digital Advertising","bio":"Programmatic and paid social lead. Built the persuasion-segment model that drives client spend across $40M+ in annual media."} /-->
<!-- wp:maverick/lead-card {"initial":"L","name":"Lauren Ortiz","title":"VP, Creative &amp; Messaging","bio":"Copy chief — every direct mail control rotation passes through her desk. Former Senate communications director."} /-->
<!-- wp:maverick/lead-card {"initial":"T","name":"Thomas Greene","title":"VP, Donor Acquisition","bio":"Heads the acquisition engine — list rentals, co-ops, cold digital. Has scaled donor files from zero on twelve federal programs."} /-->
<!-- wp:maverick/lead-card {"initial":"N","name":"Natalie Brooks","title":"VP, Data Science","bio":"Modeling, lift studies, attribution. Reports to Amanda Foster; runs the in-house data team across four engagements at a time."} /-->
<!-- wp:maverick/lead-card {"initial":"E","name":"Eric Tanaka","title":"VP, Client Strategy","bio":"Senior account lead for top-tier Senate engagements. The Friday-numbers email lands in your inbox because of him."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- ─────── WIDER TEAM ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"bottom":"56px"}}},"layout":{"type":"constrained","contentSize":"880px"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">The Wider Team</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Plus <em>forty-eight</em> more operators.</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.7"}},"className":"mw-640"} -->
<p class="mw-640 has-body-color has-text-color" style="font-size:15px;line-height:1.7">A glance at the strategists, copywriters, analysts, designers, and account leads who power the day-to-day work across our four offices.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"roster-grid","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide roster-grid">
<!-- wp:maverick/roster-cell {"name":"Anna Beaumont","role":"Senior Strategist · Fundraising"} /-->
<!-- wp:maverick/roster-cell {"name":"Marcus Levin","role":"Senior Strategist · Direct Response"} /-->
<!-- wp:maverick/roster-cell {"name":"Priya Shah","role":"Senior Analyst · Data Science"} /-->
<!-- wp:maverick/roster-cell {"name":"Hannah Knox","role":"Senior Copywriter · Creative"} /-->
<!-- wp:maverick/roster-cell {"name":"Tyler Brennan","role":"Senior Strategist · Digital"} /-->
<!-- wp:maverick/roster-cell {"name":"Caroline Park","role":"Senior Designer · Creative"} /-->
<!-- wp:maverick/roster-cell {"name":"Devon Walker","role":"Account Director · Senate"} /-->
<!-- wp:maverick/roster-cell {"name":"Jamie Sullivan","role":"Account Director · Advocacy"} /-->
<!-- wp:maverick/roster-cell {"name":"Olivia Reyes","role":"Analyst · Modeling &amp; Attribution"} /-->
<!-- wp:maverick/roster-cell {"name":"Ben Kowalski","role":"Strategist · Donor Acquisition"} /-->
<!-- wp:maverick/roster-cell {"name":"Maya Patel","role":"Strategist · Email Program"} /-->
<!-- wp:maverick/roster-cell {"name":"Connor Riggs","role":"Strategist · Paid Media"} /-->
<!-- wp:maverick/roster-cell {"name":"Ines Carrillo","role":"Account Manager · Statewide"} /-->
<!-- wp:maverick/roster-cell {"name":"Wesley Hart","role":"Senior Copywriter · Direct Mail"} /-->
<!-- wp:maverick/roster-cell {"name":"Karina Vega","role":"Senior Designer · Brand"} /-->
<!-- wp:maverick/roster-cell {"name":"Sam Whitlock","role":"Analyst · Reporting"} /-->
<!-- wp:maverick/roster-cell {"name":"Jordan Pierce","role":"Producer · Video &amp; Motion"} /-->
<!-- wp:maverick/roster-cell {"name":"Elena Volkov","role":"Strategist · Major Donor Program"} /-->
<!-- wp:maverick/roster-cell {"name":"Theo Aldridge","role":"Strategist · Coalition Work"} /-->
<!-- wp:maverick/roster-cell {"name":"Aisha Bennett","role":"Operations Lead · Atlanta"} /-->
<!-- wp:maverick/roster-cell {"name":"Grant Mosley","role":"Operations Lead · Austin"} /-->
<!-- wp:maverick/roster-cell {"name":"Jacqueline Yu","role":"People Operations Lead"} /-->
<!-- wp:maverick/roster-cell {"name":"Reid Carter","role":"Finance &amp; Compliance Lead"} /-->
<!-- wp:maverick/roster-cell {"name":"Mia Ferraro","role":"Chief of Staff to the CEO"} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- ─────── CULTURE / VALUES ─────── -->
<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"navy"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignfull has-navy-background-color has-background" style="min-height:480px">

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding:80px 60px">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">How We Work</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontSize":"40px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:40px;font-weight:500;letter-spacing:-0.035em;line-height:1.1">A team built around <em>a few stubborn beliefs.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"15px","lineHeight":"1.7"},"spacing":{"margin":{"bottom":"14px"}}},"className":"mw-480"} -->
<p class="mw-480 has-text-color" style="color:rgba(255,255,255,0.78);font-size:15px;line-height:1.7;margin-bottom:14px">What unites everyone here isn't an ideology test — it's a working belief about how good fundraising actually gets built.</p>
<!-- /wp:paragraph -->
<!-- wp:list {"className":"culture-values"} -->
<ul class="wp-block-list culture-values">
<!-- wp:list-item --><li>The numbers are the conversation. Friday cadence, weekly.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Operators, not consultants. Every senior hire has run the work themselves.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Truth over comfort. We say what we'd say if the budget were ours.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>No deck without a plan. No plan without a number to chase.</li><!-- /wp:list-item -->
<!-- wp:list-item --><li>Compounding beats heroics. Build the file that funds the next cycle.</li><!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"culture-photo-col"} -->
<div class="wp-block-column culture-photo-col"></div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- ─────── JOIN US ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">
<!-- wp:group {"align":"wide","className":"join-card","style":{"color":{"background":"#ffffff"},"border":{"color":"#e5e3dc","width":"1px","radius":"16px"},"spacing":{"padding":{"top":"50px","bottom":"50px","left":"56px","right":"56px"}}}} -->
<div class="wp-block-group alignwide join-card" style="background-color:#ffffff;border:1px solid #e5e3dc;border-radius:16px;padding:50px 56px">
<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":"40px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex are-vertically-aligned-center">

<!-- wp:column {"width":"62%"} -->
<div class="wp-block-column" style="flex-basis:62%">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Careers</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":3,"textColor":"navy","style":{"typography":{"fontSize":"32px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.03em"}}} -->
<h3 class="wp-block-heading has-navy-color has-text-color" style="font-size:32px;font-weight:500;letter-spacing:-0.03em;line-height:1.1">We're hiring <em>operators.</em></h3>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"14.5px","lineHeight":"1.7"}}} -->
<p class="has-body-color has-text-color" style="font-size:14.5px;line-height:1.7">Open roles across fundraising strategy, direct response, data &amp; analytics, and creative. Remote-friendly for senior hires; D.C., Austin, and Atlanta for everyone else. If you've sat in a war room and want to keep doing that work, we'd like to talk.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"38%","style":{"spacing":{"blockGap":"12px"}}} -->
<div class="wp-block-column" style="flex-basis:38%">
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"gold","textColor":"white","style":{"border":{"radius":"6px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"26px","right":"26px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-gold-background-color has-text-color has-background wp-element-button" href="/careers">See Open Roles →</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"12px","lineHeight":"1.55"},"textAlign":"right"},"className":"mw-240"} -->
<p class="mw-240 has-mute-color has-text-color has-text-align-right" style="font-size:12px;line-height:1.55">Or send your resume directly to <a href="mailto:careers@maverickadvocacy.com" style="color:#BA912E;text-decoration:none">careers@maverickadvocacy.com</a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Company',
			'slug'     => 'company',
			'template' => 'page-company.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Company</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">One firm.<br><em>One</em> standard.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">A look at how Maverick is built — the work we do, the offices we work from, the recognition we've earned, and the people we want to hire next.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"110px","bottom":"80px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"80px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">The Firm at a Glance</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"40px","fontWeight":"500","lineHeight":"1.08","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:40px;font-weight:500;letter-spacing:-0.035em;line-height:1.08">A fundraising and communications firm <em>for serious operators.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%">
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">Maverick is a Washington-headquartered firm built in 2014 to bring operator discipline to political and advocacy fundraising. We work with U.S. Senate races, gubernatorial campaigns, 501(c)(4) advocacy organizations, and policy coalitions whose dollars need to land harder than the opposition's.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"15px","lineHeight":"1.75"}}} -->
<p class="has-body-color has-text-color" style="font-size:15px;line-height:1.75">Today the firm spans four offices and roughly sixty people across fundraising strategy, direct response, digital advertising, data &amp; analytics, donor acquisition, and creative — with a single goal: make every program we run compound, cycle over cycle.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"60px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"22px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"Services","title":"Six disciplines, one playbook.","description":"Fundraising strategy, direct response, digital, data, acquisition, and creative — each strong on its own, sharper when run together.","linkUrl":"/services","linkText":"Explore Services"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"About","title":"Built by operators, for operators.","description":"Our mission, our principles, the leadership team running the playbook, and the story of how we got here.","linkUrl":"/about","linkText":"About Maverick"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"Our Work","title":"200+ campaigns. $840M raised.","description":"Senate, gubernatorial, and advocacy programs we've helped scale — with the donor files, win rates, and case studies behind them.","linkUrl":"/work","linkText":"See the Work"} /-->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|32","bottom":"var:preset|spacing|32"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:maverick/stats-strip {"stats":[{"number":"12","suffix":"+","label":"Years in Practice"},{"number":"60","suffix":"+","label":"Operators on Team"},{"number":"4","suffix":"","label":"Office Locations"},{"number":"38","suffix":"+","label":"States Served"}]} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"56px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Offices</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Where we <em>work from.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"22px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Washington, D.C.","label":"Headquarters","addressLine1":"1234 Avenue of the Americas","addressLine2":"Washington, D.C. 20001","phone":"(505) 401-7480"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Austin","label":"South Central","addressLine1":"500 W 2nd Street, Suite 200","addressLine2":"Austin, TX 78701","phone":"(512) 555-0142"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Atlanta","label":"Southeast","addressLine1":"1180 Peachtree Street NE","addressLine2":"Atlanta, GA 30309","phone":"(404) 555-0118"} /-->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:columns {"align":"wide","verticalAlignment":"bottom","style":{"spacing":{"margin":{"bottom":"40px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-bottom is-layout-flex wp-block-columns-is-layout-flex alignwide" style="margin-bottom:40px">
<!-- wp:column {"verticalAlignment":"bottom","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:60%">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Press &amp; Recognition</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">The industry has <em>noticed.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:column -->
<!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%">
<!-- wp:paragraph {"textColor":"body","style":{"typography":{"fontSize":"14px"}},"className":"mw-360"} -->
<p class="mw-360 has-body-color has-text-color" style="font-size:14px">Selected industry awards and press mentions from the last four cycles.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"wide","className":"press-table","layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group alignwide press-table">
<!-- wp:maverick/press-row {"year":"2024","title":"Winner — Best Political Fundraising Firm","org":"Campaigns &amp; Elections"} /-->
<!-- wp:maverick/press-row {"year":"2024","title":"\u201cThe operator's agency\u201d","org":"Politico Pro"} /-->
<!-- wp:maverick/press-row {"year":"2023","title":"Top 50 — Agencies of the Year","org":"Politico Pro"} /-->
<!-- wp:maverick/press-row {"year":"2023","title":"Honorable Mention — Direct Response Innovation","org":"The Pollie Awards"} /-->
<!-- wp:maverick/press-row {"year":"2022","title":"Winner — Email Program of the Year","org":"Reed Awards"} /-->
<!-- wp:maverick/press-row {"year":"2022","title":"Featured profile — \u201cInside Maverick's playbook\u201d","org":"National Journal"} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"navy"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignfull has-navy-background-color has-background" style="min-height:460px">

<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"60px","right":"60px"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding:80px 60px">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"18px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:18px">Careers</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontSize":"40px","fontWeight":"500","lineHeight":"1.1","letterSpacing":"-0.035em"}}} -->
<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:40px;font-weight:500;letter-spacing:-0.035em;line-height:1.1">We're hiring <em>operators.</em></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"15px","lineHeight":"1.7"},"spacing":{"margin":{"bottom":"14px"}}},"className":"mw-480"} -->
<p class="mw-480 has-text-color" style="color:rgba(255,255,255,0.78);font-size:15px;line-height:1.7;margin-bottom:14px">If you've sat in a war room and want to keep doing that work — but at scale, with better tooling, and across multiple cycles a year — we'd like to talk.</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.78)"},"typography":{"fontSize":"15px","lineHeight":"1.7"}},"className":"mw-480"} -->
<p class="mw-480 has-text-color" style="color:rgba(255,255,255,0.78);font-size:15px;line-height:1.7">Open roles across fundraising strategy, direct response, data &amp; analytics, and creative. Remote-friendly for senior hires; D.C., Austin, and Atlanta for everyone else.</p>
<!-- /wp:paragraph -->
<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"18px"}}}} -->
<div class="wp-block-buttons" style="margin-top:18px">
<!-- wp:button {"backgroundColor":"white","textColor":"navy","style":{"border":{"radius":"6px"},"typography":{"fontSize":"13px","fontWeight":"600","letterSpacing":"0.04em","textTransform":"uppercase"},"spacing":{"padding":{"top":"14px","bottom":"14px","left":"26px","right":"26px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-navy-color has-white-background-color has-text-color has-background wp-element-button" href="/careers">See Open Roles →</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:column -->

<!-- wp:column {"className":"careers-photo-col"} -->
<div class="wp-block-column careers-photo-col"></div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Contact',
			'slug'     => 'contact',
			'template' => 'page-contact.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Contact</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">Let's talk about <em>the moment</em> you're facing.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">Tell us about your campaign or organization. We'll respond within one business day — and tell you honestly whether we're the right team for the work.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"60px"}},"verticalAlignment":"top"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide are-vertically-aligned-top">

<!-- wp:column {"width":"58%"} -->
<div class="wp-block-column" style="flex-basis:58%">
<!-- wp:maverick/contact-form /-->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%","style":{"spacing":{"blockGap":"18px"}}} -->
<div class="wp-block-column" style="flex-basis:42%">
<!-- wp:maverick/contact-card {"icon":"email","heading":"Email us directly","description":"Faster path for short questions or if you already know who you want to reach.","linkText":"hello@maverickadvocacy.com","linkUrl":"mailto:hello@maverickadvocacy.com"} /-->
<!-- wp:maverick/contact-card {"icon":"phone","heading":"Call us","description":"Phones are answered Monday–Friday, 8 a.m. – 7 p.m. ET.","linkText":"(505) 401-7480","linkUrl":"tel:5054017480"} /-->
<!-- wp:maverick/contact-card {"icon":"star","heading":"Press &amp; speaking","description":"Media inquiries, panel requests, and interviews — different inbox, faster reply.","linkText":"press@maverickadvocacy.com","linkUrl":"mailto:press@maverickadvocacy.com","isDark":true} /-->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"48px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Offices</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Or stop by <em>in person.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"22px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Washington, D.C.","label":"Headquarters","addressLine1":"1234 Avenue of the Americas","addressLine2":"Washington, D.C. 20001","phone":"(505) 401-7480"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Austin","label":"South Central","addressLine1":"500 W 2nd Street, Suite 200","addressLine2":"Austin, TX 78701","phone":"(512) 555-0142"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Atlanta","label":"Southeast","addressLine1":"1180 Peachtree Street NE","addressLine2":"Atlanta, GA 30309","phone":"(404) 555-0118"} /-->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"110px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"720px","justifyContent":"center"},"style":{"spacing":{"margin":{"bottom":"48px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:paragraph {"textAlign":"center","textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-text-align-center has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:14px">Common Questions</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"textAlign":"center","level":2,"textColor":"navy","style":{"typography":{"fontSize":"44px","fontWeight":"500","lineHeight":"1.05","letterSpacing":"-0.035em"}}} -->
<h2 class="has-text-align-center wp-block-heading has-navy-color has-text-color" style="font-size:44px;font-weight:500;letter-spacing:-0.035em;line-height:1.05">Before you <em>hit send.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"faq-list","layout":{"type":"constrained","contentSize":"720px"}} -->
<div class="wp-block-group alignwide faq-list">
<!-- wp:maverick/faq-item {"question":"How fast do you respond?","answer":"Within one business day on every inquiry — usually within hours during weekdays. If you've reached out about a moment that's actively in motion, flag that in your message and we'll prioritize accordingly."} /-->
<!-- wp:maverick/faq-item {"question":"Do you work with both federal and state-level campaigns?","answer":"Yes. Our client base spans U.S. Senate, House, gubernatorial, and state legislative cycles, plus 501(c)(4) advocacy organizations and policy coalitions across 38 states. We size engagements to the scope of the program, not the level of the race."} /-->
<!-- wp:maverick/faq-item {"question":"What does a typical engagement look like?","answer":"Most start with a paid audit and 90-day plan, then move into a multi-quarter program retainer if it's a fit. We don't pitch a long-term contract on the first call — we'd rather earn it after the first cycle of work."} /-->
<!-- wp:maverick/faq-item {"question":"Can you help us mid-cycle if we're behind on fundraising?","answer":"Often, yes. Mid-cycle turnarounds are some of our most common engagements — we've come in as late as the final 120 days and rebuilt acquisition, retention, and major donor cadence in time to change the trajectory. The earlier the better, but it's almost never too late to make a difference."} /-->
<!-- wp:maverick/faq-item {"question":"Are you partisan?","answer":"We work exclusively with center-right campaigns, causes, and advocacy organizations. If our values aren't aligned with your work, we're not the right firm — and we'd rather tell you that up front than waste a conversation."} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Our Work',
			'slug'     => 'our-work',
			'template' => 'page-our-work.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Our Work</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">Where the playbook <em>has actually run.</em></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">A selection of Senate, gubernatorial, and advocacy programs we've built — with the numbers, the timing, and the lessons behind them.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- ─────── FEATURED CASE ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"100px","bottom":"30px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:query {"align":"wide","query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","sticky":"include","inherit":false},"className":"featured-case-query"} -->
<div class="wp-block-query alignwide featured-case-query">
<!-- wp:post-template -->
<!-- wp:maverick/featured-case {"mode":"case"} /-->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->

</div>
<!-- /wp:group -->

<!-- ─────── CASE GRID ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"30px","bottom":"110px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:query {"align":"wide","query":{"perPage":9,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","sticky":"exclude","inherit":false},"className":"case-grid-query"} -->
<div class="wp-block-query alignwide case-grid-query">
<!-- wp:post-template {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:maverick/case-tile /-->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"48px"}}}} -->
<!-- wp:query-pagination-previous /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->

</div>
<!-- /wp:group -->

<!-- ─────── RESULTS STRIP ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"navy","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-navy-background-color has-background">
<!-- wp:maverick/stats-strip {"stats":[{"number":"200","suffix":"+","label":"Programs Built"},{"number":"$840","suffix":"M","label":"Dollars Raised"},{"number":"12","suffix":"M","label":"Donors Mobilized"},{"number":"87","suffix":"%","label":"Client Win Rate"}]} /-->
</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Press',
			'slug'     => 'press',
			'template' => 'page-press.html',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Press</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"76px","fontWeight":"600","lineHeight":"1.02","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:76px;font-weight:600;line-height:1.02;letter-spacing:-0.04em">News, mentions, <em>and</em> media resources.</h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55">Coverage, releases, and everything a reporter or producer needs to write about Maverick.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- ─────── FEATURED PRESS ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"100px","bottom":"30px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:query {"align":"wide","query":{"perPage":1,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","sticky":"include","inherit":false},"className":"featured-press-query"} -->
<div class="wp-block-query alignwide featured-press-query">
<!-- wp:post-template -->
<!-- wp:maverick/featured-case {"mode":"press"} /-->
<!-- /wp:post-template -->
</div>
<!-- /wp:query -->

</div>
<!-- /wp:group -->

<!-- ─────── COVERAGE LIST ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"30px","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"880px"},"style":{"spacing":{"margin":{"bottom":"32px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"32px","fontWeight":"500","letterSpacing":"-0.025em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:32px;font-weight:500;letter-spacing:-0.025em">In the <em>news.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:query {"align":"wide","query":{"perPage":8,"pages":0,"offset":1,"postType":"post","order":"desc","orderBy":"date","sticky":"exclude","inherit":false},"className":"press-grid-query"} -->
<div class="wp-block-query alignwide press-grid-query">
<!-- wp:group {"layout":{"type":"constrained","contentSize":"880px"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained">
<!-- wp:post-template -->
<!-- wp:maverick/press-item {"variant":"coverage"} /-->
<!-- /wp:post-template -->
</div>
<!-- /wp:group -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"40px"}}}} -->
<!-- wp:query-pagination-previous /-->
<!-- wp:query-pagination-numbers /-->
<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

</div>
<!-- /wp:query -->

</div>
<!-- /wp:group -->

<!-- ─────── PRESS RELEASES ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"90px","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"880px"},"style":{"spacing":{"margin":{"bottom":"32px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"32px","fontWeight":"500","letterSpacing":"-0.025em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:32px;font-weight:500;letter-spacing:-0.025em">Press <em>releases.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"20px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/press-item {"variant":"release","date":"March 2024","title":"Maverick announces expansion into Atlanta, fourth U.S. office.","excerpt":"The firm's continued growth reflects increasing demand for full-service fundraising programs across the Southeast.","linkUrl":"#","linkText":"Download PDF →"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/press-item {"variant":"release","date":"November 2023","title":"Maverick named Best Political Fundraising Firm by Campaigns &amp; Elections.","excerpt":"Recognized for innovative direct-response programs and consistent client win rates across the 2023 election cycle.","linkUrl":"#","linkText":"Download PDF →"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/press-item {"variant":"release","date":"July 2023","title":"Maverick crosses $500M in cumulative dollars raised for clients.","excerpt":"A milestone nine years in the making, spanning Senate, gubernatorial, and advocacy programs nationwide.","linkUrl":"#","linkText":"Download PDF →"} /-->
</div><!-- /wp:column -->
<!-- wp:column --><div class="wp-block-column">
<!-- wp:maverick/press-item {"variant":"release","date":"February 2023","title":"Maverick launches in-house Data &amp; Analytics practice.","excerpt":"New team brings modeling, attribution, and lift measurement directly into every client engagement.","linkUrl":"#","linkText":"Download PDF →"} /-->
</div><!-- /wp:column -->
</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- ─────── AWARDS ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"90px","bottom":"90px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-background-background-color has-background">

<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"880px"},"style":{"spacing":{"margin":{"bottom":"32px"}}}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained alignwide">
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"32px","fontWeight":"500","letterSpacing":"-0.025em"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:32px;font-weight:500;letter-spacing:-0.025em">Awards &amp; <em>recognition.</em></h2>
<!-- /wp:heading -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","className":"press-table","layout":{"type":"constrained","contentSize":"1600px"}} -->
<div class="wp-block-group alignwide press-table">
<!-- wp:maverick/press-row {"year":"2024","title":"Winner — Best Political Fundraising Firm","org":"Campaigns &amp; Elections"} /-->
<!-- wp:maverick/press-row {"year":"2024","title":"\u201cThe operator's agency\u201d","org":"Politico Pro"} /-->
<!-- wp:maverick/press-row {"year":"2023","title":"Top 50 — Agencies of the Year","org":"Politico Pro"} /-->
<!-- wp:maverick/press-row {"year":"2023","title":"Honorable Mention — Direct Response Innovation","org":"The Pollie Awards"} /-->
<!-- wp:maverick/press-row {"year":"2022","title":"Winner — Email Program of the Year","org":"Reed Awards"} /-->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- ─────── MEDIA CONTACT + KIT ─────── -->
<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"90px","bottom":"100px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-layout-constrained wp-block-group-is-layout-constrained has-global-padding alignfull has-cream-background-color has-background">
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":"60px"}}} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"textColor":"navy","style":{"typography":{"fontSize":"28px","fontWeight":"500","letterSpacing":"-0.02em"}}} -->
<h3 class="wp-block-heading has-navy-color has-text-color" style="font-size:28px;font-weight:500;letter-spacing:-0.02em">Media <em>contacts.</em></h3>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:maverick/contact-card {"icon":"email","heading":"Press inquiries","description":"For interview requests, comment, or background on Maverick's work.","linkText":"press@maverickadvocacy.com","linkUrl":"mailto:press@maverickadvocacy.com","isDark":true} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"textColor":"navy","style":{"typography":{"fontSize":"28px","fontWeight":"500","letterSpacing":"-0.02em"}}} -->
<h3 class="wp-block-heading has-navy-color has-text-color" style="font-size:28px;font-weight:500;letter-spacing:-0.02em">Media <em>kit.</em></h3>
<!-- /wp:heading -->
<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group">
<!-- wp:maverick/media-kit-row {"label":"Logo Pack","meta":"ZIP · 4.2 MB"} /-->
<!-- wp:maverick/media-kit-row {"label":"Company Fact Sheet","meta":"PDF · 1.1 MB"} /-->
<!-- wp:maverick/media-kit-row {"label":"Leadership Headshots","meta":"ZIP · 18 MB"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:maverick/cta-section {"align":"full","primaryLabel":"Partner With Us →","primaryUrl":"/contact","secondaryLabel":"Schedule a Call →","secondaryUrl":"/contact","phone":"(505) 401-7480"} /-->
BLOCK
		],
		[
			'title'    => 'Block Showcase',
			'slug'     => 'block-showcase',
			'template' => 'page',
			'status'   => 'private',
			'content'  => <<<'BLOCK'
<!-- wp:cover {"gradient":"navy-to-navy-deep","dimRatio":100,"isDark":true,"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:120px;padding-bottom:120px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-navy-to-navy-deep-gradient-background has-background-gradient"></span><div class="wp-block-cover__inner-container has-global-padding is-layout-constrained wp-block-cover-is-layout-constrained">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"22px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:22px">Reference Library</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"64px","fontWeight":"600","lineHeight":"1.04","letterSpacing":"-0.04em"}}} -->
<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:64px;font-weight:600;line-height:1.04;letter-spacing:-0.04em">Content <em>building blocks.</em></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"mw-640","style":{"color":{"text":"rgba(255,255,255,0.82)"},"typography":{"fontSize":"18px","lineHeight":"1.55"}}} -->
<p class="mw-640 has-text-color" style="color:rgba(255,255,255,0.82);font-size:18px;line-height:1.55" style="font-size:18px;line-height:1.55">Every reusable section available in this theme, grouped by what it's for. Use it to see what's possible and to copy sections into new pages.</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 1</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Page headers &amp; calls to action</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">Full-width sections that open or close a page — the hero at the top, and the prompts that ask a visitor to act.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/hero</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">The page headline block. Sets eyebrow, title, and intro over the navy background.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/hero {"eyebrow":"Example Hero","heading":"A headline with <em>emphasis.</em>","subheading":"One or two sentences of supporting context sit here beneath the headline.","background":"navy","align":"full"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cream-background-color has-background">
<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/cta-section</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A closing prompt with headline, buttons, and an optional phone number. Use near the bottom of a page.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/cta-section {"align":"wide","eyebrow":"Ready to talk?","heading":"Let's build a program that wins.","body":"Tell us about your race, cause, or organization.","primaryLabel":"Start a conversation","primaryUrl":"/contact","secondaryLabel":"See our work","secondaryUrl":"/work","phone":"(505) 401-7480"} /-->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/newsletter-signup</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Email capture band. Use for list-building — briefings, updates, reports.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/newsletter-signup {"align":"wide","eyebrow":"Stay in the loop","heading":"Fundraising intelligence, in your inbox.","body":"Occasional briefings on what's working across our programs. No spam.","buttonLabel":"Subscribe"} /-->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/contact-form</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">The inquiry form. Use on the contact page or any lead-capture section.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:maverick/contact-form {"eyebrow":"Get in touch","heading":"Tell us what you're working on.","buttonLabel":"Send message"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 2</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Showing people</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">Three ways to present the team, from most to least detail. Pick based on how much space and prominence a person needs.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/team-member</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Fullest treatment — photo, name, title, and a short bio. Use for a leadership or core-team grid.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/team-member {"initial":"A","name":"Amanda Foster","title":"Head of Data","bio":"Builds the modeling and attribution behind every dollar spent."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/team-member {"initial":"J","name":"James Ortiz","title":"Creative Director","bio":"Twenty cycles of tested, high-performing creative."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/team-member {"initial":"P","name":"Priya Nair","title":"Analytics Lead","bio":"Turns raw donor data into clear next actions."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/lead-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Compact leadership card — initial avatar, name, title, one line. Use for a tighter leadership row.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/lead-card {"initial":"M","name":"Michael Reeves","title":"Founder &amp; CEO","bio":"Twenty years across Senate and gubernatorial cycles."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/lead-card {"initial":"S","name":"Sarah Chen","title":"Chief Operating Officer","bio":"Runs the day-to-day discipline of client programs."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/lead-card {"initial":"D","name":"David Whitfield","title":"Head of Direct Response","bio":"Copy that has raised more than $500M."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/roster-cell</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Minimal — just name and role. Use for a full-staff roster grid where everyone is listed compactly.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","className":"roster-grid","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide roster-grid">
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/roster-cell {"name":"Alex Rivera","role":"Strategist \u00b7 Direct Response"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/roster-cell {"name":"Jordan Lee","role":"Analyst \u00b7 Data"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/roster-cell {"name":"Sam Patel","role":"Designer \u00b7 Creative"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/roster-cell {"name":"Casey Kim","role":"Account Lead"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cream-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 3</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Showing work &amp; results</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">Case studies and portfolio pieces at three scales, plus a filter for browsing them.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/featured-case</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Large horizontal feature — the hero case study. Use once at the top of a work page.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/featured-case {"align":"wide","badgeText":"Featured \u00b7 2024","resultText":"+312% small-dollar donors","category":"U.S. Senate \u00b7 Battleground","title":"How discipline beat a better-funded opponent.","excerpt":"A full breakdown of the strategy, cadence, and creative behind one of our best cycles."} /-->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/case-tile</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Compact case study tile with a result stat. Use in a grid below the featured case.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/case-tile {"tagText":"Senate","resultText":"+312% donors","metaText":"Direct Response \u00b7 2024","title":"Rebuilding a small-dollar base.","excerpt":"How we tripled the active donor file in one cycle."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/case-tile {"tagText":"Advocacy","resultText":"$4.2M raised","metaText":"Digital \u00b7 2023","title":"A rapid-response campaign.","excerpt":"Turning a news moment into sustained monthly giving."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/showcase-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Portfolio card with a category badge. Use for a mixed grid of work across types.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/showcase-card {"badgeLabel":"U.S. Senate","category":"Fundraising \u00b7 Direct Response","title":"Battleground Senate","description":"A full-cycle program across mail, email, and digital."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/showcase-card {"badgeLabel":"Advocacy","category":"Digital \u00b7 Acquisition","title":"National 501(c)(4)","description":"Built a recurring donor engine from the ground up."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/work-filter</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Category chips for filtering the work grid. Configure the filter labels in block settings.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/work-filter {"align":"wide","label":"Filter"} /-->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 4</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Building trust</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">Social proof in several forms — the numbers, the words of clients, the logos, and outside recognition.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/stats-strip</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A band of headline metrics. Use to lead with proof — dollars raised, donors, cycles.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/stats-strip {"align":"wide"} /-->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/testimonial-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A client quote with attribution. Use singly or in a two-up row.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/testimonial-card {"quote":"Maverick rebuilt our entire small-dollar program in one cycle.","name":"Campaign Manager","role":"U.S. Senate Race","initials":"CM"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/testimonial-card {"quote":"The most disciplined fundraising team we have ever worked with.","name":"Finance Director","role":"Gubernatorial","initials":"FD"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/logo-grid</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A wall of client or partner logos. Configure the logos in block settings.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/logo-grid {"align":"wide"} /-->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/press-item</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A news-coverage entry — date, outlet, headline. Use for a press/media list.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:maverick/press-item {"date":"Mar 12, 2024","outlet":"The Washington Post","title":"How one firm is rethinking small-dollar fundraising."} /-->
<!-- wp:maverick/press-item {"date":"Jan 8, 2024","outlet":"Politico","title":"The data behind a breakout Senate cycle."} /-->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/press-row</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A single-line award or recognition. Use for an awards list — tighter than press-item.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","className":"press-table","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide press-table">
<!-- wp:maverick/press-row {"year":"2024","title":"Best Direct Mail Program","org":"Pollie Awards"} /-->
<!-- wp:maverick/press-row {"year":"2023","title":"Innovation in Fundraising","org":"Reed Awards"} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"cream","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-cream-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 5</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Services &amp; approach</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">Three card styles for explaining what you do and how you think — a service, a strategic pillar, a guiding principle.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/service-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A service with a bulleted feature list. Use for a services grid.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/service-card {"icon":"strategy","title":"Fundraising Strategy","description":"End-to-end program design built around your calendar and goals."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/service-card {"icon":"mail","title":"Direct Response","description":"Mail and email that tests relentlessly and scales what works."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/service-card {"icon":"chart","title":"Data &amp; Analytics","description":"Modeling, segmentation, and attribution behind every decision."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/pillar-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A strategic pillar with a label and link. Use for a "how we work" section.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"Strategy","title":"Plan the whole cycle.","description":"We map the full arc before the first ask goes out.","linkText":"Learn more"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"Execution","title":"Run the program.","description":"Weekly cadence, tested creative, disciplined spend.","linkText":"Learn more"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/pillar-card {"label":"Growth","title":"Compound the file.","description":"Build a donor base that pays dividends across cycles.","linkText":"Learn more"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/principle-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A numbered principle. Use for a values or philosophy list.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/principle-card {"number":"01","title":"Honest numbers.","description":"We report what actually happened, not what looks good."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/principle-card {"number":"02","title":"Test everything.","description":"Conviction beats opinion. The data decides."} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/principle-card {"number":"03","title":"Built to compound.","description":"A donor file is a balance sheet, not a one-time spike."} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"background","style":{"spacing":{"padding":{"top":"96px","bottom":"96px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background-background-color has-background">
<!-- wp:paragraph {"textColor":"gold","style":{"typography":{"fontSize":"12px","fontWeight":"600","letterSpacing":"0.18em","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"10px"}}}} -->
<p class="has-gold-color has-text-color" style="font-size:12px;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;margin-bottom:10px">Group 6</p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":2,"textColor":"navy","style":{"typography":{"fontSize":"34px","fontWeight":"600","letterSpacing":"-0.02em","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading has-navy-color has-text-color" style="font-size:34px;font-weight:600;letter-spacing:-0.02em;line-height:1.08">Supporting content</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"textColor":"mute","className":"mw-640","style":{"typography":{"fontSize":"16px","lineHeight":"1.6"},"spacing":{"margin":{"top":"10px"}}}} -->
<p class="mw-640 has-mute-color has-text-color" style="font-size:16px;line-height:1.6;margin-top:10px">The smaller building blocks — history, questions, contact details, and list rows that appear across the site.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/timeline-item</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A dated milestone. Stack several for a company-history timeline.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:maverick/timeline-item {"year":"2014","title":"Maverick founded","description":"Started with a single Senate client and a conviction that fundraising had gotten too templated."} /-->
<!-- wp:maverick/timeline-item {"year":"2019","title":"Data practice launched","description":"Brought modeling and attribution in-house."} /-->
<!-- wp:maverick/timeline-item {"year":"2026","title":"$840M and counting","description":"Serving clients across 38 states.","isLast":true} /-->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/faq-item</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A single expandable question. Stack several for an FAQ. Click to expand.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","className":"faq-list","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide faq-list">
<!-- wp:maverick/faq-item {"question":"How do you price engagements?","answer":"Most programs run on a monthly retainer scoped to the cycle, tailored to your calendar and goals."} /-->
<!-- wp:maverick/faq-item {"question":"Do you work with advocacy organizations?","answer":"Yes \u2014 Senate, gubernatorial, and 501(c)(4) advocacy clients across 38 states."} /-->
<!-- wp:maverick/faq-item {"question":"What is the typical onboarding time?","answer":"Two to three weeks from signed agreement to first program launch.","isOpen":true} /-->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/contact-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A single contact method — icon, label, link. Use in a row of ways to reach you.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/contact-card {"icon":"email","heading":"Email us","description":"For new inquiries and partnerships.","linkText":"hello@maverickadvocacy.com","linkUrl":"mailto:hello@maverickadvocacy.com"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/contact-card {"icon":"phone","heading":"Call us","description":"Weekdays, 9 to 6 Eastern.","linkText":"(505) 401-7480","linkUrl":"tel:5054017480"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/office-card</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">An office location with address and phone. Use in a locations grid.</p>
<!-- /wp:paragraph -->
<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns is-layout-flex wp-block-columns-is-layout-flex alignwide">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Washington, D.C.","label":"Headquarters","addressLine1":"1234 Avenue of the Americas","addressLine2":"Washington, D.C. 20001","phone":"(505) 401-7480"} /-->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:maverick/office-card {"city":"Austin, TX","label":"Regional Office","addressLine1":"500 Congress Ave","addressLine2":"Austin, TX 78701","phone":"(512) 555-0142"} /-->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/media-kit-row</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">A downloadable asset row — label and file meta. Use for a press/media kit.</p>
<!-- /wp:paragraph -->
<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide">
<!-- wp:maverick/media-kit-row {"label":"Logo Pack","meta":"ZIP \u00b7 4.2 MB"} /-->
<!-- wp:maverick/media-kit-row {"label":"Company Fact Sheet","meta":"PDF \u00b7 1.1 MB"} /-->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textColor":"navy","style":{"typography":{"fontSize":"13px","fontWeight":"700"},"spacing":{"margin":{"bottom":"4px"}}}} -->
<p class="has-navy-color has-text-color" style="font-size:13px;font-weight:700;margin-bottom:4px">maverick/topic-filter</p>
<!-- /wp:paragraph -->
<!-- wp:paragraph {"textColor":"mute","style":{"typography":{"fontSize":"13px","lineHeight":"1.6"},"spacing":{"margin":{"bottom":"14px"}}}} -->
<p class="has-mute-color has-text-color" style="font-size:13px;line-height:1.6;margin-bottom:14px">Category links for filtering the blog. Renders real category links automatically.</p>
<!-- /wp:paragraph -->
<!-- wp:maverick/topic-filter {"align":"wide","label":"Topics"} /-->
</div>
<!-- /wp:group -->
BLOCK
		],
	];
}
