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
		$this->load->model('m_member');
	}




	function index()
	{


		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			$data['data'] = $this->m_barang->tampil_barang();
			$data['cari'] = $this->m_barang->cari_barang();
			$data['cart'] =  $this->m_cart->tampil_cart()->result_array();
			$data['hold'] = $this->m_cart->tampil_hold()->result_array();
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
	function add_to_cart($id_holding = '')
	{

		if ($this->session->userdata('akses') == '1' || $this->session->userdata('akses') == '2') {
			if ($id_holding) {
				$get_holidng_by_id = $this->m_cart->get_holding_by_id($id_holding);
				$data_hold = json_decode($get_holidng_by_id[0]['list_item']);

				foreach ($data_hold as $item) {
					$data = array(
						'id' => $item->id,
						'name'     => str_replace(",", ".", $item->name),
						'satuan'   => $item->satuan,
						'harpok'   => $item->harpok,
						'price'    => $item->price,
						// 'price'    => str_replace(",", "", $this->input->post('harjul')) - $this->input->post('diskon'),
						'disc'     => $item->disc,
						'qty'      => $item->qty,
						'amount'	  => $item->amount,
						'subtotal' => $item->subtotal
					);
					$this->m_cart->simpan_cart($data);
				}

				$this->m_cart->delete_holding_by_id($id_holding);
				$this->session->set_flashdata('msg', '<label class="label label-success">Data berhasil di tambah ke cart</label>');
				echo 200;
			} else {
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
					'subtotal' => $i['barang_harjul'] * 1
				);

				$count_cart = count($this->m_cart->tampil_cart()->result_array());

				if ($count_cart > 0) {

					$count_bar = 0;
					$check_cart_items = count($this->m_cart->get_cart_by_id($kobar)->result_array());
					// Jika Ada di Tbl_cart, maka update
					if ($check_cart_items > 0) {
						foreach ($this->m_cart->tampil_cart()->result_array() as $items) {
							$id = $items['id'];
							$qtylama = $items['qty'];
							$harga_lama = $items['price'];
							$rowid = $items['rowid'];
							$kobar = $this->input->post('kode_brg');
							$qty = 1;
							// echo $id . " - " . $kobar;
							// echo $count_bar;
							// exit();
							if ($id == $kobar) {
								$subtotal = $harga_lama;
								$qty_baru = $qtylama + $qty;
								$subtotal_baru = $subtotal * $qty_baru;
								// Count Bar -> Cek apakah barang sudah ada di dalam list cart atau tidak
								$count_bar = 1;
								$up = array(
									'rowid' => $rowid,
									'qty' => $qty_baru,
									'subtotal' => $subtotal_baru
								);
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
			}
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
			// $jual_diskon = (int) $this->input->post('jual_diskon');

			$jual_diskon = str_replace(",", "", $this->input->post('jual_diskon'));
			$total = str_replace(",", "", $this->input->post('total2'));
			$jml_uang = str_replace(",", "", $this->input->post('jml_uang'));
			$kembalian = $jml_uang - $total;

			// Section Member
			if ($this->input->post('no_member')) {
				// Get Point
				$total = $total;
				$point = $total / 25000;
				$point = (int) $point;

				// Get Uang
				$cart = $this->m_cart->tampil_cart()->result_array();

				$subtotal_uang = 0;
				foreach ($cart as $c) {
					$laba_bersih = ((int) $c['price'] - (int)$c['harpok']) * $c['qty'];
					$subtotal_uang += $laba_bersih;
				}
				$total_uang = $subtotal_uang * (4 / 100);

				$no_member = $this->input->post('no_member');

				$data_member = $this->m_member->get_detail_member_by_no($no_member);

				$data_update_point = [
					'uang' =>  (int)$data_member->uang + (int)$total_uang,
					'point' => (int)$data_member->point + (int) $point
				];
				$this->m_member->update_point($no_member, $data_update_point);
				
				$this->session->unset_userdata("no_member_session");
				$this->session->unset_userdata("nama_member_session");
			}


			// End Section Member
			// var_dump($jual_diskon);
			// die;
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

	function add_holding_cart()
	{
		$data_cart = $this->m_cart->tampil_cart()->result_array();
		$data_hold = json_encode($data_cart);
		$data = array(
			"list_item" => $data_hold
		);
		$this->m_cart->add_hold($data);
		$this->m_cart->hapus_tb_cart();
		$this->session->set_flashdata('msg', '<label class="label label-success">Transaksi Berhasil di Hold</label>');
		echo 200;
	}
}
