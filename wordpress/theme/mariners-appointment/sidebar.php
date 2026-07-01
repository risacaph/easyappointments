<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package MarinersAppointmentTheme
 */

if ( ! mariners_theme_has_sidebar() ) {
	return;
}
?>

<aside id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Sidebar', 'mariners-appointment' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
