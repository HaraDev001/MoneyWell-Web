<?php

class AdminModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getAdminList()
    {
        $sql = "select a.* 
                from admin as a
        ";

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getAdminDetail($adminId)
    {
        $sql = "select a.* 
                from admin as a
                where a.id = $adminId
                ";

        $result = $this->db->query($sql);

        return $result->result_array()[0];
    }
}