<?php
class Jadwal_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_list_tahunajaran($jenis=null){
		if($jenis="elektro"){
			$query=$this->db->query("SELECT DISTINCT(tahun_ajaran) FROM ar_jadwal_elektro");
		}else if($jenis="sipil"){
			$query=$this->db->query("SELECT DISTINCT(tahun_ajaran) FROM ar_jadwal_sipil");
		}else{
			return FALSE;
		}

		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_list_kodesmt($jenis=null){
		if($jenis="elektro"){
			$query=$this->db->query("SELECT DISTINCT(kodesmt) FROM ar_jadwal_elektro");
		}else if($jenis="sipil"){
			$query=$this->db->query("SELECT DISTINCT(kodesmt) FROM ar_jadwal_sipil");
		}else{
			return FALSE;
		}

		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_listjadwal($filter,$jurusan){
		$prodi=$filter['prodi'];
		$thn_ajaran=$filter['tahun_ajaran'];
		$kodesmt=$filter['kodesmt'];
		

		if($jurusan!=null){
			if($jurusan=='sipil'){
				if($thn_ajaran!='all'){
					$this->db->where('ar_jadwal_sipil.tahun_ajaran',$thn_ajaran);
				}
				$this->db->where('ar_jadwal_sipil.id_prodi',$prodi);
				if($kodesmt!='all'){
					$this->db->where('ar_jadwal_sipil.kodesmt',$kodesmt);
				}
				$this->db->select('ar_jadwal_sipil.*,ar_matakuliah.nama_mk');
				$this->db->from('ar_jadwal_sipil');
				$this->db->join('ar_matakuliah', 'ar_jadwal_sipil.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal_sipil.kodesmt = ar_matakuliah.kode_smt', 'left');
			}else if($jurusan=='elektro'){
				if($thn_ajaran!='all'){
					$this->db->where('ar_jadwal_elektro.tahun_ajaran',$thn_ajaran);
				}
				$this->db->where('ar_jadwal_elektro.id_prodi',$prodi);
				if($kodesmt!='all'){
					$this->db->where('ar_jadwal_elektro.kodesmt',$kodesmt);
				}
				$this->db->select('ar_jadwal_elektro.*,ar_matakuliah.nama_mk');
				$this->db->from('ar_jadwal_elektro');
				$this->db->join('ar_matakuliah', 'ar_jadwal_elektro.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal_elektro.kodesmt = ar_matakuliah.kode_smt', 'left');
			}
		}
		
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_jadwal($id,$jurusan){
		if($jurusan=='elektro'){
			$this->db->select('ar_jadwal_elektro.*,ar_matakuliah.nama_mk');
			$this->db->from('ar_jadwal_elektro');
			$this->db->join('ar_matakuliah', 'ar_jadwal_elektro.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal_elektro.kodesmt = ar_matakuliah.kode_smt', 'left');
			$this->db->where('id_jadwal',$id);
		}else if($jurusan='sipil'){
			$this->db->select('ar_jadwal_sipil.*,ar_matakuliah.nama_mk');
			$this->db->from('ar_jadwal_sipil');
			$this->db->join('ar_matakuliah', 'ar_jadwal_sipil.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal_sipil.kodesmt = ar_matakuliah.kode_smt', 'left');
			$this->db->where('id_jadwal',$id);
		}
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function simpan_jadwal($data,$jurusan){
		if($jurusan=='elektro'){
			$query=$this->db->insert('ar_jadwal_elektro',$data);
		}else if($jurusan=='sipil'){
			$query=$this->db->insert('ar_jadwal_sipil',$data);
		}
		return $query;
	}

	function update_jadwal($id,$data,$jurusan){
		$this->db->where('id_jadwal',$id);
		if($jurusan=='elektro'){
			$query=$this->db->update('ar_jadwal_elektro',$data);
		}else if($jurusan=='sipil'){
			$query=$this->db->update('ar_jadwal_sipil',$data);
		}
		return $query;
	}

	function hapus($id,$jurusan){
		$this->db->where('id_jadwal',$id);
		if($jurusan=='elektro'){
			$query=$this->db->delete('ar_jadwal_elektro');
		}else if($jurusan=='sipil'){
			$query=$this->db->delete('ar_jadwal_sipil');
		}

		return $query;
	}
}