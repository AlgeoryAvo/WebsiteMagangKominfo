<!doctype html>
<html lang="en">

<head>
	<title>Login Kominfo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url('logn_er/'); ?>css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">

			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(.../../img/bg_90.png);"></div>
						<div class="login-wrap p-4 p-md-2">
							<div class="d-flex">
								<div class="w-100">

									<h3 class="mb-2">Sign In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">

									</p>
								</div>
							</div>

							<form action="<?php echo site_url('login/autentikasi'); ?>" method="post" class="signin-form">

								<div class="form-group mt-3">
									<input type="text" name="username" class="form-control" required>
									<label class="form-control-placeholder" for="username">Username</label>
								</div>

								<div class="form-group">
									<input id="password-field" name="pass" type="password" class="form-control" required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								

								<div class="form-group">
									<select name="tahun" class="form-control">
										<option style="color: rgb(0, 45, 149)" value="">Pilih Tahun</option>
										<?php
										foreach ($tanggal_input as $key):?>
										
										<option  style="color: rgb(0, 45, 149)" value="<?= $key?>"><?= $key?></option>
										<?php endforeach;?>
										
									</select>
								</div>

								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
								</div>

								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>

								</div>
								<div class="w3-panel w3-blue w3-display-container">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							</form>
							<p class="text-center">#UNS Madiun #Kominfo Madiun </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url('logn_er/'); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url('logn_er/'); ?>js/popper.js"></script>
	<script src="<?php echo base_url('logn_er/'); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('logn_er/'); ?>js/main.js"></script>

</body>

</html>