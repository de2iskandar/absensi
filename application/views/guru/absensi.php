<form class="form-horizontal" method="POST" action="<?php echo base_url()."guru/insert_absen";?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Tambah Siswa Absen</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="nis">Nomor Induk Siswa</label>  
          <div class="col-md-4">
          <input id="nis" name="nis" placeholder="" class="form-control input-md" required="" type="text">
            
          </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="keterangan">Keterangan</label>
          <div class="col-md-4">
            <select id="keterangan" name="keterangan" class="form-control">
              <option value="Sakit">Sakit</option>
              <option value="Izin">izin</option>
              <option value="Tanpa Keterangan">Tanpa Keterangan</option>
            </select>
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