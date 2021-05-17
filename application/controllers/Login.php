<?php


class Login extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('LoginModel');
    }

    public function index(){
        $this->load->view('login/index');
    }

    public function forgotPassword(){
        $this->load->view('login/forgotPassword');
    }

    public function signOut(){
        $sessionArray = array('adminId', 'adminAccount', 'customerServiceAccount');

        $this->session->unset_userdata($sessionArray);
        session_destroy();
        redirect('/login/index');
    }

    public function tryLogin(){
        $userAccount = $this->input->post('userId');
        $userPassword = $this->input->post('pwd');

        if ($this->isIncludeSpaceCharacter($userAccount) || $this->isIncludeSpaceCharacter($userPassword))
            echo 0;
        else {
            $admins = $this->LoginModel->getMember($userAccount, $userPassword);

            if ($admins) {
//                $sessionArray = array("adminId" => $admins->id,
//                    "adminAccount" => $admins->email
//                );

                $sessionArray = array("adminId" => $admins->id,
                    "adminAccount" => $admins->email,
                    "customerServiceAccount" => $admins->email,
                    "adminPhoto" => $admins->photo_url
                );

                $this->session->set_userdata($sessionArray);

                echo json_encode('1');
            }
            else
                echo json_encode('2');
        }
    }

}