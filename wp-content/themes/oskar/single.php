<?php
/**
 * The template for displaying all single posts
 *
 * @package Oskar
 */

get_header();

$has_sidebar = '';

if ( is_active_sidebar( 'oskar-sidebar' ) ) {
	$has_sidebar = ' has-sidebar';
}
?>

	<div id="primary" class="content-area<?php echo $has_sidebar;?>">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php
					the_post_navigation( array(
						'prev_text' => '<span class="nav-title"><i class="fa fa-chevron-left"></i>%title</span>',
						'next_text' => '<span class="nav-title">%title<i class="fa fa-chevron-right"></i></span>',
					) );

					get_template_part( 'content', 'related' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
