<?php

class CAtasan extends CI_Controller {
    
    public function index () {
        // $this->load->model('atasan/m_atasan');
        $data['kegiatan']= $this->matasan->tampilData()->result();
        $this->load->view('atasan/VHeader');
        $this->load->view('atasan/VSidebar');
        $this->load->view('atasan/VAtasan', $data);
        $this->load->view('atasan/VFooter');
    }
    public function print(){
        $data['kegiatan'] = $this->mkegiatancrud->tampilData('tb_kegiatan')->result();
        $this->load->view('atasan/print_kegiatan', $data);
      }

}
?>