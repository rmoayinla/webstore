<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!--include and import header partial -->
	<?php include VIEWPATH.'partials/header.php'; ?>

		<header class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<h1>Products</h1>
			</div>
		</header>
		<main id="content" class='container-fluid'>
			<div class="row">
				<?php if(!empty($products)): ?>
					<?php foreach($products as $product): ?>
						<div class="col-md-4">

							<div class="card">
								<img class="card-img-top" src="..." alt="" style="height:180px;">
								<div class="card-body">
									<h3 class="card-title"><?php echo html_escape($product["title"]); ?></h3>
									<h6 class="card-subtitle mb-2"><?php echo $product["created_date"]; ?></h6>
									<p class="card-text"><?php echo html_escape($product["description"]); ?></p>
									
									 <a href="<?php echo ws_full_url($product);?>" class="card-link">Read more</a>
    								<?php echo ws_archive_url($product, array("class"=>"card-link"));?>
									<?php //print_r($product); ?>	
								</div>
								<div class="card-body">
									<ul class="list-inline">
										<li class="list-inline-item">Orders:<?php echo html_escape($product["orders"]); ?> </li>
										<li class="list-inline-item">
											Updated: <?php echo timespan(strtotime($product["modified_date"]))?> ago
										</li>
									</ul>
								</div>
								
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
				
			</div><!--end of .row -->

			
			

			
		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>

		