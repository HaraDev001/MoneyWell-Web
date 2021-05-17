<?php


class DashboardModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Shanghai');
    }

    function getFreeTrialBars()
    {
        $sql = "select b.* from bar as b
                where b.billing_date >= CAST(CURRENT_TIMESTAMP AS DATE)
                ";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getMonthlyBars($status = NULL, $year = NULL)
    {
        if (empty($year))
            $year = date("Y");

        if (empty($status))
            $status = true;

        $sql = "SELECT YEAR(reg_date) AS y, MONTH(reg_date) AS m, COUNT(DISTINCT id) AS barCount
                FROM bar
                WHERE YEAR(reg_date) = $year  and status = $status
                GROUP BY m
                ";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    function getMonthlyBarOwner($year = NULL)
    {
        if (empty($year))
            $year = date("Y");

        $sql = "SELECT YEAR(reg_date) AS y, MONTH(reg_date) AS m, COUNT(DISTINCT user_id) AS ownerCount
                FROM bar
                WHERE YEAR(reg_date) = $year
                GROUP BY m
                ";

        $result = $this->db->query($sql);

        return $result->result_array();
    }
}