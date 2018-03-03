<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!--include and import header partial -->
	<?php include VIEWPATH.'partials/header.php'; ?>

		<header class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<h1>Create new <?php if(!empty($product_type)) echo html_escape($product_type["name"]); ?> </h1>
			</div>
		</header>
		<main id="content" class='container-fluid'>
			<div class="row">
				<div class="form-wrapper col-md-6 mx-auto">
					<?php if(isset($created) && $created === TRUE) : ?>
						<!--include the form for new book partial-->
						<?php include VIEWPATH.'partials/new_book_success.php'; ?>
					<?php else: ?>
						<!--include the form for new book partial-->
						<?php include VIEWPATH.'partials/new_book_form.php'; ?>
					<?php endif; ?>
				</div>
			</div>
				
			

			
		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>