<?php

use LDAP\Result;

class Barang extends CI_Controller
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
		$this->load->model('m_satuan');
		$this->load->library('Zend');
	}
	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$data['data'] = $this->m_barang->tampil_barang();
			$data['kat'] = $this->m_kategori->tampil_kategori();
			$data['kat2'] = $this->m_kategori->tampil_kategori();
			$data['satuan_baru'] = $this->m_satuan->get_satuan();
			$this->load->view('admin/v_barang', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function tambah_barang()
	{
		if ($this->session->userdata('akses') == '1') {
			$kobar = $this->input->post('kobar');
			$nabar = $this->input->post('nabar');
			$kat = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$harpok = str_replace(',', '', $this->input->post('harpok'));
			$harjul = str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok = $this->input->post('stok');
			$min_stok = $this->input->post('min_stok');
			$this->m_barang->simpan_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);

			redirect('admin/barang');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
	function edit_barang()
	{
		if ($this->session->userdata('akses') == '1') {
			$kobar = $this->input->post('kobar');
			$nabar = $this->input->post('nabar');
			$kat = $this->input->post('kategori');
			$satuan = $this->input->post('satuan');
			$harpok = str_replace(',', '', $this->input->post('harpok'));
			$harjul = str_replace(',', '', $this->input->post('harjul'));
			$harjul_grosir = str_replace(',', '', $this->input->post('harjul_grosir'));
			$stok = $this->input->post('stok');
			$min_stok = $this->input->post('min_stok');
			$this->m_barang->update_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok);
			redirect('admin/barang');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}

	function update_kode_barang()
	{
		$kode_barang = $this->input->post('kode_barang');
		$id = $this->input->post('id');

		$check_kode_barang = $this->m_barang->get_kode_barang($kode_barang);


		if (count($check_kode_barang->result_array()) == 0) {
			$this->m_barang->update_kode_barang($id, $kode_barang);
			redirect('admin/barang');
		} else {
			echo "<script type='text/javascript'>alert('duplikast');";
			echo "window.location.href = '/toko_indrapura/admin/barang';</script>";
			// redirect('admin/barang');
		}
	}

	function update_status_barang()
	{
		$status_barang = $this->input->post("status_barang");
		$id = $this->input->post('id');

		$this->m_barang->update_status_barang($id, $status_barang);
		redirect('admin/barang');
	}

	function hapus_barang()
	{
		if ($this->session->userdata('akses') == '1') {
			$kode = $this->input->post('kode');
			$this->m_barang->hapus_barang($kode);
			redirect('admin/barang');
		} else {
			echo "Halaman tidak ditemukan";
		}
	}


	function print_barcode()
	{
		if ($this->session->userdata("akses") == '1') {
			$data['data_barang_id'] = $this->m_barang->get_list_kode_barang('tbl_barang_v2')->result_array();
			$this->load->view('print/print_barcode', $data);
		} else {
			echo "Halaman Tidak Ditemukan";
		}
	}

	public function initBarcode($paramCode = '123456789')
	{

		if ($this->session->userdata("akses") == '1') {
			$this->zend->load('Zend/Barcode');
			Zend_Barcode::render('code128', 'image', array('text' => $paramCode));
		} else {
			echo "Halaman tidak ditemukan";
		}
	}
}
