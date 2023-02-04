<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Media extends CI_Controller
{

  public function berita()
  {
    $this->load->view('v_media/berita');
  }
}
