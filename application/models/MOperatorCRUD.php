<?php
class MOperatorCRUD extends CI_Model {
  
   public function tampilData() {
        $min_tgl = $this->session->userdata('tahun').'-01-01';
        $max_tgl = $this->session->userdata('tahun').'-12-30';
        
        $query =  $this->db->query(sprintf("SELECT * FROM tb_kegiatan WHERE `tanggal_input` BETWEEN '%s' AND '%s'", $min_tgl, $max_tgl));
        return $query;
    }

  public function fungsiTambah($data) {
    $this->db->insert('tb_pengguna', $data);
  }

  public function halamanUpdate($where, $table) {
    return $this->db->get_where($table, $where);
  }

  public function fungsiUpdate($id_pengguna, $data) {
    $this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tb_pengguna', $data);
  }

  function fungsiDelete($id_pengguna) {
    $this->db->where('id_pengguna', $id_pengguna);
    $this->db->delete('tb_pengguna');
	}

}

?>