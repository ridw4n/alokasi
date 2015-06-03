<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Manajemen Program Studi</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php if($this->auth->is_admin()){ ?>
		<a href="<?php echo site_url();?>prodi/tambah" class="btn btn-default" style="margin-bottom:5px;">Tambah Program Studi</a>
		<?php } ?>
		<table class="table table-bordered table-hover table-striped" id="listprodi">
			<thead>
				<tr>
					<td style="text-align:center">Nama Jurusan</td>
					<td style="text-align:center">Nama Program Studi</td>
					<?php if($this->auth->is_admin()){ ?>
					<td style="text-align:center">Aksi</td>
					<?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>