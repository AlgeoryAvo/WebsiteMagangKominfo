<?php

class MSubKegiatanCRUD extends CI_Model {
    public function tampilData() {
        return $this->db->get('tb_subkegiatan');
    }
 public function tampilData_user() {
        return $this->db->get('tb_pengguna');
    }
    public function fungsiTambah($data) {
        $this->db->insert('tb_subkegiatan', $data);
    }

    public function halamanUpdate($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function fungsiUpdate($id_subkegiatan, $data) {
        $this->db->where('id_subkegiatan', $id_subkegiatan);
		$this->db->update('tb_subkegiatan', $data);
    }

    function fungsiDelete($id_subkegiatan) {
		$this->db->where('id_subkegiatan', $id_subkegiatan);
		$this->db->delete('tb_subkegiatan');
	}
    
    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }
    public function count($table)
    {
        return $this->db->count_all($table);
    }
}

?>