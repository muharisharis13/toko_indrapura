<?php
class Penjualan extends CI_Controller
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
			$data['data'] = $this->m_barang->tampil_barang();
			$data['cari'] = $this->m_barang->cari_barang();
			$data['cart'] =  $this->m_cart->tampil_cart()->result_array();
			$data['cart_header'] =  $this->m_cart->tampil_cart_header()->result_array();
			$this->load->view('admin/v_penjualan', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function get_barang()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kobar = $this->input->post('kode_brg');
			$x['brg'] = $this->m_barang->get_barang($kobar);
			$this->load->view('admin/v_detail_barang_jual', $x);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function get_barang1()
	{

		$kobar = $this->input->post('kode_brg');
		$this->m_barang->get_barang($kobar);
		$this->add_to_cart();
	}
	function updateQty()
	{
		$kobar = $this->input->post('update_kobar');
		$qty = $this->input->post('update_qty');

		$harga_lama = $this->input->post('amount');
		// $kobar = $this->input->post('kode_brg');

		$subtotal = $harga_lama;
		$qty_baru =  $qty;
		$subtotal_baru = $subtotal * $qty_baru;

		$this->m_cart->update_qty_cart($qty_baru, $subtotal_baru, $kobar);




		// foreach ($this->cart->contents() as $items) {
		// 	$id = $items['id'];
		// 	// $rowid = $items['rowid'];
		// 	echo $id . " - " . $kobar;
		// 	if ($id == $kobar) {

		// 		$id = $items['id'];
		// 		$harga_lama = $items['price'];
		// 		$kobar = $this->input->post('kode_brg');

		// 		$subtotal = $harga_lama;
		// 		$qty_baru =  $qty;
		// 		$subtotal_baru = $subtotal * $qty_baru;

		// 		$this->m_cart->update_qty_cart($qty_baru, $subtotal_baru, $id);
		// 	}
		// }
		redirect('admin/penjualan');
	}
	function add_to_cart()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$kobar = $this->input->post('kode_brg');
			$produk = $this->m_barang->get_barang($kobar);
			$i = $produk->row_array();
			if (count($i) == 0) {
				echo $this->session->set_flashdata('msg', '<label class="label label-danger">Data Tidak Ditemukan</label>');
				redirect('admin/penjualan');
			}
			$data = array(
				'id'       => $i['barang_id'],
				'name'     => str_replace(",", ".", $i['barang_nama']),
				'satuan'   => $i['barang_satuan'],
				'harpok'   => $i['barang_harpok'],
				'price'    => $i['barang_harjul'],
				// 'price'    => str_replace(",", "", $this->input->post('harjul')) - $this->input->post('diskon'),
				'disc'     => $this->input->post('diskon'),
				'qty'      => 1,
				'amount'	  => $i['barang_harjul'],
				'subtotal' => $i['barang_harjul'] * 1,
			);

			$count_cart = count($this->m_cart->tampil_cart_header()->result_array());
			$get_id_cart_header = $this->m_cart->tampil_cart_header()->result();
			$id_header_cart = $get_id_cart_header[0]->id;


			if ($count_cart > 0) {

				$check_cart_items = count($this->m_cart->get_cart_by_id($kobar)->result_array());
				// Jika Ada di Tbl_cart, maka update
				if ($check_cart_items > 0) {
					foreach ($this->m_cart->tampil_cart($id_header_cart)->result_array() as $items) {
						$id = $items['id'];
						$qtylama = $items['qty'];
						$harga_lama = $items['price'];
						$kobar = $this->input->post('kode_brg');
						$qty = 1;
						// echo $id . " - " . $kobar;
						// echo $count_bar;
						// exit();
						if ($id == $kobar) {
							$subtotal = $harga_lama;
							$qty_baru = $qtylama + $qty;
							$subtotal_baru = $subtotal * $qty_baru;

							// $this->cart->update($up);
							$this->m_cart->update_qty_cart($qty_baru, $subtotal_baru, $id);
						}
					}
				} else {
					$this->m_cart->simpan_cart($data);
				}
			} else {
				// $this->cart->insert($data);
				$this->m_cart->simpan_cart($data);
			}
			redirect('admin/penjualan');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function remove()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$row_id = $this->uri->segment(4);
			// $this->cart->update(array(
			// 	'rowid'      => $row_id,
			// 	'qty'     => 0
			// ));
			$this->m_cart->hapus_cart($row_id);
			redirect('admin/penjualan');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function simpan_penjualan()
	{
		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$jual_diskon = (int) $this->input->post('jual_diskon');


			$total = str_replace(",", "", $this->input->post('total2'));
			$jml_uang = str_replace(",", "", $this->input->post('jml_uang'));
			$kembalian = $jml_uang - $total;
			if (!empty($total) && !empty($jml_uang)) {
				if ($jml_uang < $total) {
					echo $this->session->set_flashdata('msg', '<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
					redirect('admin/penjualan');
				} else {
					$nofak = $this->m_penjualan->get_nofak();
					$this->session->set_userdata('nofak', $nofak);
					$order_proses = $this->m_penjualan->simpan_penjualan($nofak, $total, $jml_uang, $kembalian, $jual_diskon);
					if ($order_proses) {
						// $this->cart->destroy();
						$this->m_cart->hapus_tb_cart();

						$this->session->unset_userdata('tglfak');
						$this->session->unset_userdata('suplier');
						$this->load->view('admin/alert/alert_sukses');
					} else {
						redirect('admin/penjualan');
					}
				}
			} else {
				echo $this->session->set_flashdata('msg', '<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
				redirect('admin/penjualan');
			}
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function cetak_faktur()
	{
		$x['data'] = $this->m_penjualan->cetak_faktur();
		$this->load->view('admin/laporan/v_faktur', $x);
		//$this->session->unset_userdata('nofak');
	}
}
