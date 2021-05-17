<?php

class UserModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getUserInfo($userId)
    {   $resultData = [];
        $sql = "select  u.*, n.name as nation_name
        from nation as n
        inner join user as u on u.nation_id = n.id
        where u.id = $userId
                ";

        $result = $this->db->query($sql);
        if ($result != null){
            $resultData = $result->result_array()[0];
        }
        return $resultData;
    }

    function getDonationAmount($userId)
    {
        $sql = "select  SUM(amount) as donation_amount
        from donation_transaction_history as d
        where d.user_id = $userId
        ";

        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }
}