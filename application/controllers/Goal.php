<?php


class Goal extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('GoalModel');
    }

    public function index($data=NULL)
    {
        $data['savingList'] = $this->GoalModel->getSavingList();

        $this->data['content'] = $this->load->view('goal/index', $data, true);

        $this->template();
    }

    public function goalDetail($data=NULL)
    {
        $goalId= $this->input->get('goalId');
        $data['goalInfo'] = $this->GoalModel->getGoalInfo($goalId);
        $data['goalList'] = $this->GoalModel->getGoalList($goalId);

        $this->data['content'] = $this->load->view('goal/goalDetail', $data, true);

        $this->template();
    }
}