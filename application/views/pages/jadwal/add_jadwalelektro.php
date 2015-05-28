<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Tambah Data Jadwal <small><?php echo $prodi['nama_prodi'];?></small></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="tambahjadwal_elektro" name="tambahjadwal_elektro" method="post">
			<input type="hidden" name="jurusan" id="jurusan" value="elektro" />
			<div class="form-group">
				<label class="control-label col-md-3">Hari</label>
				<div class="col-md-2">
					<?php
					$opthari=array(""=>"Pilih Hari","SENIN"=>"SENIN","SELASA"=>"SELASA","RABU"=>"RABU","KAMIS"=>"KAMIS","JUMAT"=>"JUMAT","SABTU"=>"SABTU");
					$js='id="hari" class="form-control"';
					echo form_dropdown('hari', $opthari, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tanggal</label>
				<div class="col-md-3">
					<input type="input" name="tanggal" readonly id="tanggal" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Waktu Mulai</label>
				<div class="col-md-2">
					<input type="input" name="wkt_mulai" readonly id="wkt_mulai" class="form-control timepicker" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Waktu Selesai</label>
				<div class="col-md-2">
					<input type="input" name="wkt_selesai" readonly id="wkt_selesai" class="form-control timepicker" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Mata Kuliah</label>
				<div class="col-md-5">
					<?php
					$optmk=array(""=>"Pilih Mata Kuliah");
					if($mk!=FALSE){
						foreach($mk as $ta){
							$optmk[$ta['kode_mk']]=$ta['nama_mk'];
						}
					}
					$js='id="kodemk" class="form-control"';
					echo form_dropdown('kodemk', $optmk, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Kelas</label>
				<div class="col-md-3">
					<?php
					$optkelas=array(""=>"Pilih Kelas","A"=>"A","B"=>"B","C"=>"C","D"=>"D","E"=>"E");
					$js='id="kelas" class="form-control"';
					echo form_dropdown('kelas', $optkelas, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Dosen Pengajar</label>
				<div class="col-md-5">
					<input type="text" name="dosen_pengajar" id="dosen_pengajar" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Jlh Mhs</label>
				<div class="col-md-1">
					<input type="text" name="jlh_mhs" id="jlh_mhs" class="form-control" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Ruangan</label>
				<div class="col-md-2">
					<?php
					$optruang=array(""=>"Pilih Ruangan");
					if($ruangan!=FALSE){
						foreach($ruangan as $ta){
							$optruang[$ta['nama_ruangan']]=$ta['nama_ruangan'];
						}
					}
					$js='id="ruangan" class="form-control"';
					echo form_dropdown('ruangan', $optruang, '', $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Kode SMT</label>
				<div class="col-md-2">
					<input type="text" name="kode_smt" id="kode_smt" class="form-control" value="<?php echo $kodesmt_aktif['setting_value'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Thn_ajaran</label>
				<div class="col-md-2">
					<input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?php echo $thnajaran_aktif['setting_value'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-3">
					<input type="submit" name="btn-tambah" id="btn-tambah" class="btn btn-primary" value="Tambah Data" />
					<a href="<?php echo site_url();?>jadwal/jadwal_elektro" class="btn btn-default">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>