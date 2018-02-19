<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
	<!--include and import header partial -->
	<?php include VIEWPATH.'partials/header.php'; ?>

		<header class="jumbotron jumbotron-fluid">
			<div class="container-fluid">
				<?php if(!empty($heading)): echo sprintf('<h1>%s</h1>',$heading); ?>
				<?php else : ?>4<h1>404 Error page!</h1>
				<?php endif; ?>
				
			</div>
		</header>
		<main id="content" class='row'>
			
			<div id="body" class="p-5">
				<p> The page at <?php echo current_url(); ?> you are trying to load does not exist </p>
				<p> <?php if(!empty($message)) echo html_escape($message);?></p>
				<p> <?php if(isset($session)) print_r($session);?></p>
			</div>

			<?php //print_r($DB_Routes); ?>

		</main>

	<!-- include and import the site footer partial -->
	<?php include VIEWPATH.'partials/footer.php'; ?>