<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_model extends CI_Model
{
    private $_table = "tbl_tingkat";

    public function getAllData() 
    {
        return $this->db->get($this->_table)->result();
    }
}