<?php 
$formula_blog_disabled = get_theme_mod('formula_blog_disabled','on');
if($formula_blog_disabled ==true):
	
$formula_blog_container_size = get_theme_mod('formula_blog_container_size', 'container-full');
?>
<!-- Blog Section -->
<section id="blog-selector-scroll" class="blog home-news">
	<div class="<?php echo esc_attr($formula_blog_container_size); ?>">
		<?php
		$formula_blog_area_title = get_theme_mod('formula_blog_area_title',__('Latest News','formula'));
		$formula_blog_area_des = get_theme_mod('formula_blog_area_des',__('Blog','formula'));
		
		if(($formula_blog_area_title) || ($formula_blog_area_des)!='' ){ ?>
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-header">
					<?php if($formula_blog_area_des){ ?>
						<p class="section-subtitle"><?php echo $formula_blog_area_des; ?></p>
					<?php } if($formula_blog_area_title){ ?>
						<h1 class="section-title"><?php echo $formula_blog_area_title; ?></h1>
					<?php } ?>
					<div class="divider-line"></div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
				<?php
				$formula_blog_column_layout  = get_theme_mod( 'formula_blog_column_layout','col-xl-4');
				$formula_theme_blog_category = get_theme_mod('formula_theme_blog_category');
				$formula_blog_count  = get_theme_mod( 'formula_blog_count', array('slider' => 4,'suffix' => '',));
				
				$post_args = array( 'post_type' => 'post','posts_per_page' => $formula_blog_count['slider'],
				'category__in'	=> $formula_theme_blog_category,'post__not_in'=>get_option("sticky_posts")); 	
				query_posts( $post_args );
				if(query_posts( $post_args )){
					while(have_posts()):the_post(); { ?>
						<div class="<?php echo esc_attr($formula_blog_column_layout); ?> wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
							<article class="post <?php if(!has_post_thumbnail()){ echo 'has-no-thumbnail'; } ?>" >
								<?php if(has_post_thumbnail()){ ?>
									<figure class="post-thumbnail">
										<?php if(has_post_thumbnail()){ ?>
											<?php //$img_class =array('class' => "img-fluid"); ?>
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large','$img_class');?></a>
										<?php } ?>
									</figure>	
								<?php } ?>
								<div class="blog-head">
									<div class="news-date">
										<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>">
											<span><?php echo esc_html(get_the_date('j M')); ?></span>
										</a>
									</div>
									<div class="entry-meta">
										<span class="byline"><?php esc_html_e('By','formula'); ?>
										<span class="author vcard">
											<a class="url fn n" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>	
										</span></span>
									</div>	
									<header class="entry-header">		
										<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>	
									</header>
										<?php /* $category_data = get_the_category_list( esc_html__( '  ', 'formula' ) );
										if(!empty($category_data)) {
										echo '<span class="cat-links">' . $category_data . '</span>';
										}  */?>
								</div>
								<div class="full-content">
									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</article>
						</div><?php 
					}  
					endwhile; 
				} ?>
		</div>
		<?php 
			$formula_blog_area_button = get_theme_mod('formula_blog_area_button','Show More');
			$formula_blog_section_button_link = get_theme_mod('formula_blog_section_button_link','#');

			if($formula_blog_area_button != ""): ?>
			<div class="row">
				<div class="col-md-12 col-xs-12 text-center news-selector-button">
					<div class="m-top-20 m-bottom-30">
						<a href="<?php echo esc_url($formula_blog_section_button_link); ?>" class="thm-btn" target="_blank">
							<?php echo esc_html($formula_blog_area_button); ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>	
<?php endif; ?>	
<!-- End of Blog Section -->	
<div class="clearfix"></div>	