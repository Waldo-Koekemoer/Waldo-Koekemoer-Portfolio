<?php
	/*
		* A Simple Category Template
	*/
get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php while ( have_posts() ) : the_post(); 

			do_action('mp_search_query');// go to /include/search-query.php
			
			endwhile; ?>

		<div class="nextpage">
			
			<div class="pagination">

				<?php echo esc_url(paginate_links()); ?>

			</div>
			
		</div> 

		<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>
		
		<?php endif; ?>		
	</main><!-- #main -->
</div><!-- #primary -->
	<?php get_sidebar(); ?>	
	<?php get_footer(); ?>				