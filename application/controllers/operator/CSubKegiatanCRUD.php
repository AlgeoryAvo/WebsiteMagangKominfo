<?php

    class CSubKegiatanCRUD extends CI_Controller {

        public function index() {
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->msubkegiatancrud->tampilData()->result();
            
            $data['user'] = $this->mpptkcrud->tampilData()->result();
            $data['keg'] = $this->msubkegiatancrud->count('tb_subkegiatan');
            $data['bukti_tagihan'] = $this->msubkegiatancrud->count('tb_subkegiatan', 'bukti_tagihan');
            $data['bukti_transfer'] = $this->msubkegiatancrud->count('tb_subkegiatan', 'bukti_transfer') ;
            $data['pagu_anggaran'] = $this->msubkegiatancrud->sum('tb_subkegiatan', 'pagu_anggaran', );
            $data['nominal'] = $this->msubkegiatancrud->sum('tb_subkegiatan', 'nominal', );
            $data['PPTK'] = $this->msubkegiatancrud->count('tb_pengguna', ' PPTK') ;
            

            $this->load->view('operator/VHeader');
            $this->load->view('operator/VSidebar');
            $this->load->view('operator/VSubKegiatanCRUD', $data);
            $this->load->view('operator/VFooter');
        }

        public function fungsiTambah() {
            $id_subkegiatan = $this->input->post('id_subkegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrInsert = array(
                'id_subkegiatan' => $id_subkegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );
    
            // $this->MForm->insertDataBaju($ArrInsert);
            $this->db->insert('tb_subkegiatan', $ArrInsert);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil disimpan</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CSubKegiatanCRUD/index'));
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
        //         $this->load->view('operator/VSubKegiatanCRUD');
    
        //     } else {
        //         $id_subkegiatan = $this->input->post('id_subkegiatan');
        //         $nama_kegiatan = $this->input->post('nama_kegiatan');
        //         $sub_kegiatan = $this->input->post('sub_kegiatan');
        //         $nama_belanja = $this->input->post('nama_belanja');
        //         $kode_rekening = $this->input->post('kode_rekening');
        //         $pagu_anggaran = $this->input->post('pagu_anggaran');
        //         $nama_pptk = $this->input->post('nama_pptk');
        //         $tanggal_input = $this->input->post('tanggal_input');
            
        //         $ArrInsert = array(
        //             'id_subkegiatan' => $id_subkegiatan,
        //             'nama_kegiatan' => $nama_kegiatan,
        //             'sub_kegiatan' => $sub_kegiatan,
        //             'nama_belanja' => $nama_belanja,
        //             'kode_rekening' => $kode_rekening,
        //             'pagu_anggaran' => $pagu_anggaran,
        //             'nama_pptk' => $nama_pptk,
        //             'tanggal_input' => $tanggal_input,
        //         );
    
        //         // $this->MForm->insertDataBaju($ArrInsert);
        //         $this->db->insert('tb_subkegiatan', $ArrInsert);
        //         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //         <strong>Data berhasil disimpan</strong>
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times;</span>
        //         </button>
        //         </div>');
        //         redirect(base_url('operator/CSubKegiatanCRUD/index'));
        //     }
        // }

        public function halamanDetail($id_subkegiatan) {
            $where = array('id_subkegiatan' => $id_subkegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->msubkegiatancrud->halamanUpdate($where, 'tb_subkegiatan')->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VSubKegiatanCRUD', $data);
            $this->load->view('/operator/VFooter');
        }

        public function halamanUpdate($id_subkegiatan) {
            $where = array('id_subkegiatan' => $id_subkegiatan);
            // $this->load->model('MKegiatanCRUD');
            $data['kegiatan'] = $this->msubkegiatancrud->halamanUpdate($where, 'tb_subkegiatan')->result();
             $data['user'] = $this->mpptkcrud->tampilData()->result();
            $this->load->view('/operator/VHeader');
            $this->load->view('/operator/VSidebar');
            $this->load->view('/operator/VSubKegiatanUpdate', $data);
            $this->load->view('/operator/VFooter');
        }
    
        public function fungsiUpdate() {
            $id_subkegiatan = $this->input->post('id_subkegiatan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $sub_kegiatan = $this->input->post('sub_kegiatan');
            $nama_belanja = $this->input->post('nama_belanja');
            $kode_rekening = $this->input->post('kode_rekening');
            $pagu_anggaran = $this->input->post('pagu_anggaran');
            $nama_pptk = $this->input->post('nama_pptk');
            $tanggal_input = $this->input->post('tanggal_input');
            
            $ArrUpdate = array(
                'id_subkegiatan' => $id_subkegiatan,
                'nama_kegiatan' => $nama_kegiatan,
                'sub_kegiatan' => $sub_kegiatan,
                'nama_belanja' => $nama_belanja,
                'kode_rekening' => $kode_rekening,
                'pagu_anggaran' => $pagu_anggaran,
                'nama_pptk' => $nama_pptk,
                'tanggal_input' => $tanggal_input,
            );

            $this->db->where('id_subkegiatan', $id_subkegiatan);
            $this->db->update('tb_subkegiatan', $ArrUpdate);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect(base_url('operator/CSubKegiatanCRUD/index'));
        }

        public function fungsiDelete($id_subkegiatan) {
            $this->db->where('id_subkegiatan', $id_subkegiatan);
            $this->db->delete('tb_subkegiatan');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <strong>Data berhasil dihapus</strong>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		    </div>');
            redirect(base_url('operator/CSubKegiatanCRUD/index'));
        }
 public function print(){
        $data['kegiatan'] = $this->msubkegiatancrud->tampilData('tb_subkegiatan')->result();
        $this->load->view('operator/print_kegiatan_operator', $data);
      }
    }
