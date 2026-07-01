<?php
/**
 * Template Name: Full Width
 *
 * A page template without the sidebar — ideal for the booking page created with
 * the Mariners Appointment plugin shortcode or block.
 *
 * @package MarinersAppointmentTheme
 */

get_header();
?>

<div class="content-area no-sidebar">
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mariners-appointment' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>
</div>

<?php
get_footer();
