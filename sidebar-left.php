<?php
/**
 * @package WordPress
 * @subpackage Base_theme
 */
global $westcott_theme_options;
	if (@$_POST['FormAction'] == 'ContactSubmit') {
		$contact_suc = '';
		$contact_err = '';
		$contact_name = $_POST['contact_name'];
		$contact_email = $_POST['contact_email'];
		$contact_phone = $_POST['contact_phone'];
		$contact_comment = $_POST['contact_comment'];
		$contact_privacy_policy = $_POST['privacy_policy'];
		$contact_captcha = $_POST['contact_captcha'];
		if($contact_captcha != $_SESSION['captcha_keystring']) {
			$contact_err = "That Captcha response was incorrect.";		
		} else {
			$to = $westcott_theme_options['contact_email'];
			if (!strlen($to)) { $to = get_option('admin_email'); }
			$subject = 'Contact Form - Westcott';
			$message = 'Name: '.$contact_name.chr(10);
			$message .= 'Email: '.$contact_email.chr(10);
			$message .= 'Phone: '.$contact_phone.chr(10).chr(10);
			$message .= $contact_comment.chr(10);
			$headers = "From: WordPress [wordpress@westcotttowbars.com.au] <wordpress@westcotttowbars.com.au>" . "\r\n";
			$headers .= "To: BNI True North [westcott towbars] <" . $to . ">" . "\r\n";
			wp_mail($to, $subject, $message, $headers);
			$contact_suc = 'Contact Form was successfully sent. Thank You.';
			$contact_name = '';
			$contact_email = '';
			$contact_phone = '';
			$contact_comment = '';
			$contact_privacy_policy = '';
			$contact_captcha = '';
		}
	}

?>

<div id="aside">
	<?php if (is_page() && !is_front_page()) { ?>
		<h3 class="page-name"><?php the_title(); ?></h3>
		<?php $post_parent_title = get_the_title($post->post_parent);
		if (is_page('Our Services') || ($post_parent_title == 'Our Services')) {
			$args = array(
				'depth'        => 0,				
				'child_of'     => get_page_id('Our Services'),
				'title_li'     => '',
				'echo'         => 1,
				'sort_column'  => 'menu_order, post_title',
				'link_before'  => '',
				'link_after'   => '',
				'walker'       => '' );
			echo '<div class="widget_categories"><ul>';
			wp_list_pages( $args );
			echo '</ul></div>';
		}?>
		<?php dynamic_sidebar('Left Sidebar Page'); ?>
	<?php } else if (is_category() || is_search() || is_home() || is_single()) { ?>
		<?php dynamic_sidebar('Left Sidebar Products'); ?>
	<?php } ?>
	
	<div class="form-contact">
		<form name="contact_form" method="POST" action="" onsubmit="return contact_form_submit();">
			<input type="hidden" name="FormAction" value="ContactSubmit">
			<fieldset>
				<div class="contact-title">
					<h3>Contact Us</h3>
					<div class="info"><?php echo $westcott_theme_options['contact_form_text']; ?></div>
				</div>
				<div class="holder">
					<label for="lbl01">Name*</label>
					<div class="txt">					
						<input id="contact-name" type="text" name="contact_name" value="<?php if(strlen($contact_name)) echo $contact_name; ?>" />
					</div>
					<label for="lbl02">Email</label>
					<div class="txt">
						<input id="contact-email" type="text" name="contact_email" value="<?php if(strlen($contact_email)) echo $contact_email; ?>" />
					</div>
					<label for="lbl03">Phone*</label>
					<div class="txt">
						<input id="contact-phone" type="text" name="contact_phone" value="<?php if(strlen($contact_phone)) echo $contact_phone; ?>" />
					</div>
					<label for="lbl04">Comment</label>
					<div class="textarea">
						<textarea id="contact-comment" cols="30" rows="10" name="contact_comment" ><?php if(strlen($contact_comment)) echo $contact_comment; ?></textarea>
					</div>
					<label for="lbl05">Captcha*</label>					
					<div class="txt">
						<input id="contact-captcha" class="captcha" type="text" name="contact_captcha" value=""/>
					</div>
					<div>
						<img style="border: 1px solid #00346C;" src="<?php bloginfo('template_url'); ?>/show_captcha.php?<?php echo session_name()?>=<?php echo session_id()?>">
					</div>					
					<?php if(strlen($contact_suc)) echo'<div style="color:#00cc00;">'. $contact_suc .'</div>'; ?>
					<?php if(strlen($contact_err)) echo'<div style="color:#ff0000;">'. $contact_err .'</div>'; ?>
					<div class="row">
						<div class="policy-box">
							<span class="state"><input type="checkbox" id="privacy_policy" name="privacy_policy" value="yes" <?php if($contact_privacy_policy == 'yes') echo 'CHECKED'; ?>></span>
							<label><a href="<?php echo get_permalink(get_page_id('Privacy Policy')); ?>" target="_blank">Privacy Policy*</a></label>
						</div>
						<input type="submit" value="SEND" class="btn-send"/>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	
	<?php if (is_front_page()) { ?>
		<?php dynamic_sidebar('Left Sidebar Home'); ?>
	<?php } ?>
</div>
