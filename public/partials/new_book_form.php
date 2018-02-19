<?php echo form_open(current_url(), array("id" => "create-book")); ?>
	<div class="form-group">
	    <label for="">Title </label>
	    <?php echo form_input(array(
	    	"name" => "title", "value" => set_value("title"), 
	    	"placeholder" => sprintf('Enter title for %s', html_escape($product_type)),
	    	"class" => "form-control"
	    	)); 
	    ?>
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	 </div>
	 <div class="form-group">
	    <label for="">Description</label>
	    <?php echo form_textarea(array(
	    	"name" => "description", "value" => set_value("description"), 
	    	"placeholder" => sprintf('Enter description for %s', html_escape($product_type)),
	    	"class" => "form-control tinymce-editor"
	    	)); 
	    ?>
	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	 </div>

<?php echo form_close(); ?>