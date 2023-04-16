<?php

class Dynamic_chart_model extends CI_Model
{
 function fetch_tahun()
 {
  $this->db->select('tahun');
  $this->db->from('grafik_temp');
  $this->db->group_by('tahun');
  $this->db->order_by('tahun', 'DESC');
  return $this->db->get();
 }

 function fetch_chart_data($tahun)
 {
  $this->db->where('tahun', $tahun);
  $this->db->order_by('tahun', 'ASC');
  return $this->db->get('grafik_temp');
 }
}

?>
