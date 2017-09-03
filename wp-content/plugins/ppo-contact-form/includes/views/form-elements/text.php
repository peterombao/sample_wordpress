<div class="form-group">
	<label><?php echo $contact_form_element->form_label; ?> <?php echo !empty($contact_form_element->form_required) ? '(required)' : ''; ?></label>
	<input class="<?php echo $contact_form_element->class_attr; ?>" id="<?php echo $contact_form_element->id_attr; ?>" name="<?php echo $contact_form_element->form_name; ?>" type="text" value="<?php echo $contact_form_element->default_value; ?>" <?php echo !empty($contact_form_element->form_required) ? 'required="required"' : ''; ?> />
</div>