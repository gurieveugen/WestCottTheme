<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="nav-above" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&larr;</span> More Products'); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Previous products <span class="meta-nav">&rarr;</span>'); ?>
		</div>
	</div>
	
<?php endif; ?>

<?php if ( ! have_posts() ) : ?>

	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title">Not Found</h1>
		<div class="entry-content">
			<p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
			<?php get_search_form(); ?>
		</div>
	</div>
	
<?php endif; ?>

<div class="post-holder">
	<?php while ( have_posts() ) : the_post(); ?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="holder">
			<?php if (has_post_thumbnail()) { ?>
			<div class="feature-img"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_thumb(get_post_thumbnail_id($post->ID), 200, 150); ?>" alt="#" /></a></div>
			<?php } ?>
			<div class="txt">
				<?php 
				$post_content = str_replace(chr(10), '<br>', get_the_excerpt('...'));
				if (!$post_content) $post_content = short_content(strip_tags(get_the_content())); ?>
				<p><?php echo $post_content; ?></p>
				<p><a href="<?php the_permalink(); ?>" class="read-more">Read More...</a></p>
			</div>
		</div>
	</div>
	
	<?php endwhile; ?>
</div>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div id="nav-below" class="navigation">
		<div class="nav-previous">
			<?php next_posts_link( '<span class="meta-nav">&larr;</span> More Products' ); ?>
		</div>
		<div class="nav-next">
			<?php previous_posts_link( 'Previous products <span class="meta-nav">&rarr;</span>' ); ?>
		</div>
	</div>
	
<?php endif; ?>
