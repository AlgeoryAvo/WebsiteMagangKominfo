<?php

class CPPTK extends CI_Controller {

        public function index() {
            $data['kegiatan']= $this->MOperatorCRUD->tampilData()->result();
            $data['pagu_anggaran'] = $this->mkegiatancrud->sum('tb_kegiatan', 'pagu_anggaran', );
            $data['nominal'] = $this->mkegiatancrud->sum('tb_kegiatan', 'nominal', );

            $this->load->view('pptk/VHeader');
            $this->load->view('pptk/VSidebar');
            $this->load->view('pptk/VPPTK', $data);
            $this->load->view('pptk/VFooter');
        }

        public function halamanInput($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            $data['kegiatan'] = $this->mpptk->halamanInput($where, 'tb_kegiatan')->result();

            $this->load->view('/pptk/VHeader');
            $this->load->view('/pptk/VSidebar');
            $this->load->view('/pptk/VTagihan', $data);
            $this->load->view('/pptk/VFooter');
        }
// update untuk ganti sandi pptk
        public function halamanUpdate($id_pengguna) {
		$where = array('id_pengguna' => $id_pengguna);
		$this->load->model('MPPTKCRUD');
		$data['pptk'] = $this->MPPTKCRUD->halamanUpdate($where, 'tb_pengguna')->result();
		$this->load->view('/pptk/VHeader');
		$this->load->view('/pptk/VSidebar');
		$this->load->view('/pptk/VBendaharaUpdate', $data);
		$this->load->view('/pptk/VFooter');
	}

	public function fungsiUpdate() {
		$id_pengguna = $this->input->post('id_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
		$jabatan_pengguna = 'PPTK';
		$pengguna_status = $this->input->post('pengguna_status');
		$username_pengguna = $this->input->post('username_pengguna');
        $password_pengguna = $this->input->post('password_pengguna');

        $ArrUpdate = array(
        'id_pengguna' => $id_pengguna,
        'nama_pengguna' => $nama_pengguna,
		'jabatan_pengguna' => $jabatan_pengguna,
		'pengguna_status' => $pengguna_status,
		'username_pengguna' => $username_pengguna,
        'password_pengguna' => $password_pengguna,
        );

		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('tb_pengguna', $ArrUpdate);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil diubah</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('pptk/CBendaharaCRUD/index'));
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
    
            $config['upload_path'] = './uploads/bukti_tagihan/';
            $config['allowed_types'] = 'jpeg|jpg|png|gif|pdf';
            $config['max_size']             = 1000000;
            $config['max_width']            = 1000000;
            $config['max_height']           = 1000000;
    
            // $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $file = $this->upload->do_upload('bukti_tagihan');
            $data = $this->upload->data();
            
            if ($file) {    
                $data = $this->upload->data();
                $bukti_tagihan = $data['file_name'];
            
            } else {
                $bukti_tagihan = $this->input->post('bukti_tagihan');    
            }
    
            print_r($bukti_tagihan);
    
            $ArrInput = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
                'bukti_tagihan' => $bukti_tagihan,
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
            redirect(base_url('pptk/CPPTK'));
        }


}

?>


