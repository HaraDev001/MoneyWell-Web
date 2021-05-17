<?php

class GoalModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getSavingList(){
        $sql = "select go.*, SUM(sth.save_amount) as current_amount
                from goal as go
                left join saving_transaction_history as sth on go.id = sth.goal_id
                where go.current_status = 1
                group by go.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getGoalInfo($goalId){
        $sql = "select go.*, gt.name as group_name, gt.photo_url as group_photo, u.name as super_name, SUM(sth.save_amount) as current_amount
                from goal as go
                inner join group_table as gt on go.group_id = gt.id
                inner join user as u on gt.super_admin_id = u.id
                left join saving_transaction_history as sth on go.id = sth.goal_id
                where go.current_status = 1 and go.id = $goalId
                group by go.id";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function getGoalList($goalId){
        $sql = "select sth.*, u.*, SUM(sth.save_amount) as total_save_amount, n.name as nation_name
                from saving_transaction_history as sth
                inner join user as u on sth.user_id = u.id
                inner join nation as n on u.nation_id = n.id
                where sth.goal_id = $goalId
                group by u.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }


}