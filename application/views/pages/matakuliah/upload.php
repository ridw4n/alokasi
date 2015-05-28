<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Daftar Mata Kuliah</h3>
	</div>
</div>
<div class"row">
	<div class="col-md-12">
		<form class="form-horizontal" id="uploadmk" id="uploadmk" method="post">
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
					Format File Dapat Diunduh di <a href="<?php echo site_url();?>matakuliah/format_download">Sini</a>
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