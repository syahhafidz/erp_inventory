<?php
    function templates($dir, $data = array())
    {
        $view = &get_instance();
        $view->load->view('templates/header', $data);
        $view->load->view('templates/sidenav', $data);
        $view->load->view($dir, $data);
        $view->load->view('templates/footer', $data);
    }
?>