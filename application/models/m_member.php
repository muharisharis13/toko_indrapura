<?php

class M_member extends CI_Model
{

  function get_list_member()
  {
    return $this->db->query(
      "select * from tbl_member order by id desc"
    );
  }

  function getNoMember()
  {
    $hsl = $this->db->query(
      "select id from tbl_member order by id desc limit 1"
    )->row();
    $id = $hsl->id;
    $tahun = date("Y");
    $bulan = date("m");
    $id += 1;
    $no_member = sprintf("%03s", $id);
    $no_member = "MBR" . $tahun . $bulan . $no_member;
    return $no_member;
  }

  function tambah_member($no_hp, $nama_user, $alamat)
  {
    $no_member = $this->getNoMember();
    return $this->db->query(
      "insert into tbl_member (no_member,no_hp_user,nama_user,alamat,point,uang)
      values
      ('$no_member','$no_hp','$nama_user','$alamat',0,0)
      "
    );
  }

  function hapus_member($id)
  {
    return $this->db->query(
      "delete from tbl_member where id=$id"
    );
  }

  function get_detail_member($id)
  {
    return $this->db->query(
      "select * from tbl_member where id=$id"
    )->row();
  }

  function get_detail_product($id_product)
  {

    return $this->db->query(
      "select * from tbl_barang where barang_id='$id_product'"
    )->row();
  }
}
