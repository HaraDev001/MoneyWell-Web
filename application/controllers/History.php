<?php

class History extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('HistoryModel');
    }

    public function index($data=NULL)
    {
        $this->data['content'] = $this->load->view('user/index', $data, true);

        $this->template();
    }

    public function contribution($data=NULL)
    {
        $data['contributionList'] = $this->HistoryModel->getContributionList();
        $this->data['content'] = $this->load->view('history/contribution', $data, true);

        $this->template();
    }

    public function saving($data=NULL)
    {
        $data['savingList'] = $this->HistoryModel->getSavingList();
        $this->data['content'] = $this->load->view('history/saving', $data, true);

        $this->template();
    }

    public function privatesent($data=NULL)
    {
        $data['privateList'] = $this->HistoryModel->getPrivateList();
        $this->data['content'] = $this->load->view('history/privatesent', $data, true);

        $this->template();
    }

    public function donation($data=NULL)
    {
        $data['donationList'] = $this->HistoryModel->getDonationList();
        $this->data['content'] = $this->load->view('history/donation', $data, true);

        $this->template();
    }

    public function contributionDetail($data=NULL)
    {
        $contributionId= $this->input->get('contributionId');
        $data['contributionDetail'] = $this->HistoryModel->getContributionDetail($contributionId);
        $this->data['content'] = $this->load->view('history/contributionDetail', $data, true);

        $this->template();
    }

    public function savingDetail($data=NULL)
    {
        $savingTransactionId= $this->input->get('savingTransactionId');
        $data['savingDetail'] = $this->HistoryModel->getSavingDetail($savingTransactionId);
        $this->data['content'] = $this->load->view('history/savingDetail', $data, true);

        $this->template();
    }
    public function privateDetail($data=NULL)
    {
        $privateSentId= $this->input->get('privateSentId');
        $data['privateDetail'] = $this->HistoryModel->getPrivateDetail($privateSentId);
        $this->data['content'] = $this->load->view('history/privateDetail', $data, true);

        $this->template();
    }

    public function donationDetail($data=NULL)
    {
        $donationId= $this->input->get('donationId');
        $data['donationDetail'] = $this->HistoryModel->getDonationDetail($donationId);
        $this->data['content'] = $this->load->view('history/donationDetail', $data, true);

        $this->template();
    }


}