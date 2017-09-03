<?php foreach($fields as $field): ?>
	<div id="cf-<?php echo $field['type']; ?>" class="hidden">
		<form class="cf-add-el" method="post">
			<input type="hidden" name="form_type" value="<?php echo $field['type']; ?>" />
		<?php if(in_array('form_label', $field['options'])): ?>
			<div>
				<label>Label: </label>
				<input name="form_label" type="text" required/>
			</div>
		<?php endif; ?>
		
		<?php if(in_array('form_name', $field['options'])): ?>
			<div>
				<label>Name: </label>
				<input name="form_name" type="text" required/>
			</div>
		<?php endif; ?>
		
		<?php if(in_array('form_placeholder', $field['options'])): ?>	
			<div>
				<label>Placeholder: </label>
				<input name="form_placeholder" type="text" />
			</div>
		<?php endif; ?>
		
		<?php if(in_array('form_options', $field['options'])): ?>
			<div>
				<label>Options: </label>
				<textarea name="form_options" rows="5"></textarea>
			</div>
		<?php endif; ?>
		
		<?php if(in_array('default_value', $field['options'])): ?>
			<div>
				<label>Default Value: </label>
				<input name="default_value" type="text" />
			</div>
		<?php endif; ?>
		
		<?php if(in_array('id_attr', $field['options'])): ?>
			<div>
				<label>ID Attribute: </label>
				<input name="id_attr" type="text" />
			</div>
		<?php endif; ?>
		
		<?php if(in_array('class_attr', $field['options'])): ?>
			<div>
				<label>Class Attribute: </label>
				<input name="class_attr" type="text" />
			</div>
		<?php endif; ?>
		
		<?php if(in_array('form_required', $field['options'])): ?>
			<div>
				<label>Required: </label>
				<input name="form_required" type="checkbox" value="1"/>
			</div>
		<?php endif; ?>
		
			<div>
				<button type="submit">Add</button>
			</div>
		</form>
	</div>
<?php endforeach; ?>