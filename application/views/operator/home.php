<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<h4>Daftar Siswa Tidak Hadir</h4>
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
				<th>Tanggal</th>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Guru</th>
				<th>Keterangan</th>
				</tr>
    	<?php
    		foreach ($data as $d) { ?>
				<tr>
				<td><?php echo $d['tanggal']; ?></td>
	            <td><?php echo $d['nis']; ?></td>
	            <td><?php echo $d['nama_siswa']; ?></td>
				<td><?php echo $d['kelas']; ?></td>
				<td><?php echo $d['nama_guru']; ?></td>
	            <td><?php echo $d['keterangan']; ?></td>
				</tr>
				<?php } ?>
		</table>
		<?php } ?>
	</div>
</div>