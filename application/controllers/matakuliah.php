<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah extends CI_Controller{
	public $modulcss;
	public $moduljs;
	function __construct(){
		parent::__construct();

		$this->load->model('Matakuliah_model');
		$this->load->model('Prodi_model');

		$this->load->library('PHPExcel');
		//$this->load->library('PHPExcel/PHPExcel_IOFactory');

		$this->modulcss='
			<link href="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	        <link href="'.base_url().'assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">';
        $this->moduljs='
	        <script src="'.base_url().'assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
            <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
            <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
		    <script src="'.base_url().'assets/js/matakuliah.js"></script>';
	}

	public function index(){
		if($this->auth->is_login()){
			redirect('matakuliah/opsi');
		}else{
			redirect('dashboard/login');
		}
	}

	public function opsi(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required', '%s Harus Dipilih');

			$this->form_validation->set_rules('prodi', 'Program Studi', 'required|xss_clean');
			if($this->form_validation->run()==TRUE){
				$prodi=$this->input->post('prodi');
				$thn_ajaran=$this->input->post('thn_ajaran');
				$smt=$this->input->post('smt');
				$data['filtermk']=array("prodi"=>$prodi,"tahun_ajaran"=>$thn_ajaran,"semester"=>$smt);
				$this->session->set_userdata($data);
				echo json_encode(array("success"=>true,"msg"=>""));
			}else{
				//reset filter pilihan
				$this->session->unset_userdata('filtermk');
				$data['title_web']="Daftar Mata Kuliah - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['prodi']=$this->Prodi_model->get_list_prodi();
				$data['thnajaran']=$this->Matakuliah_model->get_list_tahunajaran();

				$data['menu']="menu_kiri";
				$data['konten']="pages/matakuliah/formpilih";

				$this->load->view('template',$data);
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function daftar_mk(){
		if($this->auth->is_login()){
			if($this->session->userdata('filtermk')){
				$data['title_web']="Daftar Mata Kuliah - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

			    $filter=$this->session->userdata('filtermk');
				$idprodi=$filter['prodi'];
				$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
				$data['thnajaran']="";
				$data['semester']="";
				if($filter['tahun_ajaran']!="all"){
					$data['thnajaran']="- Tahun Ajaran ".$filter['tahun_ajaran'];
				}

				if($filter['semester']=="GAS"){
					$data['semester']="- Semester Gasal";
				}else if($filter['semester']=="GEN"){
					$data['semester']="- Semester Genap";
				}

				$data['menu']="menu_kiri";
				$data['konten']="pages/matakuliah/daftar_matakuliah";

				$this->load->view('template',$data);
			}else{
				redirect('matakuliah/opsi');
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function list_mk(){
		$filter=$this->session->userdata('filtermk');
		$getdata=$this->Matakuliah_model->get_listmk($filter);
		$datamk=array();
		if($getdata){
			foreach($getdata as $mk){
				$aksi='<div class="btn-group">
				  <a class=" btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="'.site_url().'matakuliah/edit/'.$mk['id_mk'].'"> Edit
				      </a>
				    </li> 
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_mk(\''.$mk['id_mk'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';

				$listmk=array(
			        $mk['kode_mk'],
			        $mk['nama_mk'],
			        $mk['sks'],
			        $mk['smt_mk'],
			        $mk['kode_smt'],
			        $mk['tahun_ajaran'],
			        $aksi
			    );
			    array_push($datamk, $listmk);
			}
			echo json_encode(array("data"=>$datamk));
		}else{
			echo json_encode(array("data"=>$datamk));
		}
	}

	public function upload_mk(){
		if($this->auth->is_login()){
			//reset filter pilihan
			$this->session->unset_userdata('filtermk');
			$data['title_web']="Upload Mata Kuliah - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['prodi']=$this->Prodi_model->get_list_prodi();

			$data['menu']="menu_kiri";
			$data['konten']="pages/matakuliah/upload";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_upload(){
		if($this->auth->is_login()){
		}else{
			//redirect('dashboard/login');
		}
	}

	public function tambah(){
		if($this->auth->is_login()){
			if($this->session->userdata('filtermk')){
				$data['title_web']="Tambah Data Mata Kuliah - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['menu']="menu_kiri";
				$data['konten']="pages/matakuliah/tambah";

				$this->load->view('template',$data);
			}else{
				redirect('matakuliah/opsi');
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_tambah(){
		if($this->auth->is_login()){
			if($this->session->userdata('filtermk')){
				$filter=$this->session->userdata('filtermk');
				$this->form_validation->set_message('required','%s tidak boleh kosong');
				$this->form_validation->set_rules('kodemk','Kode Mata Kuliah','required');
				$this->form_validation->set_rules('namamk','Nama Mata Kuliah','required');
				$this->form_validation->set_rules('sksmk','SKS Mata Kuliah','required');
				$this->form_validation->set_rules('smtmk','Semester Mata Kuliah','required');
				$this->form_validation->set_rules('thn_ajaran','Tahun Ajaran','required');

				$kodemk=$this->input->post('kodemk');
				$namamk=$this->input->post('namamk');
				$sksmk=$this->input->post('sksmk');
				$smtmk=$this->input->post('smtmk');
				$thn_ajaran=$this->input->post('thn_ajaran');
				$kodesmt=$this->input->post('kodesmt');

				$data=array(
					"id_prodi"=>$filter['prodi'],
					"kode_mk"=>$kodemk,
					"nama_mk"=>$namamk,
					"kode_smt"=>$kodesmt,
					"tahun_ajaran"=>$thn_ajaran,
					"sks"=>$sksmk,
					"smt_mk"=>$smtmk
				);
				if($this->form_validation->run()==TRUE){
					if($this->Matakuliah_model->tambah_mk($data)){
						echo json_encode(array("success"=>true,"msg"=>"Data Mata Kuliah Baru Berhasil Ditambahkan"));
					}
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Invalid Request"));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>false,"msg"=>"Invalid Request, Need Login"));
		}
	}

	public function edit($id){
		if($this->auth->is_login()){
			if($this->session->userdata('filtermk')){
				if(ctype_digit($id)){
					$data['mk']=$this->Matakuliah_model->get_mk($id);
					$data['title_web']="Edit Data Mata Kuliah - Manajemen Alokasi Ruangan";
					$data['costum_css']=$this->modulcss;
					$data['costum_js']=$this->moduljs;

					$data['menu']="menu_kiri";
					$data['konten']="pages/matakuliah/edit";

					$this->load->view('template',$data);
				}else{

				}
			}else{
				redirect('matakuliah/opsi');
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function update(){
		if($this->auth->is_login()){
			if($this->session->userdata('filtermk')){
				$filter=$this->session->userdata('filtermk');
				$this->form_validation->set_message('required','%s tidak boleh kosong');
				$this->form_validation->set_rules('kodemk','Kode Mata Kuliah','required');
				$this->form_validation->set_rules('namamk','Nama Mata Kuliah','required');
				$this->form_validation->set_rules('sksmk','SKS Mata Kuliah','required');
				$this->form_validation->set_rules('smtmk','Semester Mata Kuliah','required');
				$this->form_validation->set_rules('thn_ajaran','Tahun Ajaran','required');

				$id=base64_decode($this->input->post('idmk'));
				$kodemk=$this->input->post('kodemk');
				$namamk=$this->input->post('namamk');
				$sksmk=$this->input->post('sksmk');
				$smtmk=$this->input->post('smtmk');
				$thn_ajaran=$this->input->post('thn_ajaran');
				$kodesmt=$this->input->post('kodesmt');

				$data=array(
					"kode_mk"=>$kodemk,
					"nama_mk"=>$namamk,
					"kode_smt"=>$kodesmt,
					"tahun_ajaran"=>$thn_ajaran,
					"sks"=>$sksmk,
					"smt_mk"=>$smtmk
				);
				if($this->form_validation->run()==TRUE){
					if($this->Matakuliah_model->update($id,$data)){
						echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Disimpan"));
					}
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Invalid Request"));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>false,"msg"=>"Invalid Request, Need Login"));
		}
	}

	public function hapus(){
		if($this->auth->is_login()){
			$idmk=$this->input->post('idmk');
			if(ctype_digit($idmk)){
				if($this->Matakuliah_model->hapus_mk($idmk)){
					echo json_encode(array("success"=>true,"msg"=>"Data Mata Kuliah Berhasil Dihapus."));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Invalid Request. ID not Found."));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>false,"msg"=>"Invalid Request. Need Login"));
		}
	}

	public function format_download(){ 		
 		$objPHPExcel = PHPExcel_IOFactory::load("excel/ar_matakuliah.xlsx");
 		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		echo '<pre>';
		print_r($sheetData);
		for($x=1;$x<=count($sheetData);$x++){
			//echo $sheetData[$x]; 
			foreach($sheetData[$x] as $r){
				echo $r;
			}
			echo '<br/>';
		}		 
	}
}