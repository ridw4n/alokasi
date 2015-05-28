<?php
class Matakuliah_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_list_tahunajaran(){
		$query=$this->db->query("SELECT DISTINCT(tahun_ajaran) FROM ar_matakuliah");
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}


	function get_listmk($data){
		if($data!=null){
			if(isset($data['tahun_ajaran'])){
				if($data['tahun_ajaran']!='all'){
					$this->db->like('tahun_ajaran',$data['tahun_ajaran']);
				}
			}
			if(isset($data['semester'])){
				if($data['semester']!='all'){
					$this->db->like('kode_smt',$data['semester']);
				}
			}
			$this->db->where('id_prodi',$data['prodi']);
			$query=$this->db->get('ar_matakuliah');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function get_mk($id){
		$this->db->where('id_mk',$id);
		$query=$this->db->get('ar_matakuliah');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function tambah_mk($data){
		$query=$this->db->insert('ar_matakuliah',$data);
		return $query;
	}

	function update($id,$data){
		$this->db->where('id_mk',$id);
		$query=$this->db->update('ar_matakuliah',$data);
		return $query;
	}

	function hapus_mk($id){
		$this->db->where('id_mk',$id);
		$query=$this->db->delete('ar_matakuliah');
		return $query;
	}
}