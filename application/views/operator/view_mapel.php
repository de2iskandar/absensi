<?php if ($this->session->flashdata('delete')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> data telah dihapus.
</div>
<?php endif ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<h4>Daftar Mata Pelajaran</h4>
			</div>
		</div>
</div>
	<div class="panel-body">
		<table class="table table-bordered table-hover">
			<tr>
				<th>Mata Pelajaran</th>
				<th>Nama Guru</th>
				</tr>
    	<?php
    		foreach ($data as $d) { ?>
				<tr>
				<td><?php echo $d['mata_pelajaran']; ?></td>
	            <td><?php echo $d['nama_guru']; ?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
</div>