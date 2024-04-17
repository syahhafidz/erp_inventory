<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $index;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login', 'ml');
		// $this->load->model('m_dashboard', 'mdash');
		// $this->index  = $this->mdash->getDataIndex();
	}

	public function getModuleName()
	{
		return 'Login';
	}

	public function getHeaderJSandCSS()
	{
		//versioning
		$version = str_shuffle("1234567890abcdefghijklmnopqrstuvwxyz");
		$version = substr($version, 0, 11);
		//versioning

		$this->load->helper('url');
		$base_url = base_url();

		$data = array(
			'<script src=' . $base_url . 'assets/js/jquery-1.9.1.js></script>',
			'<link rel="stylesheet" href=' . $base_url . 'assets/css/toastr.css>',
			'<link rel="stylesheet" href=' . $base_url . 'assets/css/css-loader.css>',
			// '<link rel="stylesheet" href="assets/css/bootstrap.min.css" />',
			// '<script src="assets/js/bootstrap.min.js"></script>',
			'<script src='. $base_url . 'assets/js/message.js></script>',
			'<script src=' . $base_url . 'assets/js/toastr.js></script>',
			'<script src=' . $base_url . 'assets/js/url.js></script>',
			'<script src=' . $base_url . 'assets/js/bootbox.min.js></script>',
			'<script src=' . $base_url . 'assets/js/login/login.js?v=' . $version . '></script>',
			// $version,
		);
		return $data;
	}

	public function index()
	{
		// echo '<pre>';print_r(123);die;

		$this->load->helper('url');
		$data['base_url'] = base_url();
		$data['header'] = $this->getHeaderJSandCSS();
		$this->load->view('v_login', $data);
	}

	public function ChekDataLogin()
	{
		session_start();
	
		if (isset($_POST['captcha']) && $_POST['captcha']) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$captcha  = $_POST['captcha'];
			
			$cekData  = $this->ml->ChekDataLogin($username);

			if (!empty($cekData[0])) {
				$user_data = $cekData[0];
				if (password_verify($password, $user_data['password'])) {
					$_SESSION["username"] = $username;
					$_SESSION["password"] = $password;
					$_SESSION["captca"] = $captcha;
					$_SESSION['token'] = md5(uniqid(mt_rand(), true));
					echo 1; 
				} else {
					echo 0;
				}
			} else {
				echo 0; 
			}
		} else {
			echo -1;
		}
		// unset($_SESSION['captcha']);
	}

	



	public function daftarUser()
	{
		$data['header'] = $this->getHeaderJSandCSS();
		$this->load->view('v_daftar', $data);
	}
}
