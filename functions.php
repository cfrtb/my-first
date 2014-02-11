<?php
/**
 * Create constants for directories accessed often
 */
define('IMAGES',  get_stylesheet_directory_uri().'/images/');


//this line removes the existing Woocommerce codes
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//This line adds a new action which adds a tag BEFORE the woocommerce "stuff"
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);

//This line adds a new action which adds a tag AFTER the woocommerce "stuff"
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

//This line adds a new css section tag called "woogrid" BEFORE the woocommerce "stuff"
function my_theme_wrapper_start() {
    
    
	echo '<div id="content" class="large-8 columns" role="main">';
    echo '<section id="woogrid">';
    
}

//This line ends the new "woogrid" section
function my_theme_wrapper_end() { 
    
    echo '</section>';
    echo '</div>';
    
    
}

// Removes the customizer css
add_action('wp_head', 'remove_wpforge_customizer_css',5);

function remove_wpforge_customizer_css(){

	remove_action('wp_head','wpforge_customizer_css');
}

// This line adds your app.css from compiled css
wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/css/scss/app.css',array('foundation') );