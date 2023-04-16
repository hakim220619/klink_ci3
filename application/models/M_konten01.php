<?php
class M_konten01 extends CI_Model{
	
	function get_all_konten01(){
		$hsl=$this->db->get('konten01');
		return $hsl;
	}

	function simpan_konten01($nama,$deskripsi,$gambar){
		$hsl=$this->db->query("INSERT INTO konten01 (nama,gambar,detail) VALUES ('$nama','$gambar','$deskripsi')");
		return $hsl;
	}

	function get_konten01_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM konten01 WHERE kd_konten01='$kode'");
		return $hsl;
	}

	function update_konten01($kode,$nama,$deskripsi,$gambar){
		$hsl=$this->db->query("UPDATE konten01 SET nama='$nama',gambar='$gambar',detail='$deskripsi' WHERE kd_konten01='$kode'");
		return $hsl;
	}

	function update_konten01_no_img($kode,$nama,$deskripsi){
		$hsl=$this->db->query("UPDATE konten01 SET nama='$nama',detail='$deskripsi' WHERE kd_konten01='$kode'");
		return $hsl;
	}

	function hapus_konten01($kode){
		$hsl=$this->db->query("DELETE FROM konten01 WHERE kd_konten01='$kode'");
		return $hsl;
	}
	
}