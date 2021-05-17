<?php

class Advertisement extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }

    public function index($data=NULL)
    {
        $this->data['content'] = $this->load->view('advertisement/index', $data, true);

        $this->template();
    }

}