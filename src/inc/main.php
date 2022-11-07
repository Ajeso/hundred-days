<?php

/**
 * Add the hundred days dashboard widget.
 */
function hundred_days_dashboard_widget() {
	wp_add_dashboard_widget( 'hundred_days_widget', 'Graph Widget', 'hundred_days_widget_callback' );
}
add_action( 'wp_dashboard_setup', 'hundred_days_dashboard_widget' );

/**
 * Output the contents of the dashboard widget
 */
function hundred_days_widget_callback() {
    echo '<div id="hundred-days-dashboard-widget"></div>';
}
