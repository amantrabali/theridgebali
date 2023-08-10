<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package The_Ridge_Bali
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_ridge_check_dependencies() {
    // Check if Elementor plugin is active
    if (!is_plugin_active('elementor/elementor.php')) {
        ?>
        <div class="notice notice-error">
            <p><strong>The Ridge theme requires Elementor plugin to be installed and activated.</strong></p>
        </div>
        <?php
    }

    // Check if The Ridge Core plugin is active
    if (!is_plugin_active('theridgebali-core/theridgebali-core.php')) {
        ?>
        <div class="notice notice-error">
            <p><strong>The Ridge theme requires The Ridge Core plugin to be installed and activated.</strong></p>
        </div>
        <?php
    }
}
function theridgebali_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'theridgebali_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function theridgebali_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'theridgebali_pingback_header' );
