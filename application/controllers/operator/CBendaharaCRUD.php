<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CBendaharaCRUD extends CI_Controller {
	
	public function index() {
	$datat['title']='Halaman Tugas';
	// $data['bendahara']=$this->MBendaharaCRUD->semuadata();
	$this->load->model('MBendaharaCRUD');
    $data['bendahara']= $this->MBendaharaCRUD->tampilData()->result();
    $this->load->view('operator/VHeader',$datat);
    $this->load->view('operator/VSidebar');
	$this->load->view('operator/VBendaharaCRUD',$data);
    $this->load->view('operator/VFooter');
	}

	public function fungsiTambah() {
        $id_pengguna = $this->input->post('id_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
		$jabatan_pengguna = 'Bendahara';
		$pengguna_status = $this->input->post('pengguna_status');
		$username_pengguna = $this->input->post('username_pengguna');
        $password_pengguna = $this->input->post('password_pengguna');

        $ArrInsert = array(
        'id_pengguna' => $id_pengguna,
        'nama_pengguna' => $nama_pengguna,
		'jabatan_pengguna' => $jabatan_pengguna,
		'pengguna_status' => $pengguna_status,
		'username_pengguna' => $username_pengguna,
        'password_pengguna' => $password_pengguna,
        );

        $this->db->insert('tb_pengguna', $ArrInsert);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data berhasil disimpan</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect(base_url('operator/CBendaharaCRUD/index'));
    }

	public function halamanUpdate($id_pengguna) {
		$where = array('id_pengguna' => $id_pengguna);
		$this->load->model('MBendaharaCRUD');
		$data['bendahara'] = $this->MBendaharaCRUD->halamanUpdate($where, 'tb_pengguna')->result();
		$this->load->view('/operator/VHeader');
		$this->load->view('/operator/VSidebar');
		$this->load->view('/operator/VBendaharaUpdate', $data);
		$this->load->view('/operator/VFooter');
	}

	public function fungsiUpdate() {
		$id_pengguna = $this->input->post('id_pengguna');
        $nama_pengguna = $this->input->post('nama_pengguna');
		$jabatan_pengguna = 'Bendahara';
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
		redirect(base_url('operator/CBendaharaCRUD/index'));
	}

	public function fungsiDelete($id_pengguna) {
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->delete('tb_pengguna');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Data berhasil dihapus</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url('operator/CBendaharaCRUD/index'));
	}
public function print(){
        $data['bendahara'] = $this->mlaporan->laporan_bendahara('tb_pengguna')->result();
        $this->load->view('operator/print_bendahara', $data);
      }
}

?>