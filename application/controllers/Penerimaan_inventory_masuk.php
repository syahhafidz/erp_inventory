<?php
defined('BASEPATH') or exit('No direct script access allowed');
session_start();
class Penerimaan_inventory_masuk extends CI_Controller
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
        $this->load->model('m_role_menu', 'mru');
        $this->load->model('m_dashboard', 'mdash');
        $this->load->model('m_inventory', 'minv');
        
    }

    public function getModuleName()
    {
        return 'Permintaan_inventory_masuk';
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
            '<script src="'.base_url(). '/assets/js/role_menu/role_menu.js?v=' . $version . '"></script>',
            '<script src="'.base_url(). '/assets/js/content/dashboard_content.js?v=' . $version . '"></script>',
            '<script src="'.base_url(). '/assets/js/penerimaan/penerimaan.js?v=' . $version . '"></script>',
        );

        return $data;
    }

    public function index()
    {
        // echo '<pre>';print_r(123);die;
		$username = $this->user; 
        if($username != null){
            $data['title']     = 'Penerimaan';
            $data['sub_title'] = 'Penerimaan';
            $data['userlogin'] = $username; //$username;
            $data['header']    = $this->getHeaderJSandCSS();
            $data['account_login'] = $this->mdash->getAccountLogin($username);
            $data['purchase_order'] = $this->minv->getPenerimaan();
            $data['base_url']  = base_url();
            templates('v_penerimaan', $data);
        }
    }

    public function addPenerimaan(){
        $username = $this->user; 
        if($username != null){
            $data['generare_no_penerimaan'] = $this->generateNomorPenerimaan();
            $data['purchase_order_approve'] = $this->minv->getDataPurchaseOrder();
            $data['barang'] = $this->minv->getInventory();
            // echo '<pre>';print_r($data);die;
            $this->load->view('v_add_penerimaan', $data);
        }
    }

    public function generateNomorPenerimaan()
    {
        $permintaan = $this->minv->getPenerimaan();
        
        if($permintaan != null){
            $last_permintaan = end($permintaan); 
            $parts = explode('/', $last_permintaan['no_penerimaan']); 
            // echo '<pre>';print_r($parts);die;
            $sequence_number = $parts[0]; 
            $sequence_number++; 
            $new_no_permintaan = str_pad($sequence_number,strlen($parts[0]), '0', STR_PAD_LEFT) .'/'. $parts[1] . '/' . $parts[2];
        } else {
            $new_no_permintaan = '0001/Penerimaan/2024';
        }        
        
        return $new_no_permintaan;
    } 

    public function simpanData()
    {
        $username = $this->user; 
        if($username != null){
            $savedata = $this->minv->simpanPenerimaan($_POST);
            echo json_encode($savedata);
        }
    }

    public function setStatusPenerimaan()
    {
        $username = $this->user; 
        if($username != null){
            $savedata = $this->minv->setStatusPenerimaan($_POST);
            echo json_encode($savedata);
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
