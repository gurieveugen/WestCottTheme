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
		<div id="post-0" class="post error404 not-found">
			<h1 class="entry-title">Not Found</h1>
			<div class="entry-content">
				<p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
				<?php get_search_form(); ?>
			</div>
		</div>
		<?php get_template_part('footer-content') ?>
	</div>
	
	<script type="text/javascript">
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>