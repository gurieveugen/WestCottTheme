<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

	<?php get_template_part('sidebar-left') ?>

	<div id="content" role="main">
		<?php if ( have_posts() ) : the_post(); ?>

		<?php
		$post_categories = get_the_category();
		$post_category = $post_categories[0];
		$post_category_parent = $post_category->parent;
		?>

		<h1 class="page-title">Products</h1>
		<ul class="breadcrumbs">
			<?php if ($post_category_parent) { ?><li><a href="<?php echo get_category_link($post_category_parent); ?>"><?php echo get_cat_name($post_category_parent); ?></a></li><?php } ?>
			<li><a href="<?php echo get_category_link($post_category->cat_ID); ?>"><?php echo get_cat_name($post_category->cat_ID); ?></a></li>
			<li><?php the_title(); ?></li>
		</ul>
		<div class="post-holder">
			<div class="post">
				<h2 class="post-title"><?php the_title(); ?></h2>
				<div class="holder">
					<?php //if (has_post_thumbnail()) { $pimg = get_attach_url(get_post_thumbnail_id($post->ID)); ?>
					<!--<div class="feature-img"><a href="<?php //echo $pimg; ?>" rel="lightbox"><img src="<?php// echo get_thumb($pimg, 200); ?>" alt="#" /></a></div>-->
					<?php //} ?>
					<div class="txt">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>

		<?php //comments_template( '', true ); ?>

		<?php endif; ?>
		<?php get_template_part('footer-content') ?>
	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
