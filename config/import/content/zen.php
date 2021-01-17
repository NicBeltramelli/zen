<?php
/**
 * Zen
 *
 * Homepage content optionally installed after theme activation.
 *
 * @package Zen
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/zen.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Photo by Dave on Unsplash https://unsplash.com/photos/UHFQPFt5-WA/.
$zen_homepage_top = CHILD_URL . '/config/import/images/dave-UHFQPFt5-WA-unsplash.jpg';

// Photo by Ilona Panych on Unsplash https://unsplash.com/photos/LWuHsMPzoss/.
$zen_misa = CHILD_URL . '/config/import/images/ilona-panych-LWuHsMPzoss-unsplash.jpg';

// Photo by Tomas Robertson on Unsplash https://unsplash.com/photos/aK3PJYa9XXM/.
$zen_landing = CHILD_URL . '/config/import/images/tomas-robertson-aK3PJYa9XXM-unsplash.jpg';

// Photo by WooCommerce https://woocommerce.com/.
$zen_woo = CHILD_URL . '/config/import/images/woocommerce-demo.jpg';

return <<<CONTENT
<!-- wp:cover {"url":"$zen_homepage_top","id":99,"align":"full","className":"has-background-dim-NaN has-full-height"} -->
<div class="wp-block-cover alignfull has-background-dim has-background-dim-NaN has-full-height" style="background-image:url($zen_homepage_top)"><div class="wp-block-cover__inner-container"><!-- wp:heading {"align":"center","level":1,"textColor":"white"} -->
<h1 class="has-white-color has-text-color has-text-align-center">I'm Zen</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"medium","className":"content-wrap"} -->
<p class="has-text-color has-text-align-center has-medium-font-size has-white-color content-wrap">A minimal theme for the Genesis Framework.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"textColor":"white","align":"center","className":"is-style-outline has-margin-bottom-m"} -->
<div class="wp-block-button aligncenter is-style-outline has-margin-bottom-m"><a class="wp-block-button__link has-text-color has-white-color" href="#features" rel="">LEARN MORE</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:cover -->

<!-- wp:separator {"className":"is-style-empty"} -->
<hr class="wp-block-separator is-style-empty"/>
<!-- /wp:separator -->

<!-- wp:heading {"align":"center","className":"has-margin-bottom-m"} -->
<h2 class="has-text-align-center has-margin-bottom-m" id="features">More a Katana than a Swiss Army knife.</h2>
<!-- /wp:heading -->

<!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","className":"has-padding-xs center"} -->
<div class="wp-block-column is-vertically-aligned-center has-padding-xs center"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M8 24l2.674-9h-9.674l16-15-2.674 9h8.674l-15 15zm-1.586-11h6.912l-1.326 4 5.739-6h-6.065l1.304-4-6.564 6z"></path></svg>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">High performance</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"has-padding-xs center"} -->
<div class="wp-block-column has-padding-xs center"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M14 20l-4-4v3h-3c-1.103 0-2-.897-2-2v-10.184c1.163-.413 2-1.511 2-2.816 0-1.657-1.343-3-3-3s-3 1.343-3 3c0 1.305.837 2.403 2 2.816v10.184c0 2.206 1.794 4 4 4h3v3l4-4zm-11.8-16c0-.993.807-1.8 1.8-1.8s1.8.807 1.8 1.8-.807 1.8-1.8 1.8-1.8-.807-1.8-1.8zm7.8 0l4 4v-3h3c1.103 0 2 .897 2 2v10.184c-1.163.413-2 1.512-2 2.816 0 1.657 1.343 3 3 3s3-1.343 3-3c0-1.305-.837-2.403-2-2.816v-10.184c0-2.206-1.794-4-4-4h-3v-3l-4 4zm11.8 16c0 .993-.807 1.8-1.8 1.8s-1.8-.807-1.8-1.8.807-1.8 1.8-1.8 1.8.807 1.8 1.8z"></path></svg>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Modern workflow</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"has-padding-xs center"} -->
<div class="wp-block-column has-padding-xs center"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M24 3h-12v-2h12v2zm0 3h-12v2h12v-2zm0 5h-12v2h12v-2zm0 5h-12v2h12v-2zm0 5h-12v2h12v-2zm-14-20h-10v10h10v-10zm0 12h-10v10h10v-10z"></path></svg>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Blocks ready</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"has-padding-xs center"} -->
<div class="wp-block-column has-padding-xs center"><!-- wp:html -->
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M24 3l-.743 2h-1.929l-3.474 12h-13.239l-4.615-11h16.812l-.564 2h-13.24l2.937 7h10.428l3.432-12h4.195zm-15.5 15c-.828 0-1.5.672-1.5 1.5 0 .829.672 1.5 1.5 1.5s1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm6.9-7-1.9 7c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5z"></path></svg>
<!-- /wp:html -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">WooCommerce support</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"is-style-empty"} -->
<hr class="wp-block-separator is-style-empty"/>
<!-- /wp:separator -->

<!-- wp:media-text {"mediaPosition":"right","mediaId":9,"mediaType":"image","isStackedOnMobile":true,"verticalAlignment":"center"} -->
<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile is-vertically-aligned-center"><figure class="wp-block-media-text__media"><img src="$zen_misa" alt="" class="wp-image-9"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"align":"center"} -->
<h2 class="has-text-align-center">Tell your story.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non nibh rutrum magna molestie sagittis ac id dolor. Sed eget bibendum lorem, non efficitur neque. Nullam non felis sapien. Quisque porta nisl in aliquet lobortis.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-small-outline"} -->
<div class="wp-block-button is-style-small-outline"><a class="wp-block-button__link" href="#">ABOUT ME</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:media-text -->

<!-- wp:media-text {"mediaId":43,"mediaType":"image","isStackedOnMobile":true,"verticalAlignment":"center"} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile is-vertically-aligned-center"><figure class="wp-block-media-text__media"><img src="$zen_woo" alt="" class="wp-image-43"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"align":"center"} -->
<h2 class="has-text-align-center">Sell everything.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Cras egestas mi eget tempor lobortis. Nulla dapibus pellentesque quam et lobortis. Mauris vestibulum, ipsum vitae vulputate sollicitudin, est nisl consectetur augue, a iaculis libero ligula at diam. </p>
<!-- /wp:paragraph -->

<!-- wp:button {"className":"is-style-small-outline"} -->
<div class="wp-block-button is-style-small-outline"><a class="wp-block-button__link" href="#">GO TO SHOP</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:media-text -->

<!-- wp:separator {"className":"is-style-empty"} -->
<hr class="wp-block-separator is-style-empty"/>
<!-- /wp:separator -->

<!-- wp:cover {"url":"$zen_landing","id":100,"hasParallax":true,"align":"full","className":"has-padding-divider-l"} -->
<div class="wp-block-cover alignfull has-background-dim has-parallax has-padding-divider-l" style="background-image:url($zen_landing)"><div class="wp-block-cover__inner-container"><!-- wp:heading {"align":"center","textColor":"white","className":"content-wrap"} -->
<h2 class="has-white-color has-text-color has-text-align-center content-wrap">Engage your audience.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"white","fontSize":"medium","className":"content-wrap"} -->
<p class="has-text-color has-text-align-center has-medium-font-size has-white-color content-wrap">Create emotional landing pages that convert.</p>
<!-- /wp:paragraph -->

<!-- wp:button {"textColor":"white","align":"center","className":"is-style-outline remove-margin-bottom"} -->
<div class="wp-block-button aligncenter is-style-outline remove-margin-bottom"><a class="wp-block-button__link has-text-color has-white-color" href="#">LANDING PAGE</a></div>
<!-- /wp:button --></div></div>
<!-- /wp:cover -->

<!-- wp:separator {"className":"is-style-empty"} -->
<hr class="wp-block-separator is-style-empty"/>
<!-- /wp:separator -->

<!-- wp:heading {"align":"center","className":"has-margin-bottom-m"} -->
<h2 class="has-text-align-center has-margin-bottom-m">Create stylish contents.</h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"className":"has-margin-bottom-m","postsToShow":7} /-->

<!-- wp:button {"align":"center","className":"is-style-outline"} -->
<div class="wp-block-button aligncenter is-style-outline"><a class="wp-block-button__link" href="#">JOURNAL</a></div>
<!-- /wp:button -->

<!-- wp:separator {"className":"is-style-empty"} -->
<hr class="wp-block-separator is-style-empty"/>
<!-- /wp:separator -->
CONTENT;
