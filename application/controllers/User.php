<?php

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserModel');
    }

    public function index($data=NULL)
    {
        $data['userList'] = $this->BaseModel->getDataArray('user', 'delete_status', 0);
        $this->data['content'] = $this->load->view('user/index', $data, true);

        $this->template();
    }

    public function userDetail($data=NULL){
        $userId= $this->input->get('userId');
        $data['userData'] = $this->UserModel->getUserInfo($userId);
        $data['userDonation'] = $this->UserModel->getDonationAmount($userId);

        $this->data['content'] = $this->load->view('user/userDetail', $data, true);
        $this->template();
    }


    public function server_processing()
    {

        $result = [];

        $allData = $this->BaseModel->getDataArray('user', 'delete_status', 0);

        $result["recordsTotal"] = count($allData);
        $result["recordsFiltered"] = count($allData);
        $result["data"] = [];

        for ($i = $_GET['start']; $i < $_GET['start'] + $_GET['length']; $i++)
        {
            if ($i < count($allData))
            {
                $value = $allData[$i];

                $button = "<div style='text-align: center;'><button class='btn btn-primary' onclick='pageMove(\"/order/orderDetail?orderId=" . $value['id'] .  "\");'>查看</button></div>";

                $item = [$i + 1, $value['name'], $value['paypal_email'], $value['email'], $button];
                array_push($result["data"], $item);
            }
        }

        echo json_encode($result);
    }

    public function disableUser()
    {
        $itemId = $this ->input->post('userId');
        if (empty($itemId))
            echo json_encode('0');
        else{
            echo json_encode('1');
        }

    }
}