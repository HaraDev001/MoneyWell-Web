<?php

class Feed extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }

    public function index($data=NULL)
    {
        $this->data['content'] = $this->load->view('feed/index', $data, true);

        $this->template();
    }

}