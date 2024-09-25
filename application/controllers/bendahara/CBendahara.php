<?php

class CBendahara extends CI_Controller {
    
    public function index () {
        $data['kegiatan']= $this->MOperatorCRUD->tampilData()->result();
        $data['pagu_anggaran'] = $this->mkegiatancrud->sum('tb_kegiatan', 'pagu_anggaran', );
        $data['nominal'] = $this->mkegiatancrud->sum('tb_kegiatan', 'nominal', );

        $this->load->view('bendahara/VHeader');
        $this->load->view('bendahara/VSidebar');
        $this->load->view('bendahara/VBendahara', $data);
        $this->load->view('bendahara/VFooter');
    }

    public function halamanInput($id_kegiatan) {
        $where = array('id_kegiatan' => $id_kegiatan);
        $data['kegiatan'] = $this->mbendahara->halamanInput($where, 'tb_kegiatan')->result();

        $this->load->view('/bendahara/VHeader');
        $this->load->view('/bendahara/VSidebar');
        $this->load->view('/bendahara/VTransfer', $data);
        $this->load->view('/bendahara/VFooter');
    }

    public function fungsiInput() {
        $id_kegiatan = $this->input->post('id_kegiatan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $sub_kegiatan = $this->input->post('sub_kegiatan');
        $nama_belanja = $this->input->post('nama_belanja');
        $kode_rekening = $this->input->post('kode_rekening');
        $pagu_anggaran = $this->input->post('pagu_anggaran');
        $nama_pptk = $this->input->post('nama_pptk');
        $tanggal_input = $this->input->post('tanggal_input');
        $nominal = $this->input->post('nominal');
        
        $config['upload_path'] = './uploads/bukti_transfer/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';
        $config['max_size']             = 1000000;
        $config['max_width']            = 1000000;
        $config['max_height']           = 1000000;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $file = $this->upload->do_upload('bukti_transfer');
        $data = $this->upload->data();
        
        if ($file) {    
            $data = $this->upload->data();
            $bukti_transfer = $data['file_name'];
        
        } else {
            $bukti_transfer = $this->input->post('bukti_transfer');    
        }

        print_r($bukti_transfer);

        $ArrInput = array(
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $nama_kegiatan,
            'sub_kegiatan' => $sub_kegiatan,
            'nama_belanja' => $nama_belanja,
            'kode_rekening' => $kode_rekening,
            'pagu_anggaran' => $pagu_anggaran,
            'nama_pptk' => $nama_pptk,
            'tanggal_input' => $tanggal_input,
            'nominal' => $nominal,
            'bukti_transfer' => $bukti_transfer,
            
        );

        // $this->MForm->updateDataBaju($id, $ArrInput);
        $this->db->where('id_kegiatan', $id_kegiatan);
        $this->db->update('tb_kegiatan', $ArrInput);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil disimpan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('bendahara/CBendahara'));
    }

}

?>