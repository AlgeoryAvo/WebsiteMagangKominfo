<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
		$this->load->model('Mlogin','Mlogin');
    }
    
	function index(){
        if($this->session->userdata('logged') !=TRUE){
            $arrtahun =  $this->Mlogin->get_tanggal();   
            $tahun = array();
            for ($i=0; $i < count($arrtahun); $i++) { 
                $tahun[$i] = date('Y',strtotime($arrtahun[$i]['tanggal_input']));
            }
            $data['tanggal_input'] = array_unique($tahun);  
            $this->load->view('V_login/login',$data);
        }else{
            $url=base_url('home');
            redirect($url);
        };
    }
    
    function autentikasi(){
        $username = $this->input->post('username');
        $password = $this->input->post('pass');
        $tahun = $this->input->post('tahun');
        
        $validasi_username = $this->Mlogin->query_validasi_username($username);
        if($validasi_username->num_rows() > 0){
            $validate_ps=$this->Mlogin->query_validasi_password($username,$password);
            if($validate_ps->num_rows() > 0){
                $x = $validate_ps->row_array();
                if($x['pengguna_status']=='Aktif'){
                    $this->session->set_userdata('logged',TRUE);
                    $this->session->set_userdata('user',$username);
                    $id=$x['id_pengguna'];
                    if($x['jabatan_pengguna']=='Operator'){ //Operator
                        $name = $x['username_pengguna'];
                        $nama_pengguna = $x['nama_pengguna'];
                        $this->session->set_userdata('access','operator');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('nama_pengguna',$nama_pengguna);
                        $this->session->set_userdata('tahun',$tahun);
                        redirect('operator/CKegiatanCRUD');

                    }else if($x['jabatan_pengguna']=='PPTK'){ //PPTK
                        $name = $x['username_pengguna'];
                        $nama_pengguna = $x['nama_pengguna'];
                        $this->session->set_userdata('access','PPTK');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('nama_pengguna',$nama_pengguna);
                        $this->session->set_userdata('tahun',$tahun);
                        redirect('pptk/CPPTK');
                    

                    }else if($x['jabatan_pengguna']=='Bendahara'){ //Bendahara
                        $name = $x['username_pengguna'];
                        $nama_pengguna = $x['nama_pengguna'];
                        $this->session->set_userdata('access','Bendahara');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('nama_pengguna',$nama_pengguna);
                             $this->session->set_userdata('tahun',$tahun);
                        redirect('bendahara/CBendahara');
                    }
                    else if($x['jabatan_pengguna']=='Atasan'){ //Atasan
                        $name = $x['username_pengguna'];
                        $nama_pengguna = $x['nama_pengguna'];
                        $this->session->set_userdata('access','Atasan');
                        $this->session->set_userdata('id',$id);
                        $this->session->set_userdata('name',$name);
                        $this->session->set_userdata('nama_pengguna',$nama_pengguna);
                             $this->session->set_userdata('tahun',$tahun);
                        redirect('atasan/CAtasan');
                    }
                }else{
                    $url=base_url('login');
                    echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Maaf!</h3>
                    <p>Akun kamu telah di blokir. Silahkan hubungi admin.</p>');
                    redirect($url);
                }
            }else{
                $url=base_url('login');
                echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
                    <h3>Maaf!</h3>
                    <p>Password yang kamu masukan salah.</p>');
                redirect($url);
            }

        }else{
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','<span onclick="this.parentElement.style.display=`none`" class="w3-button w3-large w3-display-topright">&times;</span>
            <h3>Maaf!</h3>
            <p>Username yang kamu masukan salah.</p>');
            redirect($url);
        }

    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
    

}