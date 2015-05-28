<div class="row">
  <div class="col-md-12">
    <h3 class="page-header">Edit Operator</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" name="form-edit" id="form-edit" action="">
      <input type="hidden" name="opid" value="<?php echo base64_encode($profil['id_op']);?>" />
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Username</label>
        <div class="col-md-3">
          <input type="text" readonly class="form-control" name="username" id="username" placeholder="Input Username" value="<?php echo $profil['username'];?>">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Password</label>
        <div class="col-md-5">
          <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Input Password">
          <small>(Kosongkan Juga Tidak Mengganti Password)</small>
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">NIP Operator</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="nip" id="nip" placeholder="Input NIP" value="<?php echo $profil['nip'];?>">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nama Lengkap</label>
        <div class="col-md-5">
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo $profil['nama'];?>">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Email</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="email" id="email"  placeholder="Email" value="<?php echo $profil['email'];?>">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nohp</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="nohp" id="nohp" placeholder="No HP/Telepon" value="<?php echo $profil['nohp'];?>">
        </div>
      </div>
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Hak Akses</label>
        <div class="col-md-3">
          <select name="hakakses" id="hakakses" class="form-control">
            <option value="">- Pilih -</option>
            <option <?php echo($profil['hakakses']=='1')?"selected":"";?> value="1">Admin</option>
            <option <?php echo($profil['hakakses']=='2')?"selected":"";?> value="2">User</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Status Akun</label>
        <div class="col-md-3">
          <select name="statusakun" id="statusakun" class="form-control">
            <option value="">- Pilih -</option>
            <option <?php echo($profil['aktif']=='Y')?"selected":"";?> value="Y">Aktif</option>
            <option <?php echo($profil['aktif']=='N')?"selected":"";?> value="N">Non Aktif</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"></label>
        <div class="col-md-5">
          <button type="submit" name="btn-update" id="btn-update" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?php echo site_url();?>operator/listop" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </div>
</div>
