<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruangan extends CI_Controller {
	public $modulcss;
	public $moduljs;
	function __construct(){
		parent::__construct();

		$this->load->model('Ruangan_model');

		$this->modulcss='
			<link href="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
            <link href="'.base_url().'assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
			';
		$this->moduljs='
		<script src="'.base_url().'assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
        <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
        <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
	    <script src="'.base_url().'assets/js/ruangan.js"></script>
		';
	}

	public function index(){
		if($this->auth->is_login()){
			$data['title_web']="Daftar Ruangan - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/ruangan/daftarruangan";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function list_ruangan(){
		$result=$this->Ruangan_model->get_daftar_ruangan();
		$dataruangan=array();
		if($result){
			foreach ($result as $data){

				$aksi='<div class="btn-group">
				  <a class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="'.site_url().'ruangan/edit/'.$data['id_ruangan'].'"> Edit
				      </a>
				    </li> 
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_ruangan(\''.$data['id_ruangan'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';
				if($this->auth->is_admin()){
					$operator=array(
				        $data['nama_ruangan'],
				        $data['kapasitas'],
				        $aksi
				    );
				}else{
					$operator=array(
				        $data['nama_ruangan'],
				        $data['kapasitas']
				    );
				}
				
			    array_push($dataruangan, $operator);
			}
			echo json_encode(array("data"=>$dataruangan));
		}else{
			echo json_encode(array("data"=>$dataruangan));
		}
	}

	public function tambah(){
		if($this->auth->is_login()){
			$data['title_web']="Tambah Data Ruangan - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/ruangan/tambah";
			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_tambah(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required','%s tidak boleh kosong');
			$this->form_validation->set_rules('nama_ruangan','Nama Ruangan','required|xss_clean');
			$this->form_validation->set_rules('kapasitas','Kapasitas Ruangan','required');

			$nama_ruangan=$this->input->post('nama_ruangan');
			$kapasitas=$this->input->post('kapasitas');
			$data=array(
				"nama_ruangan"=>$nama_ruangan,
				"kapasitas"=>$kapasitas
			);

			if($this->form_validation->run()==TRUE){
				if($this->Ruangan_model->tambah_ruangan($data)){
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Ruangan Ditambahkan"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login."));
		}
	}

	public function edit($id){
		if($this->auth->is_login()){
			if(ctype_digit($id)){
				$data['ruangan']=$this->Ruangan_model->get_ruangan($id);
				$data['title_web']="Edit Data Ruangan - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['menu']="menu_kiri";
				$data['konten']="pages/ruangan/edit";
				$this->load->view('template',$data);
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function update(){
		if($this->auth->is_login()){
			$id=base64_decode($this->input->post('idr'));
			if(ctype_digit($id)){
				$this->form_validation->set_message('required','%s tidak boleh kosong');
				$this->form_validation->set_rules('nama_ruangan','Nama Ruangan','required|xss_clean');
				$this->form_validation->set_rules('kapasitas','Kapasitas Ruangan','required');

				$nama_ruangan=$this->input->post('nama_ruangan');
				$kapasitas=$this->input->post('kapasitas');
				$data=array(
					"nama_ruangan"=>$nama_ruangan,
					"kapasitas"=>$kapasitas
				);

				if($this->form_validation->run()==TRUE){
					if($this->Ruangan_model->update_ruangan($id,$data)){
						echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Diupdate"));
					}
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Request Rejected, Invalid ID."));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login."));
		}
	}

	public function hapus(){
		if($this->auth->is_login()){
			$id=$this->input->post('idruangan');
			if(ctype_digit($id)){
				if($this->Ruangan_model->hapus_ruangan($id)){
					echo json_encode(array("success"=>true,"msg"=>"Ruangan Berhasil Dihapus"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Request Rejected, Invalid ID."));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login."));
		}
	}
}