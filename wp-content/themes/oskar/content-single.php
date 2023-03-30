<?php
/**
 * Template part for displaying single posts
 *
 * @package Oskar
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
if ( get_theme_mod( 'page_title_style' ) == 2 || get_theme_mod( 'page_title_style' ) == 4 ) {

	if ( has_post_thumbnail() && get_theme_mod( 'page_title_style' ) == 2 ) {
	$thumbnail_on = true; ?>
	<header class="entry-header with-image image-on-page" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')">
		<div class="title-meta-wrapper">
			<div class="container">
<?php } else {
	$thumbnail_on = false; ?>
	<header class="entry-header">
		<?php }
		//oskar_post_thumbnail();

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php oskar_entry_meta(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif;

		the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	<?php if ( $thumbnail_on ) { ?>
			</div>
		</div>
	<?php } ?>
	</header><!-- .entry-header -->

<?php
} ?>

	<div class="entry-content single-entry-content">
		<?php
		if ( get_theme_mod( 'page_title_style' ) == 2 || get_theme_mod( 'page_title_style' ) == 4 ) {
		oskar_single_excerpt();
		}

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oskar' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php oskar_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
