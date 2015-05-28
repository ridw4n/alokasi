<div class="row">
  <div class="col-md-12">
    <h3 class="page-header">Edit Ruangan</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" name="form-edit" id="form-edit" action="">
      <input type="hidden" name="idr" value="<?php echo base64_encode($ruangan['id_ruangan']);?>" />
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nama Ruangan</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Input Nama Ruangan" value="<?php echo $ruangan['nama_ruangan'];?>">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Kapasitas</label>
        <div class="col-md-2">
          <input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Input Kapasitas Ruangan" value="<?php echo $ruangan['kapasitas'];?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"></label>
        <div class="col-md-5">
          <button type="submit" name="btn-update" id="btn-update" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?php echo site_url();?>ruangan" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </div>
</div>
