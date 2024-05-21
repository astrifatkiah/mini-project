<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Lupa Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="asset-login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container-fluid">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Lupa Password</h3>
    <p>Untuk melakukan reset password, silakan masukkan alamat email anda. </p>
<?php
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-info" role="alert">'.$this->session->flashdata('sukses').'</p>';
}
?>
					<form class="login-form" method="POST" action="<?php echo site_url('lupa_password');?>">
					<label for="email">Email</label>
		      		<div class="form-group">
		      			<input type="email" class="form-control rounded-left" name="email" type="email" id="email" placeholder="Masukkan Email" required>
		      		</div>
	            	<center><button type="submit" class="btn btn-primary rounded submit p-2 px-5" name="btnSubmit">Submit</button></center>
	          </form>
			  <div class="text-center" style="margin-top: 15px">
            Belum punya akun? <a href="<?php echo base_url() ?>register">Daftar</a>
          </div>
		  <div class="text-center" style="margin-top: 15px">
            Sudah punya akun? <a href="<?php echo base_url() ?>login">Login</a>
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

