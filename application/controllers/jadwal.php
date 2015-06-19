<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal extends CI_Controller{
	public $modulcss;
	public $moduljs;

	function __construct(){
		parent::__construct();

		$this->load->model('Jadwal_model');
		$this->load->model('Matakuliah_model');
		$this->load->model('Prodi_model');
		$this->load->model('Ruangan_model');
		$this->load->model('Default_model');

		$this->modulcss='
			<link href="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
            <link href="'.base_url().'assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
            <link href="'.base_url().'assets/bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">';
        $this->moduljs='
	        <script src="'.base_url().'assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	        <script src="'.base_url().'assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/jquery.validate.js"></script>
	        <script type="text/javascript" src="'.base_url().'assets/bower_components/jqueryvalidation/localization/messages_id.min.js"></script>
	        <script type="text/javascript" src="'.base_url().'assets/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	        <script type="text/javascript" src="'.base_url().'assets/bower_components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.id.js"></script>
	        <script src="'.base_url().'assets/dist/js/sb-admin-2.js"></script>
		    <script src="'.base_url().'assets/js/jadwal.js"></script>';
	}

	public function index(){
	}

	public function opsi_elektro(){
		if($this->auth->is_login()){
			$this->load->model('Default_model');
			$this->form_validation->set_message('required', '%s Harus Dipilih');

			$this->form_validation->set_rules('prodi', 'Program Studi', 'required|xss_clean');
			if($this->form_validation->run()==TRUE){
				$prodi=$this->input->post('prodi');
				$thn_ajaran=$this->input->post('thn_ajaran');
				$kodesmt=$this->input->post('kodesmt');
				$data['filter_jelektro']=array("prodi"=>$prodi,"tahun_ajaran"=>$thn_ajaran,"kodesmt"=>$kodesmt);
				$this->session->set_userdata($data);
				echo json_encode(array("success"=>true,"msg"=>""));
			}else{
				//reset filter pilihan
				$this->session->unset_userdata('filter_jelektro');
				$data['title_web']="Jadwal Kuliah Elektro- Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['prodi']=$this->Prodi_model->get_list_prodi('elektro');
				$data['thnajaran']=$this->Jadwal_model->get_list_tahunajaran("elektro");
				$data['kodesmt']=$this->Jadwal_model->get_list_kodesmt("elektro");
				$data['thnajaran_aktif']=$this->Default_model->get_thnajaranaktif();
				$data['kodesmt_aktif']=$this->Default_model->get_semesteraktif();

				$data['menu']="menu_kiri";
				$data['konten']="pages/jadwal/opsielektro";

				$this->load->view('template',$data);
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function opsi_sipil(){
		if($this->auth->is_login()){
			$this->load->model('Default_model');
			$this->form_validation->set_message('required', '%s Harus Dipilih');

			$this->form_validation->set_rules('prodi', 'Program Studi', 'required|xss_clean');
			if($this->form_validation->run()==TRUE){
				$prodi=$this->input->post('prodi');
				$thn_ajaran=$this->input->post('thn_ajaran');
				$kodesmt=$this->input->post('kodesmt');
				$data['filter_jsipil']=array("prodi"=>$prodi,"tahun_ajaran"=>$thn_ajaran,"kodesmt"=>$kodesmt);
				$this->session->set_userdata($data);
				echo json_encode(array("success"=>true,"msg"=>""));
			}else{
				//reset filter pilihan
				$this->session->unset_userdata('filter_jsipil');
				$data['title_web']="Jadwal Kuliah Sipil- Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$data['prodi']=$this->Prodi_model->get_list_prodi('sipil');
				$data['thnajaran']=$this->Jadwal_model->get_list_tahunajaran("sipil");
				$data['kodesmt']=$this->Jadwal_model->get_list_kodesmt("sipil");
				$data['thnajaran_aktif']=$this->Default_model->get_thnajaranaktif();
				$data['kodesmt_aktif']=$this->Default_model->get_semesteraktif();

				$data['menu']="menu_kiri";
				$data['konten']="pages/jadwal/opsisipil";

				$this->load->view('template',$data);
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function jadwal_elektro(){
		if($this->auth->is_login()){
			//print_r($this->session->userdata('filter_jelektro'));
			$data['title_web']="Jadwal Kuliah Jurusan Elektro - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

		    $filter=$this->session->userdata('filter_jelektro');
			$idprodi=$filter['prodi'];
			$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
			$data['thnajaran']="";
			$data['kodesmt']="";
			if($filter['tahun_ajaran']!="all"){
				$data['thnajaran']="- Tahun Ajaran ".$filter['tahun_ajaran'];
			}

			if($filter['kodesmt']!="all"){
				$data['kodesmt']="- Kodesmt : ".$filter['kodesmt'];
			}

			$data['menu']="menu_kiri";
			$data['konten']="pages/jadwal/jadwal_elektro";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function jadwal_sipil(){
		if($this->auth->is_login()){
			//print_r($this->session->userdata('filter_jelektro'));
			$data['title_web']="Jadwal Kuliah Jurusan Sipil - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

		    $filter=$this->session->userdata('filter_jsipil');
			$idprodi=$filter['prodi'];
			$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
			$data['thnajaran']="";
			$data['kodesmt']="";
			if($filter['tahun_ajaran']!="all"){
				$data['thnajaran']="- Tahun Ajaran ".$filter['tahun_ajaran'];
			}

			if($filter['kodesmt']!="all"){
				$data['kodesmt']="- Kodesmt : ".$filter['kodesmt'];
			}

			$data['menu']="menu_kiri";
			$data['konten']="pages/jadwal/jadwal_sipil";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function list_jadwaleketro(){
		$filter=$this->session->userdata('filter_jelektro');
		$getdata=$this->Jadwal_model->get_listjadwal($filter,'elektro');
		$datajadwal=array();
		if($getdata){
			foreach($getdata as $jdwl){
				$aksi='<div class="btn-group">
				  <a class=" btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="'.site_url().'jadwal/edit_jelektro/'.$jdwl['id_jadwal'].'"> Edit
				      </a>
				    </li> 
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_jadwal_e(\''.$jdwl['id_jadwal'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';
				if($this->auth->is_admin()){
					$listjadwal=array(
				        $jdwl['hari'],
				        tanggalIndo($jdwl['tanggal'], 'j F Y'),
				        $jdwl['jam_mulai']."-".$jdwl['jam_selesai'],
				        $jdwl['kodesmt'],
				        $jdwl['nama_mk'],
				        $jdwl['kelas'],
				        $jdwl['jlh_mhs'],
				        $jdwl['dosen_pengajar'],
				        $jdwl['ruangan'],
				        $jdwl['tahun_ajaran'],
				        $aksi
				    );
				}else{
					$listjadwal=array(
				        $jdwl['hari'],
				        tanggalIndo($jdwl['tanggal'], 'j F Y'),
				        $jdwl['jam_mulai']."-".$jdwl['jam_selesai'],
				        $jdwl['kodesmt'],
				        $jdwl['nama_mk'],
				        $jdwl['kelas'],
				        $jdwl['jlh_mhs'],
				        $jdwl['dosen_pengajar'],
				        $jdwl['ruangan'],
				        $jdwl['tahun_ajaran']
				    );
				}
				
			    array_push($datajadwal, $listjadwal);
			}
			echo json_encode(array("data"=>$datajadwal));
		}else{
			echo json_encode(array("data"=>$datajadwal));
		}
	}

	public function list_jadwalsipil(){
		$filter=$this->session->userdata('filter_jsipil');
		$getdata=$this->Jadwal_model->get_listjadwal($filter,'sipil');
		$datajadwal=array();
		if($getdata){
			foreach($getdata as $jdwl){
				/*$aksi='<div class="btn-group">
				  <a class=" btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="'.site_url().'jadwal/edit_jsipil/'.$jdwl['id_jadwal'].'"> Edit
				      </a>
				    </li> 
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_jadwal_s(\''.$jdwl['id_jadwal'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';*/
				$aksi='<div class="btn-group">
				  <a class=" btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" href="#">
				    <i class="fa fa-gear"></i> <span class="caret"></span>
				  </a>
				  <ul role="menu" class="dropdown-menu pull-right">   
				    <li role="presentation">
				      <a role="menuitem" tabindex="-1" href="#" onClick="hapus_jadwal_s(\''.$jdwl['id_jadwal'].'\')">
				        Hapus
				      </a>
				    </li>         
				  </ul>
				</div>';

			    if($this->auth->is_admin()){
					$listjadwal=array(
				        $jdwl['hari'],
				        tanggalIndo($jdwl['tanggal'], 'j F Y'),
				        $jdwl['jam_mulai']."-".$jdwl['jam_selesai'],
				        $jdwl['kodesmt'],
				        $jdwl['nama_mk'],
				        $jdwl['kelas'],
				        $jdwl['jlh_mhs'],
				        $jdwl['dosen_pengajar'],
				        $jdwl['ruangan'],
				        $jdwl['tahun_ajaran'],
				        $aksi
				    );
				}else{
					$listjadwal=array(
				        $jdwl['hari'],
				        tanggalIndo($jdwl['tanggal'], 'j F Y'),
				        $jdwl['jam_mulai']."-".$jdwl['jam_selesai'],
				        $jdwl['kodesmt'],
				        $jdwl['nama_mk'],
				        $jdwl['kelas'],
				        $jdwl['jlh_mhs'],
				        $jdwl['dosen_pengajar'],
				        $jdwl['ruangan'],
				        $jdwl['tahun_ajaran']
				    );
				}
			    array_push($datajadwal, $listjadwal);
			}
			echo json_encode(array("data"=>$datajadwal));
		}else{
			echo json_encode(array("data"=>$datajadwal));
		}
	}

	public function tambah_jelektro(){
		if($this->auth->is_login()){
			$data['title_web']="Tambah Jadwal - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

		    $filter=$this->session->userdata('filter_jelektro');
			$idprodi=$filter['prodi'];
			$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
		    $data['mk']=$this->Matakuliah_model->get_listmk(array("prodi"=>$filter['prodi']));
		    $data['ruangan']=$this->Ruangan_model->get_daftar_ruangan();
		    $data['thnajaran_aktif']=$this->Default_model->get_thnajaranaktif();
			$data['kodesmt_aktif']=$this->Default_model->get_semesteraktif();
			$data['menu']="menu_kiri";
			$data['konten']="pages/jadwal/add_jadwalelektro";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function tambah_jsipil(){
		if($this->auth->is_login()){
			$data['title_web']="Tambah Jadwal - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

		    $filter=$this->session->userdata('filter_jsipil');
			$idprodi=$filter['prodi'];
			$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
		    //$data['mk']=$this->Matakuliah_model->get_listmk(array("prodi"=>$filter['prodi']));
		    $data['ruangan']=$this->Ruangan_model->get_daftar_ruangan();
		    $data['thnajaran_aktif']=$this->Default_model->get_thnajaranaktif();
			$data['kodesmt_aktif']=$this->Default_model->get_semesteraktif();
			$data['menu']="menu_kiri";
			$data['konten']="pages/jadwal/add_jadwalsipil";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_tambah(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required','%s Tidak boleh kosong');

			$this->form_validation->set_rules('hari','Hari','required');
			$this->form_validation->set_rules('tanggal','Tanggal Jadwal','required');
			$this->form_validation->set_rules('wkt_mulai','Waktu Mulai','required');
			$this->form_validation->set_rules('wkt_selesai','Waktu Selesai','required');
			$this->form_validation->set_rules('kodemk','Kode Mata Kuliah','required');
			$this->form_validation->set_rules('kelas','Kelas','required');
			$this->form_validation->set_rules('dosen_pengajar','Dosen Pengajar','required');
			$this->form_validation->set_rules('jlh_mhs','Jumlah Mahasiswa','required');
			$this->form_validation->set_rules('kode_smt','Kode Semester','required');
			$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
			

			$jurusan=$this->input->post('jurusan');
			if($jurusan=='elektro'){
				$filter=$this->session->userdata('filter_jelektro');
			}else if($jurusan=='sipil'){
				$filter=$this->session->userdata('filter_jsipil');
			}
			$idprodi=$filter['prodi'];
			$hari=$this->input->post('hari');
			$tanggal=$this->input->post('tanggal');
			$wkt_mulai=$this->input->post('wkt_mulai');
			$wkt_selesai=$this->input->post('wkt_selesai');
			$kodemk=$this->input->post('kodemk');
			$kelas=$this->input->post('kelas');
			$dosen_pengajar=$this->input->post('dosen_pengajar');
			$jlh_mhs=$this->input->post('jlh_mhs');
			$kode_smt=$this->input->post('kode_smt');
			$tahun_ajaran=$this->input->post('tahun_ajaran');
			$ruangan=$this->input->post('ruangan');
			

			if($this->form_validation->run()==TRUE){
				$data=array(
					"id_prodi"=>$idprodi,
					"kode_mk"=>$kodemk,
					"hari"=>$hari,
					"tanggal"=>$tanggal,
					"jam_mulai"=>$wkt_mulai,
					"jam_selesai"=>$wkt_selesai,
					"kelas"=>$kelas,
					"dosen_pengajar"=>$dosen_pengajar,
					"jlh_mhs"=>$jlh_mhs,
					"ruangan"=>$ruangan,
					"kodesmt"=>$kode_smt,
					"tahun_ajaran"=>$tahun_ajaran
					);
				if($jurusan=='sipil'){
					$datamk=array(
						"id_prodi"=>$idprodi,
						"kode_mk"=>$kodemk,
						"nama_mk"=>$this->input->post('namamk'),
						"kode_smt"=>$kode_smt,
						"tahun_ajaran"=>$tahun_ajaran
					);
				}
				if($this->Jadwal_model->simpan_jadwal($data,$jurusan)){
					if($jurusan=='sipil'){$this->Matakuliah_model->tambah_mk($datamk);}
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Ditambahkan"));
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal, Error: DbError"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal, Error: ".validation_errors()));
			}
		}else{
			//redirect('dashboard/login');
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login"));
		}
	}

	public function edit_jelektro($id){
		if($this->auth->is_login()){
			if(ctype_digit($id)){
				$data['title_web']="Edit Jadwal - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$filter=$this->session->userdata('filter_jelektro');
				$idprodi=$filter['prodi'];
				$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
			    $data['mk']=$this->Matakuliah_model->get_listmk(array("prodi"=>$filter['prodi']));
			    $data['ruangan']=$this->Ruangan_model->get_daftar_ruangan();
			    $data['jadwal']=$this->Jadwal_model->get_jadwal($id,'elektro');

				$data['menu']="menu_kiri";
				$data['konten']="pages/jadwal/edit_jadwalelektro";

				$this->load->view('template',$data);
				}
		}else{
			redirect('dashboard/login');
		}
	}

	public function edit_jsipil($id){
		if($this->auth->is_login()){
			if(ctype_digit($id)){
				$data['title_web']="Edit Jadwal - Manajemen Alokasi Ruangan";
				$data['costum_css']=$this->modulcss;
				$data['costum_js']=$this->moduljs;

				$filter=$this->session->userdata('filter_jsipil');
				$idprodi=$filter['prodi'];
				$data['prodi']=$this->Prodi_model->get_prodi($idprodi);
			    $data['mk']=$this->Matakuliah_model->get_listmk(array("prodi"=>$filter['prodi']));
			    $data['ruangan']=$this->Ruangan_model->get_daftar_ruangan();
			    $data['jadwal']=$this->Jadwal_model->get_jadwal($id,'sipil');

				$data['menu']="menu_kiri";
				$data['konten']="pages/jadwal/edit_jadwalsipil";

				$this->load->view('template',$data);
				}
		}else{
			redirect('dashboard/login');
		}
	}

	public function update(){
		if($this->auth->is_login()){
			$this->form_validation->set_message('required','%s Tidak boleh kosong');

			$this->form_validation->set_rules('hari','Hari','required');
			$this->form_validation->set_rules('tanggal','Tanggal Jadwal','required');
			$this->form_validation->set_rules('wkt_mulai','Waktu Mulai','required');
			$this->form_validation->set_rules('wkt_selesai','Waktu Selesai','required');
			$this->form_validation->set_rules('kodemk','Kode Mata Kuliah','required');
			$this->form_validation->set_rules('kelas','Kelas','required');
			$this->form_validation->set_rules('dosen_pengajar','Dosen Pengajar','required');
			$this->form_validation->set_rules('jlh_mhs','Jumlah Mahasiswa','required');
			$this->form_validation->set_rules('kode_smt','Kode Semester','required');
			$this->form_validation->set_rules('tahun_ajaran','Tahun Ajaran','required');
			
			$jurusan=$this->input->post('jurusan');
			if($jurusan=='elektro'){
				$filter=$this->session->userdata('filter_jelektro');
			}else if($jurusan=='sipil'){
				$filter=$this->session->userdata('filter_jsipil');
			}
			$idjadwal=base64_decode($this->input->post('idjadwal'));
			$idprodi=$filter['prodi'];
			$hari=$this->input->post('hari');
			$tanggal=$this->input->post('tanggal');
			$wkt_mulai=$this->input->post('wkt_mulai');
			$wkt_selesai=$this->input->post('wkt_selesai');
			$kodemk=$this->input->post('kodemk');
			$kelas=$this->input->post('kelas');
			$dosen_pengajar=$this->input->post('dosen_pengajar');
			$jlh_mhs=$this->input->post('jlh_mhs');
			$kode_smt=$this->input->post('kode_smt');
			$tahun_ajaran=$this->input->post('tahun_ajaran');
			$ruangan=$this->input->post('ruangan');
			

			if($this->form_validation->run()==TRUE){
				$data=array(
					"id_prodi"=>$idprodi,
					"kode_mk"=>$kodemk,
					"hari"=>$hari,
					"tanggal"=>$tanggal,
					"jam_mulai"=>$wkt_mulai,
					"jam_selesai"=>$wkt_selesai,
					"kelas"=>$kelas,
					"dosen_pengajar"=>$dosen_pengajar,
					"jlh_mhs"=>$jlh_mhs,
					"ruangan"=>$ruangan,
					"kodesmt"=>$kode_smt,
					"tahun_ajaran"=>$tahun_ajaran
					);
				if($this->Jadwal_model->update_jadwal($idjadwal,$data,$jurusan)){
					echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Diubah"));
				}else{
					echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal, Error: DbError"));
				}
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal, Error: ".validation_errors()));
			}
		}else{
			redirect('dashboard/login');
		}
	}

	public function hapus(){
		if($this->auth->is_login()){
			$id=$this->input->post('idjadwal');
			$jurusan=$this->input->post('jur');
			if($this->Jadwal_model->hapus($id,$jurusan)){
				echo json_encode(array("success"=>true,"msg"=>"Data Berhasil Dihapus"));
			}else{
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal, Error: DbError"));
			}
		}else{
			echo json_encode(array("success"=>false,"msg"=>"Request Invalid, Need Login"));
		}
	}

	public function get_detail_mk(){
		
	}

	public function upload_jadwal(){
		if($this->auth->is_login()){
			//reset filter pilihan
			$this->session->unset_userdata('upjadfile');
			$this->session->unset_userdata('upjadprodi');
			$data['title_web']="Upload Jadwal Kuliah - Manajemen Alokasi Ruangan";
			$data['costum_css']=$this->modulcss;
			$data['costum_js']=$this->moduljs;

			$data['prodi']=$this->Prodi_model->get_list_prodi();

			$data['menu']="menu_kiri";
			$data['konten']="pages/jadwal/form_upload";

			$this->load->view('template',$data);
		}else{
			redirect('dashboard/login');
		}
	}

	public function act_upload(){
		if($this->auth->is_login()){
			$this->load->library('excel');
			$prodi=$this->input->post('prodi');
			$config['upload_path'] = './tmp/';
			$config['allowed_types'] = 'xls|xlsx';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('berkas')) {
				echo json_encode(array("success"=>false,"msg"=>"Aksi Gagal. Error: ".$this->upload->display_errors()));
				exit();
			}else{
				$datafile=$this->upload->data();
				$nmfile=$datafile['file_name'];
				$this->session->set_userdata('upjadfile', $nmfile);
				$this->session->set_userdata('upjadprodi', $prodi);
				$inputFileName="tmp/".$nmfile;
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);

				$objWorksheet = $objPHPExcel->getActiveSheet();
				$highestRow = $objWorksheet->getHighestRow(); 
				$highestColumn = $objWorksheet->getHighestColumn(); 

				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 

				//echo '<table class="table">' . "\n";
				for ($row = 10; $row <= $highestRow; ++$row) {
				  	echo '<tr>' . "\n";

				  	for ($col = 0; $col < $highestColumnIndex; ++$col) {
				    	echo '<td>' . $objWorksheet->getCellByColumnAndRow($col, $row)->getFormattedValue() . '</td>' . "\n";
				  	}

				  	echo '</tr>' . "\n";
				}
				//echo '</table>' . "\n";
			}
		}else{
			//redirect('dashboard/login');
		}
	}

	public function act_simpantabel(){
		$this->load->library('excel');
		$nmfile=$this->session->userdata('upjadfile');
		$prodi=$this->session->userdata('upjadprodi');
		$jurusan=$this->Prodi_model->idjurusan_fromprodi($prodi);

		$inputFileName="tmp/".$nmfile;
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);

		$objWorksheet = $objPHPExcel->getActiveSheet();
		$highestRow = $objWorksheet->getHighestRow(); 
		$highestColumn = $objWorksheet->getHighestColumn(); 

		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 

		//echo '<table class="table">' . "\n";
		for ($row = 10; $row <= $highestRow; ++$row) {
			$arraytbl=array(
				"kode_mk",
				"hari",
				"tanggal",
				"jam_mulai",
				"jam_selesai",
				"kelas",
				"dosen_pengajar",
				"jlh_mhs",
				"ruangan",
				"kodesmt",
				"tahun_ajaran",
				"prioritas");
			$data=array();
			$data['id_prodi']=$prodi;
		  	for ($col = 0; $col < $highestColumnIndex; ++$col) {
		    	$data[$arraytbl[$col]]=$objWorksheet->getCellByColumnAndRow($col, $row)->getFormattedValue();
		  	}
			$this->Jadwal_model->simpan_jadwal($data,$jurusan);
		}
		echo json_encode(array("success"=>true));
		if($nmfile!=""){
			if(file_exists("./tmp/".$nmfile)){
				@unlink("./tmp/".$nmfile);
			}
		}
	}

	public function resetform(){
		$this->load->helper('file');
		$nmfile=$this->session->userdata('upjadfile');
		if($nmfile!=""){
			if(file_exists("./tmp/".$nmfile)){
				@unlink("./tmp/".$nmfile);
				echo json_encode(array("success"=>TRUE));
			}
		}
	}

	public function format_download(){ 
		$this->load->helper('download');
		$data = file_get_contents("./tmp/ar_jadwal.xlsx");
		$name = 'format_upload_jadwal.xlsx';

		force_download($name, $data);
	}
}