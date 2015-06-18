<?php
class Default_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_semesteraktif(){
		$this->db->where('id_settings','1');
		$query=$this->db->get('web_settings');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function get_thnajaranaktif(){
		$this->db->where('id_settings','2');
		$query=$this->db->get('web_settings');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function get_kurikulumaktif(){
		$this->db->where('id_settings','3');
		$query=$this->db->get('web_settings');
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function set_semesteraktif($data){
		$this->db->where('id_settings','1');
		$result=$this->db->update('web_settings',$data);
		return $result;
	}

	function set_thnajaranaktif($data){
		$this->db->where('id_settings','2');
		$result=$this->db->update('web_settings',$data);
		return $result;
	}

	function set_kuraktif($data){
		$this->db->where('id_settings','3');
		$result=$this->db->update('web_settings',$data);
		return $result;
	}
}
?>