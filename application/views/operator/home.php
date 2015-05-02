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
        			<li class="active"><a href="<?php echo base_url()."operator/home"; ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Dashboard</a></li>
        			<li><a href="<?php echo base_url()."operator/view_siswa"; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Siswa</a></li>
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
			    		
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 col-md-8">
							<h4>Daftar Siswa Tidak Hadir</h4>
						</div>
					</div>
			</div>
				<div class="panel-body">
					<table class="table table-bordered table-hover">
						<tr>
		    				<th>Tanggal</th>
		    				<th>NIS</th>
		    				<th>Nama Siswa</th>
		    				<th>Kelas</th>
		    				<th>Keterangan</th>
		  				</tr>
		        	<?php
		        		$no = $offset;
		        		foreach ($data as $d) { ?>
		  				<tr>
		    				<td><?php echo $d['tanggal']; ?></td>
				            <td><?php echo $d['nis']; ?></td>
				            <td><?php echo $d['nama_siswa']; ?></td>
				            <td><?php echo $d['kelas']; ?></td>
				            <td><?php echo $d['keterangan']; ?></td>
		  				</tr>
		  				<?php } ?>
					</table>
					<div class="row">
						<div class="col-xs-12 col-md-8">&nbsp;</div>
  						<div class="col-xs-6 col-md-4 text-right">
  							<?php echo $halaman ?>
  						</div>
					</div>
				</div>
			</div>
			
			
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