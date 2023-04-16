<?php

class Main_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function logged_in()
    {
        if($this->session->userdata("logged_inbo") == FALSE)
        {
            redirect('backoffice/login', 'refresh');
        }
    }

    function logged_in_front()
    {
        if($this->session->userdata("logged_in") == FALSE)
        {
            redirect('home', 'refresh');
        }
    }

    public function Cek_akun($email)
    {
        $this->db->select('*');
        $this->db->where("email = '$email'");
        return $this->db->get('user_aio')->row_array();
    }

    public function Cek_allready($table, $data)
    {
        $this->db->get_where($table, $data);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }



    function Auto_id($column,$part,$table)
    {
        $query = $this->db->query("select MAX(RIGHT($column,3)) as sta from $table");
        $id = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $cd)
            {
                $tmp = ((int)$cd->sta)+1;
                $id = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $id = "001";
        }
        return $part.$id;
    }
    

    public function Get_something($table, $data)
    {
        return $this->db->get_where($table, $data)->result();
    }



    public function Pagination_statistik_by_date($table, $per_page, $offset)
    {
        $this->db->group_by('date');
        $this->db->order_by('id DESC');
        return $this->db->get($table, $per_page, $offset)->result_array();
    }

    public function Pagination($table, $per_page, $offset, $order_by)
    {
        $this->db->select('*');
        $this->db->order_by($order_by);
        return $this->db->get($table, $per_page, $offset)->result();
    }

    public function Pagination_where($table, $per_page, $offset, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->where($where);
        $this->db->order_by($order_by);
        return $this->db->get($table, $per_page, $offset)->result();
    }
    

    
    public function Update_data($table, $data, $column, $key)
    {
        $this->db->set($data);
        $this->db->where($column, $key);
        return $this->db->update($table);
    }

    
    public function Delete_data($table, $data)
    {
        return $this->db->delete($table, $data);
    }

    

    function kabupaten($provId)
    {
        $kabupaten="<option value='0'>Pilih kabupaten</pilih>";
        $this->db->order_by('nama','ASC');
        $kab= $this->db->get_where('tb_kabupaten',array('id_prov'=>$provId));
        foreach ($kab->result_array() as $data )
        {
            $kabupaten.= "<option value='$data[id]'>$data[nama]</option>";
        }
        return $kabupaten;
    }

    function kecamatan($kabId)
    {
        $kecamatan="<option value='0'>Pilih kecamatan</pilih>";
        $this->db->order_by('nama','ASC');
        $kec= $this->db->get_where('tb_kecamatan',array('id_kabupaten'=>$kabId));
        foreach ($kec->result_array() as $data )
        {
            $kecamatan.= "<option value='$data[id]'>$data[nama]</option>";
        }
        return $kecamatan;
    }
}