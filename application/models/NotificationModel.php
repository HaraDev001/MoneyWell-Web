<?php

class NotificationModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getPushList(){
        $sql = "select np.*
                from notification_push as np
                where np.type = 1
                ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getPushDetail($pushId){
        $sql = "select np.*
                from notification_push as np
                where np.id = $pushId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getNotificationUserList(){
        $sql = "select nu.*, us.name as sender_name, ur.name as receiver_name
                from notification_user as nu
                left join user as us on nu.sender_id = us.id
                left join user as ur on nu.receiver_id = ur.id
                where nu.type = 1";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getUserNotificationDetail($notificationUserId){
        $sql = "select nu.*, us.name as sender_name, ur.name as receiver_name
                from notification_user as nu
                left join user as us on nu.sender_id = us.id
                left join user as ur on nu.receiver_id = ur.id
                where nu.id = $notificationUserId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }


    function getNotificationPrivateList(){
        $sql = "select nu.*, us.name as sender_name, ur.name as receiver_name
                from notification_user as nu
                left join user as us on nu.sender_id = us.id
                left join user as ur on nu.receiver_id = ur.id
                where nu.type = 2";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getPrivateDetail($notificationUserId){
        $sql = "select nu.*, us.name as sender_name, ur.name as receiver_name
                from notification_user as nu
                left join user as us on nu.sender_id = us.id
                left join user as ur on nu.receiver_id = ur.id
                where nu.id = $notificationUserId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getNotificationGroupList(){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 1";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getGroupNotificationDetail($notificationGroupId){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 1
                and ng.id = $notificationGroupId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getNotificationContributionList(){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 2";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getContributionNotificationDetail($notificationContributionId){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 2
                and ng.id = $notificationContributionId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getNotificationGoalList(){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 3";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getGoalNotificationDetail($notificationGoalId){
        $sql = "select ng.*, us.name as sender_name, gt.name as group_name
                from notification_group as ng
                left join user as us on ng.sender_id = us.id
                left join group_table as gt on ng.receiver_group_id = gt.id
                where ng.type = 3
                and ng.id = $notificationGoalId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getDonationList(){
        $sql = "select np.*
                from notification_push as np
                where np.type = 2
                ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getDonationDetail($donationNotificationId){
        $sql = "select np.*
                from notification_push as np
                where np.id = $donationNotificationId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

}