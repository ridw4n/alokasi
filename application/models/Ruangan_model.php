<?php

class Ruangan_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_daftar_ruangan(){
		$this->db->select('ar_ruangan.*,ar_prodi.nama_prodi');
		$this->db->from('ar_ruangan');
		$this->db->join('ar_prodi','ar_prodi.id_prodi=ar_ruangan.id_prodi','left');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_ruangan($id){
		if(ctype_digit($id)){
			$this->db->where('id_ruangan',$id);
			$query=$this->db->get('ar_ruangan');
			if($query->num_rows()>0){
				return $query->row_array();
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function get_ruangan_byname($name){
		
	}

	function tambah_ruangan($data){
		$query=$this->db->insert('ar_ruangan',$data);
		return $query;
	}

	function update_ruangan($id,$data){
		$this->db->where('id_ruangan',$id);
		$query=$this->db->update('ar_ruangan',$data);
		return $query;
	}

	function hapus_ruangan($id){
		$this->db->where('id_ruangan',$id);
		$query=$this->db->delete('ar_ruangan');
		return $query;
	}
}