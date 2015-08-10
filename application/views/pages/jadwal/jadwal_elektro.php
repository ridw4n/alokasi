<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Jadwal Kuliah <small><?php echo $prodi['nama_prodi']." ".$kodesmt." ".$thnajaran;?></small></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php if($this->auth->is_admin()){ ?>
		<a href="<?php echo site_url();?>jadwal/tambah_jelektro" class="btn btn-primary" style="margin-bottom:5px;">Tambah Data</a>
		<?php } ?>
		<a href="<?php echo site_url();?>jadwal/opsi_elektro" class="btn btn-default" style="margin-bottom:5px;">Kembali</a>
		<table class="table table-bordered table-hover table-striped" id="jadwalelektro">
			<thead>
				<tr>
					<th style="text-align:center">Hari</th>
					<!-- <th style="text-align:center">Tanggal</th> -->
					<th style="text-align:center">Waktu</th>
					<th style="text-align:center">Kode SMT</th>
					<th style="text-align:center">Mata Kuliah</th>
					<th style="text-align:center">Kelas</th>
					<th style="text-align:center">Jlh Mhs</th>
					<th style="text-align:center">Dosen Pengajar </th>
					<th style="text-align:center">Ruangan </th>
					<th style="text-align:center">Thn Ajaran</th>
					<?php if($this->auth->is_admin()){ ?>
					<td style="text-align:center">Aksi</td>
					<?php } ?>
				</tr>
			</thead>
		</table>
	</div>
</div>