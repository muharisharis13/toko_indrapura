<?php
class M_cart extends CI_Model
{

    function hapus_tb_cart()
    {
        $hsl = $this->db->query("TRUNCATE TABLE tbl_cart");
        return $hsl;
    }

    function hapus_cart($id)
    {
        $hsl = $this->db->query("DELETE FROM tbl_cart where id='$id'");
        return $hsl;
    }

    function get_cart_by_id($id)
    {
        $hsl = $this->db->query("SELECT * FROM tbl_cart WHERE id='$id'");
        return  $hsl;
    }
    // function update_barang($id,$name,$satuan,$harpok,$price,$disc,$qty,$amount,$subtotal)
    // {
    // 	$user_id = $this->session->userdata('idadmin');
    // 	$hsl = $this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
    // 	return $hsl;
    // }

    function tampil_cart($id_cart_header = null)
    {
        if ($id_cart_header) {
            $hsl = $this->db->query("SELECT * FROM tbl_cart where id_cart=$id_cart_header");
            return $hsl;
        } else {
            $hsl = $this->db->query("SELECT * FROM tbl_cart");
            return $hsl;
        }
    }
    function tampil_cart_header()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_header_cart where 'status_header'='hold'");
        return $hsl;
    }

    function simpan_cart($data)
    {
        // return $this->db->insert('tbl_cart', $data);

        if ($data['id_cart']) {
            return $this->db->insert('tbl_cart', [
                "id" => $data['id'],
                "name" => $data['name'],
                "satuan" => $data['satuan'],
                "price" => $data['price'],
                "disc" => $data['disc'],
                "qty" => $data['qty'],
                "amount" => $data['amount'],
                "subtotal" => $data['subtotal'],
                "id_cart" => $data['id_cart'],
                "harpok" => $data['harpok'],
            ]);
        } else {
            $this->db->insert('tbl_header_cart', [
                'status_header' => 'ok'
            ]);
            $id_header_cart = $this->db->insert_id();
            return $this->db->insert('tbl_cart', [
                "id" => $data['id'],
                "name" => $data['name'],
                "satuan" => $data['satuan'],
                "price" => $data['price'],
                "disc" => $data['disc'],
                "qty" => $data['qty'],
                "amount" => $data['amount'],
                "subtotal" => $data['subtotal'],
                "id_cart" => $id_header_cart,
                "harpok" => $data['harpok'],
            ]);
        }
    }
    function update_qty_cart($qty, $subtotal, $id)
    {
        $hsl = $this->db->query("UPDATE tbl_cart SET qty='$qty',subtotal='$subtotal' WHERE id='$id'");
        return $hsl;
    }
}
