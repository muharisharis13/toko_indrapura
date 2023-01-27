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
        $this->load->model("m_member");
        $this->load->model("m_barang");
    }




    function index()
    {
        if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
            $data['title'] = "Member";
            $data["list_member"] = $this->m_member->get_list_member();
            $this->load->view('admin/v_member', $data);
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    public function penukaran_point()
    {
        $id = $this->uri->segment(4);
        $data['title'] = "Penukaran Point Member";
        $data['get_detail_member'] = $this->m_member->get_detail_member($id);
        $data['get_list_product'] = $this->m_barang->tampil_barang();
        $this->load->view('admin/v_penukaran_point', $data);
    }

    public function tambah_member()
    {
        $no_hp = $this->input->post('no_hp');
        $nama_user = $this->input->post('nama_user');
        $alamat = $this->input->post('alamat');



        $this->m_member->tambah_member($no_hp, $nama_user, $alamat);
        redirect('admin/member');
    }

    public function hapus_member()
    {

        $id = $this->input->post('id');
        $this->m_member->hapus_member($id);
        redirect('admin/member');
    }

    public function select_product()
    {
        $id_product = $this->input->post("id");

        // print_r($this->m_member->get_detail_product($id_product));

        $hasil = $this->m_member->get_detail_product($id_product);
        echo json_encode($hasil);
    }
}
