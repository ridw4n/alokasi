<div class="row">
	<div class="col-md-12">
		<h3 class="page-header">Daftar Ruangan</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<p>Daftar Ruangan Yang Bisa DiIsi Untuk Jadwal Mata Kuliah: </p>
		<p>Nama MK : <strong><?php echo $jadwal['nama_mk'];?></strong></p>
		<p>Jumlah Mahasiswa : <strong><?php echo $jadwal['jlh_mhs'];?></strong></p>
		<p>Dosen Pengajar : <?php echo $jadwal['dosen_pengajar'];?></p>
		<p>Prioritas Lab : <?php echo ($jadwal['prioritas']=='lab')?"Ya":"Tidak";?></p>
		<p>Mulai : <?php echo $jadwal['jam_mulai'];?></p>
		<p>Selesai : <?php echo $jadwal['jam_selesai'];?></p>
		<p>Ruangan Sekarang : <?php echo ($jadwal['ruangan']!="")?$jadwal['ruangan']:"Belum Ada Ruangan";?></p>
	</div>
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama Ruangan</th>
					<th>Kapasitas</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($ruangan){
					$c=1;
					foreach ($ruangan as $row) {
						if($row['kapasitas']<$jadwal['jlh_mhs']){
							$kapasitas=$row['kapasitas']. " + ".($jadwal['jlh_mhs']-$row['kapasitas'])." Kursi Tambahan";
						}else{
							$kapasitas=$row['kapasitas'];
						}
						echo '<tr>
							<td>'.$c.'</td>
							<td>'.$row['nama_ruangan'].'</td>
							<td>'.$kapasitas.'</td>
							<td>'.$row['terisi'].'</td>
						</tr>';
						$c++;
					}
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12">
		<a target="_blank" href="<?php echo site_url();?>jadwal/edit_jelektro/<?php echo $jadwal['id_jadwal'];?>" class="btn btn-primary">Edit Ruangan Jadwal</a>
		<a href="<?php echo site_url();?>jadwal/jadwal_elektro" class="btn btn-default">Kembali</a>
	</div>
</div>