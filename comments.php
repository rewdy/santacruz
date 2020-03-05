<?php /*

Santa Cruz Theme
----------------

comments.php

Comments template file
*/

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div class="comments">
	<?php $comments_count = get_comments_number('0', '1', '%'); ?>
	<h2 class="text-center"><a name="comments" id="comments"></a><?php if ($comments_count) : ?><span class="count"><?php echo $comments_count; ?></span><?php endif; ?>Comments</h2>
	<?php if (have_comments()) : ?>
	<ul class="comment-list">
		<?php
			wp_list_comments(array(
				'callback' => 'santacruz_comment',
			));
		?>
	</ul><!-- close .comment-list -->
	<?php else : ?>
	<p><em><?php _e('There are no comments.'); ?></em></p>
	<?php endif;?>

	<?php if (!comments_open()) : ?>
	<p><?php _e('Comments are closed.'); ?></p>
	<?php else: ?>
	<?php comment_form(); ?>
	<?php endif; ?>
</div>