<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
        		<li role="presentation"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Username</a></li>
        		<li role="presentation"><a href="#"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Log out</a></li>
      		</ul>
		</div>
	</section>

	<section id="menubar">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Collect the nav links, forms, and other content for toggling -->
    			<ul class="nav navbar-nav">
        			<li><a href="<?php echo base_url()."operator/home"; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Dashboard</a></li>
        			<li><a href="<?php echo base_url()."operator/view_siswa"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Siswa</a></li>
        			<li class="active"><a href="<?php echo base_url()."operator/view_guru"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Guru</a></li>
        			<li><a href="<?php echo base_url()."operator/view_mapel"; ?>"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Mata Pelajaran</a></li>

      			</ul>
      			<ul class="nav navbar-nav navbar-right">
        			<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><?php echo date('d-m-Y H:i:s'); ?></li>
      			</ul>
			</nav>
		</div>
	</section>
	<section id="content">
		<div class="container">
			<form class="form-horizontal" method="POST" action="<?php echo base_url()."operator/insert_guru";?>">
				<fieldset>

					<!-- Form Name -->
					<legend>Tambah Data Siswa</legend>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nip">Nomor Induk Pegawai</label>  
					  <div class="col-md-4">
					  <input id="nip" name="nip" class="form-control input-md" type="text">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nama_guru">Nama Lengkap</label>  
					  <div class="col-md-4">
					  <input id="nama_guru" name="nama_guru" class="form-control input-md" type="text">
					    
					  </div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
					  <div class="col-md-4">
					    <select id="jk" name="jk" class="form-control">
					      <option value="L">Laki-laki</option>
					      <option value="P">Perempuan</option>
					    </select>
					  </div>
					</div>

					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="alamat">Alamat</label>
					  <div class="col-md-4">                     
					    <textarea class="form-control" id="alamat" name="alamat"></textarea>
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="password">Password</label>  
					  <div class="col-md-4">
					  <input id="password" name="password" class="form-control input-md" type="text">
					    
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="send"></label>
					  <div class="col-md-4">
					    <button type="submit" name="btn_tambah" value="tambah" class="btn btn-primary">Tambah</button>
					  </div>
					</div>

					</fieldset>
				</form>

		</div>
	</section>
	<section id="footer">
		<div class="container">
			<hr />
			<p class="text-center">&copy; 2015 Pemrograman Internet IF UIN SGD 2012</p>
		</div>
	</section>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/vendor/js/jquery.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/vendor/js/bootstrap.js"></script>
</body>
</html>