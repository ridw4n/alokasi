<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Tambah Program Studi Baru</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="tambahprodi" name="tambahprodi" method="post">
			<div class="form-group">
				<label class="control-label col-md-3">Nama Program Studi</label>
				<div class="col-md-3">
					<input type="text" name="nmprodi" id="nmprodi" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Jurusan</label>
				<div class="col-md-3">
					<?php
					$optjurusan=array(""=>"Pilih Jurusan");
					if($jurusan!=FALSE){
						foreach($jurusan as $ta){
							$optjurusan[$ta['id_jurusan']]=$ta['nama_jurusan'];
						}
					}
					$js='id="jurusan" class="form-control"';
					echo form_dropdown('jurusan', $optjurusan, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-3">
					<input type="submit" name="btn-tambah" id="btn-tambah" value="Tambah Data" class="btn btn-primary" />
					<a href="<?php echo site_url();?>prodi" class="btn btn-default">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>