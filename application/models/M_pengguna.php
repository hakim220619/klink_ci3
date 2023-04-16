<?php
class M_pengguna extends CI_Model{

	function get_all_pengguna(){
		$hsl=$this->db->query("SELECT pengguna.*,IF(pengguna_jenkel='L','Laki-Laki','Perempuan') AS jenkel FROM pengguna");
		return $hsl;	
	}

	function get_excel_pengguna(){
		return $this->db->query("SELECT a.*, b.role_id, b.role_nama as pengguna_level
		    FROM pengguna a, role b
		    WHERE a.pengguna_level = b.role_id")->result();
	}

	function get_excel_pengguna_ikm(){
		return $this->db->query("SELECT a.pengguna_nama, a.pengguna_ikm, a.pengguna_email, a.pengguna_nohp, a.pengguna_register, b.role_id, CASE b.role_nama  WHEN 'User' THEN 'IKM' END AS jenis_user
		    FROM pengguna a, role b
		    WHERE a.pengguna_level = b.role_id AND b.role_nama = 'User'")->result();
	}

	function get_excel_pengguna_dinas(){
		return $this->db->query("SELECT a.pengguna_nama, a.pengguna_ikm, a.pengguna_email, a.pengguna_nohp, a.pengguna_register, b.role_id, CASE b.role_nama  WHEN 'Pembina' THEN 'Dinas/Asosiasi' END AS jenis_user
		    FROM pengguna a, role b
		    WHERE a.pengguna_level = b.role_id AND b.role_nama = 'Pembina'")->result();
	}

	function get_all_role(){
		$hsl=$this->db->query("SELECT * FROM role ORDER BY role_nama ASC");
		return $hsl;
	}

	function simpan_pengguna($nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level){
		$hsl=$this->db->query("INSERT INTO pengguna (pengguna_nama,pengguna_jenkel,pengguna_username,pengguna_password,pengguna_email,pengguna_nohp,pengguna_level,pengguna_photo) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level','$gambar')");
		return $hsl;
	}

	function simpan_pengguna_file($pegguna_surtug,$pengguna_jenis,$pengguna_nama,$pengguna_email,$pengguna_ikm,$pengguna_nohp,$pengguna_photo,$pengguna_level,$is_active,$date_create,$pengguna_password){
		$hsl=$this->db->query("INSERT INTO pengguna (pegguna_surtug,pengguna_jenis,pengguna_nama,pengguna_email,pengguna_ikm,pengguna_nohp,pengguna_photo,pengguna_level,is_active,date_create,pengguna_password) VALUES ('$pegguna_surtug','$pengguna_jenis','$pengguna_nama','$pengguna_email','$pengguna_ikm','$pengguna_nohp','$pengguna_photo','$pengguna_level','$is_active','$date_create','$pengguna_password')");
		return $hsl;
	}

	function simpan_pengguna_no_file($pengguna_jenis,$pengguna_nama,$pengguna_email,$pengguna_ikm,$pengguna_nohp,$pengguna_photo,$pengguna_level,$is_active,$date_create,$pengguna_password){
		$hsl=$this->db->query("INSERT INTO pengguna (pengguna_jenis,pengguna_nama,pengguna_email,pengguna_ikm,pengguna_nohp,pengguna_photo,pengguna_level,is_active,date_create,pengguna_password) VALUES ('$pengguna_jenis','$pengguna_nama','$pengguna_email','$pengguna_ikm','$pengguna_nohp','$pengguna_photo','$pengguna_level','$is_active','$date_create','$pengguna_password')");
		return $hsl;
	}

	function simpan_pengguna_tanpa_gambar($nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("INSERT INTO pengguna (pengguna_nama,pengguna_jenkel,pengguna_username,pengguna_password,pengguna_email,pengguna_nohp,pengguna_level) VALUES ('$nama','$jenkel','$username',md5('$password'),'$email','$nohp','$level')");
		return $hsl;
	}

	//UPDATE PENGGUNA //
	function update_pengguna_tanpa_pass($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level){
		$hsl=$this->db->query("UPDATE pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_photo='$gambar',pengguna_level='$level' where pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna($kode,$nama,$jenkel,$username,$password,$email,$nohp,$gambar,$level){
		$hsl=$this->db->query("UPDATE pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password=md5('$password'),pengguna_email='$email',pengguna_nohp='$nohp',pengguna_photo='$gambar',pengguna_level='$level' where pengguna_id='$kode'");
		return $hsl;
	}

	function update_pengguna_tanpa_pass_dan_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' where pengguna_id='$kode'");
		return $hsl;
	}
	function update_pengguna_tanpa_gambar($kode,$nama,$jenkel,$username,$password,$email,$nohp,$level){
		$hsl=$this->db->query("UPDATE pengguna set pengguna_nama='$nama',pengguna_jenkel='$jenkel',pengguna_username='$username',pengguna_password=md5('$password'),pengguna_email='$email',pengguna_nohp='$nohp',pengguna_level='$level' where pengguna_id='$kode'");
		return $hsl;
	}
	//END UPDATE PENGGUNA//

	function hapus_pengguna($kode){
		$hsl=$this->db->query("DELETE FROM pengguna where pengguna_id='$kode'");
		return $hsl;
	}
	function getusername($id){
		$hsl=$this->db->query("SELECT * FROM pengguna where pengguna_id='$id'");
		return $hsl;
	}
	function reset_password($id,$pass){
		$hsl=$this->db->query("UPDATE pengguna set pengguna_password=md5('$pass') where pengguna_id='$id'");
		return $hsl;
	}

	function get_pengguna_login($kode){
		$hsl=$this->db->query("SELECT * FROM pengguna where pengguna_id='$kode'");
		return $hsl;
	}
	
	function get_pengguna_koun($kode){
		$hsl=$this->db->query("SELECT COUNT(a.pengguna_id) as koun
            FROM desainind a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id  where a.pengguna_id='$kode'");
		return $hsl;
	}

	function get_pengguna_koun_merek($kode){
		$hsl=$this->db->query("SELECT COUNT(a.pengguna_id) as koun
            FROM merek a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id  where a.pengguna_id='$kode'");
		return $hsl;
	}
	
	function get_pengguna_koun_hc($kode){
		$hsl=$this->db->query("SELECT COUNT(a.pengguna_id) as koun
            FROM hakcipta a INNER JOIN pengguna b ON a.pengguna_id = b.pengguna_id  where a.pengguna_id='$kode'");
		return $hsl;
	}
	
	function get_pengguna_all(){
		$hsl=$this->db->query("SELECT * FROM pengguna");
		return $hsl;
	}

	function get_penggunanew_bykode($kode){
		$hsl=$this->db->query("SELECT up.*,ur.*  
    		FROM pengguna up 
    		LEFT JOIN role ur ON up.pengguna_level = ur.role_id 
    		WHERE up.pengguna_level='$kode'");
			return $hsl;
	}

	public function delete_pengguna($kode){
    $this->db->where('pengguna_id',$kode);
    $query = $this->db->delete('pengguna');
    if($query){
        return true;
    }else{
        return false;
    }
}
}