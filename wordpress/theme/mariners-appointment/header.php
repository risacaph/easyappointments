<?php
/**
 * The header for the Mariners Appointment theme.
 *
 * @package MarinersAppointmentTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class( mariners_theme_has_sidebar() ? '' : 'no-sidebar' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mariners-appointment' ); ?></a>

<header class="site-header">
	<div class="ma-container">
		<div class="site-branding">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>

			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>
			<?php else : ?>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</p>
			<?php endif; ?>

			<?php
			$ma_description = get_bloginfo( 'description', 'display' );
			if ( $ma_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html( $ma_description ); ?></p>
			<?php endif; ?>
		</div>

		<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'mariners-appointment' ); ?>">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e( 'Menu', 'mariners-appointment' ); ?>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => false,
			) );
			?>
		</nav>
	</div>
</header>

<div class="site-content">
	<div class="ma-container">
