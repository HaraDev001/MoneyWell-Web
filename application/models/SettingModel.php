<?php

class SettingModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getDonationList()
    {
        $sql = "select d.* 
                from donation as d
        ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getHelpList()
    {
        $sql = "select h.*, a.name as creater_name
                from help_content as h
                inner join admin as a on h.creater_id = a.id
        ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function getHelpDetail($helpId)
    {
        $sql = "select h.*, a.name as creater_name
                from help_content as h
                inner join admin as a on h.creater_id = a.id
                where h.id = $helpId
        ";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
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