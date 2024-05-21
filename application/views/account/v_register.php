<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Registrasi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="asset-login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">FORM REGISTRASI</h3>
<?php
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-info" role="alert">'.$this->session->flashdata('sukses').'</p>';
}
?>
<?php echo form_open_multipart('register"');?>

					<form class="login-form" method="POST" action="<?php echo site_url('register');?>">
					<label for="nama">Nama</label>
		      		<div class="form-group">
                      <input type="text" class="form-control rounded-left" placeholder="Masukkan nama" name="name" value="<?php echo set_value('name'); ?>"/>
                      <p><small class="text-danger"><?php echo form_error('name'); ?></p></small>
		      		</div>
                    <label for="username">Username</label>
                    <div class="form-group">
                 <input type="text" class="form-control rounded-left" name="username" placeholder="Masukkan username" value="<?php echo set_value('username'); ?>"/>
                 <p><small class="text-danger"><?php echo form_error('username'); ?></p></small>
                </div>
                <label for="email">Email</label>
                <div class="form-group">
                 <input type="text" class="form-control rounded-left" name="email" placeholder="Masukkan email" value="<?php echo set_value('email'); ?>"/>
                <p><small class="text-danger"><?php echo form_error('email'); ?></p></small>
                </div>
                 <label for="password">Password</label>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password" id="password" placeholder="Password" required>
                  <p><small class="text-danger"><?php echo form_error('password'); ?></p></small>
                </div>
                <label for="password_conf">Password Confirm</label>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="password_conf" id="password_conf" placeholder="Password Confirm" required>
                  <p><small class="text-danger"><?php echo form_error('password_conf'); ?></p></small>
                </div>
	            	<center><button type="submit" class="btn btn-primary rounded submit p-2 px-5" name="btnSubmit">Register</button></center>
	          </form>
			  <div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="<?php echo base_url() ?>login">Login</a>
          </div>
		  <div class="text-center" style="margin-top: 15px">
          <a href="<?php echo base_url() ?>lupa_password">Lupa kata sandi?</a>
          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>

  <script src="asset-login/js/jquery.min.js"></script>
  <script src="asset-login/js/popper.js"></script>
  <script src="asset-login/js/bootstrap.min.js"></script>
  <script src="asset-login/js/main.js"></script>

	</body>
</html>

