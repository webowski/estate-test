<?php

add_action( 'wp_enqueue_scripts', 'estate_enqueue_styles' );
function estate_enqueue_styles() {
	$theme = wp_get_theme();

	if (!is_admin()) {

		wp_enqueue_script(
			'bundle-script',
			get_stylesheet_directory_uri() . '/scripts/bundle.min.js',
			array(),
			$theme->get('Version'),
			true
		);

		wp_enqueue_style(
			'parent-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$theme->parent()->get('Version')
		);

		wp_enqueue_style(
			'bundle-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get('Version')
		);

	}
}
