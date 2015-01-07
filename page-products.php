<?php
/**
 * Template Name: Page products
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php get_header(); ?>
	<?php get_template_part('sidebar-left') ?>
	<div id="content">
		<h1 class="page-ttl">Products </h1>
		<ul class="breadcrumbs">
			<li><a href="#">Category</a></li>
			<li>Sub Category</li>
		</ul>
		<div class="post-holder">
			<div class="post">
				<h2 class="post-title">Mini</h2>
				<div class="holder">
					<div class="feature-img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/img10.jpg" alt="#" /></a></div>
					<div class="txt">
						<p>The two bar (2 x 19mm) Mini system is designed to be used with any Hayman Reese towbar and uses chains to hold the hitches spring bars in position. The system is easily setup and removed, and is ideal for trailers with a ball weight up to 80kg.</p>
						<div class="meta-section">
							<dl>
								<dt>Part Number:</dt>
								<dd>04180</dd>
								<dt>RRP:</dt>
								<dt>$179.00</dt>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<div class="post">
				<h2 class="post-title">Mini</h2>
				<div class="holder">
					<div class="feature-img"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/img10.jpg" alt="#" /></a></div>
					<div class="txt">
						<p>The two bar (2 x 19mm) Mini system is designed to be used with any Hayman Reese towbar and uses chains to hold the hitches spring bars in position. The system is easily setup and removed, and is ideal for trailers with a ball weight up to 80kg.</p>
						<div class="meta-section">
							<dl>
								<dt>Part Number:</dt>
								<dd>04180</dd>
								<dt>RRP:</dt>
								<dt>$179.00</dt>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php get_template_part('footer-content') ?>
	</div>
					
	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>

