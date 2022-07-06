<?php

  class Common_model extends CI_model
  {

    function insertData($table, $dataArray)
    {
      return $this->db->insert($table, $dataArray);
    }
    function get_data($table)
    {
      return $this->db->get($table);
    }
    function get_Where($table, $array)
    {
      return $this->db->where($array)->get($table);
    }
  }



 ?>
