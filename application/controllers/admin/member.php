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
        $this->load->model("m_penjualan");
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
    public function create_penukaran()
    {
        $data = $this->input->post();

        // $data_update_point = [
        //     'uang' =>  $data['jml_uang'] - $data['total3'],
        //     'point' => $data['point'] - $data['pengurangan_point']
        // ];
        // $this->m_member->update_point($data['no_member'], $data_update_point);

        $nofak = $this->m_penjualan->get_nofak();
        // $data_simpan_member = [
        //     'jual_nofak' => $nofak,
        //     'jual_total' => $data['total3'],
        //     'jual_jml_uang' => $data['jml_uang'],
        //     'jual_kembalian' => $data['kembalian'],
        //     'jual_user_id' => $this->session->userdata('idadmin'),
        //     'jual_keterangan' => "Member"

        // ];
        // $this->m_member->simpan($data_simpan_member);

        $detail =   $this->convertDetail($nofak, $data['detail']);
        $res_detail =   $this->db->insert_batch('tbl_detail_jual', $detail);
        // var_dump($detail);
    }
    public function convertDetail($id, $data)
    {
        $item = json_decode($data);
        $detail = [];
        foreach ($item as $value) {
            $detailData = [];
            $detailData = [
                'd_jual_nofak' => $id,
                'd_jual_barang_id' => $value->barang_id,
                'd_jual_barang_nama' => $value->barang_nama,
                'd_jual_barang_satuan' => $value->barang_satuan,
                'd_jual_barang_harpok' => $value->barang_harpok,
                'd_jual_barang_harjul' => $value->barang_harjul,
                'd_jual_qty' => $value->qty,
                'd_jual_total' => $value->qty * $value->barang_harjul,
            ];
            array_push($detail, $detailData);
        }
        return $detail;
    }
}
