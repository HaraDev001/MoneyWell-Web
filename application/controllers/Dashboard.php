<?php


class Dashboard extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('DashboardModel');
    }

    public function index($data=NULL)
    {
//        $year = $this->input->post('year')? $this->input->post('year') : date("Y");
//        $users = $this->BaseModel->getDataArray('user');
//        $data['userCount'] = count($users);
//        $bars = $this->BaseModel->getDataArray('bar');
//        $data['barCount'] = count($bars);
//        $freeTrialBars = $this->DashboardModel->getFreeTrialBars();
//        $data['freeTrialBarCount'] = count($freeTrialBars);
//        $subscriptionBars = $this->BaseModel->getDataArray('bar', 'status', 1);
//        $data['subscriptionBarCount'] = count($subscriptionBars);
//
//        $data['barGraphData'] = $this->DashboardModel->getMonthlyBars(NULL, $year);
//        $data['subscripedGraphData'] = $this->DashboardModel->getMonthlyBars(1, $year);
//        $data['canceledGraphData'] = $this->DashboardModel->getMonthlyBars(2, $year);
//        $data['barOwnerGraphData'] = $this->DashboardModel->getMonthlyBarOwner($year);

//        echo("dashboard index is called");

        $this->data['content'] = $this->load->view('dashboard/index', $data, true);

        $this->template();
    }

//    public function getGraphData()
//    {
//        $status = $this->input->post('status');
//        $year = $this->input->post('year');
//
//        $result = $this->DashboardModel->getMonthlyBars($status, $year);
//        if (empty($result))
//        {
//            $result = '1';
//        }
//
//        echo json_encode($result);
//    }
}