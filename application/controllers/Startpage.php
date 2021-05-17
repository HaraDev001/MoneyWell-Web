<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startpage extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        header('Cache-Control: no cache');
    }

    public function index(){
        $this->load->view('startpage');
    }
}
