<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
$cat_data = get_category(get_query_var('cat'));
$cat_parent = $cat_data->parent;
get_header(); ?>

	<?php get_template_part('sidebar-left') ?>

	<div id="content" role="main">
		<h1 class="page-title">Products </h1>
		<ul class="breadcrumbs">
			<?php if ($cat_parent) { ?><li><a href="<?php echo get_category_link($cat_parent); ?>"><?php echo get_cat_name($cat_parent); ?></a></li><?php } ?>
			<li><?php echo single_cat_title( '', false ) ?></li>
		</ul>

		<?php include('loop.php'); ?>

		<?php get_template_part('footer-content') ?>
	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
