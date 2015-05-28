<?php
class Operator_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function cek_login($params){
		$this->db->where($params);
		$query=$this->db->get('ar_operator');
		if($query->num_rows()==1){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function cek_username($username){
		//cek ketersediaan username
		$this->db->where('username',$username);
		$query=$this->db->get('ar_operator');
		if($query->num_rows()>0){
			return FALSE;
		}else{
			return TRUE;
		}
	}

	function get_profil($id){
		if(ctype_digit($id)){
			$this->db->where('id_op',$id);
			$query=$this->db->get('ar_operator');
			if($query->num_rows()>0){
				return $query->row_array();
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}

	function get_list_operator(){
		$query=$this->db->get('ar_operator');
		if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return FALSE;
			}
	}

	function tambah_operator($data){
		$query=$this->db->insert('ar_operator',$data);
		return $query;
	}

	function update_operator($id,$data){
		$this->db->where('id_op',$id);
		$query=$this->db->update('ar_operator',$data);
		return $query;
	}

	function hapus_operator($id){
		$this->db->where('id_op',$id);
		$query=$this->db->delete('ar_operator');
		return $query;
	}
}
?>