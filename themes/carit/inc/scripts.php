<?php

/**
 * Enqueue scripts and styles.
 */
function carit_scripts() {

	wp_enqueue_style( 'enhance', get_template_directory_uri() . '/assets/css/enhance.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'catalog-enhance', get_template_directory_uri() . '/assets/css/catalog-enhance.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main-style.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'hot-ideas', get_template_directory_uri() . '/assets/css/hot-ideas.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'product-type-shifter-block', get_template_directory_uri() . '/assets/css/product-type-shifter-block.css', array(), _S_VERSION, true );
	wp_enqueue_style( 'universal-tabs', get_template_directory_uri() . '/assets/css/universal-tabs.css', array(), _S_VERSION, true );

	wp_enqueue_style( 'carit-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'carit-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'carit-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carit_scripts' );

