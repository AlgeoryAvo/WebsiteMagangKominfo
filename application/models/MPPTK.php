<?php

class MPPTK extends CI_Model {

    // public function tampilData() {
    //     return $this->db->get('tb_kegiatan');
    // }

    public function tampilData() {
        return $this->db->get_where("tb_kegiatan", array('nama_pptk' => $this->session->userdata('nama_pengguna')));
        // return $this->db->get_where("tb_kegiatan", array('nama_pptk' == $this->session->userdata('nama_pengguna')));
    }

    public function halamanInput($where, $table) {
        return $this->db->get_where($table, $where);
    }
    
    public function fungsiInput($id_kegiatan, $data) {
        $this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update('tb_kegiatan', $data);
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