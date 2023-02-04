<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
  private $_table = "user";
  const SESSION_KEY = 'user_id';

  public function rules()
  {
    return [
      [
        'field' => "username",
        'label' => "Username",
        'rules' => "required"
      ],
      [
        'field' => "password",
        'label' => "Password",
        'rules' => "required"
      ]
    ];
  }

  public function login($username, $password)
  {
      // Pemanggilan Table User Untuk Login
      $this->db->where('username', $username);
      $query = $this->db->get($this->_table);
      $user = $query->row();

      // Mengecek Apakah User nya Sudah Terdaftar
      if (!$user)
      {
        return FALSE;
      }

      // Mengecek Apakah Password Sudah Benar?
      if (!$user->password) {
        return FALSE;
      }

      // Membuat Session Baru
      $this->session->set_userdata([self::SESSION_KEY =>$user->id_user]);

      return $this->session->has_userdata(self::SESSION_KEY);

  }

  public function current_user()
  {
    if (!$this->session->has_userdata(self::SESSION_KEY)) {
      return null;
    }

    $user_id = $this->session->userdata(self::SESSION_KEY);
    $query = $this->db->get_where($this->_table, ['id_user' => $user_id]);
    return $query->row();
  }

  public function logout()
  {
    $this->session->unset_userdata(self::SESSION_KEY);
    return !$this->session->has_userdata(self::SESSION_KEY);
  }

  public function _update_last_login($id_user)
  {
    $data = [
      'last_login' => date("d-m-Y H:i:s"),
    ];

    return $this->db->update($this->_table, $data, ['id_user' => $id_user]);
  }
}