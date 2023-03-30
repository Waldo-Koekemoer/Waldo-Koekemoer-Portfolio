<?php if( ! defined( 'ABSPATH' ) ) exit;
	
register_block_pattern_category(
    'music-press',
    array( 'label' => __( 'SEOS Patterns', 'music-press' ) )
);

register_block_pattern(
    'music-press/about-us',
    array(
        'title'   => __( 'About US', 'music-press' ),
		'categories' => array( 'music-press' ),
        'content' => '<!-- wp:columns {"align":"center","className":"rp-about-me"} -->
<div class="wp-block-columns alignwide rp-about-me"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><strong>About Me</strong></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"http://localhost/1/wp-content/uploads/2022/12/about-1.webp","id":2742,"dimRatio":50,"contentPosition":"bottom left","isDark":false,"align":"center","className":"is-style-my-cover-400","style":{"color":{}}} -->
<div class="wp-block-cover aligncenter is-light has-custom-content-position is-position-bottom-left is-style-my-cover-400"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-2742" alt="" src="http://localhost/1/wp-content/uploads/2022/12/about-1.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"right","style":{"color":{"background":"#00000057"},"typography":{"lineHeight":"0"}},"textColor":"white","className":"rp-about-me-title is-style-default","fontSize":"medium"} -->
<p class="has-text-align-right rp-about-me-title is-style-default has-white-color has-text-color has-background has-medium-font-size" style="background-color:#00000057;line-height:0"><strong>CEO</strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"><strong>About Me</strong></p>
<!-- /wp:paragraph -->

<!-- wp:cover {"url":"http://localhost/1/wp-content/uploads/2022/12/about-2.webp","id":2743,"dimRatio":50,"contentPosition":"bottom left","align":"center","className":"is-style-my-cover-400","style":{"color":{}}} -->
<div class="wp-block-cover aligncenter has-custom-content-position is-position-bottom-left is-style-my-cover-400"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-2743" alt="" src="http://localhost/1/wp-content/uploads/2022/12/about-2.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"right","style":{"color":{"background":"#00000057"},"typography":{"lineHeight":"0"}},"textColor":"white","className":"rp-about-me-title is-style-default","fontSize":"medium"} -->
<p class="has-text-align-right rp-about-me-title is-style-default has-white-color has-text-color has-background has-medium-font-size" style="background-color:#00000057;line-height:0"><strong>PHOTOGRAPH</strong></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->',
    )
);
