<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Tambah Data Mata Kuliah</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="tambahmk" name="tambahmk" method="post">
			<div class="form-group">
				<label class="control-label col-md-3">Kode Mata Kuliah</label>
				<div class="col-md-2">
					<input type="text" name="kodemk" id="kodemk" class="form-control" placeholder="cth : TIF-101">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Nama Mata Kuliah</label>
				<div class="col-md-5">
					<input type="text" name="namamk" id="namamk" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">SKS</label>
				<div class="col-md-1">
					<input type="text" name="sksmk" id="sksmk" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Semester</label>
				<div class="col-md-1">
					<input type="text" name="smtmk" id="smtmk" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tahun Ajaran</label>
				<div class="col-md-3">
					<input type="text" name="thn_ajaran" id="thn_ajaran" class="form-control" placeholder="cth: 2014/2015">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Periode Semester</label>
				<div class="col-md-3">
					<input type="text" name="kodesmt" id="kodesmt" class="form-control" placeholder="cth: GAS-2014">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-3">
					<input type="submit" class="btn btn-primary" name="btn-tambah" id="btn-tambah" value="Tambah Data" />
					<a href="<?php echo site_url()?>matakuliah/daftar_mk" class="btn btn-default">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>