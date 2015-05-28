<div class="row">
  <div class="col-md-12">
    <h3 class="page-header">Profil Operator</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" role="form" method="post" name="form-profil" id="form-profil" action="">
      <input type="hidden" name="opid" value="<?php echo base64_encode($profil['id_op']);?>" />
      <input type="hidden" name="hakakses" value="<?php echo $profil['hakakses'];?>" />
      <input type="hidden" name="statusakun" value="<?php echo $profil['aktif'];?>" />
      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Username</label>
        <div class="col-md-3">
          <input type="text" class="form-control" readonly name="username" id="username" value="<?php echo $profil['username'];?>" placeholder="Input Username">
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
          <input type="text" class="form-control" name="nip" id="nip" value="<?php echo $profil['nip'];?>"placeholder="Input NIP">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nama Lengkap</label>
        <div class="col-md-5">
          <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $profil['nama'];?>" placeholder="Nama Lengkap">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Email</label>
        <div class="col-md-4">
          <input type="text" class="form-control" name="email" id="email" value="<?php echo $profil['email'];?>" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label for="manajemen_user" class="control-label col-md-3">Nohp</label>
        <div class="col-md-3">
          <input type="text" class="form-control" name="nohp" id="nohp" value="<?php echo $profil['nohp'];?>" placeholder="No HP/Telepon">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3"></label>
        <div class="col-md-5">
          <button type="submit" name="btn-update" id="btn-update" class="btn btn-default">Update Profil</button>
        </div>
      </div>
    </form>
  </div>
</div>
