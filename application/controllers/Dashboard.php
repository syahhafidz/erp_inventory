<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller
{
    public $base_url;
    public $user;
    public $index;

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])){
            header('Location: http://localhost/erp_inventory/');
            error_reporting(0);
        } 
        $this->user = $_SESSION['username'];
        $this->load->model('m_dashboard', 'mdash');
        // $this->index  = $this->mdash->getDataIndex();
        // $user = $this->session->userdata('username');
    }

    public function getModuleName()
    {
        return 'Home';
    }

    public function getHeaderJSandCSS()
    {
        //versioning
        $version = str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz");
        $version = substr($version, 0, 11);
        //versioning

        $data = array(
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>',
            '<link rel="stylesheet" href="' . base_url() . '/assets/css/toastr.css"/>',
            '<link rel="stylesheet" href="' . base_url() . '/assets/css/css-loader.css"/>',
            '<link rel="stylesheet" media="all" type="text/css" href="' . base_url() . '/assets/css/mdi/css/materialdesignicons.min.css">',
            '<script src="'.base_url().'/assets/js/message.js"></script>',
            '<script src="'.base_url().'/assets/js/bootbox.min.js"></script>',
            '<script src="'.base_url().'/assets/js/toastr.js"></script>',
            '<script src="'.base_url().'/assets/js/url.js"></script>',
            '<script src="'.base_url().'/assets/js/bootbox.min.js"></script>',
            '<script src="'.base_url(). '/assets/js/content/dashboard_content.js?v=' . $version . '"></script>',
        );
        return $data;
    }

    public function index()
    {
		$username = $this->user; 
        if($username != null){
			// echo '<pre>';print_r($_SESSION);die;
			
			$data['title'] = 'Dashboard';
            $data['sub_title'] = 'Dashboard';
            $data['userlogin'] = $username; //$username;
            $data['header'] = $this->getHeaderJSandCSS();
            $data['account_login'] = $this->mdash->getAccountLogin($username);
            $data['base_url']  = base_url();
            // $data['notif_permohonan_izin'] = $this->mh->getNotifPermohonanIzin();

            templates('v_dashboard', $data);
        }
    }


    public function logout()
    {
        $is_valid = 0;
        session_destroy();
        $is_valid = 1;
        return $is_valid;
    }

}
