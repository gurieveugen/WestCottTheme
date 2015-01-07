<?php
function westcott_admin_add_options_page() {
	add_theme_page(
		'Theme Options', // meta title
		'Theme Options', // admin menu title
		8,
		'theme-options',
		'westcott_theme_options_page'
	);
}

function westcott_theme_options_page() {
	$westcott_action_message = '';
	$westcott_theme_options = get_option("westcott_theme_options");
	if ($_POST['westcott_form_submit'] == 'submit') {
		foreach($_POST as $pkey => $pval) { $_POST[$pkey] = str_replace('\"', '"', $pval); }
		foreach($_POST as $pkey => $pval) { $_POST[$pkey] = str_replace("\'", "'", $pval); }
		$westcott_theme_options['call_us_text'] = $_POST["call_us_text"];
		$westcott_theme_options['left_text'] = $_POST["left_text"];
		$westcott_theme_options['contact_form_text'] = $_POST["contact_form_text"];
		$westcott_theme_options['copyright_text'] = $_POST["copyright_text"];
		$westcott_theme_options['contact_email'] = $_POST["contact_email"];
		update_option("westcott_theme_options", $westcott_theme_options);
		$westcott_action_message = 'Options Saved.';
	}
?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php echo __('Theme Options'); ?></h2><br>
		<form method="post" method="POST">
		<input type="hidden" name="westcott_form_submit" value="submit">
		<?php if(strlen($westcott_action_message)) { ?><div id="message" class="updated fade"><p><?php _e($westcott_action_message) ?></p></div><?php } ?>
		<table style="width:auto;">
		  <tr>
			<td>Header Call Us Text:&nbsp;</td>
			<td><input type="text" name="call_us_text" value="<?php echo htmlspecialchars($westcott_theme_options['call_us_text']); ?>" style="width:500px;"></td>
		  </tr>
		  <tr>
			<td>Header Left Text:&nbsp;</td>
			<td><input type="text" name="left_text" value="<?php echo htmlspecialchars($westcott_theme_options['left_text']); ?>" style="width:500px;"></td>
		  </tr>
		  <tr>
			<td>Contact Form Text:&nbsp;</td>
			<td><input type="text" name="contact_form_text" value="<?php echo htmlspecialchars($westcott_theme_options['contact_form_text']); ?>" style="width:500px;"></td>
		  </tr>
		  <tr>
			<td>Copyright Text:&nbsp;</td>
			<td><input type="text" name="copyright_text" value="<?php echo htmlspecialchars($westcott_theme_options['copyright_text']); ?>" style="width:500px;"></td>
		  </tr>
		  <tr>
			<td>Contact Email:&nbsp;</td>
			<td><input type="text" name="contact_email" value="<?php echo htmlspecialchars($westcott_theme_options['contact_email']); ?>" style="width:500px;"></td>
		  </tr>
		</table>
		<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save') ?>" /></p>
		</form>
	</div>
<?php
}

add_action('admin_menu', 'westcott_admin_add_options_page');
?>