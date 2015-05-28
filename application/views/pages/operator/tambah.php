<div class="row">
  <div class="col-md-12">
    <h3 class="page-header">Tambah Operator</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" name="form-tambah" id="form-tambah" action="">
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Username</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="username" id="username" placeholder="Input Username">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Password</label>
        <div class="col-md-5">
          <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Input Password">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">NIP Operator</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="nip" id="nip" placeholder="Input NIP">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nama Lengkap</label>
        <div class="col-md-5">
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Email</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="email" id="email"  placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nohp</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No HP/Telepon">
        </div>
      </div>
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Hak Akses</label>
        <div class="col-md-3">
          <select name="hakakses" id="hakakses" class="form-control">
            <option value="">- Pilih -</option>
            <option value="1">Admin</option>
            <option value="2">User</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"></label>
        <div class="col-md-5">
          <button type="submit" name="btn-tambah" id="btn-tambah" class="btn btn-primary">Tambah Operator</button>
          <a href="<?php echo site_url();?>operator/listop" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </div>
</div>
