<?php

/**
 * Enqueue scripts and styles.
 */
function carit_scripts() {
	wp_enqueue_style( 'carit-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'carit-style', 'rtl', 'replace' );

	wp_enqueue_script( 'carit-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carit_scripts' );