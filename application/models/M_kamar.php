<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kamar extends CI_Model
{
  public function dataKamar() {
     return $this->db->get('tbl_kamar')->result_array();
  }
}
