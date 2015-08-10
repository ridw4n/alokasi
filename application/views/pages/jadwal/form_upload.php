<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Upload Jadwal Kuliah</h3>
	</div>
</div>
<div class"row">
	<div class="col-md-12">
		<form class="form-horizontal" id="uploadjadwal" id="uploadjadwal" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="control-label col-md-3">Prodi</label>
				<div class="col-md-4">
					<?php
					$optprodi=array(""=>"Pilih Prodi");
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
			<div class='form-group'>
				<label class="control-label col-md-3">File Excel(xls/xlsx)</label>
				<div class="col-md-4">
					<input type="file" name="berkas" id="berkas" class="form-control"/>
				</div>
			</div>
			<div class='form-group'>
				<label class="control-label col-md-3"></label>
				<div class="col-md-4">
					Format File Dapat Diunduh di <a href="<?php echo site_url();?>jadwal/format_download">Sini</a>
				</div>
			</div>
			<div class='form-group'>
				<label class="control-label col-md-3"></label>
				<div class="col-md-4">
					<input type="submit" class="btn btn-primary" name="btn-tampilkan" id="btn-tampilkan" value="Tampilkan Data" />
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table" id="tabelpreviewupload" style="display:none">
			<thead>
				<th>Kode MK</th>
				<th>Hari</th>
				<!-- <th>Tanggal</th> -->
				<th>Waktu Mulai</th>
				<th>Waktu Selesai</th>
				<th>Kelas</th>
				<th>Dosen Pengajar</th>
				<th>Jlh Mhs</th>
				<th>Ruangan</th>
				<th>Kode SMT</th>
				<th>Tahun Ajaran</th>
				<th>Prioritas</th>
			</thead>
			<tbody id="tbpreview">
			</tbody>
		</table>
		<div id="btntblaction" style="display:none">
			<a href="#" id="simpandata" name="simpandata" class="btn btn-primary">Simpan</a>
			<a href="#" id="reset" name="reset" class="btn btn-default">Reset</a>
		</div>
	</div>
</div>