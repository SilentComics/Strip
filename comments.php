<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Strip
 * @since 1.2.2
 * @version 1.0
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( esc_html_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'strip' ), get_the_title() );
			} else {
				printf(
					esc_attr(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'strip'
						)
					),
					esc_html( number_format_i18n( $comments_number ) ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 96,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => __( 'Reply', 'strip' ),
				) );
			?>
		</ol>

		<?php $comment_pagination = paginate_comments_links(
 				array(
 					'echo'      => false,
 					'end_size'  => 0,
 					'mid_size'  => 0,
 					'next_text' => __( 'Newer Comments', 'Strip' ) . ' &rarr;',
 					'prev_text' => '&larr; ' . __( 'Older Comments', 'Strip' ),
 				)
 			);
 			if ( $comment_pagination ) {
 				$pagination_classes = '';
 				// If we're only showing the "Next" link, add a class indicating so.
 				if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
 					$pagination_classes = ' only-next';
 				}
 				?>

 				<nav class="comments-pagination pagination<?php echo $pagination_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'Strip' ); ?>">
 					<?php echo wp_kses_post( $comment_pagination ); ?>
 				</nav>

 				<?php
 			}

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'strip' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
