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
		<main id="content" class='row'>
			
			<div id="body" class="p-5">
				<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

				<p>If you would like to edit this page you'll find it located at:</p>
				<code>application/views/welcome_message.php</code>

				<p>The corresponding controller for this page is found at:</p>
				<code>application/controllers/Welcome.php</code>

				<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
				<p> <?php if(!empty($content)) echo html_escape($content);?></p>
				<pre> <?php print_r($users); ?> </pre>
			</div>

			
		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>

		