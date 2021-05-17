<?php

class BaseModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function updateItemData($dbName, $updateData, $itemId, $fieldName = 'id')
    {
        if (empty($itemId))
        {
            $this->db->insert($dbName, $updateData);
        }
        else
        {
            $this->db->where($fieldName, $itemId);
            $this->db->update($dbName, $updateData);
        }
    }

    public function deleteItems($dbName, $delIds, $delFields = 'id')
    {
        for ($i = 0; $i < count($delIds); $i++)
        {
            $this->db->where($delFields, $delIds[$i]);
            $this->db->delete($dbName);
        }
    }

    // <<<< billy_ADD_20170809
    public function getDataArray($dbName, $searchField = null, $searchKey = null, $sortKey = null, $sortType = null)
    {
        if ($searchKey != null)
            $this->db->where($searchField, $searchKey);

        if ($sortKey != null)
            $this->db->order_by($sortKey, $sortType);

        $result = $this->db->get($dbName);
        return $result->result_array();
    }
    // >>>>

    // <<<< clark_ADD_20170809
    function getLastId($tableName)
    {
        $sql = "select if (max(t.id), max(t.id), 0) as LastId from $tableName as t";

        $result = $this->db->query($sql);

        return $result->result_array();
    }
    // >>>>

    function getMaxOrderNo($tableName)
    {
        $sql = "select if (max(t.sequence), max(t.sequence), 0) as MaxOrderNo from $tableName as t";

        $result = $this->db->query($sql);

        return $result->result_array();
    }

    public function getSearchSql($arrayData, $timeFieldList, $whereFlag = 0)
    {
        $sql = "";
        $where = "";
        $sort_key = "";
        $sort_type = "asc";
        $group_key = "";


        if(!empty($arrayData))
        {
            foreach ($arrayData as $key => $value)
            {
                if(/*$value == NULL || */trim($value) == '')
                    continue;

                if($key == "sort_key")
                {
                    $sort_key = $value;
                    continue;
                }

                if($key == "sort_type")
                {
                    $sort_type = $value;
                    continue;
                }

                if($key == "group_key")
                {
                    $group_key = $value;
                    continue;
                }

                if($key == "timeField")
                    continue;


                if(empty($where) && $whereFlag == 0)
                    $where = " where ";
                else
                    $where .= " and ";

                if (strpos($key, 'startdate') !== false || strpos($key, 'enddate') !== false)
                {
                    if(!empty($timeFieldList))
                    {
                        foreach ($timeFieldList as $k => $v)
                        {
                            if ($key == "startdate" . ($k + 1))
                                $where .= " timestamp($v) >= timestamp('$value') ";
                            else if($key == "enddate"  . ($k + 1))
                                $where .= " timestamp($v) <= timestamp('$value') ";
                        }
                    }
                }
                /*else if (!strpos($key, 'Code') && (is_numeric($value) || strpos($key, "Id") > 0))
                    $where .= $key." = '".$value."'";*/
                else if (strpos($key, 'status') > 0 || strpos($key, 'result') > 0 || strpos($key, "_id") > 0)
                {
                    if ((int)$value >= 0)
                    {
                        $where .= $key." = '".$value."'";
                    }
                    else
                    {
                        $where .= $key." >= '".abs($value)."'";
                    }
                }
                else
                    $where .= $key." like '%".$value."%'";
            }
        }

        $sql .= $where;
        if(!empty($group_key))
            $sql .= " group by $group_key ";

        if(!empty($sort_key))
            $sql .= " order by $sort_key $sort_type";

        return $sql;
    }
}