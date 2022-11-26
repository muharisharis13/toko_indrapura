<?php
class penjualan_terlaris extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk') != TRUE) {
      $url = base_url();
      redirect($url);
    };
    $this->load->model('m_penjualan');
  }
  function index()
  {
    $this->load->view('admin/menu');
    if ($this->session->userdata("akses") == '1') {
      $data['data_penjualan_terlaris'] = $this->m_penjualan->get_penjualan_terlaris();
      $this->load->view("admin/v_penjualan_terlaris", $data);
    } else {
      echo "Halaman Tidak Ditemukan";
    }
  }
}
