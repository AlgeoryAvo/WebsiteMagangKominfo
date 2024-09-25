<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model {

    function query_validasi_username($username){
    	$result = $this->db->query("SELECT * FROM tb_pengguna WHERE username_pengguna ='$username' LIMIT 1");
        return $result;
    }

    function query_validasi_password($username,$password){
    	$result = $this->db->query("SELECT * FROM tb_pengguna WHERE username_pengguna ='$username' AND password_pengguna ='$password' LIMIT 1");
        return $result;
    }
   public function get_tanggal(){
       	$result = $this->db->query("SELECT DISTINCT tanggal_input FROM tb_kegiatan UNION  SELECT tanggal_input FROM tb_subkegiatan;");
        return $result->result_array();

   }
   
} 