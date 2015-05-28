<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Edit Data Jadwal <small><?php echo $prodi['nama_prodi'];?></small></h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" id="editjadwal_sipil" name="editjadwal_sipil" method="post">
			<input type="hidden" name="idjadwal" id="idjadwal" value="<?php echo base64_encode($jadwal['id_jadwal']);?>" />
			<input type="hidden" name="jurusan" id="jurusan" value="sipil" />
			<div class="form-group">
				<label class="control-label col-md-3">Hari</label>
				<div class="col-md-2">
					<?php
					$opthari=array(""=>"Pilih Hari","SENIN"=>"SENIN","SELASA"=>"SELASA","RABU"=>"RABU","KAMIS"=>"KAMIS","JUMAT"=>"JUMAT","SABTU"=>"SABTU");
					$js='id="hari" class="form-control"';
					echo form_dropdown('hari', $opthari, $jadwal['hari'], $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tanggal</label>
				<div class="col-md-3">
					<input type="input" name="tanggal" readonly id="tanggal" class="form-control" value="<?php echo $jadwal['tanggal'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Waktu Mulai</label>
				<div class="col-md-2">
					<input type="input" name="wkt_mulai" readonly id="wkt_mulai" class="form-control timepicker" value="<?php echo $jadwal['jam_mulai'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Waktu Selesai</label>
				<div class="col-md-2">
					<input type="input" name="wkt_selesai" readonly id="wkt_selesai" class="form-control timepicker" value="<?php echo $jadwal['jam_selesai'];?>"/>
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
					echo form_dropdown('kodemk', $optmk, $jadwal['kode_mk'], $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Kelas</label>
				<div class="col-md-3">
					<?php
					$optkelas=array(""=>"Pilih Kelas","A"=>"A","B"=>"B","C"=>"C","D"=>"D","E"=>"E");
					$js='id="kelas" class="form-control"';
					echo form_dropdown('kelas', $optkelas, $jadwal['kelas'], $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Dosen Pengajar</label>
				<div class="col-md-5">
					<input type="text" name="dosen_pengajar" id="dosen_pengajar" class="form-control" value="<?php echo $jadwal['dosen_pengajar'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Jlh Mhs</label>
				<div class="col-md-1">
					<input type="text" name="jlh_mhs" id="jlh_mhs" class="form-control" value="<?php echo $jadwal['jlh_mhs'];?>"/>
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
					echo form_dropdown('ruangan', $optruang, $jadwal['ruangan'], $js);
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Kode SMT</label>
				<div class="col-md-2">
					<input type="text" name="kode_smt" id="kode_smt" class="form-control" value="<?php echo $jadwal['kodesmt'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Thn_ajaran</label>
				<div class="col-md-2">
					<input type="text" name="tahun_ajaran" id="tahun_ajaran" class="form-control" value="<?php echo $jadwal['tahun_ajaran'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3"></label>
				<div class="col-md-3">
					<input type="submit" name="btn-update" id="btn-update" class="btn btn-primary" value="Simpan Perubahan" />
					<a href="<?php echo site_url();?>jadwal/jadwal_sipil" class="btn btn-default">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>