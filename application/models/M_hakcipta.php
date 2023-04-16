<?php
class M_hakcipta extends CI_Model{
	
	function get_all_hakcipta(){
		$hsl=$this->db->get('hakcipta');
		return $hsl;
	}

	function get_hakcipta_status(){
		$hsl=$this->db->query("SELECT a.*, d.status_id as idstatus, d.status_nama as namastatus, c.*
		    FROM hakcipta a, status d, jmlharihc c 
		    WHERE a.hc_statusid = d.status_id AND a.hc_id = c.hc_id ORDER BY (`hc_statusid` = '2') DESC, `hc_statusid`");
		return $hsl;
	}

	function get_excel_hakcipta(){
		return $this->db->get('hakcipta')->result();
	}

	function get_excel_hakcipta_detail(){
		return $this->db->query("SELECT a.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota, a.hc_statusid, f.status_nama as status
		    FROM hakcipta a, tb_provinsi d, tb_kabupaten e, status f
		    WHERE a.hc_idprovinsi = d.id AND a.hc_idkabkota = e.id AND a.hc_statusid = f.status_id")->result();
	}

	function get_excel_hakcipta_detail_new(){
		return $this->db->query("SELECT hakcipta.*, tb_provinsi.nama as namaprov, tb_kabupaten.nama as namakabkota, status.status_nama as status, pengguna.pengguna_level, pengguna.pengguna_ikm as instansi
		    FROM hakcipta LEFT JOIN tb_provinsi ON hakcipta.hc_idprovinsi = tb_provinsi.id LEFT JOIN tb_kabupaten ON hakcipta.hc_idkabkota = tb_kabupaten.id  LEFT JOIN status ON hakcipta.hc_statusid = status.status_id LEFT JOIN pengguna ON hakcipta.pengguna_id = pengguna.pengguna_id")->result();
	}

	function get_all_jta(){
		$hsl=$this->db->query("SELECT * FROM jenis_cipta ORDER BY namacipta ASC");
		return $hsl;
	}

	function simpan_hakcipta($pengguna_id,$hc_nama,$hc_email,$hc_nohp,$hcta,$hcbln,$hc_statusid,$hc_status,$hc_photo){
		$hsl=$this->db->query("INSERT INTO hakcipta (pengguna_id,hc_nama,hc_email,hc_nohp,hc_ta,hc_bln,hc_statusid,hc_status,hc_photo) VALUES ('$pengguna_id','$hc_nama','$hc_email','$hc_nohp','$hcta','$hcbln','$hc_statusid','$hc_status','$hc_photo')");
		return $hsl;
	}

	function get_hakcipta_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM hakcipta WHERE hc_id='$kode'");
		return $hsl;
	}
	
	function get_hakcipta(){
		$hsl=$this->db->query("SELECT * FROM hakcipta");
		return $hsl;
	}

	function get_hakciptasession_by_kode($kode){
		$hsl=$this->db->query("SELECT us.pengguna_id, us.pengguna_nama, us.pengguna_email, us.pengguna_nohp, uf.*, uf.hc_id, uf.hc_statusid as idstatus, d.status_nama as namastatus  
    		FROM hakcipta uf 
    		LEFT JOIN status d on uf.hc_statusid = d.status_id
    		LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
    		WHERE uf.pengguna_id='$kode'");
			return $hsl;
	}

	function get_hcsession2_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT us.*,uf.*, st.*  
    		FROM hakcipta us 
    		LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
    		LEFT JOIN status st ON us.hc_statusid = st.status_id 
    		WHERE us.hc_id='$kode' AND us.pengguna_id='$id'");
			return $hsl;
	}

	
	// function get_detailhc_by_kode($kode){
	// 	$hsl=$this->db->query("SELECT us.*, uf.*
	// 	    FROM hakcipta us 
	// 	    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
	// 	    WHERE us.hc_id='$kode'");
	//         return $hsl;
	// }

	function get_detailhc_by_kode($kode){
		$hsl=$this->db->query("SELECT us.*, uf.*, st.*  
		    FROM hakcipta us 
		    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
		    LEFT JOIN status st ON us.hc_statusid = st.status_id 
		    WHERE us.hc_id='$kode'");
	        return $hsl;
	}
	
	function get_hcsessionpdfx_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM hakcipta a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.hc_type = c.id_jta AND a.hc_idprovinsi = d.id AND a.hc_idkabkota = e.id AND a.hc_id='$kode'");
	        return $hsl;
	}

	function get_detailhcpdfx_by_kode($kode){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM hakcipta a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.hc_type = c.id_jta AND a.hc_idprovinsi = d.id AND a.hc_idkabkota = e.id AND a.hc_id='$kode'");
	        return $hsl;
	}

	function update_hc($kode,$hc_nama,$hc_email,$hc_nohp,$hc_statusid,$hc_ket,$hc_status,$hc_photo){
		$hsl=$this->db->query("UPDATE hakcipta SET hc_nama='$hc_nama',hc_email='$hc_email',hc_nohp='$hc_nohp',hc_statusid='$hc_statusid',hc_ket='$hc_ket',hc_status='$hc_status',hc_photo='$hc_photo' WHERE hc_id='$kode'");
		return $hsl;
	}

	function update_hc_no_img($kode,$hc_nama,$hc_email,$hc_nohp,$status_id,$hc_ket,$hc_status){
		$hsl=$this->db->query("UPDATE hakcipta SET hc_nama='$hc_nama',hc_email='$hc_email',hc_nohp='$hc_nohp',hc_statusid='$status_id',hc_ket='$hc_ket',hc_status='$hc_status' WHERE hc_id='$kode'");
		return $hsl;
	}

	function hapus_hakcipta($kode){
		$hsl=$this->db->query("DELETE FROM hakcipta WHERE hc_id='$kode'");
		return $hsl;
	}
	
	function search_blog($title){
        $this->db->like('kelas', $title , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('lasbar')->result();
    }

    function cek_emailhc($emailhc){
        $query=$this->db->query("SELECT * FROM hakcipta WHERE hc_email='$emailhc'");
        return $query;
    }

}