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
        $this->load->model("m_cart");
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

    public function search($user = '')
    {

        $data = $this->m_member->search_member($user)->result_array();
        if (count($data) > 0 && $user != '') {
?>
            <table class="table table-striped table-bordered" style="margin-top: 15px;">
                <tr>
                    <th>No.Member</th>
                    <th>Nama</th>
                    <th>No.Hp</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($data as $val) { ?>
                    <tr>
                        <td><?= $val['no_member'] ?></td>
                        <td><?= $val['nama_user'] ?></td>
                        <td><?= $val['no_hp_user'] ?></td>
                        <td><?= $val['point'] ?></td>
                        <td><button class="btn btn-success" onclick="getDetailMember('<?= $val['id'] ?>')">Pilih</button></td>
                    </tr>
                <?php } ?>
            </table>

        <?php
        } else {
        ?>
            <div id="detail_member" style="margin-top: 15px;display:flex;align-items:center;justify-content:center;text-align:center;height:250px;">
                <b> Not Found </b>
            </div>
        <?php
        }
    }

    public function detail($id)
    {

        $data = $this->m_member->get_detail_member($id);
        ?>
        <input type="hidden" name="id_member_mdl" id="id_member_mdl" value="<?= $id ?>" />
        <div id="detail_member" style="margin-top: 15px;vertical-align:middle;align-items:center;">
            <table>
                <tr>
                    <th>Nama Member</th>
                    <td>:</td>
                    <td><?= $data->nama_user ?></td>
                </tr>
                <tr>
                    <th>No.Member</th>
                    <td>:</td>
                    <td><?= $data->no_member ?></td>
                </tr>
                <tr>
                    <th>Point Member</th>
                    <td>:</td>
                    <td><?= $data->point ?> Point</td>
                </tr>
                <tr>
                    <th>Member Sejak</th>
                    <td>:</td>
                    <td><?= date('d-m-Y', strtotime($data->createdAt)) ?></td>
                </tr>
            </table>
        </div>
<?php
    }

    public function pilih_member($id, $total = 0)
    {
        $data = $this->m_member->get_detail_member($id);
        $this->session->set_userdata("id_member_session", $id);
        $this->session->set_userdata("no_member_session", $data->no_member);
        $this->session->set_userdata("nama_member_session", $data->nama_user);

        // Get Point
        $total = $total;
        $point = $total / 25000;
        $point = (int) $point;

        // Get Uang

        $total_uang = 0;
        if ($point > 0) {
            $cart = $this->m_cart->tampil_cart()->result_array();
            $subtotal_uang = 0;
            foreach ($cart as $c) {
                $laba_bersih = ((int) $c['price'] - (int)$c['harpok']) * $c['qty'];
                $subtotal_uang += $laba_bersih;
            }
            $total_uang = $subtotal_uang * (4 / 100);
            $data->point_get = $point;
            $data->uang_get = $total_uang;
        }
        $this->session->set_userdata("point_get_session", $point);
        $this->session->set_userdata("uang_get_session", (int) $total_uang);
        echo json_encode($data);
    }

    public function print($no_member)
    {

        $data['title'] = "Print Kartu Member";
        $data_member = $this->m_member->get_detail_member_by_no($no_member);
        $nama_member = "member_not_found";
        if (!$data_member) {
            $nama_member = "member_not_found";
        } else {

            $nama_member = $data_member->nama_user;
        }
        $data['no_member'] = $no_member;
        $data['nama_member'] = $nama_member;
        $this->load->view('admin/laporan/v_kartu_member', $data);
    }


    public function batal_member()
    {
        $this->session->unset_userdata("id_member_session");
        $this->session->unset_userdata("no_member_session");
        $this->session->unset_userdata("nama_member_session");

        $this->session->unset_userdata("point_get_session");
        $this->session->unset_userdata("uang_get_session");
        // $data = $this->m_member->get_detail_member($id);
        // echo json_encode($data);
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
        $data_update_point = [
            'uang' =>  $data['jml_uang'] - $data['total3'],
            'point' => $data['point'] - $data['pengurangan_point']
        ];
        $this->m_member->update_point($data['no_member'], $data_update_point);
        $nofak = $this->m_penjualan->get_nofak();
        $data_simpan_member = [
            'jual_nofak' => $nofak,
            'jual_total' => $data['total3'],
            'jual_jml_uang' => $data['jml_uang'],
            'jual_kembalian' => $data['kembalian'],
            'jual_user_id' => $this->session->userdata('idadmin'),
            'jual_keterangan' => "Member"
        ];
        $this->m_member->simpan($data_simpan_member);

        $detail =   $this->convertDetail($nofak, $data['detail']);
        $res =   $this->db->insert_batch('tbl_detail_jual', $detail);
        if ($res == true) {
            $this->session->set_flashdata('success', 'Penukaran Point berhasil');
            echo json_encode($res);
        } else {
            $this->session->set_flashdata('err', 'Penukaran Point Gagal');
            echo json_encode($res);
        }
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
