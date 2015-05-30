<?php
class Jadwal_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_list_tahunajaran($jenis=null){
		if($jenis="elektro"){
			$idjur='2';
		}else if($jenis="sipil"){
			$idjur='1';
		}else{
			$idjur='0';
		}
		$query=$this->db->query("SELECT DISTINCT(tahun_ajaran) FROM ar_jadwal WHERE id_jurusan='$idjur'");

		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}

	function get_list_kodesmt($jenis=null){
		if($jenis="elektro"){
			$idjur='2';
		}else if($jenis="sipil"){
			$idjur='1';
		}else{
			$idjur='0';
		}

		$query=$this->db->query("SELECT DISTINCT(kodesmt) FROM ar_jadwal WHERE id_jurusan='$idjur'");

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
				$idjurusan='1';
			}else if($jurusan=='elektro'){
				$idjurusan='2';
			}
			$this->db->where('ar_jadwal.id_jurusan',$idjurusan);
			if($thn_ajaran!='all'){
				$this->db->where('ar_jadwal.tahun_ajaran',$thn_ajaran);
			}
			$this->db->where('ar_jadwal.id_prodi',$prodi);
			if($kodesmt!='all'){
				$this->db->where('ar_jadwal.kodesmt',$kodesmt);
			}
			$this->db->select('ar_jadwal.*,ar_matakuliah.nama_mk');
			$this->db->from('ar_jadwal');
			$this->db->join('ar_matakuliah', 'ar_jadwal.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal.kodesmt = ar_matakuliah.kode_smt', 'left');
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
			$idjurusan='2';
		}else if($jurusan='sipil'){
			$idjurusan='1';
		}
		$this->db->select('ar_jadwal.*,ar_matakuliah.nama_mk');
		$this->db->from('ar_jadwal');
		$this->db->join('ar_matakuliah', 'ar_jadwal.kode_mk = ar_matakuliah.kode_mk AND ar_jadwal.kodesmt = ar_matakuliah.kode_smt', 'left');
		$this->db->where('id_jadwal',$id);
		$this->db->where('id_jurusan',$idjurusan);

		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return FALSE;
		}
	}

	function simpan_jadwal($data,$jurusan){
		if($jurusan=='elektro'){
			$idjurusan='2';
		}else if($jurusan=='sipil'){
			$idjurusan='1';
		}
		$data['id_jurusan']=$idjurusan;
		$query=$this->db->insert('ar_jadwal',$data);
		return $query;
	}

	function update_jadwal($id,$data,$jurusan){
		$this->db->where('id_jadwal',$id);
		if($jurusan=='elektro'){
			$idjurusan='2';
		}else if($jurusan=='sipil'){
			$idjurusan='1';
		}
		$query=$this->db->update('ar_jadwal',$data);
		return $query;
	}

	function hapus($id,$jurusan){
		$this->db->where('id_jadwal',$id);
		if($jurusan=='elektro'){
			$idjurusan='2';
		}else if($jurusan=='sipil'){
			$idjurusan='1';
		}
		$this->db->where('id_jurusan',$idjurusan);
		$query=$this->db->delete('ar_jadwal');

		return $query;
	}
}