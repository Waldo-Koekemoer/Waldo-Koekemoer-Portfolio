<?php
/**
 * Custom template tags for this theme
 *
 * @package Oskar
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function oskar_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>';
}

function oskar_related_posted_on( $related_id ) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U', $related_id ) !== get_the_modified_time( 'U', $related_id ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c', $related_id ) ),
		esc_html( get_the_date( '', $related_id ) ),
		esc_attr( get_the_modified_date( 'c', $related_id ) ),
		esc_html( get_the_modified_date( '', $related_id ) )
	);

	echo '<span class="posted-on">' . $time_string . '</span>';
}


/**
 * Prints HTML with meta information for the current author.
 */
function oskar_posted_by( $type ='' ) {
	if ( in_the_loop() ) {
		if ( $type === 'author' ) {
			echo '<span class="author vcard">' . esc_html( get_the_author() ) . '</span> ';
		} else {
			echo '<span class="byline">' . esc_html__( ' by ', 'oskar' ) . '<span class="author vcard">' . esc_html( get_the_author() ) . '</span></span> ';
		}
	} else {
		global $post;
		if ( $type === 'author' ) {
			echo '<span class="author vcard">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</span> ';
		} else {
			echo '<span class="byline">' . esc_html__( ' by ', 'oskar' ) . '<span class="author vcard">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</span></span> ';
		}
	}
}

function oskar_related_posted_by( $related_id, $type ) {
	$post = get_post( $related_id );
	if ( $type === 'author' ) {
		echo '<span class="author vcard">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</span> ';
	} else {
		echo '<span class="byline">' . esc_html__( ' by ', 'oskar' ) . '<span class="author vcard">' . esc_html( get_the_author_meta( 'display_name', $post->post_author ) ) . '</span></span> ';
	}
}


function oskar_entry_meta( $type ='' ) {
	if ( 'post' === get_post_type() ) {
		if ( $type === 'date' ) {
			oskar_posted_on();
		} elseif ( $type === 'author' ) {
			oskar_posted_by( $type );
		} else {
			oskar_posted_on();
			oskar_posted_by( $type );
		}
	}
}

function oskar_related_entry_meta( $related_id, $type ='' ) {
	if ( 'post' === get_post_type( $related_id ) ) {

		if ( $type === 'date' ) {
			oskar_related_posted_on( $related_id );
		} elseif ( $type === 'author' ) {
			oskar_related_posted_by( $related_id, $type );
		} else {
			oskar_related_posted_on( $related_id );
			oskar_related_posted_by( $related_id, $type );
		}
	}
}


/**
 * Prints HTML with meta information for the categories.
 */
function oskar_entry_cats() {

	$categories_list = get_the_category_list();
	if ( $categories_list ) {
		echo $categories_list;
	}

}

function oskar_related_entry_cats( $related_id ) {

	$categories_list = get_the_category_list( '', '', $related_id );
	if ( $categories_list ) {
		echo $categories_list;
	}

}


/**
 * Prints HTML with meta information for the tags.
 */
function oskar_entry_tags() {

	$tags_list = get_the_tag_list( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' );
	if ( $tags_list ) {
		echo $tags_list;
	}

}

function oskar_related_entry_tags( $related_id ) {

	$tags_list = get_the_tag_list( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>', $related_id );
	if ( $tags_list ) {
		echo $tags_list;
	}

}


/**
 * Prints HTML with meta information for the comments link.
 */
function oskar_entry_comments_link() {

	if ( !post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<i class="oskar-icon-comment"></i> <span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'oskar' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

}

function oskar_related_entry_comments_link( $related_id ) {

	if ( !post_password_required( $related_id ) && ( comments_open( $related_id ) || get_comments_number( $related_id ) ) ) {
		echo '<i class="oskar-icon-comment"></i> <span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'oskar' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title( $related_id )
			)
		);
		echo '</span>';
	}

}


/**
 * Prints HTML with the edit post link.
 */
function oskar_entry_edit_link() {

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'oskar' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<i class="oskar-icon-edit"></i> <span class="edit-link">',
		'</span>'
	);

}

function oskar_related_entry_edit_link( $related_id ) {

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'oskar' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title( $related_id )
		),
		'<i class="oskar-icon-edit"></i> <span class="edit-link">',
		'</span>'
	);

}


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function oskar_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		if ( is_single() ) {

			$author_post_count = count_user_posts( get_the_author_meta( 'ID' ) );
			if ( $author_post_count > 1 ) {
				/* translators: %2s: number of posts by this author. */
				$author_post_count_output = sprintf( ' - <span class="author-post-count"><a href="%1s">' . esc_html__( '%2s posts', 'oskar' ) . '</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), $author_post_count );
			} else {
				$author_post_count_output = '';
			}

			echo '<span class="author-name-wrap"><span class="author-name">' . esc_html( get_the_author() ) . '</span>' . $author_post_count_output . '</span>';
			echo '<span class="author-description">' . wpautop( get_the_author_meta( 'description' ) ) . '</span>';

		}

		$categories_list = get_the_category_list();
		if ( $categories_list ) {
			echo $categories_list;
		}

		$tags_list = get_the_tag_list( '<ul class="post-tags"><li>', '</li><li>', '</li></ul>' );
		if ( $tags_list ) {
			echo $tags_list;
		}

	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'oskar' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'oskar' ),
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
}


/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function oskar_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
		the_post_thumbnail( get_theme_mod( 'archive_img_size', 'medium' ), array(
			'alt' => the_title_attribute( array(
				'echo' => false,
			) ),
		) );
		?>
	</a>

	<?php
	endif; // End is_singular().
}


function oskar_related_post_thumbnail($related_id) {
	if ( post_password_required($related_id) || is_attachment($related_id) || ! has_post_thumbnail($related_id) ) {
		return;
	}
	?>

	<a class="post-thumbnail" href="<?php the_permalink($related_id); ?>" aria-hidden="true">
		<?php
		echo get_the_post_thumbnail( $related_id, get_theme_mod( 'archive_img_size', 'medium' ), array(
			'alt' => the_title_attribute( array(
				'echo' => false,
				'post' => $related_id,
			) ),
		) );
		?>
	</a>

	<?php
}


/**
 * Displays the single post excerpt.
 *
 * Do not display auto-generated excerpt, only manually added excerpt.
 * [get_the_excerpt] and [apply_filters( 'the_excerpt', get_post_field( 'post_excerpt') )]
 * are not suitable because some plugins are auto-generating unwanted excerpts.
 *
 */
function oskar_single_excerpt() {

	$single_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt') ) );
	if ( $single_excerpt ) { ?>
		<div class="single-excerpt">
			<?php echo $single_excerpt; ?>
		</div>
	<?php }

}
