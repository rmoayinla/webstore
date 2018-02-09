<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!--include and import header partial -->
	<?php include VIEWPATH.'partials/header.php'; ?>

		<header class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<h1>Welcome to CodeIgniter!</h1>
			</div>
		</header>
		<main id="content" class='container-fluid'>
			
			<section id="" class="row p-5">
				<div class="heading mx-auto w-md-50 text-center">
					<h3> Customers  </h3>
					<p> Learn about our active customers, view their profiles, contacts and know about their orders  </p>
				</div>

				<div class="p-5"><p></p></div>
			</section>
			<section id="" class="row p-5">
				<div class="heading mx-auto w-md-50 text-center">
					<h3> Products </h3>
					<p> View our product types and view our most recent and most ordered products  </p>
				</div>

				<div class="p-5"><p></p></div>
			</section>

			<pre> <?php print_r($users); ?> </pre>
			

			
		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>

		