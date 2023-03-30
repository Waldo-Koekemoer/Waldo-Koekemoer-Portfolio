<?php
/**
 * Template part for displaying related posts
 *
 * @package Oskar
 */
$grid_layout = get_theme_mod( 'grid_layout', '4' );
if ( $grid_layout === 3 ) {
	$posts_per_page = 3;
} else {
	$posts_per_page = 4;
}

$categories = wp_get_post_categories( get_the_id() );

$related_posts = get_posts(
	array(
		'posts_per_page'	=> $posts_per_page,
		'category'			=> $categories,
		'exclude'			=> get_the_id()
	)
);

if ( count( $related_posts ) > 0 ) { 
	$grid_loop_layout = ' class="layout-'. esc_attr( $grid_layout ) .'"';
	?>

	<div class="related-posts">
		<h3><?php esc_html_e( 'Related', 'oskar' ) ;?></h3>
		<div id="grid-loop"<?php echo $grid_loop_layout;?>>
			<?php foreach ( $related_posts as $related_post ) { 
					$related_id = $related_post->ID;
				?>
			<article id="post-<?php echo $related_id; ?>" <?php post_class('', $related_id); ?>>
			<?php
			$oskar_archive_post = get_theme_mod( 'archive_post' );
			if ( !$oskar_archive_post ) {
				$oskar_archive_post['options'] = 'image:1,title:1,categories:1,date-author:1,date:0,author:0,excerpt:1,content:0,tags:1,comments-link:1,edit-link:1';
			}
			$oskar_archive_post_options = explode( ',', $oskar_archive_post['options'] );
			foreach ( $oskar_archive_post_options as $oskar_archive_post_option ) {
				$oskar_archive_post_option = explode (':', $oskar_archive_post_option );
				if ( $oskar_archive_post_option[0] === 'image' && $oskar_archive_post_option[1] === '1' ) {
					/* start - image */
					if ( get_post_format($related_id) === 'video' ) {
						$video_content = apply_filters( 'the_content', get_post($related_id)->post_content );
						$video = false;
						// Only get video from the content if a playlist isn't present.
						if ( false === strpos( $video_content, 'wp-playlist-script' ) ) {
							$video = get_media_embedded_in_content( $video_content, array( 'video', 'object', 'embed', 'iframe' ) );
						}
						if ( ! empty( $video ) ) {
							$first_video = true;
							foreach ( $video as $video_html ) {
								if ( $first_video ) {
									echo '<div class="entry-video">';
										echo $video_html;
									echo '</div>';
									$first_video = false;
								}
							}
						} else {
							oskar_related_post_thumbnail($related_id);
						}
					} else {
						oskar_related_post_thumbnail($related_id);
					}
					/* end - image */
				} elseif ( $oskar_archive_post_option[0] === 'title' && $oskar_archive_post_option[1] === '1' ) {
					/* start - title */
					?>
					<header class="entry-header">
						<?php
						if ( !get_the_title($related_id) ) {
						?>
							<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink($related_id) ); ?>" rel="bookmark"><?php esc_html_e( 'No Title', 'oskar' ); ?></a></h3>
						<?php
						} else {
							echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink($related_id) ) . '" rel="bookmark">' . wp_kses_post( get_the_title($related_id) ) . '</a></h2>';
						}
						?>
					</header><!-- .entry-header -->
					<?php
					/* end - title */
				} elseif ( $oskar_archive_post_option[0] === 'date-author' && $oskar_archive_post_option[1] === '1' ) {
					/* start - date-author */
					?>
					<div class="entry-meta">
						<?php
						oskar_related_entry_meta( $related_id );
						?>
					</div><!-- .entry-meta -->
					<?php
					/* end - date-author */
				} elseif ( $oskar_archive_post_option[0] === 'date' && $oskar_archive_post_option[1] === '1' ) {
					/* start - date */
					?>
					<div class="entry-meta is-date">
						<?php
						oskar_related_entry_meta( $related_id, 'date' );
						?>
					</div><!-- .entry-meta -->
					<?php
					/* end - date */
				} elseif ( $oskar_archive_post_option[0] === 'author' && $oskar_archive_post_option[1] === '1' ) {
					/* start - author */
					?>
					<div class="entry-meta is-author">
						<?php
						oskar_related_entry_meta( $related_id, 'author' );
						?>
					</div><!-- .entry-meta -->
					<?php
					/* end - author */
				} elseif ( $oskar_archive_post_option[0] === 'excerpt' && $oskar_archive_post_option[1] === '1' ) {
					/* start - excerpt */
					?>
					<div class="entry-content is-excerpt">
						<?php $related_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $related_id ) ) );
						if ( $related_excerpt === '' ) {
							$related_excerpt = wpautop( wp_trim_words( get_post_field( 'post_content', $related_id ), get_theme_mod('excerpt_length',20) ) );
						}
						if ( $related_excerpt !== '' ) {
							echo $related_excerpt;
						}
						if ( 'post' === get_post_type($related_id)) : ?>
							<a class="more-tag button" href="<?php echo esc_url( get_the_permalink($related_id) ); ?>" title="<?php echo esc_html( get_the_title($related_id) ); ?>"><?php esc_html_e( 'Continue Reading', 'oskar' ); ?></a>
						<?php endif; ?>
					</div><!-- .entry-content -->
					<?php
					/* end - excerpt */
				} elseif ( $oskar_archive_post_option[0] === 'content' && $oskar_archive_post_option[1] === '1' ) {
					/* start - content */
					?>
					<div class="entry-content">
						<?php
						echo wp_kses_post( get_post_field( 'post_content', $related_id ) );
						if ( 'post' === get_post_type($related_id)) : ?>
							<a class="more-tag button" href="<?php echo esc_url( get_the_permalink($related_id) ); ?>" title="<?php echo esc_html( get_the_title($related_id) ); ?>"><?php esc_html_e( 'Continue Reading', 'oskar' ); ?></a>
						<?php endif; ?>
					</div><!-- .entry-content -->
					<?php
					/* end - content */
				} elseif ( $oskar_archive_post_option[0] === 'categories' && $oskar_archive_post_option[1] === '1' ) {
					/* start - categories */
					?>
					<div class="entry-categories"><?php oskar_related_entry_cats( $related_id ); ?></div><!-- .entry-categories -->
					<?php
					/* end - categories */
				} elseif ( $oskar_archive_post_option[0] === 'tags' && $oskar_archive_post_option[1] === '1' ) {
					/* start - tags */
					?>
					<div class="entry-tags"><?php oskar_related_entry_tags( $related_id ); ?></div><!-- .entry-tags -->
					<?php
					/* end - tags */
				} elseif ( $oskar_archive_post_option[0] === 'edit-link' && $oskar_archive_post_option[1] === '1' ) {
					/* start - edit-link */
					?>
					<div class="entry-edit-link"><?php oskar_related_entry_edit_link( $related_id ); ?></div><!-- .entry-edit-link -->
					<?php
					/* end - edit-link */
				}
			}
			?>
			</article><!-- #post-<?php echo $related_id; ?> -->
			<?php } ?>
		</div><!-- #grid-loop -->
	</div>

<?php
}
