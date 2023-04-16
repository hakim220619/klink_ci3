<?php
class M_paten extends CI_Model{
	
	function get_all_paten(){
		$hsl=$this->db->get('paten');
		return $hsl;
	}

	function get_paten_status(){
		$hsl=$this->db->query("SELECT a.*, d.status_id as idstatus, d.status_nama as namastatus
		    FROM paten a, status d 
		    WHERE a.pt_statusid = d.status_id");
		return $hsl;
	}

	function get_excel_paten(){
		return $this->db->get('paten')->result();
	}

	function get_excel_paten_detail(){
		return $this->db->query("SELECT a.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota, a.pt_statusid, f.status_nama as status
		    FROM paten a, tb_provinsi d, tb_kabupaten e, status f
		    WHERE a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_statusid = f.status_id")->result();
	}

	function get_excel_paten_detail_new(){
		return $this->db->query("SELECT paten.*, tb_provinsi.nama as namaprov, tb_kabupaten.nama as namakabkota, status.status_nama as status, pengguna.pengguna_level, pengguna.pengguna_ikm as instansi
		    FROM paten LEFT JOIN tb_provinsi ON paten.pt_idprovinsi = tb_provinsi.id LEFT JOIN tb_kabupaten ON paten.pt_idkabkota = tb_kabupaten.id  LEFT JOIN status ON paten.pt_statusid = status.status_id LEFT JOIN pengguna ON paten.pengguna_id = pengguna.pengguna_id")->result();
	}

	function simpan_paten($pengguna_id,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$ptta,$ptbln,$pt_statusid,$status_nama,$pt_alamat,$id_prov_perusahaan,$id_kab_perusahaan,$pt_kodepos,$pt_photo){
		$hsl=$this->db->query("INSERT INTO paten (pengguna_id,pt_nama,pt_perusahaan,pt_email,pt_nohp,pt_ta,pt_bln,pt_statusid,pt_status,pt_alamat,pt_idprovinsi,pt_idkabkota,pt_kodepos,pt_photo) VALUES ('$pengguna_id','$pt_nama','$pt_perusahaan','$pt_email','$pt_nohp','$ptta','$ptbln','$pt_statusid','$status_nama','$pt_alamat','$id_prov_perusahaan','$id_kab_perusahaan','$pt_kodepos','$pt_photo')");
		return $hsl;
	}

	function get_paten_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM paten WHERE pt_id='$kode'");
		return $hsl;
	}
	
	function get_paten(){
		$hsl=$this->db->query("SELECT * FROM paten");
		return $hsl;
	}

	function get_patensession_by_kode($kode){
		$hsl=$this->db->query("SELECT us.pengguna_id, us.pengguna_nama, us.pengguna_email, us.pengguna_nohp, uf.*, uf.pt_id, uf.pt_statusid as idstatus, d.status_nama as namastatus  
    		FROM paten uf 
    		LEFT JOIN status d on uf.pt_statusid = d.status_id
    		LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
    		WHERE uf.pengguna_id='$kode'");
			return $hsl;
	}

	function get_ptsession2_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT us.*,uf.*  
    		FROM paten us 
    		LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
    		WHERE us.pt_id='$kode' AND us.pengguna_id='$id'");
			return $hsl;
	}

	
	function get_detailpt_by_kode($kode){
		$hsl=$this->db->query("SELECT us.*, uf.*
		    FROM paten us 
		    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
		    WHERE us.pt_id='$kode'");
	        return $hsl;
	}

	
	function get_disessionpdfx_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM paten a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.pt_type = c.id_jta AND a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_id='$kode'");
	        return $hsl;
	}

	function get_detaildipdfx_by_kode($kode){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM paten a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupaten e
		    WHERE a.pengguna_id = b.pengguna_id AND a.pt_type = c.id_jta AND a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_id='$kode'");
	        return $hsl;
	}

	function update_pt($kode,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$status_id,$status_nama,$pt_alamat,$id_prov_perusahaan,$id_kab_perusahaan,$pt_kodepos,$pt_photo){
		$hsl=$this->db->query("UPDATE paten SET pt_nama='$pt_nama',pt_perusahaan='$pt_perusahaan',pt_email='$pt_email',pt_nohp='$pt_nohp',pt_statusid='$status_id',pt_alamat='$pt_alamat',pt_idprovinsi='$id_prov_perusahaan',pt_idkabkota='$id_kab_perusahaan',pt_kodepos='$pt_kodepos',pt_photo='$pt_photo' WHERE pt_id='$kode'");
		return $hsl;
	}

	function update_pt_no_img($kode,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$status_id,$pt_status,$pt_alamat,$id_prov_perusahaan,$id_kab_perusahaan,$pt_kodepos){
		$hsl=$this->db->query("UPDATE paten SET pt_nama='$pt_nama',pt_perusahaan='$pt_perusahaan',pt_email='$pt_email',pt_nohp='$pt_nohp',pt_statusid='$status_id',pt_alamat='$pt_alamat',pt_idprovinsi='$id_prov_perusahaan',pt_idkabkota='$id_kab_perusahaan',pt_kodepos='$pt_kodepos' WHERE pt_id='$kode'");
		return $hsl;
	}

	function hapus_paten($kode){
		$hsl=$this->db->query("DELETE FROM paten WHERE pt_id='$kode'");
		return $hsl;
	}
	
	function search_blog($title){
        $this->db->like('kelas', $title , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('lasbar')->result();
    }

    function cek_emaildi($emaildi){
        $query=$this->db->query("SELECT * FROM paten WHERE pt_email='$emaildi'");
        return $query;
    }

}