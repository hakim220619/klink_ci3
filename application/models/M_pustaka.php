<?php
class M_pustaka extends CI_Model{
	
	function get_all_pustaka(){
		$hsl=$this->db->get('pustaka');
		return $hsl;
	}

	function get_all_status(){
		$hsl=$this->db->query("SELECT * FROM kategoripus");
		return $hsl;
	}

	function get_pustaka_status(){
		$hsl=$this->db->query("SELECT a.*, d.kategoripus_id as idstatus, d.kategoripus_nama as namastatus
		    FROM pustaka a, kategoripus d 
		    WHERE a.pu_kategori = d.kategoripus_id");
		return $hsl;
	}

	function get_excel_pustaka(){
		return $this->db->get('pustaka')->result();
	}

	function get_excel_pustaka_detail(){
		return $this->db->query("SELECT a.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota, a.pt_statusid, f.status_nama as status
		    FROM pustaka a, tb_provinsi d, tb_kabupustaka e, status f
		    WHERE a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_statusid = f.status_id")->result();
	}

	function get_excel_pustaka_detail_new(){
		return $this->db->query("SELECT pustaka.*, tb_provinsi.nama as namaprov, tb_kabupustaka.nama as namakabkota, status.status_nama as status, pengguna.pengguna_level, pengguna.pengguna_ikm as instansi
		    FROM pustaka LEFT JOIN tb_provinsi ON pustaka.pt_idprovinsi = tb_provinsi.id LEFT JOIN tb_kabupustaka ON pustaka.pt_idkabkota = tb_kabupustaka.id  LEFT JOIN status ON pustaka.pt_statusid = status.status_id LEFT JOIN pengguna ON pustaka.pengguna_id = pengguna.pengguna_id")->result();
	}

	function simpan_pustaka($pengguna_id,$pu_namafile,$pu_kategori,$pu_keterangan,$pu_link,$pu_register){
		$hsl=$this->db->query("INSERT INTO pustaka (pengguna_id,pu_namafile,pu_kategori,pu_keterangan,pu_link,pu_register) VALUES ('$pengguna_id','$pu_namafile','$pu_kategori','$pu_keterangan','$pu_link','$pu_register')");
		return $hsl;
	}

	function edit_pustaka($kode,$pu_namafile,$pu_kategori,$pu_keterangan,$pu_link){
		$hsl=$this->db->query("UPDATE pustaka SET pu_namafile='$pu_namafile',pu_kategori='$pu_kategori',pu_keterangan='$pu_keterangan', pu_link='$pu_link' WHERE pu_id='$kode'");
		return $hsl;
	}
	
	function update_pu_no_img($kode,$pu_namafile,$pu_kategori,$pu_keterangan){
		$hsl=$this->db->query("UPDATE pustaka SET pu_namafile='$pu_namafile',pu_kategori='$pu_kategori',pu_keterangan='$pu_keterangan' WHERE pu_id='$kode'");
		return $hsl;
	}

	function get_pustaka_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM pustaka WHERE pt_id='$kode'");
		return $hsl;
	}
	
	function get_pustaka(){
		$hsl=$this->db->query("SELECT * FROM pustaka");
		return $hsl;
	}

	function get_pustakasession_by_kode($kode){
		$hsl=$this->db->query("SELECT us.pengguna_id, us.pengguna_nama, us.pengguna_email, us.pengguna_nohp, uf.*, uf.pt_id, uf.pt_statusid as idstatus, d.status_nama as namastatus  
    		FROM pustaka uf 
    		LEFT JOIN status d on uf.pt_statusid = d.status_id
    		LEFT JOIN pengguna us ON uf.pengguna_id = us.pengguna_id 
    		WHERE uf.pengguna_id='$kode'");
			return $hsl;
	}

	function get_pustaka2_by_kode($kode){
		$hsl=$this->db->query("SELECT uf.*, d.*
    		FROM pustaka uf 
    		LEFT JOIN kategoripus d on uf.pu_kategori = d.kategoripus_id
    		WHERE uf.pu_id='$kode'");
			return $hsl;
	}

	function get_ptsession2_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT us.*,uf.*  
    		FROM pustaka us 
    		LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
    		WHERE us.pt_id='$kode' AND us.pengguna_id='$id'");
			return $hsl;
	}

	
	function get_detailpu_by_kode($kode){
		$hsl=$this->db->query("SELECT us.*, uf.*
		    FROM pustaka us 
		    LEFT JOIN pengguna uf ON us.pengguna_id = uf.pengguna_id 
		    WHERE us.pt_id='$kode'");
	        return $hsl;
	}

	
	function get_disessionpdfx_by_kode($kode,$id){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM pustaka a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupustaka e
		    WHERE a.pengguna_id = b.pengguna_id AND a.pt_type = c.id_jta AND a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_id='$kode'");
	        return $hsl;
	}

	function get_detaildipdfx_by_kode($kode){
		$hsl=$this->db->query("SELECT a.*, b.*, c.*, d.id, d.nama as namaprov, e.id, e.nama as namakabkota
		    FROM pustaka a, pengguna b, jenis_cipta c, tb_provinsi d, tb_kabupustaka e
		    WHERE a.pengguna_id = b.pengguna_id AND a.pt_type = c.id_jta AND a.pt_idprovinsi = d.id AND a.pt_idkabkota = e.id AND a.pt_id='$kode'");
	        return $hsl;
	}

	function update_pt($kode,$pt_nama,$pt_perusahaan,$pt_email,$pt_nohp,$status_id,$status_nama,$pt_alamat,$id_prov_perusahaan,$id_kab_perusahaan,$pt_kodepos,$pt_photo){
		$hsl=$this->db->query("UPDATE pustaka SET pt_nama='$pt_nama',pt_perusahaan='$pt_perusahaan',pt_email='$pt_email',pt_nohp='$pt_nohp',pt_statusid='$status_id',pt_alamat='$pt_alamat',pt_idprovinsi='$id_prov_perusahaan',pt_idkabkota='$id_kab_perusahaan',pt_kodepos='$pt_kodepos',pt_photo='$pt_photo' WHERE pt_id='$kode'");
		return $hsl;
	}

	
	function hapus_pustaka($kode){
		$hsl=$this->db->query("DELETE FROM pustaka WHERE pu_id='$kode'");
		return $hsl;
	}
	
	function search_blog($title){
        $this->db->like('kelas', $title , 'both');
        $this->db->order_by('kelas', 'ASC');
        $this->db->limit(10);
        return $this->db->get('lasbar')->result();
    }

    function cek_emaildi($emaildi){
        $query=$this->db->query("SELECT * FROM pustaka WHERE pt_email='$emaildi'");
        return $query;
    }

}