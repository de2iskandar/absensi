<form class="form-horizontal" method="POST" action="<?php echo base_url()."operator/insert_siswa";?>">
	<fieldset>

		<!-- Form Name -->
		<legend>Tambah Data Siswa</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nis">Nomor Induk</label>  
		  <div class="col-md-4">
		  <input id="nis" name="nis" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nama_siswa">Nama Lengkap</label>  
		  <div class="col-md-4">
		  <input id="nama_siswa" name="nama_siswa" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
		  <div class="col-md-4">
		    <select id="jk" name="jk" class="form-control">
		      <option value="L">Laki-laki</option>
		      <option value="P">Perempuan</option>
		    </select>
		  </div>
		</div>

		<!-- Textarea -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="alamat">Alamat</label>
		  <div class="col-md-4">                     
		    <textarea class="form-control" id="alamat" name="alamat"></textarea>
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="kelas">Kelas</label>
		  <div class="col-md-4">
		    <select id="kelas" name="kelas" class="form-control">
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
		  <input id="nama_ayah" name="nama_ayah" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="pekerjaan">Pekerjaan</label>  
		  <div class="col-md-4">
		  <input id="pekerjaan" name="pekerjaan" placeholder="" class="form-control input-md" type="text">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="hp">No. Handphone</label>  
		  <div class="col-md-4">
		  <input id="hp" name="hp" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Button -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="send"></label>
		  <div class="col-md-4">
		    <button type="submit" name="btn_tambah" value="tambah" class="btn btn-primary">Tambah</button>
		  </div>
		</div>

		</fieldset>
	</form>