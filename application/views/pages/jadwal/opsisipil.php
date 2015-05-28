<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Jadwal Kuliah Sipil</h3>
	</div>
</div>
<div class"row">
	<div class="col-md-12">
		<form class="form-horizontal" id="filter_sipil" id="filter_sipil" method="post">
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
				<label class="control-label col-md-3">Tahun Ajaran</label>
				<div class="col-md-4">
					<?php
					$optionta=array("all"=>"Semua Data");
					if($thnajaran!=FALSE){
						foreach($thnajaran as $ta){
							$optionta[$ta['tahun_ajaran']]=$ta['tahun_ajaran'];
						}
					}
					$js='id="thn_ajaran" class="form-control"';
					echo form_dropdown('thn_ajaran', $optionta, $thnajaran_aktif['setting_value'], $js);
					?>
				</div>
			</div>
			<div class='form-group'>
				<label class="control-label col-md-3">Kode Semester</label>
				<div class="col-md-3">
					<?php
					$smt=array("all"=>"Semua Data");
					if($kodesmt!=FALSE){
						foreach($kodesmt as $ta){
							$smt[$ta['kodesmt']]=$ta['kodesmt'];
						}
					}
					$js='id="kodesmt" class="form-control"';
					echo form_dropdown('kodesmt', $smt, $kodesmt_aktif['setting_value'], $js);
					?>
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