<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    // public $dbMysql;

    public function __construct()
    {
        parent::__construct();
        // $this->load->database('default', true); //sql
    }

    public function ChekDataLogin($username)
    {

        $sql = "select * from tbl_login where username = '".$username."'";

        $db = $this->db->query($sql)->result_array();

        return $db;
    }


}
