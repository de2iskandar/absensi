<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<h4>Daftar Siswa Absen <?php echo date('d-m-Y'); ?></h4>
			</div>
		</div>
</div>
	<div class="panel-body">
		<?php if ($data == NULL ) { ?>
			<div class="alert alert-info alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					data kosong.
			</div>
		<?php } else { ?>

		<table class="table table-bordered table-hover">
			<tr>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>JK</th>
				<th>Alamat</th>
				<th>Nama Ayah</th>
				<th>No. Kontak</th>
				<th>Keterangan</th>
				</tr>
    	<?php
    		foreach ($data as $d) { ?>
				<tr>
	            <td><?php echo $d['nis']; ?></td>
	            <td><?php echo $d['nama_siswa']; ?></td>
	            <td><?php echo $d['jk']; ?></td>
	            <td><?php echo $d['alamat']; ?></td>
	            <td><?php echo $d['nama_ayah']; ?></td>
	            <td><?php echo $d['hp']; ?></td>
	            <td><?php echo $d['keterangan']; ?></td>
				</tr>
				<?php } ?>
		</table>
		<?php } ?>
		<a href="<?php echo base_url()."guru/send_sms";?>"><button type="submit" name="btn_tambah" value="tambah" class="btn btn-primary">Kirim SMS Siswa Absen Tanpa Keterangan</button></a>
	</div>
</div>