<?php

class Notification extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('NotificationModel');
    }

//    public function index($data=NULL)
//    {
////        $data['userList'] = $this->BaseModel->getDataArray('user', 'status', 1);
//        $this->data['content'] = $this->load->view('notifi/index', $data, true);
//
//        $this->template();
//    }

    public function push($data=NULL)
    {
        $data['pushList'] = $this->NotificationModel->getPushList();
        $this->data['content'] = $this->load->view('notification/push', $data, true);

        $this->template();
    }

    public function user($data=NULL)
    {
        $data['userPushList'] = $this->NotificationModel->getNotificationUserList();
        $this->data['content'] = $this->load->view('notification/user', $data, true);

        $this->template();
    }

    public function group($data=NULL)
    {
        $data['notificationGroupList'] = $this->NotificationModel->getNotificationGroupList();
        $this->data['content'] = $this->load->view('notification/group', $data, true);

        $this->template();
    }

    public function contribution($data=NULL)
    {
        $data['notificationContributionList'] = $this->NotificationModel->getNotificationContributionList();
        $this->data['content'] = $this->load->view('notification/contribution', $data, true);

        $this->template();
    }

    public function goal($data=NULL)
    {
        $data['notificationGoalList'] = $this->NotificationModel->getNotificationGoalList();
        $this->data['content'] = $this->load->view('notification/goal', $data, true);

        $this->template();
    }

    public function privatesent($data=NULL)
    {
        $data['notificationPrivateList'] = $this->NotificationModel->getNotificationPrivateList();
        $this->data['content'] = $this->load->view('notification/privatesent', $data, true);

        $this->template();
    }

    public function donation($data=NULL)
    {
        $data['donationList'] = $this->NotificationModel->getDonationList();
        $this->data['content'] = $this->load->view('notification/donation', $data, true);

        $this->template();
    }

    public function pushDetail($data=NULL)
    {
        $pushId= $this->input->get('pushId');
        $data['pushDetail'] = $this->NotificationModel->getPushDetail($pushId);
        $this->data['content'] = $this->load->view('notification/pushDetail', $data, true);

        $this->template();
    }

    public function userDetail($data=NULL)
    {
        $userNotificationId= $this->input->get('userNotificationId');
        $data['userNotificationDetail'] = $this->NotificationModel->getUserNotificationDetail($userNotificationId);
        $this->data['content'] = $this->load->view('notification/userDetail', $data, true);

        $this->template();
    }

    public function groupDetail($data=NULL)
    {
        $groupNotificationId= $this->input->get('groupNotificationId');
        $data['groupNotificationDetail'] = $this->NotificationModel->getGroupNotificationDetail($groupNotificationId);
        $this->data['content'] = $this->load->view('notification/groupDetail', $data, true);

        $this->template();
    }

    public function contributionDetail($data=NULL)
    {
        $contributionNotificationId= $this->input->get('contributionNotificationId');
        $data['contributionNotificationDetail'] = $this->NotificationModel->getContributionNotificationDetail($contributionNotificationId);
        $this->data['content'] = $this->load->view('notification/contributionDetail', $data, true);

        $this->template();
    }

    public function goalDetail($data=NULL)
    {
        $goalNotificationId= $this->input->get('goalNotificationId');
        $data['goalNotificationDetail'] = $this->NotificationModel->getGoalNotificationDetail($goalNotificationId);
        $this->data['content'] = $this->load->view('notification/goalDetail', $data, true);

        $this->template();
    }

    public function privateDetail($data=NULL)
    {
        $privateNotificationId= $this->input->get('privateNotificationId');
        $data['privateNotificationDetail'] = $this->NotificationModel->getPrivateDetail($privateNotificationId);
        $this->data['content'] = $this->load->view('notification/privateDetail', $data, true);

        $this->template();
    }

    public function donationDetail($data=NULL)
    {
        $donationNotificationId= $this->input->get('donationNotificationId');
        $data['donationNotificationDetail'] = $this->NotificationModel->getDonationDetail($donationNotificationId);
        $this->data['content'] = $this->load->view('notification/donationDetail', $data, true);

        $this->template();
    }


}