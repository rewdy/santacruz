<?php /*

Santa Cruz Theme
----------------

article.php

Article default template file

* Called from within the loop. Will not work otherwise. *

*/

$classes = array('article');
if (!is_singular()) {
	array_push($classes, 'article-listed');
} else {
	array_push($classes, 'article-single');
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	<?php
	if (is_singular()) :
		$featured_image = santacruz_featured_image();
		if ($featured_image) :
	?>

	<!-- Featured image -->
	<div class="featured-image">
		<img src="<?php echo $featured_image['url']; ?>" width="<?php echo $featured_image['width']; ?>" height="<?php echo $featured_image['height']; ?>" />
	</div>
	<?php endif; // end if featured image set ?>
	<?php endif; // end if singular ?>

	<div class="liner liner-narrow">
		<div class="row">
			<?php if (is_singular()) : ?>
			<div class="col-12">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
			<?php endif; ?>
			<?php if (has_post_format('audio')) : ?>
			<div class="col-2 text-right">
				<span class="icon-play"></span>
			</div>
			<?php endif; ?>
			<div class="article-body col">
				<?php if (!is_singular()) :?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php endif;?>

				<?php
				$read_time = do_shortcode('[est_time]');
				if ($read_time !== '[est_time]' && $read_time !== ''): ?>
				<p class="read-time"><?php echo __('Estimated reading time: ') . $read_time ?></p>
				<?php endif; ?>
				<?php if(!is_page()) : ?>
				<p><span class="article-post-date"><?php the_time(get_option('date_format')); ?></span></p>
				<?php endif; ?>

				<!-- Post Content -->
				<?php if (!is_singular()) : ?>
				<?php the_excerpt(); ?>
				<?php else : ?>
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages') . ':', 'after' => '</div>')); ?>
				<?php endif; ?>

				<div class="article-meta row align-items-center">
					<div class="article-taxonomy col-sm-auto order-sm-last">
						<!-- Post taxonomy -->
						<?php $categories_list = get_the_category_list(', '); ?>
						<?php $tags_list = get_the_tag_list('', ', '); ?>

						<?php if ($categories_list) : ?>
						<div class="details">Posted in <?php echo $categories_list; ?></div>
						<?php endif; ?>
					</div>
					<div class="article-links col-sm">
						<!-- Post links -->
						<?php if (!is_singular()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php _e('Read more...'); ?>" class="btn btn-success">
							<?php if (has_post_format('audio')) : ?>
							<?php santacruz_icon('headphones') ?> <span class="text"><?php _e('Listen now'); ?></span>
							<?php else: ?>
							<?php santacruz_icon('file-text') ?> <span class="text"><?php _e('Read more'); ?></span>
							<?php endif; ?>
						</a>
						<?php endif; ?>

						<?php if (comments_open()) : ?>
						<?php $comment_icon = get_santacruz_icon('message-circle'); ?>
						<?php comments_popup_link($comment_icon . '<span class="text">Comment</span>', $comment_icon . ' <span class="text">1 Comment</span>', $comment_icon . '<span class="text">% Comments</span>', 'btn btn-success'); ?>
						<?php endif; ?>

						<?php edit_post_link(get_santacruz_icon('edit-3') . '<span class="text">Edit</span>', '', '', null, 'btn btn-primary'); ?>
					</div>
				</div>

			</div>
		</div>

		<?php if (is_singular() && !is_page()) : ?>
		<div class="sharing">
			<div class="row margin-collapse align-items-center justify-content-center">
				<div class="col-md-auto">
					<h2 class="h3 sharing-heading">Do that social:</h2>
				</div>
				<div class="col-md-auto">
					<?php share_links(get_permalink(), get_the_title()); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php /**
		 *  Output comments wrapper if it's a post, or if comments are open,
		 * or if there's a comment number – and check for password.
		 * */
		if (( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required()): ?>
		<?php comments_template(); ?>
		<?php endif; ?>
	</div>
</article>

<?php if (is_single()) : ?>
<div class="directional-links">
	<div class="row margin-collapse no-gutters">
		<div class="nav-next col-sm order-sm-last text-right"><?php next_post_link('%link', 'Next article: <span class="text">&#8220;%title&#8221;</span> '. get_santacruz_icon('arrow-right')); ?></div>
		<div class="nav-previous col-sm"><?php previous_post_link('%link', get_santacruz_icon('arrow-left') . ' Previous article: <span class="text">&#8220;%title&#8221;</span>'); ?></div>
	</div>
</div>
<?php endif; ?>
