<?php
/**
 * The footer for the Mariners Appointment theme.
 *
 * @package MarinersAppointmentTheme
 */

?>
	</div><!-- .ma-container -->
</div><!-- .site-content -->

<footer class="site-footer">
	<div class="ma-container">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>

		<?php
		if ( has_nav_menu( 'footer' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => 'nav',
				'menu_class'     => 'footer-menu',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
		}
		?>

		<div class="site-info">
			<?php
			printf(
				/* translators: 1: year, 2: site name */
				esc_html__( '© %1$s %2$s. Powered by Mariners Appointment.', 'mariners-appointment' ),
				esc_html( gmdate( 'Y' ) ),
				esc_html( get_bloginfo( 'name' ) )
			);
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
