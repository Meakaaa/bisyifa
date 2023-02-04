<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
  {
    show_404();
  }

  public function login()
  {
    $this->load->model('auth_model');
    $this->load->library('form_validation');

    $rules = $this->auth_model->rules();
    $this->form_validation->set_rules($rules);

    if ($this->form_validation->run() == FALSE) {
      return $this->load->view('login_form');
    }

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if($this->auth_model->login($username, $password)) {
      redirect('');
    } else {
      echo "<script> alert ('Maaf, Data Yang Anda Masukkan Salah, Ulangi Username Dan Password Anda.')</script>";
      die(redirect('auth/login'));
    }

    $this->load->view('login_form');

  }

  public function logout()
  {
    $this->load->model('auth_model');
    $this->auth_model->logout();
    redirect(site_url());
  }

}
