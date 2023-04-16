<?php
class M_merek extends CI_Model{
	
	function get_all_merek(){
		$hsl=$this->db->get('merek');
		return $hsl;
	}

	function get_merek_status(){
		$hsl=$this->db->query("SELECT a.*, d.status_id as idstatus, d.status_nama as namastatus, c.*
		    FROM merek a, status d, jmlhari c 
		    WHERE a.merek_statusid = d.status_id AND a.merek_id = c.merek_id ORDER BY (`merek_statusid` = '2') DESC, `merek_statusid`");
		return $hsl;
	}

	function simpan_merek($pengguna_id,$merek_nama,$merek_email,$merek_nohp,$hcta,$hcbln,$merek_statusid,$merek_status,$merek_photo){
		$hsl=$this->db->query("INSERT INTO merek (pengguna_id,merek_nama,merek_email,merek_nohp,hc_ta,hc_bln,merek_statusid,merek_status,merek_photo) VALUES ('$pengguna_id','$merek_nama','$merek_email','$merek_nohp','$hcta','$hcbln','$merek_statusid','$merek_status','$merek_photo')");
		return $hsl;
	}
	
	function get_excel_hakcipta_detail(){
		return $this->db->query("SELECT a.*, d.nama as namaprov, e.nama as namakabkota, f.status_nama as status, h.pengguna_level, h.pengguna_ikm as instansi
		    FROM merek a, tb_provinsi d, tb_kabupaten e, status f, pengguna h
		    WHERE a.merek_idprovinsi = d.id AND a.merek_idkabkota = e.id AND  a.pengguna_id = h.pengguna_id AND  a.merek_statusid = f.status_id")->result();
	}

	function get_excel_hakcipta_detail_new(){
		return $this->db->query("SELECT merek.*, tb_provinsi.nama as namaprov, tb_kabupaten.nama as namakabkota, status.status_nama as status, pengguna.pengguna_level, pengguna.pengguna_ikm as instansi
		    FROM merek LEFT JOIN tb_provinsi ON merek.merek_idprovinsi = tb_provinsi.id LEFT JOIN tb_kabupaten ON merek.merek_idkabkota = tb_kabupaten.id  LEFT JOIN status ON merek.merek_statusid = status.status_id LEFT JOIN pengguna ON merek.pengguna_id = pengguna.pengguna_id")->result();
	}

	function get_merek_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM merek WHERE merek_id='$kode'");
		return $hsl;
	}
	
	function get_merek(){
		$hsl=$this->db->query("SELECT * FROM merek");
		return $hsl;
	}

	function get_mereksession_by_kode($kode){
		$hsl=$this->db->query("SELECT us.pengguna_id, us.pengguna_nama, us.pengguna_email, us.pengguna_nohp, uf.*, uf.merek_id, uf.merek_statusid as idstatus, d.status_nama as namastatus  
    		FROM merek uf 
    		LEFT JOIN status d on uf.merek_statusid = d.status_id
    		LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
    		WHERE uf.pengguna_id='$kode'");
			return $hsl;
	}

	function get_mereksession2_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT us.*,uf.*, st.*   
    		FROM merek us 
    		LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id
		LEFT JOIN status st ON us.merek_statusid = st.status_id  
    		WHERE us.merek_id='$kode' AND us.pengguna_id='$id'");
			return $hsl;
	}


	function get_detailmerek_by_kode($kode){
		$hsl=$this->db->query("SELECT us.*, uf.*, st.*  
		    FROM merek us 
		    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
		    LEFT JOIN status st ON us.merek_statusid = st.status_id 
		    WHERE us.merek_id='$kode'");
	        return $hsl;
	}

	function update_merek($kode,$merek_nama,$merek_email,$merek_nohp,$merek_statusid,$merek_status,$merek_ket,$merek_photo){
		$hsl=$this->db->query("UPDATE merek SET merek_nama='$merek_nama',merek_email='$merek_email',merek_nohp='$merek_nohp',merek_statusid='$merek_statusid',merek_status='$merek_status',merek_ket='$merek_ket',merek_photo='$merek_photo' WHERE merek_id='$kode'");
		return $hsl;
	}

	function update_merek_no_img($kode,$merek_nama,$merek_email,$merek_nohp,$merek_statusid,$merek_status,$merek_ket){
		$hsl=$this->db->query("UPDATE merek SET merek_nama='$merek_nama',merek_email='$merek_email',merek_nohp='$merek_nohp',merek_statusid='$merek_statusid',merek_status='$merek_status',merek_ket='$merek_ket' WHERE merek_id='$kode'");
		return $hsl;
	}

	function hapus_merek($kode){
		$hsl=$this->db->query("DELETE FROM merek WHERE merek_id='$kode'");
		return $hsl;
	}
	
	function search_blog($title){
        $this->db->like('kelas', $title , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('lasbar')->result();
    }

}