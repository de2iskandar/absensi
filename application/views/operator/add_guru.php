<form class="form-horizontal" method="POST" action="<?php echo base_url()."operator/insert_guru";?>">
	<fieldset>

		<!-- Form Name -->
		<legend>Tambah Data Guru</legend>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nis">Nomor Induk</label>  
		  <div class="col-md-4">
		  <input id="nip" name="nip" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nama_guru">Nama Lengkap</label>  
		  <div class="col-md-4">
		  <input id="nama_guru" name="nama_guru" placeholder="" class="form-control input-md" required="" type="text">
		    
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
		  <label class="col-md-4 control-label" for="kelas">ID Mata Pelajaran</label>
		  <div class="col-md-4">
		    <input id="id_mapel" name="id_mapel" placeholder="" class="form-control input-md" required="" type="text">
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nama_ayah">ID Pengguna</label>  
		  <div class="col-md-4">
		  <input id="id_user" name="id_user" placeholder="" class="form-control input-md" required="" type="text">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="pekerjaan">Password</label>  
		  <div class="col-md-4">
		  <input id="password" name="password" placeholder="" class="form-control input-md" type="text">
		    
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