<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Absensi Siswa Realtime</title>

	<link href="<?php echo base_url()."assets/vendor/css/bootstrap.css"; ?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/style.css"; ?>">
</head>
	
<body>
	<section id="header">
		<div class="container">
			<h1 class="navbar-brand">Absensi Siswa Realtime</h1>
			<ul class="nav navbar-nav navbar-right">
        		<li role="presentation"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $nama ?></li>
        		<li role="presentation"><a href="<?php echo base_url().'login/logout';?>"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Log out</a></li>
      		</ul>
		</div>
	</section>

	<section id="menubar">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Collect the nav links, forms, and other content for toggling -->
    			<ul class="nav navbar-nav">
        			<li class="<?php if($menu=='home') echo 'active'; ?>"><a href="<?php echo base_url()."guru/home"; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Dashboard</a></li>
        			<li class="<?php if($menu=='absensi') echo 'active'; ?>"><a href="<?php echo base_url()."guru/absensi"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Absensi</a></li>

      			</ul>
      			<ul class="nav navbar-nav navbar-right">
        			<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo date('d-m-Y H:i:s'); ?></li>
      			</ul>
			</nav>
		</div>
	</section>
	
	<section id="content">
		<div class="container">
			<?php $this->load->view($main_content); ?>
		</div>
	</section>

	<section id="footer">
		<div class="container">
			<hr />
			<p class="text-center">&copy; 2015 Pemrograman Internet IF UIN SGD</p>
		</div>
	</section>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/vendor/js/jquery.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/vendor/js/bootstrap.js"></script>
</body>
</html>