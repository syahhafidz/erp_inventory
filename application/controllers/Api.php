<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function list_user() {
        $sql = "SELECT tr.id_user, tl.username, tl.status, tr.nama_module AS hak_akses 
                FROM tbl_user tu
                INNER JOIN tbl_role tr ON tu.id = tr.id_user
                INNER JOIN tbl_login tl ON tu.id_login = tl.id";

        $users = $this->db->query($sql)->result_array();

        $arrayuser = array();

        foreach($users as $user){
            $arrayuser[] = array(
                "id" => $user['id_user'],
                "username" => $user['username'],
                "status" => $user['status'],
                "hak_akses" => $user['hak_akses']
            );
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($arrayuser));
    }
}
