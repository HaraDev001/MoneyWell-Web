<?php

class CommunicationModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Shanghai');
    }

    function getUser($email, $password){
        $sql = "select u.*
                    from user as u
                    where u.email = '".$email."'
                    and u.password = '".$password."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getHelpContent(){
        $sql = "select h.content
                from help_content as h";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getVerificationCode($email){
        $sql = "select vl.*
                    from email_verification_log as vl 
                    where vl.email = '".$email."'
                    ORDER BY send_time desc
                    limit 1";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function updateImageData($dbName, $postData, $uploadId){
        $this->db->where('id', $uploadId);
        $this->db->update($dbName, $postData);
    }

    function getNationList(){
        $sql = "select *
            from `nation`";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getGroupList($userId, $searchKey){
        $sql = "select gt.*, u.name as admin_name
            from `group_table` as gt
            left join user as u
            	on gt.`super_admin_id` = u.id
            where gt.`name` like '%".$searchKey."%'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getUserGroupList($userId){
        $sql = "select gt.*, u.`name` as admin_name
            from `group_user` as gu
            join `group_table` as gt
                on gu.`group_id` = gt.`id`
            left join user as u
            on gt.`super_admin_id` = u.id
            where gu.user_id = '".$userId."'
            and gt.`deleted_status` = 0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getGroupInformation($groupId){
        $sql = "select gt.*, u.name as admin_name
            from `group_table` as gt
            left join user as u 
                on gt.`super_admin_id` = u.id
            where gt.`id` = '".$groupId."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getGroupMember($groupId){
        $sql = "select gu.*, u.`name`, u.`photo_url`, u.`user_entity_id`, u.`email`
            from group_user as gu
            left join user as u
            on gu.user_id = u.id
            where gu.group_id = '".$groupId."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getMemberGroupList($userId){
        $sql = "select gu.group_id
                from group_user as gu
                where gu.user_id = '".$userId."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getGroupMemberCount($groupId){
        $sql = "select gu.*
        from group_user as gu
            where gu.group_id = '".$groupId."'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function checkGroupUser($groupId, $userId){
        $sql = "select gu.*
        from group_user as gu
            where gu.group_id = '".$groupId."'
            and gu.user_id = '".$userId."'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function getGroupGoalCount($groupId){
        $sql = "select *
        from goal
            where group_id = '".$groupId."'";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    function getDonationInformation($userId){
        $sql = "select *
        from donation
        order by id DESC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getUserDonateAmount($userId){
        $sql = "select SUM(dth.`amount`) as donation_amount
            from `donation_transaction_history` as dth
            where dth.`user_id` = '".$userId."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getContributionInformation($groupId){
        $sql = "select gch.*, u.`name` as receiver_name
                from group_contribution_history as gch
                left join user as u
                on gch.receiver_user_id = u.id
                where gch.group_id = '".$groupId."'
                order by gch.id desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getUserContributionStatus($groupId, $userId){
        $sql = "select gu.contribution_active_status
                from group_user as gu
                where gu.group_id = '".$groupId."'
                and gu.user_id = '".$userId."'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getGroupNotification($userId){
        $sql = "select ng.*, gt.`photo_url`, gt.id as group_id
                from group_user as gu
                right join notification_group as ng
                on gu.group_id = ng.`receiver_group_id`
                left join group_table as gt
                on gu.group_id = gt.id
                where gu.user_id = '".$userId."'
                order by id desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getUserNotification($userId){
        $sql = "select nu.*, u.photo_url, u.id as user_id
                from notification_user as nu
                left join user as u
                on nu.receiver_id = u.id
                where nu.receiver_id = '".$userId."'
                order by id desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getSystemNotification(){
        $sql = "select np.*
                from notification_push as np
                order by id desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

}