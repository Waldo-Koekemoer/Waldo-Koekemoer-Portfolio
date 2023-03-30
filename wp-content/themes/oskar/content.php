<?php
/**
 * Template part for displaying posts
 *
 * @package Oskar
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		if ( get_post_format() === 'video' ) {
			$video_content = apply_filters( 'the_content', get_the_content() );
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
				oskar_post_thumbnail();
			}
		} else {
			oskar_post_thumbnail();
		}
		/* end - image */
	} elseif ( $oskar_archive_post_option[0] === 'title' && $oskar_archive_post_option[1] === '1' ) {
		/* start - title */
		?>
		<header class="entry-header">
			<?php
			if ( !get_the_title() ) {
			?>
				<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php esc_html_e( 'No Title', 'oskar' ); ?></a></h2>
			<?php
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>
		</header><!-- .entry-header -->
		<?php
		/* end - title */
	} elseif ( $oskar_archive_post_option[0] === 'date-author' && $oskar_archive_post_option[1] === '1' ) {
		/* start - date-author */
		?>
		<div class="entry-meta">
			<?php oskar_entry_meta(); ?>
		</div><!-- .entry-meta -->
		<?php
		/* end - date-author */
	} elseif ( $oskar_archive_post_option[0] === 'date' && $oskar_archive_post_option[1] === '1' ) {
		/* start - date */
		?>
		<div class="entry-meta is-date">
			<?php oskar_entry_meta( 'date' ); ?>
		</div><!-- .entry-meta -->
		<?php
		/* end - date */
	} elseif ( $oskar_archive_post_option[0] === 'author' && $oskar_archive_post_option[1] === '1' ) {
		/* start - author */
		?>
		<div class="entry-meta is-author">
			<?php oskar_entry_meta( 'author' ); ?>
		</div><!-- .entry-meta -->
		<?php
		/* end - author */
	} elseif ( $oskar_archive_post_option[0] === 'excerpt' && $oskar_archive_post_option[1] === '1' ) {
		/* start - excerpt */
		?>
		<div class="entry-content is-excerpt">
			<?php the_excerpt();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oskar' ),
				'after'  => '</div>',
			) );
			if ( 'post' === get_post_type()) : ?>
				<a class="more-tag button" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_html( get_the_title() ); ?>"><?php esc_html_e( 'Continue Reading', 'oskar' ); ?></a>
			<?php endif; ?>
		</div><!-- .entry-content -->
		<?php
		/* end - excerpt */
	} elseif ( $oskar_archive_post_option[0] === 'content' && $oskar_archive_post_option[1] === '1' ) {
		/* start - content */
		?>
		<div class="entry-content">
			<?php the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oskar' ),
				'after'  => '</div>',
			) );
			if ( 'post' === get_post_type()) : ?>
				<a class="more-tag button" href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_html( get_the_title() ); ?>"><?php esc_html_e( 'Continue Reading', 'oskar' ); ?></a>
			<?php endif; ?>
		</div><!-- .entry-content -->
		<?php
		/* end - content */
	} elseif ( $oskar_archive_post_option[0] === 'categories' && $oskar_archive_post_option[1] === '1' ) {
		/* start - categories */
		?>
		<div class="entry-categories"><?php oskar_entry_cats(); ?></div><!-- .entry-categories -->
		<?php
		/* end - categories */
	} elseif ( $oskar_archive_post_option[0] === 'tags' && $oskar_archive_post_option[1] === '1' ) {
		/* start - tags */
		?>
		<div class="entry-tags"><?php oskar_entry_tags(); ?></div><!-- .entry-tags -->
		<?php
		/* end - tags */
	} elseif ( $oskar_archive_post_option[0] === 'comments-link' && $oskar_archive_post_option[1] === '1' ) {
		/* start - comments-link */
		?>
		<div class="entry-comments-link"><?php oskar_entry_comments_link(); ?></div><!-- .entry-comments-link -->
		<?php
		/* end - comments-link */
	} elseif ( $oskar_archive_post_option[0] === 'edit-link' && $oskar_archive_post_option[1] === '1' ) {
		/* start - edit-link */
		?>
		<div class="entry-edit-link"><?php oskar_entry_edit_link(); ?></div><!-- .entry-edit-link -->
		<?php
		/* end - edit-link */
	}
}
?>
</article><!-- #post-<?php the_ID(); ?> -->
