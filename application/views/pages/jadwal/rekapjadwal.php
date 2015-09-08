<?php
$data['prodi']=1;
$q1=$this->Gen_model->get_mk($data);
if($q1){
	echo '<div class="row">
		<div class="col-md-12">
			<h4 class="page-header text-danger">Program Studi Elektro</h4>
		</div>
	</div>';
	//echo '<div class="row">';
	foreach ($q1 as $row1) {
		$kapasitas=$row1['jlh_mhs'];
		$jammulai=$row1['jam_mulai'];
		$jamselesai=$row1['jam_selesai'];
		$hari=$row1['hari'];
		$idjadwal=$row1['id_jadwal'];
		$pruangan=$row1['prioritas'];
		$selectedruangan="";
		if($pruangan=='lab'){
			$prioritas=$pruangan;
		}else{
			$prioritas="";
		}
		$jadwal=$this->Jadwal_model->get_jadwal($idjadwal,'elektro');
		echo '<div class="row">
			<div class="col-md-4">
				<p>Daftar Ruangan Yang Bisa DiIsi Untuk Jadwal Mata Kuliah: </p>
				<p>Nama MK : <strong>'.$jadwal['nama_mk'].'</strong></p>
				<p>Jumlah Mahasiswa : <strong>'.$jadwal['jlh_mhs'].'</strong></p>
				<p>Dosen Pengajar : '.$jadwal['dosen_pengajar'].'</p>
				<p>Prioritas Lab : '.(($jadwal['prioritas']=='lab')?"Ya":"Tidak").'</p>
				<p>Mulai : '.$jadwal['jam_mulai'].'</p>
				<p>Selesai : '.$jadwal['jam_selesai'].'</p>
			</div>';
		echo '<div class="col-md-8">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Ruangan</th>
							<th>Kapasitas</th>
						</tr>
					</thead>
					<tbody>';
					$ruangan=$this->Gen_model->get_ruangan(1,$idprodi,$prioritas);
					if($ruangan){
							$c=1;
							foreach ($ruangan as $row) {
								if($row['kapasitas']<$jadwal['jlh_mhs']){
									$kapasitas_ruangan=$row['kapasitas']. " + ".($jadwal['jlh_mhs']-$row['kapasitas'])." Kursi Tambahan";
								}else{
									$kapasitas_ruangan=$row['kapasitas'];
								}
								$data['wkt_mulai']=$jadwal['jam_mulai'];
								$data['wkt_selesai']=$jadwal['jam_selesai'];
								$data['hari']=$jadwal['hari'];
								$data['ruangan']=$row['nama_ruangan'];
								$q3=$this->Gen_model->get_ruangan_tersedia($data);
								if($q3){
									echo '<tr>
										<td>'.$c.'</td>
										<td>'.$row['nama_ruangan'].'</td>
										<td>'.$kapasitas_ruangan.'</td>
									</tr>';
								}
								$c++;
							}
						}
				echo '</tbody>
				</table>
			</div>';
		echo '</div>';
	}
	//echo '</div>';
}
?>

<?php
$data['prodi']=2;
$q1=$this->Gen_model->get_mk($data);
if($q1){
	echo '<div class="row">
		<div class="col-md-12">
			<h4 class="page-header text-danger">Program Studi Informatika</h4>
		</div>
	</div>';
	//echo '<div class="row">';
	foreach ($q1 as $row1) {
		$kapasitas=$row1['jlh_mhs'];
		$jammulai=$row1['jam_mulai'];
		$jamselesai=$row1['jam_selesai'];
		$hari=$row1['hari'];
		$idjadwal=$row1['id_jadwal'];
		$pruangan=$row1['prioritas'];
		$selectedruangan="";
		if($pruangan=='lab'){
			$prioritas=$pruangan;
		}else{
			$prioritas="";
		}
		$jadwal=$this->Jadwal_model->get_jadwal($idjadwal,'elektro');
		/*print_r($jadwal);
		echo '<br/>';*/
		echo '<div class="row">
			<div class="col-md-4">
				<p>Daftar Ruangan Yang Bisa DiIsi Untuk Jadwal Mata Kuliah: </p>
				<p>Nama MK : <strong>'.$jadwal['nama_mk'].'</strong></p>
				<p>Jumlah Mahasiswa : <strong>'.$jadwal['jlh_mhs'].'</strong></p>
				<p>Dosen Pengajar : '.$jadwal['dosen_pengajar'].'</p>
				<p>Prioritas Lab : '.(($jadwal['prioritas']=='lab')?"Ya":"Tidak").'</p>
				<p>Mulai : '.$jadwal['jam_mulai'].'</p>
				<p>Selesai : '.$jadwal['jam_selesai'].'</p>
			</div>';
		echo '<div class="col-md-8">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Ruangan</th>
							<th>Kapasitas</th>
						</tr>
					</thead>
					<tbody>';
					$ruangan=$this->Gen_model->get_ruangan(1,$idprodi,$prioritas);
					if($ruangan){
							$c=1;
							foreach ($ruangan as $row) {
								if($row['kapasitas']<$jadwal['jlh_mhs']){
									$kapasitas_ruangan=$row['kapasitas']. " + ".($jadwal['jlh_mhs']-$row['kapasitas'])." Kursi Tambahan";
								}else{
									$kapasitas_ruangan=$row['kapasitas'];
								}
								$data['wkt_mulai']=$jadwal['jam_mulai'];
								$data['wkt_selesai']=$jadwal['jam_selesai'];
								$data['hari']=$jadwal['hari'];
								$data['ruangan']=$row['nama_ruangan'];
								$q3=$this->Gen_model->get_ruangan_tersedia($data);
								if($q3){
									echo '<tr>
										<td>'.$c.'</td>
										<td>'.$row['nama_ruangan'].'</td>
										<td>'.$kapasitas_ruangan.'</td>
									</tr>';
								}
								$c++;
							}
						}
				echo '</tbody>
				</table>
			</div>';
		echo '</div>';
	}
	//echo '</div>';
}
?>
<?php
$data['prodi']=3;
$q1=$this->Gen_model->get_mk($data);
if($q1){
	echo '<div class="row">
		<div class="col-md-12">
			<h4 class="page-header text-danger">Program Studi Industri</h4>
		</div>
	</div>';
	//echo '<div class="row">';
	foreach ($q1 as $row1) {
		$kapasitas=$row1['jlh_mhs'];
		$jammulai=$row1['jam_mulai'];
		$jamselesai=$row1['jam_selesai'];
		$hari=$row1['hari'];
		$idjadwal=$row1['id_jadwal'];
		$pruangan=$row1['prioritas'];
		$selectedruangan="";
		if($pruangan=='lab'){
			$prioritas=$pruangan;
		}else{
			$prioritas="";
		}
		$jadwal=$this->Jadwal_model->get_jadwal($idjadwal,'elektro');
		/*print_r($jadwal);
		echo '<br/>';*/
		echo '<div class="row">
			<div class="col-md-4">
				<p>Daftar Ruangan Yang Bisa DiIsi Untuk Jadwal Mata Kuliah: </p>
				<p>Nama MK : <strong>'.$jadwal['nama_mk'].'</strong></p>
				<p>Jumlah Mahasiswa : <strong>'.$jadwal['jlh_mhs'].'</strong></p>
				<p>Dosen Pengajar : '.$jadwal['dosen_pengajar'].'</p>
				<p>Prioritas Lab : '.(($jadwal['prioritas']=='lab')?"Ya":"Tidak").'</p>
				<p>Mulai : '.$jadwal['jam_mulai'].'</p>
				<p>Selesai : '.$jadwal['jam_selesai'].'</p>
			</div>';
		echo '<div class="col-md-8">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Ruangan</th>
							<th>Kapasitas</th>
						</tr>
					</thead>
					<tbody>';
					$ruangan=$this->Gen_model->get_ruangan(1,$idprodi,$prioritas);
					if($ruangan){
							$c=1;
							foreach ($ruangan as $row) {
								if($row['kapasitas']<$jadwal['jlh_mhs']){
									$kapasitas_ruangan=$row['kapasitas']. " + ".($jadwal['jlh_mhs']-$row['kapasitas'])." Kursi Tambahan";
								}else{
									$kapasitas_ruangan=$row['kapasitas'];
								}
								$data['wkt_mulai']=$jadwal['jam_mulai'];
								$data['wkt_selesai']=$jadwal['jam_selesai'];
								$data['hari']=$jadwal['hari'];
								$data['ruangan']=$row['nama_ruangan'];
								$q3=$this->Gen_model->get_ruangan_tersedia($data);
								if($q3){
									echo '<tr>
										<td>'.$c.'</td>
										<td>'.$row['nama_ruangan'].'</td>
										<td>'.$kapasitas_ruangan.'</td>
									</tr>';
								}
								$c++;
							}
						}
				echo '</tbody>
				</table>
			</div>';
		echo '</div>';
	}
}
?>
<div class="row">
	<div class="col-md-12">
		<!-- <a target="_blank" href="<?php echo site_url();?>jadwal/edit_jelektro/<?php echo $jadwal['id_jadwal'];?>" class="btn btn-primary">Edit Ruangan Jadwal</a> -->
		<a href="<?php echo site_url();?>jadwal/jadwal_elektro" class="btn btn-default">Kembali</a>
	</div>
</div>