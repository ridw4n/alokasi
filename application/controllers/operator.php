<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends CI_Controller {
	public $modulcss;
	public $moduljs;
	function __construct(){
		parent::__construct();

		$this->load->model('Operator_model');

		$this->modulcss='
			<link href="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
	        <link href="'.base_url().'assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">';
        $this->moduljs='
	        <script src="'.base_url().'assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
            <script src="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
            <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
            <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
		    <script src="'.base_url().'assets/js/operator.js"></script>';
	}

	public function index(){
		redirect('operator/profil');
	}

	public function check_login(){
		if($_POST){
			$this->form_validation->set_message('required', '%s tidak boleh kosong');

			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

			$username=$this->input->post('username');
			$pwd=$this->input->post('password');

			if($this->form_validation->run()==TRUE){
				$params=array("username"=>$username,"pwd"=>md5($pwd));
				$login=$this->Operator_model->cek_login($params);
				if(!empty($login)){
					if($login['aktif']=="N"){
						echo json_encode(array("success"=>false,"msg"=>"Akun Anda Tidak Aktif"));
						exit();
					}

					$sess_login=array(
					'userid'=>$login['id_op'],
					'username'=>$login['username'],
					'nama'=>$login['nama'],
					'lvl'=>$login['hakakses'],
					'logged_in'=>TRUE
					);

					$this->session->set_userdata($sess_login);

					echo json_encode(array("success"=>true,"msg"=>"Login Berhasil"));
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Login Gagal. Error: QueryDB"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Login Gagal. Error: ".validation_errors()));
			}
		}
	}

	public function logout(){
		$sess_login=array(
				'userid'=>"",
				'username'=>"",
				'nama'=>"",
				'lvl'=>"",
				'logged_in'=>FALSE
				);
		$this->session->unset_userdata($sess_login);

		echo json_encode(array("success"=>true,"msg"=>"Logout Berhasil"));
	}

	public function listop(){
		if($this->auth->is_login()){
			$data['title_web']="Daftar Operator - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/operator/daftaroperator";

			$this->load->view('template',$data);
		}else{
			redirect("dashboard/login");
		}
	}

	public function list_operator(){
		//if($_POST){
			$op=$this->Operator_model->get_list_operator();
			$dataoperator=array();
			if($op){	
				$onlineuser=$this->session->userdata('username');
				foreach ($op as $data){
					if($data['aktif']=='N'){
				        $tombol=" btn btn-warning ";
				        $statusop="Tidak Aktif";
					}else{
						$tombol=" btn btn-primary ";
						$statusop="Aktif";
					}

					if($data['hakakses']=='1'){
						$hak="Admin";
					}else{
						$hak="User";
					}
					$aksi='<div class="btn-group">
					  <a class="'.$tombol.' dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
					    <i class="fa fa-gear"></i> <span class="caret"></span>
					  </a>
					  <ul role="menu" class="dropdown-menu pull-right">   
					    <li role="presentation">
					      <a role="menuitem" tabindex="-1" href="'.site_url().'operator/edit/'.$data['id_op'].'"> Edit
					      </a>
					    </li> 
					    <li role="presentation">
					      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_operator(\''.$data['id_op'].'\')">
					        Hapus
					      </a>
					    </li>         
					  </ul>
					</div>';

					$operator=array(
				        $data['username'],
				        $data['nama'],
				        $data['nip'],
				        $data['nohp'],
				        $hak,
				        $aksi
				    );
				    if($data['username']!=$onlineuser){
				    	array_push($dataoperator, $operator);
				    }
				}
				echo json_encode(array("data"=>$dataoperator));
			}else{
				echo json_encode(array("data"=>$dataoperator));
			}
		//}
	}

	public function tambah(){
		if($this->auth->is_login()){
			$data['title_web']="Tambah Operator Baru - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/operator/tambah";

			$this->load->view('template',$data);
		}else{
			redirect("dashboard/login");
		}
	}

	public function act_tambah(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required','%s tidak boleh kosong');
			$this->form_validation->set_rules('username','Username','required|xss_clean');
			$this->form_validation->set_rules('pwd','Password','required');
			$this->form_validation->set_rules('nama','Nama Lengkap','required|xss_clean');
			$this->form_validation->set_rules('username','Username','required|xss_clean');

			$username=$this->input->post('username');
			$pwd=$this->input->post('pwd');
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');
			$email=$this->input->post('email');
			$nohp=$this->input->post('nohp');
			$hakakses=$this->input->post('hakakses');
			$data=array(
				"username"=>$username,
				"pwd"=>md5($pwd),
				"nip"=>$nip,
				"nama"=>$nama,
				"email"=>$email,
				"nohp"=>$nohp,
				"hakakses"=>$hakakses,
				"aktif"=>"Y"
			);

			if($this->form_validation->run()==TRUE){
				if($this->Operator_model->tambah_operator($data)){
					echo json_encode(array("success"=>true,"msg"=>"Akun Baru Berhasil Ditambahkan"));
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
				$data['profil']=$this->Operator_model->get_profil($id);
				$data['title_web']="Edit Operator Baru - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['menu']="menu_kiri";
				$data['konten']="pages/operator/edit";

				$this->load->view('template',$data);
			}
		}else{
			redirect("dashboard/login");
		}
	}

	public function update(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required','%s tidak boleh kosong');

			$this->form_validation->set_rules('nama','Nama Lengkap','required|xss_clean');
			$this->form_validation->set_rules('username','Username','required|xss_clean');

			$idop=base64_decode($this->input->post('opid'));
			$username=$this->input->post('username');
			$pwd=$this->input->post('pwd');
			$nip=$this->input->post('nip');
			$nama=$this->input->post('nama');
			$email=$this->input->post('email');
			$nohp=$this->input->post('nohp');
			$hakakses=$this->input->post('hakakses');
			$statusakun=$this->input->post('statusakun');
			if($pwd!=""){
				$data=array(
					"username"=>$username,
					"pwd"=>md5($pwd),
					"nip"=>$nip,
					"nama"=>$nama,
					"email"=>$email,
					"nohp"=>$nohp,
					"hakakses"=>$hakakses,
					"aktif"=>$statusakun
					);
			}else{
				$data=array(
					"username"=>$username,
					"nip"=>$nip,
					"nama"=>$nama,
					"email"=>$email,
					"nohp"=>$nohp,
					"hakakses"=>$hakakses,
					"aktif"=>$statusakun
					);
			}
			if($this->form_validation->run()==TRUE){
				if($this->Operator_model->update_operator($idop,$data)){
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil DiUpdate"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".validation_errors()));
			}
		}else{
			redirect("dashboard/login");
		}
	}

	public function hapus(){
		if($this->auth->is_login()){
			$id=$this->input->post('idop');
			if(ctype_digit($id)){
				if($this->Operator_model->hapus_operator($id)){
					echo json_encode(array("success"=>true,"msg"=>"Akun Berhasil Dihapus"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Unknown ID."));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login."));
		}
	}

	public function check_username(){
		if($this->auth->is_login()){
			$username=$this->input->post('username');
			$check=$this->Operator_model->cek_username($username);
			if($check){
				echo 'true';
			}else{
				echo 'false';
			}
		}else{
			//redirect("dashboard/login");
			//echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login."));
		}
	}

	public function profil(){
		if($this->auth->is_login()){
			$userid=$this->session->userdata('userid');
			$data['profil']=$this->Operator_model->get_profil($userid);
			$data['title_web']="Profil Operator - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['menu']="menu_kiri";
			$data['konten']="pages/operator/profilop";

			$this->load->view('template',$data);
		}else{
			redirect("dashboard/login");
		}
	}
}
