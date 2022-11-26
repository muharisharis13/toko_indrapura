<?php

class M_satuan extends CI_Model
{
  function get_satuan()
  {
    return $this->db->query("SELECT * from tbl_satuan");
  }
}
