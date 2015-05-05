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
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Keterangan</th>
				</tr>
    	<?php
    		foreach ($data as $d) { ?>
				<tr>
	            <td><?php echo $d['nis']; ?></td>
	            <td><?php echo $d['nama_siswa']; ?></td>
	            <td><?php echo $d['keterangan']; ?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
</div>