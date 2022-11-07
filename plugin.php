<?php

/**
 * Plugin Name:       Hundred Days
 * Description:       WordPress dashboard chart widget.
 * Version:           0.0.1
 * Author:            Monicah Ajeso
 * Author URI:        https://ajeso.dev
 * License:           GPL v3
 * Text Domain:       hundred-days
 */

//  Require necessary PHP files
require_once( 'src/inc/main.php' );

// Include scripts and styles
function hundred_days_scripts() {
    wp_enqueue_script( 'hundred-days-script', plugin_dir_url( __FILE__ ) . 'build/admin.js', array( 'wp-element' ), '0.0.1', true );
    wp_enqueue_style( 'hundred-days-style', plugin_dir_url( __FILE__ ) . 'build/admin.css', '0.0.1' );
}
add_action( 'admin_enqueue_scripts', 'hundred_days_scripts' );


// On the plugin activation, add a custom table
register_activation_hook( __FILE__, 'hundred_days_stats_table' );

function hundred_days_stats_table() {
    global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'hundred_days_stats';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		views smallint(5) NOT NULL,
		clicks smallint(5) NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

// Create a custom REST API endpoint for the stats
function hundred_days_get_stats() {
    global $wpdb;
    $stats = $wpdb->get_results("SELECT * FROM wp_hundred_days_stats");

    return $stats;
}

function hundred_days_stats_endpoint() {
    register_rest_route( 'wp/v2', '/hundred_days_stats', array(
        'args' => array(),
        'methods' => 'GET',
        'callback' => 'hundred_days_get_stats'
    ));
}
add_action( 'rest_api_init', 'hundred_days_stats_endpoint');
