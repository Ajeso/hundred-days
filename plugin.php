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
}
add_action( 'admin_enqueue_scripts', 'hundred_days_scripts' );

