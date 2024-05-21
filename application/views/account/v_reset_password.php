<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?= $title; ?>
    </title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>

<body>
<div class="container">
    <h2>Reset Password</h2>
    <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>
    <?php echo form_open('lupa_password/reset_password/token/' . $token); ?>
    <p>Password Baru:</p>
    <p>
        <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" />
    </p>
    <p> <?php echo form_error('password'); ?> </p>
    <p>Konfirmasi Password:</p>
    <p>
        <input type="password" name="passconf" id="passconf" value="<?php echo set_value('passconf'); ?>" />
    </p>
    <p> <?php echo form_error('passconf'); ?> </p>
    <p>
        <input type="submit" name="btnSubmit" value="Reset" />
    </p>
</div>

<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>  -->

<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

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
		      	<h3 class="text-center mb-4">Reset Password</h3>
    <h5>Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.</h5>
<?php
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-info" role="alert">'.$this->session->flashdata('sukses').'</p>';
}
?>
    <?php echo form_open('lupa_password/reset_password/token/' . $token); ?>
					<label for="password">Password Baru</label>
		      		<div class="form-group">
		      			<input type="password" class="form-control rounded-left" name="password" type="password" id="password" placeholder="Masukkan Password Baru" required>
		      		</div>
					<label for="passconf">Password Confirm</label>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" name="passconf" id="passconf" type="password" placeholder="Password Confirm" required>
	            </div>
	            	<center><button type="submit" class="btn btn-primary rounded submit p-2 px-5" name="btnSubmit">Reset</button></center>
	          </form>
			  <!-- <div class="text-center" style="margin-top: 15px">
            Belum punya akun? <a href="<?php echo base_url() ?>register">Daftar</a>
          </div>
		  <div class="text-center" style="margin-top: 15px">
          <a href="<?php echo base_url() ?>lupa_password">Lupa kata sandi?</a>
          </div> -->
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
	</body>
</html>
 
