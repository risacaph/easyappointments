<?php
/**
 * The main template file.
 *
 * @package MarinersAppointmentTheme
 */

get_header();
?>

<div class="content-area">
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
					<header class="entry-header">
						<?php
						the_title(
							'<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">',
							'</a></h2>'
						);
						?>
						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta"><?php mariners_theme_entry_meta(); ?></div>
						<?php endif; ?>
					</header>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
						</div>
					<?php endif; ?>

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>

					<p class="read-more">
						<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'mariners-appointment' ); ?></a>
					</p>
				</article>
			<?php endwhile; ?>

			<?php mariners_theme_pagination(); ?>

		<?php else : ?>

			<article class="entry no-results">
				<h2 class="entry-title"><?php esc_html_e( 'Nothing here yet', 'mariners-appointment' ); ?></h2>
				<div class="entry-content">
					<p><?php esc_html_e( 'It looks like there is no content to show. Try a search?', 'mariners-appointment' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>

		<?php endif; ?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
