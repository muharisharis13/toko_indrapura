<?php
class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        };
        $this->load->model('m_kategori');
        $this->load->model('m_barang');
        $this->load->model('m_suplier');
        $this->load->model('m_penjualan');
        $this->load->model('m_cart');
    }




    function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data['title'] = "Member";
            $this->load->view('admin/v_member', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    public function penukaran_point()
    {
        $data['title'] = "Penukaran Point Member";
        $this->load->view('admin/v_penukaran_point', $data);
    }
}
