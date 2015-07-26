<?php
/**
 * Sociable plugin main entry point and initialisation
 *
 * @since 4.4.0
 * @package Sociable
 *
 * Plugin Name: Sociable
 * Plugin URI: http://blogplay.com/plugin
 * Description: Automatically add links on your posts, pages and RSS feed to your favorite social bookmarking sites.
 * Version: 4.3.4.1
 * Author: Blogplay
 * Author URI: http://blogplay.com/
 * Copyright 2006 Peter Harkins (ph@malaprop.org)
 * Copyright 2008-2009 Joost de Valk (joost@yoast.com)
 * Copyright 2009-Present Blogplay.com (info@blogplay.com)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Figure out the path for assets in this plugin.
define( 'SOCIABLE_HTTP_PATH', plugins_url( '', __FILE__ ) . '/' );

/**
 * Begins execution of the plugin.
 *
 * @since 4.4.0
 */
function run_sociable() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-Sociable_Globals.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sociable-config.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/sociable_output.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/skyscraper_output.php';

	// Only load the admin code if we are accessing the admin section.
	if ( is_admin() ) {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-sociable_Admin_Options.php';
	}

	load_plugin_textdomain( 'sociable', false, dirname( plugin_basename( __FILE__ ) ) .'/languages' );

	add_action( 'init' , 'sociable_init' );
}

/**
 * Continues execution after the Wordpress core has been loaded.
 *
 * @since 4.4.0
 */
function sociable_init() {
	// Loads and initialises the plugin options if they aren't already set.
	Sociable_Config::load();
	Sociable_Config::check_for_upgrade();

	// Setup admin hooks.
	if ( is_admin() ) {
		add_action( 'admin_init', array( 'sociable_Admin_Options', 'init' ) );
		add_action( 'admin_menu', array( 'sociable_Admin_Options', 'add_menu_pages' ) );
		add_action( 'save_post',  array( 'sociable_Admin_Options', 'save_post' ) );
	}

	sociable_classic_init();
	sociable_skyscraper_init();
}

/**
 * Initialise sociable classic.
 *
 * @since 4.4.0
 */
function sociable_classic_init() {
	global $sociable_options;

	// Add hooks for sociable classic in posts.
	add_filter( 'the_content', 'auto_sociable' );
	add_filter( 'the_excerpt', 'auto_sociable' );

	// Enqueue scripts and stylesheets.
	wp_enqueue_script( 'sociable' , SOCIABLE_HTTP_PATH . 'js/sociable.js', array( 'jquery' ), true );
	wp_enqueue_script( 'google-plusone', '//apis.google.com/js/plusone.js', array(), false, true );

	if ( isset( $sociable_options['use_stylesheet'] ) ) {
		wp_enqueue_style( 'sociablecss' , SOCIABLE_HTTP_PATH . 'css/sociable.css' );
	}
}

/**
 * Initialise sociable skyscraper.
 *
 * @since 4.4.0
 */
function sociable_skyscraper_init() {
	global $skyscraper_options;

	$run_skyscraper = false;

	$request_uri = $_SERVER['REQUEST_URI'];

	if ( is_admin() ) {
		if ( strpos( $request_uri, 'page=skyscraper_options' ) ) {
			// Always run on the skyscraper admin page.
			$run_skyscraper = true;
		}
	} else {
		if ( isset( $skyscraper_options['active'] ) ) {
			// Run if enabled.
			$run_skyscraper = true;
		}
	}

	if ( $run_skyscraper ) {
		wp_enqueue_script( 'oplugin',                 SOCIABLE_HTTP_PATH . 'js/oPlugin.js',    array(), false, true );
		wp_enqueue_script( 'async_call',              SOCIABLE_HTTP_PATH . 'js/async_call.js', array(), false, true );
		wp_enqueue_style( 'skyscraper_style_shape',   SOCIABLE_HTTP_PATH . 'css/shape.css' );
		wp_enqueue_style( 'skyscraper_style_toolbar', SOCIABLE_HTTP_PATH . 'css/toolbar.css' );

		$async_options = array( 'base_url' => SOCIABLE_HTTP_PATH );
		wp_localize_script( 'async_call', 'sociable_async_options', $async_options );
	}
}

/**
 * Plugin activation hook
 *
 * @since 4.4.0
 */
function sociable_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sociable-config.php';

	if ( ! get_option( 'sociable_options' ) ) {
		SociableConfig::sociable_reset();
	}

	if ( ! get_option( 'skyscraper_options' ) ) {
		SociableConfig::skyscraper_reset();
	}
}

register_activation_hook( __FILE__, 'sociable_activate' );

run_sociable();

?>
