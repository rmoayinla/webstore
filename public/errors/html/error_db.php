<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$ci =& get_instance();
$ci->load->database();
$error = $ci->db->error();
?>
	<!--include and import header partial -->
	<?php include VIEWPATH.'partials/header.php'; ?>

		<header class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<h1>Database Error!</h1>
			</div>
		</header>
		<main id="content" class='row'>
			
			<div id="body" class="p-5">
				<p> There are errors with your database connection settings</p>
				<p> <?php if(!empty($error)) print_r($error);?></p>
			</div>

			
		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>