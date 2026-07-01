<?php
/**
 * The template for displaying single posts.
 *
 * @package MarinersAppointmentTheme
 */

get_header();
?>

<div class="content-area">
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="entry-meta"><?php mariners_theme_entry_meta(); ?></div>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail"><?php the_post_thumbnail( 'large' ); ?></div>
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mariners-appointment' ),
						'after'  => '</div>',
					) );
					?>
				</div>

				<footer class="entry-footer">
					<?php
					$categories = get_the_category_list( ', ' );
					if ( $categories ) {
						echo '<div class="entry-categories">' . esc_html__( 'Categories: ', 'mariners-appointment' ) . wp_kses_post( $categories ) . '</div>';
					}

					$tags = get_the_tag_list( '', ', ' );
					if ( $tags ) {
						echo '<div class="entry-tags">' . esc_html__( 'Tags: ', 'mariners-appointment' ) . wp_kses_post( $tags ) . '</div>';
					}
					?>
				</footer>
			</article>

			<?php
			the_post_navigation( array(
				'prev_text' => '&larr; %title',
				'next_text' => '%title &rarr;',
			) );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		<?php endwhile; ?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
