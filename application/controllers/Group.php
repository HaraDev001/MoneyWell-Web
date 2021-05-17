<?php


class Group extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('GroupModel');
    }

    public function index($data=NULL)
    {
        $data['groupList'] = $this->GroupModel->getGroupList();

        $this->data['content'] = $this->load->view('group/index', $data, true);

        $this->template();
    }

    public function groupDetail($data=NULL){
        $groupId= $this->input->get('groupId');
        $data['groupInfo'] = $this->GroupModel->getGroupInfo($groupId);
        $data['groupMemberList'] = $this->GroupModel->getGroupMemberList($groupId);
        $data['contributionInfo'] = $this->GroupModel->getContributionInfo($groupId);
        $data['contributionList'] = $this->GroupModel->getContributionList($groupId);
        $data['savingInfo'] = $this->GroupModel->getSavingInfo($groupId);
        $data['savingList'] = $this->GroupModel->getSavingList($groupId);

        $this->data['content'] = $this->load->view('group/memberDetail', $data, true);

        $this->template();
    }
}