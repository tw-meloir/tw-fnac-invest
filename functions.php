<?php

if ( ! function_exists( 'askka_child_theme_enqueue_scripts' ) ) {
	/**
	 * Function that enqueue theme's child style
	 */
	function askka_child_theme_enqueue_scripts() {
		$main_style = 'askka-main';

		wp_enqueue_style( 'askka-child-style', get_stylesheet_directory_uri() . '/style.css', array( $main_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'askka_child_theme_enqueue_scripts' );
}


/**
* @snippet     Hide Price & Add to Cart for Logged Out Users
* @how-to      Get CustomizeWoo.com FREE
* @author      Rodolfo Melogli
* @testedwith  WooCommerce 4.1
*/
  
add_action( 'init', 'bbloomer_hide_price_add_cart_not_logged_in' );
  
function bbloomer_hide_price_add_cart_not_logged_in() {
   if ( ! is_user_logged_in() ) {
      remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
      remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
   }
}