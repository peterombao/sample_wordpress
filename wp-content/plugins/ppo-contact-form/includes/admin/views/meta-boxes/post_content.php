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
		<?php
			$row_type = get_post_meta($form_element->ID, 'form_type', true);
			
			$row_label = get_post_meta($form_element->ID, 'form_label', true);
			if(empty($row_label)){
				$row_label = $fields[$row_type]['label'];
			}
			
			$row_name = get_post_meta($form_element->ID, 'form_name', true);
			if(empty($row_name)){
				$row_name = $row_type;
			}
		?>
		<tr data-post_id="<?php echo $form_element->ID; ?>">
			<td>
				<input type="hidden" name="post_id" value="<?php echo $form_element->ID; ?>"/>
				<a href="#TB_inline?height=300&width=400&inlineId=cf-<?php echo $row_type; ?>" title="<?php echo $fields[$row_type]['label']; ?>" data-post_id="<?php echo $form_element->ID; ?>" data-field_type="<?php echo $row_type; ?>"><?php echo $row_label; ?></a></td>
			<td><?php echo $row_name; ?></td>
			<td class="column-handle"></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>