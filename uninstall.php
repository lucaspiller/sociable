<?php
/**
 * Uninstall hook.
 *
 * @since 4.4.0
 * @package Sociable
 */

// If this file is called directly, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Delete plugin configuration.
delete_option( 'sociable_options' );
delete_option( 'sociable_known_sites' );
delete_option( 'skyscraper_options' );
delete_option( 'skyscraper_latest' );
delete_option( 'skyscraper_mentions' );

// Delete all metadata from the database.
global $wpdb;
$wpdb->query( "DELETE FROM $wpdb->postmeta WHERE meta_key = '_sociableoff'" );

?>
