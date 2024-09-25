<?php

class MAtasan extends CI_Model {
    public function tampilData() {
        return $this->db->get('tb_kegiatan');
    }
}

?>