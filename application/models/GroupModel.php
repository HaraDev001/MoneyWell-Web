<?php

class GroupModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getGroupList()
    {

        $sql = "select g.*, COUNT(gu.id) as member_count, u.name as admin_name, goal_count.cnt as goal_count
                from group_table as g
                inner join group_user as gu on gu.group_id = g.id
                inner join user as u on g.super_admin_id = u.id
                inner join (
                    select count(*) as cnt, group_id 
                    from goal
                    group by group_id
                ) as goal_count on goal_count.group_id = g.id
                where g.deleted_status = 0
                group by g.id";
        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getGroupInfo($groupId)
    {
        $sql = "select g.*, COUNT(gu.id) as member_count, u.name as admin_name 
                from group_table as g
                inner join group_user as gu on gu.group_id = g.id
                inner join user as u on g.super_admin_id = u.id
                where g.id = $groupId
                group by g.id
                ";

        $result = $this->db->query($sql);

        return $result->result_array()[0];
    }


    function getGroupMemberList($groupId)
    {
        $sql = "select gu.*, u.*, n.name as nation_name
                from group_user as gu
                inner join user as u on gu.user_id = u.id
                inner join nation as n on u.nation_id = n.id
                where gu.group_id =$groupId
                ";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getContributionInfo($groupId)
    {
        $sql = "select gc.*, u.name as receiver_name, COUNT(cth.id) as applied_count
        from group_contribution_history as gc
        inner join user as u on gc.receiver_user_id = u.id
        inner join contribution_transaction_history as cth on cth.group_contribution_history_id = gc.id
        where gc.group_id = 1
            and gc.current_active_status = $groupId
                ";

        $result = $this->db->query($sql);

        return $result->result_array()[0];
    }

    function getContributionList($groupId)
    {
        $sql = "select gc.*, u.name as receiver_name, COUNT(cth.id) as applied_count
        from group_contribution_history as gc
        inner join user as u on gc.receiver_user_id = u.id
        inner join contribution_transaction_history as cth on cth.group_contribution_history_id = gc.id
        where gc.group_id = 1
            and gc.current_active_status = $groupId
                ";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getSavingInfo($groupId){
        $sql = "select go.*
        from goal as go
        where go.group_id = $groupId";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function getSavingList($groupId){
        $sql = "select go.*, SUM(sth.save_amount) as current_amount
                from goal as go
                left join saving_transaction_history as sth on go.id = sth.goal_id
                where go.group_id = $groupId
                    and go.current_status = 1
                group by go.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

}