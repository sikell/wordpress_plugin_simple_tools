<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * Uninstalling deletes options, tables, and pages.
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
