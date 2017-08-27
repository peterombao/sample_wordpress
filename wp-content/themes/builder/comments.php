<?php
if ( post_password_required() ) {
	return;
}
?>
<div>
	<?php if ( have_comments() ) : ?>
	<ol>
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 56,
			) );
		?>
	</ol>
	<?php endif; // have_comments() ?>
	<?php comment_form(); ?>
</div>