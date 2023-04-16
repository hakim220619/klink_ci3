<?php
class M_desainind extends CI_Model{
	
	function get_all_desainind(){
		$hsl=$this->db->get('desainind');
		return $hsl;
	}

	function get_desainind_status(){
		$hsl=$this->db->query("SELECT a.*, d.status_id as idstatus, d.status_nama as namastatus
		    FROM desainind a, status d 
		    WHERE a.di_statusid = d.status_id ORDER BY (`di_statusid` = '2') DESC, `di_statusid`");
		return $hsl;
	}

	function get_excel_desainind(){
		return $this->db->get('desainind')->result();
	}

	function get_excel_desainind_detail(){
		return $this->db->query("SELECT a.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota, a.di_statusid, f.status_nama as status
		    FROM desainind a, tb_provinsi d, tb_kabupaten e, status f
		    WHERE a.di_idprovinsi = d.id AND a.di_idkabkota = e.id AND a.di_statusid = f.status_id")->result();
	}

	function get_excel_desainind_detail_new(){
		return $this->db->query("SELECT desainind.*, tb_provinsi.nama as namaprov, tb_kabupaten.nama as namakabkota, status.status_nama as status, pengguna.pengguna_level, pengguna.pengguna_ikm as instansi
		    FROM desainind LEFT JOIN tb_provinsi ON desainind.di_idprovinsi = tb_provinsi.id LEFT JOIN tb_kabupaten ON desainind.di_idkabkota = tb_kabupaten.id  LEFT JOIN status ON desainind.di_statusid = status.status_id LEFT JOIN pengguna ON desainind.pengguna_id = pengguna.pengguna_id")->result();
	}
	
	function simpan_desainind($pengguna_id,$di_nama,$di_email,$di_nohp,$dita,$dibln,$di_statusid,$di_status,$di_photo){
		$hsl=$this->db->query("INSERT INTO desainind (pengguna_id,di_nama,di_email,di_nohp,di_ta,di_bln,di_statusid,di_status,di_photo) VALUES ('$pengguna_id','$di_nama','$di_email','$di_nohp','$dita','$dibln','$di_statusid','$di_status','$di_photo')");
		return $hsl;
	}

	function get_desainind_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM desainind WHERE di_id='$kode'");
		return $hsl;
	}
	
	function get_desainind(){
		$hsl=$this->db->query("SELECT * FROM desainind");
		return $hsl;
	}

	function get_desainindsession_by_kode($kode){
		$hsl=$this->db->query("SELECT us.pengguna_id, us.pengguna_nama, us.pengguna_email, us.pengguna_nohp, uf.*, uf.di_id, uf.di_statusid as idstatus, d.status_nama as namastatus  
    		FROM desainind uf 
    		LEFT JOIN status d on uf.di_statusid = d.status_id
    		LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
    		WHERE uf.pengguna_id='$kode'");
			return $hsl;
	}

	function get_disession2_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT us.*,uf.*, st.*    
    		FROM desainind us 
    		LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
    		LEFT JOIN status st ON us.di_statusid = st.status_id 
    		WHERE us.di_id='$kode' AND us.pengguna_id='$id'");
			return $hsl;
	}

	
	function get_detaildi_by_kode($kode){
		$hsl=$this->db->query("SELECT us.*, uf.*, st.*  
		    FROM desainind us 
		    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
		    LEFT JOIN status st ON us.di_statusid = st.status_id 
		    WHERE us.di_id='$kode'");
	        return $hsl;
	}
	

	
	function get_disessionpdfx_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM desainind a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.di_type = c.id_jta AND a.di_idprovinsi = d.id AND a.di_idkabkota = e.id AND a.di_id='$kode'");
	        return $hsl;
	}

	function get_detaildipdfx_by_kode($kode){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM desainind a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.di_type = c.id_jta AND a.di_idprovinsi = d.id AND a.di_idkabkota = e.id AND a.di_id='$kode'");
	        return $hsl;
	}

	function update_di($kode,$di_nama,$di_email,$di_nohp,$di_statusid,$di_ket,$di_status,$di_photo){
		$hsl=$this->db->query("UPDATE desainind SET di_nama='$di_nama',di_email='$di_email',di_nohp='$di_nohp',di_statusid='$di_statusid',di_ket='$di_ket',di_status='$di_status',di_photo='$di_photo' WHERE di_id='$kode'");
		return $hsl;
	}

	function update_di_no_img($kode,$di_nama,$di_email,$di_nohp,$status_id,$di_ket,$di_status){
		$hsl=$this->db->query("UPDATE desainind SET di_nama='$di_nama',di_email='$di_email',di_nohp='$di_nohp',di_statusid='$status_id',di_ket='$di_ket',di_status='$di_status' WHERE di_id='$kode'");
		return $hsl;
	}

	function hapus_desainind($kode){
		$hsl=$this->db->query("DELETE FROM desainind WHERE di_id='$kode'");
		return $hsl;
	}
	
	function search_blog($title){
        $this->db->like('kelas', $title , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('lasbar')->result();
    }

    function cek_emaildi($emaildi){
        $query=$this->db->query("SELECT * FROM desainind WHERE di_email='$emaildi'");
        return $query;
    }

}