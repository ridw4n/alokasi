<?php

class Prodi_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_list_prodi($jur=null){
		$this->db->select('*');
		$this->db->from('ar_prodi');
		$this->db->join('ar_jurusan', 'ar_jurusan.id_jurusan = ar_prodi.id_jurusan', 'left');
		if($jur!=null){
			if($jur=='sipil'){
				$this->db->where('ar_jurusan.id_jurusan','1');
			}else if($jur=='elektro'){
				$this->db->where('ar_jurusan.id_jurusan','2');
			}
		}

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_list_jurusan(){
		$query = $this->db->get('ar_jurusan');
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_prodi($idprodi){
		if($idprodi==null){
			return FALSE;
		}else{
			$this->db->where('id_prodi',$idprodi);
			$query=$this->db->get('ar_prodi');
			if($query->num_rows()>0){
				return $query->row_array();
			}else{
				return FALSE;
			}
		}
	}

	function insert_new($data){
		$query=$this->db->insert('ar_prodi',$data);
		return $query;
	}

	function update($id,$data){
		$this->db->where('id_prodi',$id);
		$query=$this->db->update('ar_prodi',$data);
		return $query;
	}

	function hapus($id){
		$this->db->where('id_prodi',$id);
		$query=$this->db->delete('ar_prodi');
		return $query;
	}

	function idjurusan_fromprodi($idprodi){
		$this->db->select('ar_prodi.id_jurusan');
		$this->db->from('ar_prodi');
		$this->db->where('id_prodi',$idprodi);
		$query=$this->db->get();
		if($query->num_rows()>0){
			$r=$query->row_array();
			return $r['id_jurusan'];
		}else{
			return 0;
		}
	}
}