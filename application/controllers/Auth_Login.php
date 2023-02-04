<?php

  // Unutk Membuat Teks Sementara

  $this->session->set_flashdata('key');
  $this->session->flashdata('key');

  // Untuk Authentication

  $this->session->set_userdata('key');
  $this->session->userdata('key');
  $this->session->has_userdata('key');

  // Untuk Menghapus Session

  $this->session->unset_userdata('key');
  $this->session->session_destroy('key');

?>