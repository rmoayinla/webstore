<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<?php echo link_tag("public/css/style.css"); ?>
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
			