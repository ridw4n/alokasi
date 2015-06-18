<div class="row">
  <div class="col-md-12">
    <h3 class="page-header">Tambah Ruangan</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" name="form-tambah" id="form-tambah" action="">
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nama Ruangan</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Input Nama Ruangan">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Kapasitas</label>
        <div class="col-md-2">
          <input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Input Kapasitas Ruangan">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3">Prodi</label>
        <div class="col-md-4">
          <?php
          $optprodi=array(""=>"Pilih Prodi","0"=>"Semua Prodi");
          if($prodi!=FALSE){
            foreach($prodi as $ta){
              $optprodi[$ta['id_prodi']]=$ta['nama_prodi'];
            }
          }
          $js='id="prodi" class="form-control"';
          echo form_dropdown('prodi', $optprodi, '', $js);
          ?>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"></label>
        <div class="col-md-5">
          <button type="submit" name="btn-tambah" id="btn-tambah" class="btn btn-primary">Tambah Ruangan</button>
          <a href="<?php echo site_url();?>ruangan" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </div>
</div>
