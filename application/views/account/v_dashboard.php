<html>

<head>
	<title>Home</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
	<br>
	<br>
	<div class="container">
		<div clss="card shadow">
			<div class="card-header">
				Home Page
			</div>
			<div class="card-body">
				<!-- <center
        ><h1>Selamat Datang <br><?php echo $this->session->userdata('nama'); ?></h1></center> -->
				<table border="0">
					<tbody>
						<tr>
							<td>Nama </td>
							<td>&nbsp&nbsp&nbsp:</td>
							<td>&nbsp<?php echo $this->session->userdata('nama'); ?></td>
						</tr>
						<tr>
							<td>Username </td>
							<td>&nbsp&nbsp&nbsp:</td>
							<td>&nbsp<?php echo $this->session->userdata('username'); ?></td>
						</tr>
						<tr>
							<td>Email </td>
							<td>&nbsp&nbsp&nbsp: </td>
							<td>&nbsp<?php echo $this->session->userdata('email'); ?></td>
						</tr>

					</tbody>
				</table>
				<br>
				<form method="POST" action="<?php echo base_url() . 'Dashboard/upload' ?>" enctype="multipart/form-data">

					<input type="file" name="userfile" />
					<button type="submit" class="btn btn-sm btn-success">
						<span class="fa fa-upload"></span> Upload
					</button>
				</form>
				<a href="<?php echo base_url(); ?>login/logout" class="btn btn-primary btn-lg btn-block">Logout</a>
			</div>
		</div>
	</div>
</body>

</html>