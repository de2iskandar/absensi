<form class="form-horizontal" method="POST" action="<?php echo base_url()."operator/update_guru";?>">
	<fieldset>

		<!-- Form Name -->
		<legend>Edit Data Guru</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nip">Nomor Induk Pegawai</label>  
		  <div class="col-md-4">
		  <input name="nip" class="form-control input-md" value="<?php echo $nip; ?>" type="text" readonly>
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nama_guru">Nama Lengkap</label>  
		  <div class="col-md-4">
		  <input name="nama_guru" class="form-control input-md" value="<?php echo $nama_guru; ?>"type="text">
		    
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

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="password">Password</label>  
		  <div class="col-md-4">
		  <input name="password" class="form-control input-md" value="<?php echo $password; ?>"type="text">
		    
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