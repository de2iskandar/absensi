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
        			<li class="active"><a href="<?php echo base_url()."operator/view_siswa"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Siswa</a></li>
        			<li><a href="<?php echo base_url()."operator/view_guru"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Guru</a></li>
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
			<form class="form-horizontal" method="POST" action="<?php echo base_url()."operator/update_siswa";?>">
				<fieldset>

					<!-- Form Name -->
					<legend>Edit Data Siswa</legend>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nis">Nomor Induk</label>  
					  <div class="col-md-4">
					  <input name="nis" class="form-control input-md" value="<?php echo $nis; ?>" type="text" readonly>
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nama_siswa">Nama Lengkap</label>  
					  <div class="col-md-4">
					  <input name="nama_siswa" class="form-control input-md" value="<?php echo $nama_siswa; ?>"type="text">
					    
					  </div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
					  <div class="col-md-4">
					    <select name="jk" class="form-control" value="<?php echo $jk; ?>">
					      <option value="L">Laki-laki</option>
					      <option value="P">Perempuan</option>
					    </select>
					  </div>
					</div>

					<!-- Textarea -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="alamat">Alamat</label>
					  <div class="col-md-4">                     
					    <textarea class="form-control" name="alamat"><?php echo $alamat; ?></textarea>
					  </div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="kelas">Kelas</label>
					  <div class="col-md-4">
					    <select name="kelas" class="form-control" value="<?php echo $kelas; ?>">
					      <option value="X">X</option>
					      <option value="XI">XI</option>
					      <option value="XII">XII</option>
					    </select>
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="nama_ayah">Nama Ayah</label>  
					  <div class="col-md-4">
					  <input name="nama_ayah" class="form-control input-md" value="<?php echo $nama_ayah; ?>" type="text">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="pekerjaan">Pekerjaan</label>  
					  <div class="col-md-4">
					  <input name="pekerjaan" class="form-control input-md" value="<?php echo $pekerjaan; ?>"type="text">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="hp">No. Handphone</label>  
					  <div class="col-md-4">
					  <input name="hp" class="form-control input-md" value="<?php echo $hp; ?>"type="text">
					    
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="send"></label>
					  <div class="col-md-4">
					    <button type="submit" name="btn_tambah" value="tambah" class="btn btn-primary">Simpan</button>
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