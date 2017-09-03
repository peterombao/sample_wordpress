<div class="form-group">
	<label><?php echo $contact_form_element->form_label; ?> <?php echo !empty($contact_form_element->form_required) ? '(required)' : ''; ?></label>
	<textarea class="<?php echo $contact_form_element->class_attr; ?>" id="<?php echo $contact_form_element->id_attr; ?>" name="<?php echo $contact_form_element->form_name; ?>" <?php echo !empty($contact_form_element->form_required) ? 'required="required"' : ''; ?>><?php echo $contact_form_element->default_value; ?></textarea>
</div>