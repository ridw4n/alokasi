<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Pengaturan</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="form-pengaturan" method="post">
			<div class="form-group">
				<label class="control-label col-md-3">Semester Aktif</label>
				<div class="col-md-4">
					<input type="text" name="smtaktif" class="form-control" id="smtaktif" value="<?php echo $smtaktif;?>" placeholder="cth:GAS-2014">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tahun Ajaran Aktif</label>
				<div class="col-md-4">
					<input type="text" name="thnajaranaktif" class="form-control" id="thnajaranaktif" value="<?php echo $thnajaranaktif;?>" placeholder="cth:2014/2015">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-4">
					<input type="submit" value="Simpan" class="btn btn-primary" name="btn-simpan" id="btn-simpan" />
				</div>
			</div>
		</form>
	</div>
</div>