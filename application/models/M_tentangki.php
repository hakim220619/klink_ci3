<?php
class M_tentangki extends CI_Model{
	
	function get_all_tentangki(){
		$hsl=$this->db->get('tentangki');
		return $hsl;
	}

	function simpan_tentangki($nama,$deskripsi,$gambar){
		$hsl=$this->db->query("INSERT INTO tentangki (nama,gambar,detail) VALUES ('$nama','$gambar','$deskripsi')");
		return $hsl;
	}

	function get_tentangki_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM tentangki WHERE kd_tentangki='$kode'");
		return $hsl;
	}

	function update_tentangki($kode,$nama,$deskripsi,$gambar){
		$hsl=$this->db->query("UPDATE tentangki SET nama='$nama',gambar='$gambar',detail='$deskripsi' WHERE kd_tentangki='$kode'");
		return $hsl;
	}

	function update_tentangki_no_img($kode,$nama,$deskripsi){
		$hsl=$this->db->query("UPDATE tentangki SET nama='$nama',detail='$deskripsi' WHERE kd_tentangki='$kode'");
		return $hsl;
	}

	function hapus_tentangki($kode){
		$hsl=$this->db->query("DELETE FROM tentangki WHERE kd_tentangki='$kode'");
		return $hsl;
	}
	
}