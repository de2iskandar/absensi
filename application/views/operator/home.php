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
        			<li class="active"><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Dashboard</a></li>
        			<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Siswa</a></li>
        			<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Guru</a></li>
        			<li><a href="#"><span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>Kelas</a></li>
        			<li><a href="#"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Mata Pelajaran</a></li>
        			<li><a href="#"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>Laporan</a></li>

      			</ul>
      			<ul class="nav navbar-nav navbar-right">
        			<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>Jum'at, 25 April 2015 09:45</li>
      			</ul>
			</nav>
		</div>
	</section>
	<section id="content">
		<div class="container">
			<table class="table table-bordered table-hover">
				<tr>
    				<th>NIS</th>
    				<th>Nama</th>
    				<th>Jenis Kelamin</th>
    				<th>Alamat</th>
    				<th>Kelas</th>
    				<th>Nama Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>No. Hp</th>
  				</tr>
        <?php foreach ($data as $d) { ?>
  				<tr>
    				<td><?php echo $d['nis']; ?></td>
            <td><?php echo $d['nama_siswa']; ?></td>
            <td><?php echo $d['jk']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['kelas']; ?></td>
            <td><?php echo $d['nama_ayah']; ?></td>
            <td><?php echo $d['pekerjaan']; ?></td>
            <td><?php echo $d['hp']; ?></td>
  				</tr>
          <?php } ?>
			</table>
		</div>
	</section>
	<section id="footer">
		
	</section>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="assets/vendor/js/jquery.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/vendor/js/bootstrap.js"></script>
</body>
</html>