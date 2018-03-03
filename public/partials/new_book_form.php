<?php if(!empty($message)): ?>
	<div class="alert alert-warning"><?php echo $message; ?></div>
<?php endif; ?>

<?php echo form_open_multipart(current_url(), array("id" => "create-book", "class" => "form")); ?>
	<div class="form-group">
	    <label for="">Title </label>
	    <?php echo form_input(
	    		array(
	    			"name" => "title", 
	    			"value" => set_value("title"), 
	    			"placeholder" => sprintf('Enter title for %s', html_escape($product_type["name"])),
	    			"class" => "form-control"
	    		)
	    	); 
	    ?>
	    <small id="emailHelp" class="form-text text-muted"></small>
	 </div>
	 <div class="form-group">
	    <label for="">Description</label>
	    <?php echo form_textarea(
	    		array(
	    			"name" => "description", 
	    			"value" => set_value("description"), 
	    			"placeholder" => sprintf('Enter description for %s', html_escape($product_type["name"])),
	    			"class" => "form-control tinymce-editor"
	    		)
	    	); 
	    ?>
	    <small id="emailHelp" class="form-text text-muted"></small>
	 </div>
	 <div class="form-group">
	 	<label for="featured-image" class="d-block p-4 text-center border"> Upload Featured Image </label>
	 	<?php
	 		echo form_upload(
	 			array(
	 				"name" => "thumbnail",
	 				"class" => "form-control-file d-none with-preview",
	 				"id" => "featured-image",
	 				"accept" => "image/*"
	 			)
	 		);
		 ?>
		 <div class="preview"></div>
	 </div>
	 
	 <input type="hidden" name="product_type_id" value="<?php echo html_escape($product_type["ID"]); ?>" />
	 <input type="hidden" name="product_type_name" value="<?php echo html_escape($product_type["name"]); ?>" />
	 <input type="hidden" name="product_type_slug" value="<?php echo html_escape($product_type["slug"]); ?>" />
	 <div class="form-group">
	 	<input type="submit" name="submit" value="Create book" class="btn btn-submit"/>
	 </div>

<?php echo form_close(); print_r($product_type);?>
