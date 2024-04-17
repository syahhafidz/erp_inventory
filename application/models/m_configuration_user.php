<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_configuration_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dataUser()
    {
        $sql = " SELECT tl.*, tu.nama , tu.alamat, tu.tgl_lahir, tu. no_telp FROM tbl_login tl
        INNER JOIN tbl_user tu ON tl.id =  tu.id_login  ";
        //         echo '<pre>';
		// print_r($sql);die;
        $db = $this->db->query($sql)->result_array();
        return $db; 
    }

    public function saveUser($data)
    {
        // echo '<pre>';print_r($data);die;
        date_default_timezone_set('Asia/Jakarta');
        $datenow = date("Y-m-d H:i:s");

        $result     = false;
        $this->db->trans_begin();
        try {
            $login['username']   = $data['username'];
            $login['password']   = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->insert('tbl_login', $login);
            $id_login = $this->db->insert_id();
 
            $user['id_login']   = $id_login;
            $user['nama']       = $data['nama'];
            $user['alamat']     = $data['alamat'];
            $user['tgl_lahir']  = $data['tgl_lahir'];
            $user['no_telp']    = $data['no_telp'];
            $this->db->insert('tbl_user', $user);
    

            $this->db->trans_commit();
            $result['is_valid'] = true;
        } catch (\Exception $e) {
            $this->db->trans_rollback();
        }
        return $result;
    }


}
