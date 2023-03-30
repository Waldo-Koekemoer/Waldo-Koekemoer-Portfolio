<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package score
 */
?>
<article style="width: 100%;" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<?php the_title( '<h1 class="entry-title title-single">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'music-press' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'music-press' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->