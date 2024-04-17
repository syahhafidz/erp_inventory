<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_role_menu extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDataUser()
    {
        $sql = "select * from tbl_user";
        $db = $this->db->query($sql)->result_array();
        return $db; 
    }

    public function selectRoleByUser($data){
        $sql = "SELECT tr.id_user, tl.username, tl.status, tr.nama_module AS hak_akses FROM tbl_user tu
        INNER JOIN tbl_role tr ON tu.id = tr.id_user
        INNER JOIN tbl_login tl ON tu.id_login = tl.id where tu.nama = '".$data['user']."'";

        // echo '<pre>';print_r($data);die;
        $db = $this->db->query($sql)->result_array();
        return $db; 
    }


}
