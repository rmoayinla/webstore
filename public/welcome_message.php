<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<?php include VIEWPATH.'partials/header.php'; ?>

		<main id="content" class='container-fluid'>
			<header class="row py-5">
				<h1>Welcome to CodeIgniter!</h1>
			</header>

			<div id="body">
				<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

				<p>If you would like to edit this page you'll find it located at:</p>
				<code>application/views/welcome_message.php</code>

				<p>The corresponding controller for this page is found at:</p>
				<code>application/controllers/Welcome.php</code>

				<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
				<p> <?php echo $content; ?></p>
			</div>

			
		</main>

		<?php include VIEWPATH.'partials/footer.php'; ?>

		