<?php

    class CKegiatanCRUD extends CI_Controller {

        public function index() {
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->mkegiatancrud->tampilData()->result();
            
            $data['user'] = $this->mpptkcrud->tampilData()->result();
            $data['keg'] = $this->mkegiatancrud->count('tb_kegiatan');
            $data['bukti_tagihan'] = $this->mkegiatancrud->count('tb_kegiatan', 'bukti_tagihan');
            $data['bukti_transfer'] = $this->mkegiatancrud->count('tb_kegiatan', 'bukti_transfer') ;
            $data['pagu_anggaran'] = $this->mkegiatancrud->sum('tb_kegiatan', 'pagu_anggaran', );
            $data['nominal'] = $this->mkegiatancrud->sum('tb_kegiatan', 'nominal', );
            $data['PPTK'] = $this->mkegiatancrud->count('tb_pengguna', ' PPTK') ;
            

            $this->load->view('operator/VHeader');
            $this->load->view('operator/VSidebar');
            $this->load->view('operator/VKegiatanCRUD', $data);
            $this->load->view('operator/VFooter');
        }

        public function fungsiTambah() {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrInsert = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );
    
            // $this->MForm->insertDataBaju($ArrInsert);
            $this->db->insert('tb_kegiatan', $ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }

        // public function fungsiTambah() {
        //     $this->load->library('form_validation');

        //     $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('sub_kegiatan', 'Sub Kegiatan', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('nama_belanja', 'Nama Belanja', 'required',
        //     array('required' => '%s harus diisi'));
    
        //     $this->form_validation->set_rules('kode_rekening', 'Kode Rekening', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

        //     $this->form_validation->set_rules('pagu_anggaran', 'Pagu Anggaran', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan angka saja'));

        //     $this->form_validation->set_rules('nama_pptk', 'Nama PPTK', 'required',
        //     array('required' => '%s harus diisi'));

        //     $this->form_validation->set_rules('tanggal_input', 'Tanggal Input', 'required',
        //     array('required' => '%s harus diisi', 'alpha' => '%s harus diisi dengan tanggal saja'));

        //     if ($this->form_validation->run() == FALSE) {
        //         $this->load->view('operator/VKegiatanCRUD');
    
        //     } else {
        //         $id_kegiatan = $this->input->post('id_kegiatan');
        //         $nama_kegiatan = $this->input->post('nama_kegiatan');
        //         $sub_kegiatan = $this->input->post('sub_kegiatan');
        //         $nama_belanja = $this->input->post('nama_belanja');
        //         $kode_rekening = $this->input->post('kode_rekening');
        //         $pagu_anggaran = $this->input->post('pagu_anggaran');
        //         $nama_pptk = $this->input->post('nama_pptk');
        //         $tanggal_input = $this->input->post('tanggal_input');
            
        //         $ArrInsert = array(
        //             'id_kegiatan' => $id_kegiatan,
        //             'nama_kegiatan' => $nama_kegiatan,
        //             'sub_kegiatan' => $sub_kegiatan,
        //             'nama_belanja' => $nama_belanja,
        //             'kode_rekening' => $kode_rekening,
        //             'pagu_anggaran' => $pagu_anggaran,
        //             'nama_pptk' => $nama_pptk,
        //             'tanggal_input' => $tanggal_input,
        //         );
    
        //         // $this->MForm->insertDataBaju($ArrInsert);
        //         $this->db->insert('tb_kegiatan', $ArrInsert);
        //         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //         <strong>Data berhasil disimpan</strong>
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //         </button>
        //         </div>');
        //         redirect(base_url('operator/CKegiatanCRUD/index'));
        //     }
        // }

        public function halamanDetail($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->mkegiatancrud->halamanUpdate($where, 'tb_kegiatan')->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VKegiatanDetail', $data);
            $this->load->view('/operator/VFooter');
        }

        public function halamanUpdate($id_kegiatan) {
            $where = array('id_kegiatan' => $id_kegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->mkegiatancrud->halamanUpdate($where, 'tb_kegiatan')->result();
             $data['user'] = $this->mpptkcrud->tampilData()->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VKegiatanUpdate', $data);
            $this->load->view('/operator/VFooter');
        }
    
        public function fungsiUpdate() {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrUpdate = array(
                'id_kegiatan' => $id_kegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );

            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('tb_kegiatan', $ArrUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }

        public function fungsiDelete($id_kegiatan) {
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->delete('tb_kegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <strong>Data berhasil dihapus</strong>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		    </div>');
            redirect(base_url('operator/CKegiatanCRUD/index'));
        }
 public function print(){
        $data['kegiatan'] = $this->mkegiatancrud->tampilData('tb_kegiatan')->result();
        $this->load->view('operator/print_kegiatan_operator', $data);
      }
    }
