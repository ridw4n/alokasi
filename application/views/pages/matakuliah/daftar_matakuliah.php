<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Daftar Mata Kuliah <small><?php echo $prodi['nama_prodi']." ".$semester." ".$thnajaran;?></small></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo site_url();?>matakuliah/tambah" class="btn btn-default" style="margin-bottom:5px;">Tambah Data</a>
		<table class="table table-bordered table-hover table-striped" id="tbdaftarmk">
			<thead>
				<tr>
					<th style="text-align:center">Kode MK</th>
					<th style="text-align:center">Nama MK</th>
					<th style="text-align:center">SKS</th>
					<th style="text-align:center">Semester</th>
					<th style="text-align:center">Periode</th>
					<th style="text-align:center">Thn Ajaran</th>
					<?php if($this->auth->is_admin()){ ?>
					<td style="text-align:center">Aksi</td>
					<?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>