<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Dashboard</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="alert alert-success">
            <p>Selamat Datang Operator</p>
        </div>
        <div class="alert alert-success">
            <p>Semester Aktif: <strong><?php echo $smtaktif;?></strong>  Tahun Pelajaran: <strong><?php echo $thnajaranaktif;?></strong> <a href="<?php echo site_url();?>pengaturan" class="btn btn-sm btn-success">Ganti</a></p>
        </div>
    </div>
</div>
<?php
//print_r($this->session->all_userdata());
?>