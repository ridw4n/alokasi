<?php
class Gen_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	/**
	mengambil data mk jurusan elektro yg belum dapat ruangan
	*/
	function get_mk($data,$returnjlh=null){
		$prodi=$data['prodi'];
		$idjurusan='2'; // jurusan elektro

		$this->db->where('id_prodi',$prodi);
		$this->db->where('id_jurusan',$idjurusan);
		$this->db->where('ruangan','');
		$this->db->order_by('jlh_mhs','DESC');

		$query=$this->db->get('ar_jadwal');
		if($query->num_rows()>0){
			if($returnjlh!=""){
				return $query->num_rows();
			}else{
				return $query->result_array();
			}
		}else{
			return FALSE;
		}
	}

	/**
	get ruangan yang sesuai kapasitas ruangan dari jadwal yg tidak ada ruangan
	parameter : kapasitas
	*/
	function get_ruangan($kapasitas,$prodi,$mklab=null){
		$this->db->where('kapasitas >=',($kapasitas));
		$this->db->where_in('id_prodi',array('0',$prodi));
		if($mklab!=null){
			$this->db->order_by('id_prodi','DESC');
		}
		$this->db->order_by('kapasitas','DESC');
		$this->db->order_by('nama_ruangan','ASC');
		$query=$this->db->get('ar_ruangan');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	 /**
	 get ruangan yg tersedia dari ruangan yg sesuai kapasitas
	 parameter
	 1. wkt_mulai
	 2. wkt_selesai
	 3. hari 
	 4. ruangan
	 */

	function get_ruangan_tersedia($params){
		$wktmulai=$params['wkt_mulai'];
		$wktselesai=$params['wkt_selesai'];
		$hari=strtoupper($params['hari']);
		$ruangan=$params['ruangan'];
		$sql="SELECT * FROM `ar_jadwal` WHERE ((jam_mulai >= '".$wktmulai."' AND jam_mulai <='".$wktselesai."') OR (jam_selesai >= '".$wktmulai."' AND jam_selesai <= '".$wktselesai."')) AND ruangan = '".$ruangan."' AND hari = '".$hari."'";
		$query=$this->db->query($sql);
		if($query->num_rows()=='0'){
			return $ruangan;
			//echo $sql;
		}else{
			return FALSE;
		}
	}
}
