<?php add_thickbox(); ?>
<?php foreach($fields as $field): ?>
	<a href="#TB_inline?height=300&width=400&inlineId=cf-<?php echo $field['type']; ?>" title="<?php echo $field['label']; ?>" class="thickbox btn-modal-field" data-field_type="<?php echo $field['type']; ?>"><?php echo $field['label']; ?></a>
<?php endforeach; ?>
<table class="table-cf-el">
	<thead>
		<tr>
			<th>Label</th>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($form_elements as $form_element): ?>
		<tr data-post_id="<?php echo $form_element->ID; ?>">
			<td>
				<!--<a href="#TB_inline?height=300&width=400&inlineId=cf-<?php echo get_post_meta($form_element->ID, 'form_type', true); ?>" title="<?php echo $fields[get_post_meta($form_element->ID, 'form_type', true)]['label']; ?>" class="thickbox btn-modal-field-<?php echo get_post_meta($form_element->ID, 'form_type', true); ?>">-->
				<input type="hidden" name="post_id" value="<?php echo $form_element->ID; ?>"/>
				<a href="#TB_inline?height=300&width=400&inlineId=cf-<?php echo get_post_meta($form_element->ID, 'form_type', true); ?>" title="<?php echo $fields[get_post_meta($form_element->ID, 'form_type', true)]['label']; ?>" data-post_id="<?php echo $form_element->ID; ?>" data-field_type="<?php echo get_post_meta($form_element->ID, 'form_type', true); ?>"><?php echo get_post_meta($form_element->ID, 'form_label', true); ?></a></td>
			<td><?php echo get_post_meta($form_element->ID, 'form_name', true); ?></td>
			<td class="column-handle"></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>