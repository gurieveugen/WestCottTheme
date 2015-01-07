<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php get_header(); ?>

	<?php get_template_part('sidebar-left') ?>

	<div id="content">
		<div class="main-container">
			
		<?php if ( have_posts() ) : the_post(); ?>

			<h1 class="page-title"><?php the_title(); ?></h1>

			<?php the_content(); 
			
		endif; ?>

		</div>
		
		<?php get_template_part('footer-content') ?>
	</div>
					
	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>

