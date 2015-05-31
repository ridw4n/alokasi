<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_gen extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('Gen_model');
		$this->load->model('Jadwal_model');
		$this->load->model('Prodi_model');
	}

	function index(){
		$data['title_web']="Generator Ruangan - Manajemen Alokasi Ruangan";
		$data['costum_css']='';
		$data['costum_js']='
		<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
        <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
        <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
	    <script src="'.base_url().'assets/js/generator.js"></script>
		';

		$data['prodi']=$this->Prodi_model->get_list_prodi('elektro');
		$data['menu']="menu_kiri";
		$data['konten']="generator";

		$this->load->view('template',$data);
	}

	function prodi(){
		if($_POST){
			$data['prodi']=$this->input->post('prodi');
			$q1=$this->Gen_model->get_mk($data);	
			foreach ($q1 as $row1) {
				$kapasitas=$row1['jlh_mhs'];
				$jammulai=$row1['jam_mulai'];
				$jamselesai=$row1['jam_selesai'];
				$tanggal=$row1['tanggal'];
				$idjadwal=$row1['id_jadwal'];
				$selectedruangan="";
				$q2=$this->Gen_model->get_ruangan($kapasitas);
				foreach ($q2 as $row2) {
					if($selectedruangan==""){
						$data['wkt_mulai']=$jammulai;
						$data['wkt_selesai']=$jamselesai;
						$data['tgl']=$tanggal;
						$data['ruangan']=$row2['nama_ruangan'];
						$q3=$this->Gen_model->get_ruangan_tersedia($data);
						if($q3){
							//query update ruangan mk
							$data2=array(
								"ruangan"=>$q3);
							$this->Jadwal_model->update_jadwal($idjadwal,$data2,'elektro');
							$selectedruangan=$q3;
							/*echo $q3;
							echo '<br/>';*/
						}
					}
				}
				/*echo $row1['kode_mk'].' | '.$row1['jlh_mhs'].' | '.$row1['jam_mulai'].' | '.$row1['jam_selesai'];
				echo '<hr/>';*/
			}
			echo json_encode(array("success"=>true));
		}
	}

	function check_jlh_jadwal(){
		$idprodi=$this->input->post('idprodi');
		$data['prodi']=$idprodi;
		$jlh=$this->Gen_model->get_mk($data,"returnjlh");
		if($jlh==0){
			echo json_encode(array(
				"success"=>true,
				"jlh"=>0,
				"msg"=>"Semua Data Jadwal Prodi Ini Sudah Mendapatkan Ruangan"));
		}else{
			echo json_encode(array(
				"success"=>true,
				"jlh"=>$jlh,
				"msg"=>"Terdapat ".$jlh." Jadwal Yang Belum Mendapatkan Ruangan."));
		}
	}
}