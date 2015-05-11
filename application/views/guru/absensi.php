<div class="panel panel-default">
  <div class="panel-heading">
    <div class="row">
      <div class="col-xs-12 col-md-8">
        <h4>Daftar Siswa</h4>
      </div>
    </div>
</div>
  <div class="panel-body">
      <form class="form-horizontal" method="POST" action="<?php echo base_url()."guru/insert_absen";?>">
    <fieldset>

        <table class="table table-bordered table-hover">
      <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>JK</th>
        <th>Alamat</th>
        <th>Keterangan</th>
        </tr>
      <?php
        foreach ($data as $d) { ?>
        <tr>
              <td><?php echo $d['nis']; ?></td>
              <td><?php echo $d['nama_siswa']; ?></td>
              <td><?php echo $d['jk']; ?></td>
              <td><?php echo $d['alamat']; ?></td>
              <td></td>
        </tr>
        <?php } ?>
    </table>

  </fieldset>
</form>
  </div>
</div>