<div id="comments" class="comments-area">

    <?php
    comment_form();

	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>

		<div class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'div',
					'short_ping' => true,
				)
			);
			?>
		</div><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', '_s' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	?>

</div><!-- #comments -->