<?php
class M_barang extends CI_Model
{

	private $table = "tbl_barang";
	private $primary = "barang_id";
	var $column_order = array('id', 'barang_id', 'barang_nama', 'barang_satuan', 'barang_status', 'barang_harpok', 'barang_harjul', 'barang_harjul_grosir', 'barang_stok', 'barang_min_stok', 'barang_kategori_id',  null); //set column field database for datatable orderable
	var $column_search = array('barang_id', 'barang_nama'); //set column field database for datatable searchable 
	var $order = array('id' => 'DESC'); // default order 
	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tbl_kategori', 'tbl_kategori.kategori_id=tbl_barang.barang_kategori_id');

		$i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	function hapus_barang($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_barang where id='$kode'");
		return $hsl;
	}

	function update_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok)
	{
		$user_id = $this->session->userdata('idadmin');
		$hsl = $this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang()
	{
		$hsl = $this->db->query("SELECT id,barang_id,barang_status,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		return $hsl;
	}
	function tampil_barang_grosir()
	{
		$hsl = $this->db->query("SELECT id,barang_id,barang_status,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id where barang_status='ready'");
		return $hsl;
	}
	function cari_barang()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->where('barang_stok >', 0);
		$this->db->where('barang_status =', 'ready');
		$this->db->join('tbl_kategori', 'tbl_kategori.kategori_id=tbl_barang.barang_kategori_id');
		$data = $this->db->get();
		return $data;
	}

	function simpan_barang($kobar, $nabar, $kat, $satuan, $harpok, $harjul, $harjul_grosir, $stok, $min_stok)
	{
		$user_id = $this->session->userdata('idadmin');
		$hsl = $this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}


	function get_kode_barang($kode_barang)
	{
		$hsl = $this->db->query("select barang_id from tbl_barang where barang_id='$kode_barang'");
		return  $hsl;
	}


	function update_status_barang($id, $status_barang)
	{
		return $this->db->query("update tbl_barang set barang_status='$status_barang' where id=$id");
	}

	function update_kode_barang($id, $kode_barang_baru)
	{
		$hsl = $this->db->query("update tbl_barang set barang_id='$kode_barang_baru' where id=$id");

		return $hsl;
	}


	function get_barang($kobar)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar' and barang_status='ready'");
		return $hsl;
	}

	function get_list_kode_barang()
	{
		return $this->db->query("SELECT barang_id,barang_nama,barang_stok FROM tbl_barang");
	}

	function get_kobar()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
		$kd = "";
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $k) {
				$tmp = ((int)$k->kd_max) + 1;
				$kd = sprintf("%06s", $tmp);
			}
		} else {
			$kd = "000001";
		}
		return "BR" . $kd;
	}

	function ready_all()
	{
		$this->db->where("barang_id !=", "");
		$this->db->where("barang_status", "input");
		$this->db->set("barang_status", "ready");

		$hsl = $this->db->update("tbl_barang");

		return $hsl;
	}
}
