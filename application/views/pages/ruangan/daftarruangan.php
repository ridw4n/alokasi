<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Manajemen Ruangan</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php if($this->auth->is_admin()){ ?>
		<a href="<?php echo site_url();?>ruangan/tambah" class="btn btn-default" style="margin-bottom:5px;">Tambah Ruangan</a>
		<?php } ?>
		<table class="table table-bordered table-hover table-striped" id="tb_listruangan">
			<thead>
				<tr>
					<td style="text-align:center">Nama Ruangan</td>
					<td style="text-align:center">Kapasitas</td>
					<td style="text-align:center">Prodi</td>
					<?php if($this->auth->is_admin()){ ?>
					<td style="text-align:center">Aksi</td>
					<?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>