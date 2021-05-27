
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Manaya Indonesia</title>
	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/core/core.css">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/demo_1/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png" />
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <style>
	  /* background-image: url(../../../assets/images/login-back.jpg); */
	  .page-content {
		background-image: url('<?php echo base_url() ?>assets/images/login-back.jpg');
		height: 100%;
		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
  </style>
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">
				<div class="row w-80 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
								<div class="col-md-12 pl-md-0">
								
										<div class="auth-form-wrapper px-5 py-5">
											
											<h5 class="text-muted font-weight-normal mb-4 mt-3">Change Password</h5>
											<div id="message">
												<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
											</div>
											<form id="reg-form" class="forms-sample needs-validation" method="post" action="<?php echo $action ?>" novalidate>
											<div class="form-group">
												<label for="exampleInputEmail1">Username</label>
												<input type="text" class="form-control" name="f_username" value="<?php echo $username ?>" readonly>
											</div>
											<div class="form-group">
												<label for="exampleInputPassword1">Password Baru</label>
												<div class="input-group date datepicker">
													<input type="password" placeholder="Password" class="form-control pwd" name="f_password" required><span class="input-group-addon reveal"><i data-feather="sun"></i></span>
												</div>
											</div>
											<div class="mt-3">
												<button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white btn-block submitBtn">Simpan</button>
											</div>
											<br>
												<p>Sudah punya akun? <a href="<?php echo site_url('login') ?>">Login</a></p>
											</form>
										</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="<?php echo base_url() ?>assets/vendors/core/core.js"></script>
	<!-- endinject -->
  	<!-- plugin js for this page -->
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="<?php echo base_url() ?>assets/vendors/feather-icons/feather.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/template.js"></script>
	<!-- endinject -->
  	<!-- custom js for this page -->
	<!-- end custom js for this page -->
	<script type="text/javascript">
	// show or hide password
	$(".reveal").on('click',function() {
		var $pwd = $(".pwd");
		if ($pwd.attr('type') === 'password') {
			$pwd.attr('type', 'text');
		} else {
			$pwd.attr('type', 'password');
		}
	});
	
	// Disable form submissions if there are invalid fields
	(function() {
	'use strict';
	window.addEventListener('load', function() {
		// Get the forms we want to add validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
		form.addEventListener('submit', function(event) {
			if (form.checkValidity() === false) {
			event.preventDefault();
			event.stopPropagation();
			}
			form.classList.add('was-validated');
		}, false);
		});
	}, false);
	})();
	</script>
</body>
</html>