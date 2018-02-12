<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php echo link_tag("public/css/style.css"); ?>

		<!-- Generated from https://realfavicongenerator.net/favicon_result?file_id=p1c5caq1qtg9jir1og164olid6#.WnTpDLynHIU -->

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>favicon-16x16.png">
		<?php echo link_tag("site.webmanifest", "manifest");?>
		<link rel="mask-icon" href="<?php echo base_url();?>safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#f1f7f7">
		<meta name="msapplication-TileImage" content="<?php echo base_url();?>mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">


		<?php echo link_tag('feed', 'alternate', 'application/rss+xml', 'My RSS Feed'); ?>

		<title><?php echo (!empty($title)) ? $title : 'Welcome to CodeIgniter' ?></title>
	</head>

	<body>
		<div id="wrapper" class="site-wrapper">
			<nav class="navbar navbar-expand-lg navbar-light bg-light" id="primary-menu" role="navigation">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#" 
						aria-controls="" aria-expanded="false" aria-label="Toggle navigation"
					>
	    				<span class="navbar-toggler-icon"></span>
	  				</button>

					<?php echo anchor('', 'Webstore', array('class'=>'navbar-brand') );?>
					<div class="collapse navbar-collapse" id="">
						<ul class="navbar-nav mx-lg-auto mx-sm-0">
							<li class="nav-item"><?php echo anchor('customers', 'Customers', array('class'=>'nav-link') );?></li>
							<li class="nav-item"><a href="#" class="nav-link">Suppliers </a></li>
							<li class="nav-item"><a href="#" class="nav-link">Orders </a></li>

						</ul>
						<ul class="navbar-nav navbar-right">
							<?php if(empty($session)): ?>
								<li class="nav-item"><a href="#" class="nav-link"> Sign up </a></li>
								<li class="nav-item"><a href="#" class="nav-link"> Sign in </a></li>
							<?php endif; ?>
						</ul>
					</div>	
			</nav>
			