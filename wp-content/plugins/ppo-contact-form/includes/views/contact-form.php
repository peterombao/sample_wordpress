<form method="post" action="http://localhost/wordpress/wp-admin/admin-post.php">
	<input name="action" type="hidden" value="contact_us"/>
	<?php foreach($contact_form_elements as $contact_form_element): ?>
		<?php do_action('ppo_form_element', $contact_form_element); ?>
	<?php endforeach; ?>
	<button type="submit">Submit</button>
</form>