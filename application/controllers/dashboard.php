<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index() {
		$this->load->model('Default_model');
		if($this->auth->is_login()){

			$smtaktif=$this->Default_model->get_semesteraktif();
			$thnajaranaktif=$this->Default_model->get_thnajaranaktif();

			$data['smtaktif']=$smtaktif['setting_value'];
			$data['thnajaranaktif']=$thnajaranaktif['setting_value'];
			$data['title_web']="Halaman Manajemen Alokasi Ruangan";
			$data['costum_css']='';
			$data['costum_js']='
		    <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
		    <script src="'.base_url().'assets/js/dashboard.js"></script>
			';

			$data['menu']="menu_kiri";
			$data['konten']="dashboard";

			$this->load->view('template',$data);

		}else{
			redirect("dashboard/login");
		}	
	}

	public function login(){
		$data['title_web']="Halaman Login";
			$data['costum_css']='
			<link rel="stylesheet" type="text/css" href="'.base_url().'assets/bower_components/sweetalert/lib/sweet-alert.css" />
			';

			$data['costum_js']='
		    <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
            <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
            <script type="text/javascript" src="'.base_url().'assets/bower_components/sweetalert/lib/sweet-alert.js"></script>
			<script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
			<script src="'.base_url().'assets/js/login.js"></script>
			';
			$this->load->view('login',$data);
	}
}
