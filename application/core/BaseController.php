<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include_once("./sms/CCPRestSmsSDK.php");

class BaseController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        $this->load->model('BaseModel');

        header('Cache-Control: no cache');
        date_default_timezone_set('Asia/Shanghai');
    }

    public function loginCheck()
    {
        if(!isset($this->session->adminAccount))
            redirect("/login/index");
    }

    public function template()
    {
//        $this->loginCheck();

        $this->load->view('/template/index', $this->data);

    }


    public function testTemplate()
    {
        $this->load->view('/template/testTemplate', $this->data);
    }

    public function mobileTemplate()
    {
        $this->load->view('/template/mobileTemplate', $this->data);
    }

    public function recurse_copy($src,$dst)
    {
        $dir = opendir($src);

        if (!file_exists($dst)) {
            mkdir($dst, 0777, true);
        }

        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..')) {
                if (file_exists($src . '/' . $file)) {
                    if (is_dir($src . '/' . $file)) {
                        $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
        }

        closedir($dir);
    }

    public function deleteDirectory($path)
    {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));

            foreach ($files as $file) {
                $this->deleteDirectory(realpath($path) . '/' . $file);
            }

            return rmdir(realpath($path));
        }
        else if (is_file($path) === true) {
            return unlink($path);
        }

        return false;
    }


    public function generateSuffix()
    {
        $chars = md5(uniqid(mt_rand(), true));
        return substr($chars, 10, 3);
    }

    /**
     * Function : call restful api
     * Parameter: method, url, $data
     * Return   :
     *      returnData :
     * Creator  : clark
     * Date     : 20190203
     */
    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // Optional Authentication:
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function isIncludeSpaceCharacter($value)
    {
        if (empty($value))
            return false;

        if (strpos($value, " "))
            return true;
        else
            return false;
    }
}