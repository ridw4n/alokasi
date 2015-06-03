<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prodi extends CI_Controller{
	public $modulcss;
	public $moduljs;
	function __construct(){
		parent::__construct();

		$this->load->model('Prodi_model');

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
	    <script src="'.base_url().'assets/js/prodi.js"></script>
		';
	}

	public function index(){
		if($this->auth->is_login()){
			$data['title_web']="Daftar Program Studi - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/prodi/listprodi";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function list_prodi(){
		$op=$this->Prodi_model->get_list_prodi();
		$dataprodi=array();
		if($op){	
			foreach ($op as $data){
				$aksi='<div class="btn-group">
				  <a class=" btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="'.site_url().'prodi/edit/'.$data['id_prodi'].'"> Edit
				      </a>
				    </li> 
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_prodi(\''.$data['id_prodi'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';

			    if($this->auth->is_admin()){
			    	$prodi=array(
				        $data['nama_jurusan'],
				        $data['nama_prodi'],
				        $aksi
				    );
			    }else{
			    	$prodi=array(
				        $data['nama_jurusan'],
				        $data['nama_prodi']
				    );
			    }
			    array_push($dataprodi, $prodi);
			}
			echo json_encode(array("data"=>$dataprodi));
		}else{
			echo json_encode(array("data"=>$dataprodi));
		}
	}

	public function tambah(){
		if($this->auth->is_login()){
			$data['title_web']="Tambah Program Studi Baru - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['jurusan']=$this->Prodi_model->get_list_jurusan();
			$data['menu']="menu_kiri";
			$data['konten']="pages/prodi/tambah";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_tambah(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required', '%s tidak boleh kosong');

			$this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required|xss_clean');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

			$namaprodi=$this->input->post('nmprodi');
			$id_jurusan=$this->input->post('jurusan');

			if($this->form_validation->run()==TRUE){
				$data=array(
					"nama_prodi"=>$namaprodi,
					"id_jurusan"=>$id_jurusan
				);

				if($this->Prodi_model->insert_new($data)){
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Ditambahkan"));
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: QueryDB"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>true,"msg"=>"Request Invalid, Need Login"));
		}
	}

	public function edit($id){
		if($this->auth->is_login()){
			if(ctype_digit($id)){
				$data['title_web']="Tambah Program Studi Baru - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['jurusan']=$this->Prodi_model->get_list_jurusan();
				$data['prodi']=$this->Prodi_model->get_prodi($id);
				$data['menu']="menu_kiri";
				$data['konten']="pages/prodi/edit";

				$this->load->view('template',$data);
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function update(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required', '%s tidak boleh kosong');

			$this->form_validation->set_rules('nmprodi', 'Nama Prodi', 'required|xss_clean');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

			$id_prodi=base64_decode($this->input->post('idpro'));
			if(ctype_digit($id_prodi)){
				$namaprodi=$this->input->post('nmprodi');
				$id_jurusan=$this->input->post('jurusan');

				if($this->form_validation->run()==TRUE){
					$data=array(
						"nama_prodi"=>$namaprodi,
						"id_jurusan"=>$id_jurusan
					);

					if($this->Prodi_model->update($id_prodi,$data)){
						echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Diupdate"));
					}else{
						echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: QueryDB"));
					}
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
				}
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>true,"msg"=>"Request Invalid, Need Login"));
		}
	}

	public function hapus(){
		if($this->auth->is_login()){
			$id=$this->input->post('idprodi');
			if(ctype_digit($id)){
				if($this->Prodi_model->hapus($id)){
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Dihapus"));
				}
			}else{
				echo json_encode(array("success"=>true,"msg"=>"Request Invalid, Unknown Data"));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>true,"msg"=>"Request Invalid, Need Login"));
		}
	}
}