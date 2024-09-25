<?php

class MLaporan extends CI_Model {
   public function laporan_atasan() {
    return $this->db->get_where("tb_pengguna", array('jabatan_pengguna' => 'Atasan'));
  }
     public function laporan_pptk() {
    return $this->db->get_where("tb_pengguna", array('jabatan_pengguna' => 'PPTK'));
  }
     public function laporan_bendahara() {
    return $this->db->get_where("tb_pengguna", array('jabatan_pengguna' => 'Bendahara'));
  }
     public function laporan_operator() {
    return $this->db->get_where("tb_pengguna", array('jabatan_pengguna' => 'Operator'));
  }
}

?>