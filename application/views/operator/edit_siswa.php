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