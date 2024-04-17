<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAccountLogin($username)
    {
        $sql = "SELECT tl.*, tu.nama FROM tbl_login tl
        INNER JOIN tbl_user tu ON tl.id =  tu.id_login 
        where tl.username = '".$username."'";
        //         echo '<pre>';
		// print_r($sql);die;
        $db = $this->db->query($sql)->result_array();
        return $db; 
    }



}
