<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package score
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<footer class="entry-footer">
		<?php if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				music_press__posted_on();
				music_press__posted_by();
				music_press__entry_footer();				
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>	
	</footer><!-- .entry-footer -->

<?php if ( has_post_thumbnail() and get_theme_mod('hide_featured') and is_singular() ) { ?>
			<div class="post-thumb-featured">
				<?php 
				$post_thumbnail_attr = array(
				'alt'   => get_the_title(),
				'title' => get_the_title(),
				'itemprop' => 'image' );	
				the_post_thumbnail( 'post-thumbnail', $post_thumbnail_attr  ); 
				?>
			</div>
		<?php } ?>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title title-single">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
?>
	</header>
	<?php if ( (is_front_page() || is_home() || is_archive() || is_page_template('template-blog.php')) and (!is_page_template( 'templeat-full-width.php'))) : ?>
		<?php if ( has_post_thumbnail() ) { ?>
		<a class="app-img-effect" href="<?php the_permalink(); ?>">	
			<div class="app-first">
				<div class="app-sub">
				<div class="hover-eff">
					<div class="fig">
						<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image', 'alt'   => get_the_title(), 'title' => get_the_title() ) ); ?>		
					</div>
				</div>
				</div>
			</div>
		</a> 
		<?php } ?>
	<?php the_excerpt();  ?>
	<?php else : ?>
	<div class="entry-content">
		<?php
		do_action('artist_demo');
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'music-press' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'music-press' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->