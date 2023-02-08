<?php
class Laporan extends CI_Controller
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
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
	}
	function index()
	{
		if ($this->session->userdata('akses') == '1') {
			$data['data'] = $this->m_barang->tampil_barang();
			$data['kat'] = $this->m_kategori->tampil_kategori();
			$data['jual_bln'] = $this->m_laporan->get_bulan_jual();
			$data['jual_thn'] = $this->m_laporan->get_tahun_jual();
			$this->load->view('admin/v_laporan', $data);
		} else {
			echo "Halaman tidak ditemukan";
		}
	}


	function laporan_transaksi_point()
	{
		$data['data'] = $this->m_laporan->get_list_penjualan_transaksi_point();
		$this->load->view('admin/laporan/v_lap_transaksi_point', $data);
	}

	function laporan_transaksi()
	{
		$data['data'] = $this->m_laporan->get_list_penjualan_transaksi();
		$this->load->view('admin/laporan/v_lap_transaksi', $data);
	}
	function lap_stok_barang()
	{
		$x['data'] = $this->m_laporan->get_stok_barang();
		$this->load->view('admin/laporan/v_lap_stok_barang', $x);
	}
	function lap_data_barang()
	{
		$x['data'] = $this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang', $x);
	}
	function lap_data_penjualan()
	{
		$x['data'] = $this->m_laporan->get_data_penjualan();
		$x['jml'] = $this->m_laporan->get_total_penjualan();
		$this->load->view('admin/laporan/v_lap_penjualan', $x);
	}
	function lap_penjualan_pertanggal()
	{
		$tanggal = $this->input->post('tgl');
		$x['jml'] = $this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data'] = $this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal', $x);
	}
	function lap_penjualan_perbulan()
	{
		$bulan = $this->input->post('bln');
		$x['jml'] = $this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data'] = $this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan', $x);
	}
	function lap_penjualan_pertahun()
	{
		$tahun = $this->input->post('thn');
		$x['jml'] = $this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data'] = $this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun', $x);
	}
	function lap_laba_rugi()
	{
		$bulan_dari = $this->input->post('bln_dari');
		$bulan_ke = $this->input->post('bln_ke');
		// Pecah jadi Bulan dan Tahun
		// $bln_awal = $this->formatDateLaporanLabaRugi($bulan_dari, 'bulan');
		// $thn_awal = $this->formatDateLaporanLabaRugi($bulan_dari, 'tahun');
		// $bln_akhir = $this->formatDateLaporanLabaRugi($bulan_ke, 'bulan');
		// $thn_akhir = $this->formatDateLaporanLabaRugi($bulan_ke, 'tahun');

		// Simpan data Sementara
		// $thn_awal_dump = $thn_awal;
		// $thn_akhir_dump = $thn_akhir;
		// $bln_awal_dump = $bln_awal;
		// $bln_akhir_dump = $bln_akhir;

		// Cek Jika Tahun Akhir > Tahun Awal , di ganti karena data tidak muncul jika Data Besar dulu , baru data kecil, untuk bulan disesuaikan dengan tahun yang ditukar
		// if ($thn_awal > $thn_akhir) {
		// 	$thn_akhir = $thn_awal_dump;
		// 	$thn_awal = $thn_akhir_dump;

		// 	$bln_awal = $bln_akhir_dump;
		// 	$bln_akhir = $bln_awal_dump;
		// }

		// $x['jml'] = $this->m_laporan->get_total_lap_laba_rugi($thn_awal, $thn_akhir, $bln_awal, $bln_akhir);
		$x['jml'] = $this->m_laporan->get_total_lap_laba_rugi($bulan_dari, $bulan_ke);
		$x['data'] = $this->m_laporan->get_lap_laba_rugi($bulan_dari, $bulan_ke);
		// $x['data'] = $this->m_laporan->get_lap_laba_rugi($thn_awal, $thn_akhir, $bln_awal, $bln_akhir);
		$this->load->view('admin/laporan/v_lap_laba_rugi', $x);
	}

	// Fungsi untuk keperluan tanggal laporan laba rugi
	function formatDateLaporanLabaRugi($date_str, $type)
	{
		// date str -> November 2016
		$str = explode(" ", $date_str);

		// explode -> array([0]=>November,[1]=>2016)
		$date = "";
		if ($type == "bulan") {
			// change name of month to number of month
			$date = date("m", strtotime($str[0]));
		}
		if ($type == "tahun") {

			$date = $str[1];
		}
		return $date;
	}
}
