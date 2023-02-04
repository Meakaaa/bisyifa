<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function index()
  {
    $data['kamar'] = $this->M_kamar->dataKamar();
    $this->load->view('v_beranda/index', $data);
  }
}
