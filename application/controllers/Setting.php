<?php

class Setting extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('SettingModel');
    }

    public function index($data=NULL)
    {
        $this->data['content'] = $this->load->view('setting/index', $data, true);

        $this->template();
    }

    public function edit($data=NULL)
    {
        $adminId = $this->session->userdata('adminId');
        $data['adminDetail'] = $this->SettingModel->getAdminDetail($adminId);
        $this->data['content'] = $this->load->view('setting/edit', $data, true);

        $this->template();
    }

    public function donation($data=NULL)
    {
        $data['donationList'] = $this->SettingModel->getDonationList();
        $this->data['content'] = $this->load->view('setting/donation', $data, true);

        $this->template();
    }

    public function help($data=NULL)
    {
        $data['helpList'] = $this->SettingModel->getHelpList();
        $this->data['content'] = $this->load->view('setting/help', $data, true);

        $this->template();
    }

    public function editDetail($data= NULL){
        $this->load['content'] = $this->load->view('setting/editDetail', $data, true);

        $this->template();
    }

    public function helpDetail($data=NULL){
        $helpId= $this->input->get('helpId');
        $data['helpDetail'] = $this->SettingModel->getHelpDetail($helpId);
        $this->data['content'] = $this->load->view('setting/helpDetail', $data, true);

        $this->template();
    }


}