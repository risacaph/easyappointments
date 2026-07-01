<?php
/**
 * Uninstall routine for the Mariners Appointment plugin.
 *
 * Removes the plugin options when the plugin is deleted from WordPress.
 *
 * @package MarinersAppointment
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'mariners_appointment_settings' );

// Clean up on multisite installations as well.
if ( is_multisite() ) {
	global $wpdb;

	$blog_ids = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs}" );

	foreach ( $blog_ids as $blog_id ) {
		switch_to_blog( (int) $blog_id );
		delete_option( 'mariners_appointment_settings' );
		restore_current_blog();
	}
}
