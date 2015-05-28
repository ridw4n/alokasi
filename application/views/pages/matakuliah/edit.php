<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Edit Data Mata Kuliah</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="editmk" name="editmk" method="post">
			<input type="hidden" name="idmk" id="idmk" value="<?php echo base64_encode($mk['id_mk']);?>" />
			<div class="form-group">
				<label class="control-label col-md-3">Kode Mata Kuliah</label>
				<div class="col-md-2">
					<input type="text" name="kodemk" id="kodemk" class="form-control" value="<?php echo $mk['kode_mk'];?>" placeholder="cth : TIF-101">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Nama Mata Kuliah</label>
				<div class="col-md-5">
					<input type="text" name="namamk" id="namamk" value="<?php echo $mk['nama_mk'];?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">SKS</label>
				<div class="col-md-1">
					<input type="text" name="sksmk" id="sksmk" value="<?php echo $mk['sks'];?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Semester</label>
				<div class="col-md-1">
					<input type="text" name="smtmk" id="smtmk" value="<?php echo $mk['smt_mk'];?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tahun Ajaran</label>
				<div class="col-md-3">
					<input type="text" name="thn_ajaran" id="thn_ajaran" class="form-control" value="<?php echo $mk['tahun_ajaran'];?>" placeholder="cth: 2014/2015">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Periode Semester</label>
				<div class="col-md-3">
					<input type="text" name="kodesmt" id="kodesmt" class="form-control" value="<?php echo $mk['kode_smt'];?>" placeholder="cth: GAS-2014">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-3">
					<input type="submit" class="btn btn-primary" name="btn-update" id="btn-update" value="Simpan Perubahan" />
					<a href="<?php echo site_url()?>matakuliah/daftar_mk" class="btn btn-default">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>