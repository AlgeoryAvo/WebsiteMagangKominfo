<?php
class MAtasanCRUD extends CI_Model {

  public function tampilData() {
    return $this->db->get_where("tb_pengguna", array('jabatan_pengguna' => 'Atasan'));
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