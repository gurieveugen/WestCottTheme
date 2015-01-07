<?php
/**
 * @package WordPress
 * @subpackage adility
 */
?>
<?php get_header(); ?>

	<?php get_template_part('sidebar-left') ?>

	<div id="content">
		<?php if ( have_posts() ) : the_post(); ?>
		<?php
		$yvideo_url = get_post_meta($post->ID, 'Home Youtube Video URL', true);
		$yvideo_title = get_post_meta($post->ID, 'Home Youtube Video Title', true);
		$subheadline = get_post_meta($post->ID, 'Home Sub Headline', true);
		?>
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php if (strlen($subheadline)) { ?><h2><?php echo $subheadline; ?></h2><?php } ?>
		<div class="txt-container">
			<?php if (strlen($yvideo_url)) {
			$yvcode = substr($yvideo_url, strpos($yvideo_url, 'v=') + 2);
			$yvcode_arr = preg_split('/&/', $yvcode);
			$yvcode = $yvcode_arr[0];
			?>
			<div class="video-block">
				<div class="video-box"><a title="<?php echo $yvideo_title; ?>" class="fancy-video" href="http://www.youtube.com/v/<?php echo $yvcode; ?>?fs=1&amp;autoplay=1"><span class="mask"></span><span class="btn-play"></span><img src="<?php echo 'http://i1.ytimg.com/vi/'.$yvcode.'/0.jpg'; ?>" style="width: 194px !important; height: 145px !important;" width="194" height="145" alt="#" /></a></div>
				<p><?php echo $yvideo_title; ?><br>CLICK IMAGE TO VIEW</p>
			</div>
			<?php } ?>
			<div class="txt-box">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="tools-area">
			<h3>Our Services</h3>
			<ul class="tools-list">
				<li>
					<a rel="example_group" title="Installation" class="fancy" href="<?php echo get_permalink(get_page_id('Installation')); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-tool.jpg" alt="#" />
						<span>Installation</span>
					</a>
				</li>
				<li>
					<a rel="example_group" title="Installation" class="fancy" href="<?php echo get_permalink(get_page_id('Wiring')); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-tool02.jpg" alt="#" />
						<span>Wiring</span>
					</a>
				</li>
				<li>
					<a rel="example_group" title="Installation" class="fancy" href="<?php echo get_permalink(get_page_id('Supply')); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-tool03.jpg" alt="#" />
						<span>Supply</span>
					</a>
				</li>
				<li>
					<a rel="example_group" title="Installation" class="fancy" href="<?php echo get_permalink(get_page_id('Mobile Service')); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-tool04.jpg" alt="#" />
						<span>Mobile Service</span>
					</a>
				</li>
				<li>
					<a rel="example_group" title="Installation" class="fancy" href="<?php echo get_permalink(get_page_id('Custom Racks')); ?>">
						<img src="<?php bloginfo('template_directory'); ?>/images/icon-tool05.jpg" alt="#" />
						<span>Custom Racks</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="tools-area">
			<h3>Hayman Reese Products</h3>
			<?php
			$catimagepath = get_bloginfo('url').'/wp-content/uploads/category-images-ii/';
			$hayman_reese_cid = get_cat_ID('Hayman Reese');
			$hr_subcats = get_categories('child_of='.$hayman_reese_cid.'&hide_empty=0');
			if (count($hr_subcats) > 0) {
			?>
			<ul class="promo-list">
				<?php foreach ($hr_subcats as $hr_subcat) { $cat_image = $catimagepath.$hr_subcat->cat_ID.'.original.jpg'; ?>
				<li>
					<div class="box">
						<a rel="example_group2" title="<?php echo $hr_subcat->cat_name; ?>" class="fancy" href="<?php echo get_category_link($hr_subcat->cat_ID); ?>">
							<img src="<?php echo get_thumb($cat_image, 173); ?>" alt="#" />
							<span class="txt"><?php echo $hr_subcat->cat_name; ?></span>
						</a>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } // if (count($hr_subcats) > 0) { ?>
		</div>
		<div class="tools-area">
			<h3>Other Products</h3>
			<?php
			$other_cats = get_categories('parent=0&exclude='.$hayman_reese_cid.'&hide_empty=0&number=3');
			if (count($other_cats) > 0) {
			?>
			<ul class="promo-list">
				<?php foreach ($other_cats as $other_cat) { $cat_image = $catimagepath.$other_cat->cat_ID.'.original.jpg'; ?>
				<li>
					<div class="box">
						<a rel="example_group3" title="<?php echo $other_cat->cat_name; ?>" class="fancy" href="<?php echo get_category_link($other_cat->cat_ID); ?>">
							<img src="<?php echo get_thumb($cat_image, 173); ?>" alt="#" />
							<span class="txt"><?php echo $other_cat->cat_name; ?></span>
						</a>
					</div>
				</li>
				<?php } ?>
			</ul>
			<?php } // if (count($other_cats) > 0) { ?>
		</div>
		<?php get_template_part('footer-content') ?>
	</div>
					
	<?php get_sidebar(); ?>

<?php get_footer(); ?>