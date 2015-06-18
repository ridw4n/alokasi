<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pengaturan extends CI_Controller{
	function __construct(){
		parent::__construct();

		$this->load->model('Default_model');
	}
	public function index(){
		if($this->auth->is_login()){

			$smtaktif=$this->Default_model->get_semesteraktif();
			$thnajaranaktif=$this->Default_model->get_thnajaranaktif();
			$kurikulumaktif=$this->Default_model->get_kurikulumaktif();

			$data['smtaktif']=$smtaktif['setting_value'];
			$data['thnajaranaktif']=$thnajaranaktif['setting_value'];
			$data['kuraktif']=$kurikulumaktif['setting_value'];
			$data['title_web']="Pengaturan - Manajemen Alokasi Ruangan";
			$data['costum_css']='
			
			';
			$data['costum_js']='
			<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
            <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
            <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
		    <script src="'.base_url().'assets/js/pengaturan.js"></script>
			';

			$data['menu']="menu_kiri";
			$data['konten']="pengaturan";

			$this->load->view('template',$data);

		}else{
			redirect("dashboard/login");
		}
	}

	public function update(){
		$this->form_validation->set_message('required', '%s tidak boleh kosong');

		$this->form_validation->set_rules('smtaktif', 'Semester Aktif', 'required|xss_clean');
		$this->form_validation->set_rules('thnajaranaktif', 'Tahun Ajaran Aktif', 'required|xss_clean');
		//$this->form_validation->set_rules('kuraktif', 'Kurikulum Mata Kuliah Aktif', 'required|xss_clean');

		if($this->form_validation->run()==TRUE){
			$smtaktif=$this->input->post('smtaktif');
			$thnajaran=$this->input->post('thnajaranaktif');
			//$kuraktif=$this->input->post('kuraktif');

			/*if($this->Default_model->set_semesteraktif(array("setting_value"=>$smtaktif)) AND $this->Default_model->set_thnajaranaktif(array("setting_value"=>$thnajaran)) AND $this->Default_model->set_kuraktif(array("setting_value"=>$kuraktif))){*/
			if($this->Default_model->set_semesteraktif(array("setting_value"=>$smtaktif)) AND $this->Default_model->set_thnajaranaktif(array("setting_value"=>$thnajaran))){
				echo json_encode(array("success"=>true,"msg"=>"Pengaturan Berhasil Disimpan"));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Login Gagal. Error: ".validation_errors()));
		}
	}
}