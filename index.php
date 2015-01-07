<?php
/**
 * @package WordPress
 * @subpackage adility
 */
?>
<?php get_header(); ?>

	<?php get_template_part('sidebar-left') ?>

	<div id="content">
		<h1 class="page-title">Products</h1>
		<?php include("loop.php"); ?>	
		<?php get_template_part('footer-content') ?>
	</div>
					
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
