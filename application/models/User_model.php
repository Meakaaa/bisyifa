<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

  public function daftar($ens_password)
  {

    $data = array(
      'nama_user' => $this->input->post('nama_user'),
      'username' => $this->input->post('username'),
      'password' => $ens_password
    );

    return $this->db->insert('user', $data);
  }

  public function login($username, $password)
  {
    // Select * from user Where username = $username and password = $password
    $this->db->where('username', $username);
    $this->db->where('password', $password);

    $sql = $this->db->get('user');
    // Jika Dapat 1 Data Row
    if ($sql->num_rows() == 1) {
      return $sql->row(0)->id_user;
      // Jika Data Row Tidak Ditemukan
    } else {
      return false;
    }
  }
}
