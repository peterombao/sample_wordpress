<?php add_thickbox(); ?>
<?php foreach($fields as $field): ?>
	<a href="#TB_inline?height=300&width=400&inlineId=cf-<?php echo $field['type']; ?>" title="<?php echo $field['label']; ?>" class="thickbox btn-modal-field-<?php echo $field['type']; ?>"><?php echo $field['label']; ?></a>
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
			<td><a href="#"><?php echo get_post_meta($form_element->ID, 'form_label', true); ?></a></td>
			<td><?php echo get_post_meta($form_element->ID, 'form_name', true); ?></td>
			<td class="column-handle"></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>