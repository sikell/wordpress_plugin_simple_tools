<?php
/**
 * Sikeller Tools Widget Functions
 *
 * Widget related functions and widget registration.
 *
 * @category Core
 * @package  Sikeller_Tools/Functions
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include Widget classes.
include_once( dirname( __FILE__ ) . '/abstracts/abstract-sikeller-widget.php' );
include_once( dirname( __FILE__ ) . '/widgets/class-sikeller-widget-heading.php' );
include_once( dirname( __FILE__ ) . '/widgets/class-sikeller-widget-thumb-image.php' );
include_once( dirname( __FILE__ ) . '/widgets/class-sikeller-widget-google-maps.php' );

/**
 * Register Widgets.
 * @since 1.0.0
 */
function sikeller_tools_register_widgets() {
	register_widget( 'SK_Widget_Heading' );
    register_widget( 'SK_Widget_Thumb_Image' );
    register_widget( 'SK_Widget_Google_Maps' );
}
add_action( 'widgets_init', 'sikeller_tools_register_widgets' );

/**
 * Adds Tools Widgets in SiteOrigin Pagebuilder Tabs.
 * @since 1.0.0
 */
function sikeller_tools_widgets($widgets) {
	$theme_widgets = array(
		'SK_Widget_Heading',
        'SK_Widget_Thumb_Image'
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('sikeller-tools');
			$widgets[$theme_widget]['icon']   = 'dashicons dashicons-admin-tools';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'sikeller_tools_widgets');

/* Add a tab for the theme widgets in the page builder */
function sikeller_tools_widgets_tab($tabs){
	$tabs[] = array(
		'title'  => __('Sikeller Widgets', 'sikeller-tools'),
		'filter' => array(
			'groups' => array('sikeller-tools')
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'sikeller_tools_widgets_tab', 20);

/**
 * Remove Widget Title.
 * @param string $title The widget title.
 * @return bool|string
 */
function sikeller_tools_remove_widget_title( $title ) {
	if ( '!' === substr( $title, 0, 1 ) ) {
		return false;
	}

	return $title;
}
add_filter( 'widget_title', 'sikeller_tools_remove_widget_title' );
