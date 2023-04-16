<?php
class M_status extends CI_Model{

	function get_all_status(){
		$hsl=$this->db->query("SELECT * FROM status ORDER BY status_nama DESC");
		return $hsl;
	}


	function simpan_status($kategori,$slug){
		$hsl=$this->db->query("insert into kategori(kategori_nama,kategori_slug) values('$kategori','$slug')");
		return $hsl;
	}
	function update_kategori($kode,$kategori,$slug){
		$hsl=$this->db->query("update kategori set kategori_nama='$kategori',kategori_slug='$slug' where kategori_id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode){
		$hsl=$this->db->query("delete from kategori where kategori_id='$kode'");
		return $hsl;
	}

	function get_status_byid($status_id){
		$hsl=$this->db->query("select * from status where status_id='$status_id'");
		return $hsl;
	}

	function get_status_kode($kode){
		$hsl=$this->db->query("SELECT us.hc_status  
    		FROM hakcipta us 
    		LEFT JOIN status uf ON us.hc_status = uf.status_nama 
    		WHERE us.pengguna_id='$kode'");
		return $hsl;
	}
	function get_status_kode_paten($kode){
		$hsl=$this->db->query("SELECT us.pt_status  
    		FROM paten us 
    		LEFT JOIN status uf ON us.pt_status = uf.status_nama 
    		WHERE us.pengguna_id='$kode'");
		return $hsl;
	}
}