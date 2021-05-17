<?php

class HistoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getContributionList(){
        $sql = "select cth.*, u.name as sender_name, su.name as receiver_name, gt.name as group_name
                from contribution_transaction_history as cth
                inner join user as u on cth.user_id = u.id
                inner join group_contribution_history as gch on cth.group_contribution_history_id = gch.id
                inner join user as su on gch.receiver_user_id = su.id
                inner join group_table as gt on gch.group_id = gt.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getContributionDetail($contributionId){
        $sql = "select cth.*, u.name as sender_name, u.email as sender_email, u.phone_number as sender_phone_number, u.photo_url as sender_photo_url, su.name as receiver_name, su.email as receiver_email, su.phone_number as receiver_phone_number, su.photo_url as receiver_photo_url, gt.name as group_name, gt.photo_url as group_photo, gt.contribution_image_url, au.name as admin_name
                from contribution_transaction_history as cth
                inner join user as u on cth.user_id = u.id
                inner join group_contribution_history as gch on cth.group_contribution_history_id = gch.id
                inner join user as su on gch.receiver_user_id = su.id
                inner join group_table as gt on gch.group_id = gt.id
                inner join user as au on gt.super_admin_id = au.id
                where cth.id = $contributionId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getSavingList(){
        $sql = "select sth.*, u.name as user_name, go.goal_name, gt.name as group_name
                from saving_transaction_history as sth
                inner join user as u on sth.user_id = u.id
                inner join goal as go on sth.goal_id = go.id
                inner join group_table as gt on go.group_id = gt.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getSavingDetail($savingTransactionId){
        $sql = "select sth.*, u.name as user_name, u.email as user_email, u.phone_number, u.photo_url as user_photo, go.goal_name, go.goal_amount, go.current_amount, go.photo_url as goal_photo, gt.name as group_name, gt.photo_url as group_photo, us.name as admin_name
                from saving_transaction_history as sth
                inner join user as u on sth.user_id = u.id
                inner join(
                    select g.*, SUM(sh.save_amount) as current_amount
                    from goal as g
                    inner join saving_transaction_history as sh on g.id = sh.goal_id
                ) as go on sth.goal_id = go.id
                inner join group_table as gt on go.group_id = gt.id
                inner join user as us on gt.super_admin_id = us.id
                where sth.id = $savingTransactionId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }


    function getPrivateList(){
        $sql = "select ph.*, us.name as sender_name, ur.name as receiver_name
                from private_sent_transaction_history as ph
                inner join user as us on ph.sent_user_id = us.id
                inner join user as ur on ph.received_user_id = ur.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getPrivateDetail($privateSentId){
        $sql = "select ph.*, us.name as sender_name, us.email as sender_email, us.phone_number as sender_phone_number, us.photo_url as sender_photo, ur.name as receiver_name, ur.email as receiver_email, ur.phone_number as receiver_phone_number, ur.photo_url as receiver_photo
                from private_sent_transaction_history as ph
                inner join user as us on ph.sent_user_id = us.id
                inner join user as ur on ph.received_user_id = ur.id
                where ph.id = $privateSentId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getDonationList(){
        $sql = "select dth.*, d.name as donation_name, u.name as user_name
                from donation_transaction_history as dth
                inner join donation as d on dth.donation_id = d.id
                inner join user as u on dth.user_id = u.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getdonationDetail($donationId){
        $sql = "select dth.*, d.name as donation_name, d.photo_url as donation_photo, d.amount as donation_amount, u.name as user_name, u.photo_url as user_photo, u.email as user_email, SUM(dh.amount) as total_amount
from donation_transaction_history as dth
inner join donation as d on dth.donation_id = d.id
inner join user as u on dth.user_id = u.id
left join donation_transaction_history as dh on u.id = dh.user_id
where dth.id = $donationId";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

}