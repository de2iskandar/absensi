<?php if ($this->session->flashdata('tambah')) : ?>
<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Sukses!</strong> data berhasil ditambahkan.
</div>
<?php endif ?>

<?php if ($this->session->flashdata('update')) : ?>
<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Info!</strong> data berhasil diperbarui.
</div>
<?php endif ?>

<?php if ($this->session->flashdata('delete')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> data telah dihapus.
</div>
<?php endif ?>

<?php if ($this->session->flashdata('import')) : ?>
<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Sukses!</strong> data telah diimport.
</div>
<?php endif ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<h4>Daftar guru</h4>
			</div>
				<div class="col-xs-6 col-md-4 text-right">
					<a href="<?php echo base_url()."operator/add_guru"; ?>">
					<button type="button" class="btn btn-success btn-sm">Tambah</button>
				</a>
				</div>
		</div>
</div>
	<div class="panel-body">
		<table class="table table-bordered table-hover">
			<tr>
				<th>NIP</th>
				<th>Nama</th>
				<th>JK</th>
				<th>Alamat</th>
				<th>Mata Pelajaran</th>
				</tr>
    	<?php
    		foreach ($data as $d) { ?>
				<tr>
				<td><?php echo $d['nip']; ?></td>
	            <td><?php echo $d['nama_guru']; ?></td>
	            <td><?php echo $d['jk']; ?></td>
	            <td><?php echo $d['alamat']; ?></td>
	            <td><?php echo $d['mata_pelajaran']; ?></td>
				</tr>
				<?php } ?>
		</table>
	</div>
</div>