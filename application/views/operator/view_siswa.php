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
				<h4>Daftar Siswa</h4>
			</div>
				<div class="col-xs-6 col-md-4 text-right">
					<a href="<?php echo base_url()."operator/import_siswa"; ?>">
					<button type="button" class="btn btn-success btn-sm">Import</button>
				</a>

				<a href="<?php echo base_url()."operator/export_siswa"; ?>">
					<button type="button" class="btn btn-success btn-sm">Export</button>
				</a>

					<a href="<?php echo base_url()."operator/add_siswa"; ?>">
					<button type="button" class="btn btn-success btn-sm">Tambah</button>
				</a>
				</div>
		</div>
</div>
	<div class="panel-body">
		<table class="table table-bordered table-hover">
			<tr>
				<th>NIS</th>
				<th>Nama</th>
				<th>JK</th>
				<th>Alamat</th>
				<th>Kelas</th>
				<th>Nama Ayah</th>
	            <th>Pekerjaan Ayah</th>
	            <th>No. Hp</th>
				<th>Pilihan</th>
				</tr>
    	<?php
    		$no = $offset;
    		foreach ($data as $d) { ?>
				<tr>
				<td><?php echo $d['nis']; ?></td>
	            <td><?php echo $d['nama_siswa']; ?></td>
	            <td><?php echo $d['jk']; ?></td>
	            <td><?php echo $d['alamat']; ?></td>
	            <td><?php echo $d['kelas']; ?></td>
	            <td><?php echo $d['nama_ayah']; ?></td>
	            <td><?php echo $d['pekerjaan']; ?></td>
	            <td><?php echo $d['hp']; ?></td>
	            <td>
	            	<a href="<?php echo base_url()."operator/edit_siswa/".$d['nis']; ?>">
	            		<button type="button" class="btn btn-info btn-sm">Edit</button>
	            	</a>
	            	<a href="<?php echo base_url()."operator/delete_siswa/".$d['nis']; ?>">
	            		<button type="button" class="btn btn-danger btn-sm">Hapus</button>
	            	</a>
	            </td>
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