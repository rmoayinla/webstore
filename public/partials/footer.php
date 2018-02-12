		<footer id="main-footer" class="container-fluid bg-dark p-5 text-white mt-5">
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</p>
		</footer>
	<!-- #wrapper div opened in partials/header.php -->
	</div>
		<!-- jQuery library -->
		<script src="<?php echo base_url()?>public/assets/jquery/dist/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="<?php echo base_url()?>node_modules/popper.js/dist/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="<?php echo base_url();?>public/assets/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="<?php echo base_url();?>node_modules/tinymce/tinymce.min.js"></script>

		<script src="<?php echo base_url();?>public/js/script.js"></script>
	</body>
</html>