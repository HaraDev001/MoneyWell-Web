<?php

class Admin extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('AdminModel');
    }

    public function index($data=NULL)
    {
        $data['adminList'] = $this->AdminModel->getAdminList();
        $this->data['content'] = $this->load->view('admin/index', $data, true);

        $this->template();
    }

    public function adminDetail($data=NULL)
    {
        $adminId= $this->input->get('adminId');
        $data['adminDetail'] = $this->AdminModel->getAdminDetail($adminId);
        $this->data['content'] = $this->load->view('admin/adminDetail', $data, true);

        $this->template();
    }


}