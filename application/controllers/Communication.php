<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Communication extends REST_Controller {

    public $RESULT_SUCCESS = 201;
    public $RESULT_FAILED = 202;
    public $RESULT_EMAIL_PASSWORD_INCORRECT = 203;
    public $RESULT_PASSWORD_INCORRECT = 204;
    public $RESULT_EMAIL_DUPLICATE = 205;
    public $RESULT_EMPTY = 206;
    public $RESULT_ALREADY_EXIST = 207;

    public $RESULT_EMAIL_INCORRECT = 213;
    public $RESULT_SEND_EMAIL_FAILED = 214;
    public $RESULT_VERIFICATION_CODE_USED = 215;
    public $RESULT_VERIFICATION_CODE_INCORRECT = 216;

    public $SEND_SMS = false;   // if value is true, it will send sms reality, else not send sms

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('CommunicationModel');
    }


    /**
     * Function : common function for send result to client
     * Parameter:
     * @param $returnCode
     * @param $resultData
     * Return   : json data
     *      ex: {
     *          "code" : $returnCode,
     *          "data" : $resultData
    currentItemEnd *      }
     * Creator  : xxx
     * Date     : 20190530
     * @return array
     */
    public function getResultData($returnCode, $resultData) {
        $returnData = [];

        $returnData['code'] = $this->RESULT_SUCCESS;
        $returnData['data'] = [];

        if ($returnCode < 0)
            $returnData['code'] = $returnCode;
        $returnData['code'] = $returnCode;


        if (!empty($resultData))
            $returnData['data'] = $resultData;

        return $returnData;
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->db->get_where("user", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("user")->result()[0];
        }

        $this->response($data, REST_Controller::HTTP_OK);
    }

    /**
     * Function : user login function
     * Parameter: email, password(md5)
     * Return   :
     *      returnCode
     *          0: success
     *         -1: failed
     *      returnData
     *          all user table
     * Creator  : xxx
     * Date     : 20191028
     */
    public function tryUserLogin_get() {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try {
            $email = $this->get('email');
            $password = $this->get('password');
            if(!empty($email) && !empty($password)) {
                $tempUser = $this->CommunicationModel->getUser($email, $password);
                if (!empty($tempUser)){
                    $resultData = $tempUser[0];
                }
                else
                    $returnCode = $this->RESULT_EMAIL_PASSWORD_INCORRECT;
            } else {
                $returnCode = $this->RESULT_FAILED;
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function updateUserEntityId_get() {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try {
            $userId = $this->get('user_id');
            $userEntityId = $this->get('user_entity_id');
            if(!empty($userId) && !empty($userEntityId)) {
                $updateData = [];
                $updateData['user_entity_id'] = $userEntityId;
                $this->CommunicationModel->updateItemData('user', $updateData, $userId);
            } else {
                $returnCode = $this->RESULT_FAILED;
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }
    public function trySocialLogin_get() {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try {
            $facebookId = $this->get('facebook_id');
            if(!empty($facebookId)) {
                $tempUser = $this->BaseModel->getDataArray('user', 'facebook_id', $facebookId);
                if (!empty($tempUser)){
                    $resultData = $tempUser[0];
                }
                else
                    $returnCode = $this->RESULT_EMAIL_PASSWORD_INCORRECT;
            } else {
                $returnCode = $this->RESULT_FAILED;
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getHelpContent_get() {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        try {
            $tempContent = $this->CommunicationModel->getHelpContent();
            if (!empty($tempContent)){
                $resultData['faq'] = $tempContent[0]['content'];
                $resultData['contact_us'] = $tempContent[1]['content'];
                $resultData['privacy'] = $tempContent[2]['content'];
//                $resultData = $tempContent;

            }
            else
                $returnCode = $this->RESULT_FAILED;

        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function sendSMS_post()
    {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try {
            $updateData = [];
            $updateData['email'] = $this->post('email');
            $updateData['verification_code'] = $this->generateVerificationCode();
            $updateData['send_time'] = date('Y-m-d H:i:s');
            $updateData['limit_time'] = VALID_PERIOD;
            $updateData['used_flag'] = false;

            if($this->SEND_SMS)
            {
                $responseCode = $this->sendTemplateSMS($updateData['email'], array($updateData['verification_code'], '15'), "1");
                $responseCode = 1;
            } else {
                $responseCode = 1;
            }

            if ($responseCode == 1)
            {
                $sameEmailList = $this->CommunicationModel->getDataArray('email_verification_log', 'email', $updateData['email']);

                if (empty($sameEmailList))
                {
                    $updateId = 0;
                }
                else
                    $updateId = $sameEmailList[0]['id'];

                $this->CommunicationModel->updateItemData('email_verification_log', $updateData, $updateId);
                $resultData['verification_code'] = $updateData['verification_code'];
            }
            else
                $returnCode = $this->RESULT_FAILED;
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);

    }

    public function generateVerificationCode()
    {
        $result = "";
        for ($i = 0; $i < 6; $i++)
        {
            $result .= rand(0, 9);
        }

        return $result;
    }

    /**
     * Function : change user email and verify function
     * Parameter: user_id, user_email, verification_code, verification_flag
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *      returnData
     *          updated user password
     * Creator  : mars
     * Date     : 20191030
     */
    public function updateEmail_put(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];

        try{
            $userId = $this->put('user_id');
            $userNewEmail = $this->put('user_email');
            $userVerificationCode = $this->put("verification_code");
            $veri_test_flag = $this-> put("verification_flag");
            if(!empty($userVerificationCode)){

                if ($veri_test_flag == 1) {

                    $verificationCode = $this->CommunicationModel->getVerificationCode($userNewEmail);
                    if (!$verificationCode){
                        $returnCode = $this->RESULT_FAILED;
                    } else {
                        $effective_time = strtotime($verificationCode[0]['send_time']) + (int)$verificationCode[0]['valide_period'];
                        $current_time = strtotime(date("Y-m-d H:i:s"));

                        $sameMobileNumberList = $this->CommunicationModel->getDataArray('sleep_user', 'mobile_number', $userNewEmail);
                        if (!empty($sameMobileNumberList) && $sameMobileNumberList[0])
                            $returnCode = $this->RESULT_MOBILE_DUPLICATE;
                        else{

                            if ((string)$verificationCode[0]['verification_code'] == $userVerificationCode){
                                if($effective_time > $current_time)
                                {
                                    if($verificationCode[0]['use_status'] == 0) {
                                        $updateUseStatus['use_status'] = 1;
                                        $postData['email'] = $userNewEmail;
                                        $this->CommunicationModel->updateItemData('email_verification_log', $updateUseStatus, $verificationCode[0]['id']);
                                        $this->CommunicationModel->updateItemData('user', $postData, $userId);
                                    } else {
                                        $returnCode = $this->RESULT_FAILED;
                                    }
                                } else {
                                    $returnCode = $this->RESULT_MOBILE_VALIDATION_FAILED;
                                }
                            } else {
                                $returnCode = $this->VERIFICATION_ERROR_STATUS;
                            }
                        }
                    }
                }

                elseif ($veri_test_flag == 0) {

                    $sameEmailList = $this->CommunicationModel->getDataArray('user', 'email', $userNewEmail);
                    if (!empty($sameMobileNumberList) && $sameMobileNumberList[0])
                        $returnCode = $this->RESULT_MOBILE_DUPLICATE;
                    else{
                        if ($userVerificationCode == 1101) {
                            $postData['email'] = $userNewEmail;
                            $this->CommunicationModel->updateItemData('user', $postData, $userId);
                        }
                        else {
                            $returnCode = $this->VERIFICATION_ERROR_STATUS;
                        }
                    }
                }
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);

//        exit();
    }

    public function getGroup_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->get('user_id');
            $searchKey = $this->get('search_key');
            if (!empty($userId)) {
                $groupList = $this->CommunicationModel->getGroupList($userId, $searchKey);
                if (!empty($groupList)) {
                    foreach ($groupList as $key => $value){
                        $tempGroupId = $value['id'];
                        $checkCount = $this->CommunicationModel->checkGroupUser($tempGroupId, $userId);
                        if($checkCount == 0 || empty($checkCount)){
                            $groupList[$key]['joined_status'] = 0;
                        }
                        else{
                            $groupList[$key]['joined_status'] = 1;
                        }
                    }
                    $resultData = $groupList;
                } else {
                    $returnCode = $this->RESULT_EMPTY;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getGroupMember_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $groupId = $this->get('group_id');
            if (!empty($groupId)) {
                $memberList = $this->CommunicationModel->getGroupMember($groupId);
                if (!empty($memberList)){
                    $resultData = $memberList;
                }
                else{
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getGroupInformation_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $groupId = $this->get('group_id');
            if (!empty($groupId)) {
                $groupInfo = $this->CommunicationModel->getGroupInformation($groupId)[0];
                if (!empty($groupInfo)) {
                    $resultData = $groupInfo;
                    $resultData['member_count'] = $this->CommunicationModel->getGroupMemberCount($groupId);
                    $resultData['goal_count'] = $this->CommunicationModel->getGroupGoalCount($groupId);
                } else {
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function joinGroup_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $groupId = $this->post('group_id');
            $userId = $this->post('user_id');
            if (!empty($groupId) && !empty($userId)) {
                $checkCount = $this->CommunicationModel->checkGroupUser($groupId, $userId);
                if($checkCount == 0 || empty($checkCount)){
                    $postData = [];
                    $postData['user_id'] = $userId;
                    $postData['group_id'] = $groupId;
                    $postData['role'] = 2;
                    $this->CommunicationModel->updateItemData('group_user', $postData, 0);
                }
                else{
                    $returnCode = $this->RESULT_ALREADY_EXIST;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function createGroup_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->post('user_id');
            $groupName = $this->post('group_name');
            if (!empty($groupName) && !empty($userId)) {
                $sameGroupList = $this->CommunicationModel->getDataArray('group_table', 'name', $groupName);
                if(empty($sameGroupList)){
                    $postData = [];
                    $postData['super_admin_id'] = $userId;
                    $postData['name'] = $groupName;
                    $this->CommunicationModel->updateItemData('group_table', $postData, 0);
                    $tempData = $this->CommunicationModel->getDataArray('group_table', 'name', $groupName)[0];
                    $updateData = [];
                    $updateData['user_id'] = $userId;
                    $updateData['group_id'] = $tempData['id'];
                    $updateData['role'] = 1;
                    $updateData['saving_received_status'] = 0;
                    $this->CommunicationModel->updateItemData('group_user', $updateData, 0);
                    $resultData = $tempData;
                }
                else{
                    $returnCode = $this->RESULT_ALREADY_EXIST;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function uploadGroupEntityId_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $groupId = $this->post('group_id');
            $groupEntityId = $this->post('group_entity_id');
            if (!empty($groupEntityId) && !empty($groupId)) {
                $updateData = [];
                $updateData['group_entity_id'] = $groupEntityId;
                $this->CommunicationModel->updateItemData('group_table', $updateData, $groupId);
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getUserGroup_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->get('user_id');
            if (!empty($userId)) {
                $groupList = $this->CommunicationModel->getUserGroupList($userId);
                if (!empty($groupList)) {
                    $resultData = $groupList;
                } else {
                    $returnCode = $this->RESULT_EMPTY;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getDonationInformation_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->get('user_id');
            if (!empty($userId)) {
                $donationInfo = $this->CommunicationModel->getDonationInformation($userId)[0];
                $donationInfo['donate_amount'] = $this->CommunicationModel->getUserDonateAmount($userId)[0]['donation_amount'];
                $resultData = $donationInfo;
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getGroupContribution_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $groupId = $this->get('group_id');
            $userId = $this->get('user_id');
            if (!empty($groupId)) {
                $contributionInfo = $this->CommunicationModel->getContributionInformation($groupId);
                if ($contributionInfo != null && !empty($contributionInfo)){$resultData = $contributionInfo[0];
                    $userContributionStatus = $this->CommunicationModel->getUserContributionStatus($groupId, $userId)[0]['contribution_active_status'];
                    $resultData['contribution_active_status'] = $userContributionStatus;
                }
                else
                    $returnCode = $this->RESULT_FAILED;
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getGroupNotification_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->get('user_id');
            if (!empty($userId)) {
                $groupWalletInfo = $this->CommunicationModel->getGroupNotification($userId);
                $userNoticeInfo = $this->CommunicationModel->getUserNotification($userId);
                $systemNoticeInfo = $this->CommunicationModel->getSystemNotification();
                if ($groupWalletInfo != null && !empty($groupWalletInfo)){
                    $resultData['group_notice'] = $groupWalletInfo;
                    $resultData['user_notice'] = $userNoticeInfo;
                    $resultData['system_notice'] = $systemNoticeInfo;
                }
                else
                    $returnCode = $this->RESULT_FAILED;
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getGroupMembers_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $userId = $this->get('user_id');
            if (!empty($userId)) {
                $groupList = $this->CommunicationModel->getMemberGroupList($userId);
                if (!empty($groupList)){
                    $userIds = [];
                    foreach ($groupList as $key => $value){
                        $tempGroupId = $value['group_id'];
                        $tempGroupUsers = $this->CommunicationModel->getGroupMember($tempGroupId);
                        foreach ($tempGroupUsers as $keys => $values){
                            if ($key == 0){
                                if ($tempGroupUsers[$keys]['user_id'] != $userId){
                                    array_push($userIds, $tempGroupUsers[$keys]['user_id']);
                                    array_push($resultData, $tempGroupUsers[$keys]);
                                }
                            }
                            else{
                                $tempUserId = $tempGroupUsers[$keys]['user_id'];
                                if ($tempUserId != $userId && !in_array($tempUserId, $userIds)) {
                                array_push($userIds, $tempUserId);
                                array_push($resultData, $tempGroupUsers[$keys]);
                                }
                            }
                        }
                    }
                }
                else
                    $returnCode = $this->RESULT_FAILED;
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getReceiverInformation_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];

        try{
            $receiverId = $this->get('receiver_id');
            if (!empty($receiverId)) {
                $receiverList = $this->CommunicationModel->getDataArray('user', 'id', $receiverId);
                if ($receiverList != null && !empty($receiverList))
                    $resultData = $receiverList[0];
                else
                    $returnCode = $this->RESULT_FAILED;
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function updateDonationHistory_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $postData = [];
        $resultData = [];

        try{
            $keys = ['user_id', 'donation_id','amount','transaction_id', 'pay_key'];
            foreach ($keys as $key)
            {
                $postData[$key] = $this->post($key);
            }
            $current_time = date("Y-m-d H:i:s");
            $postData['sent_date'] = $current_time;
            if (!empty($postData['user_id']) && !empty($postData['donation_id']) && !empty($postData['transaction_id'])) {
                $this->CommunicationModel->updateItemData('donation_transaction_history', $postData, 0);
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    /**
     * Function : user change password function
     * Parameter: user_id, old_password, new_password
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *          204: result_password incorrect
     *      returnData
     *          updated user password
     * Creator  : mars
     * Date     : 20191030
     */
    public function updateUserPassword_put(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];

        try{
            $userId = $this->put('user_id');
            $oldPassword = $this->put('old_password');
            $userPassword = $this->put('new_password');
            if (!empty($userId) && !empty($userPassword) && !empty($oldPassword)){
                $currentPassword = $this->CommunicationModel->getDataArray('user', 'id', $userId)[0]['password'];
                if ($oldPassword == $currentPassword && !empty($currentPassword)){
                    $postData['id'] = $userId;
                    $postData['password'] = $userPassword;
                    $this->CommunicationModel->updateItemData('user', $postData, $userId);
                    $tempUser = $this->CommunicationModel->getDataArray('user', 'id', $userId);
                    if (!empty($tempUser)){
                        $returnCode = $this->RESULT_SUCCESS;
                        $resultData['password'] = $tempUser[0]['password'];
                    }
                    else{
                        $returnCode = $this->RESULT_PASSWORD_INCORRECT;
                    }
                }
                else{
                    $returnCode = $this->RESULT_PASSWORD_INCORRECT;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    /**
     * Function : user change name function
     * Parameter: user_id, user_name
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *      returnData
     *          updated user name
     * Creator  : mars
     * Date     : 20191030
     */
    public function updateUserName_get(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];

        try{
            $userId = $this->get('user_id');
            $userName = $this->get('user_name');
            if (!empty($userId) && !empty($userName)){
                $postData['id'] = $userId;
                $postData['name'] = $userName;
                $this->CommunicationModel->updateItemData('user', $postData, $userId);
                $tempUser = $this->CommunicationModel->getDataArray('user', 'id', $userId);
                if (!empty($tempUser)){
                    $returnCode = $this->RESULT_SUCCESS;
                    $resultData['name'] = $tempUser[0]['name'];
                }
                else{
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    /**
     * Function : user change paypal email function
     * Parameter: user_id, paypal_email
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *      returnData
     *          updated user paypal email
     * Creator  : mars
     * Date     : 20191030
     */
    public function updateUserPayPal_put(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];

        try{
            $userId = $this->put('user_id');
            $userPaypalEmail = $this->put('paypal_email');
            if (!empty($userId) && !empty($userPaypalEmail)){
                $postData['id'] = $userId;
                $postData['paypal_email'] = $userPaypalEmail;
                $this->CommunicationModel->updateItemData('user', $postData, $userId);
                $tempUser = $this->CommunicationModel->getDataArray('user', 'id', $userId);
                if (!empty($tempUser)){
                    $returnCode = $this->RESULT_SUCCESS;
                    $resultData['paypal_email'] = $tempUser[0]['paypal_email'];
                }
                else{
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    /**
     * Function : change user profile function
     * Parameter: user_id, nation, gender, birthday
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *      returnData
     *          updated user all information
     * Creator  : mars
     * Date     : 20191030
     */
    public function updateUserProfile_put(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];

        try{
            $userId = $this->put('user_id');
            $userNation = $this->put('nation');
            $userGender = $this->put('gender');
            $userBirthday = $this->put('birthday');
            $userName = $this->put('name');
            if (!empty($userId)){
//                $postData['id'] = $userId;
                if ($userGender != null){
                    $postData['gender'] = $userGender;
                }
                if (!empty($userNation)){
                    $postData['nation_id'] = $userNation;
                }
                if (!empty($userBirthday)){
                    $postData['birthday'] = $userBirthday;
                }
                if (!empty($userName)){
                    $postData['name'] = $userName;
                }
                $this->CommunicationModel->updateItemData('user', $postData, $userId);
                $tempUser = $this->CommunicationModel->getDataArray('user', 'id', $userId);
                if (!empty($tempUser)){
                    $returnCode = $this->RESULT_SUCCESS;
                    $resultData = $tempUser[0];
                }
                else{
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }
        }
        catch(Exception $e){
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function getNationList_get() {
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        try {
            $tempNations = $this->CommunicationModel->getNationList();
            if (!empty($tempNations)){
                $resultData = $tempNations;
            }
            else
                $returnCode = $this->RESULT_FAILED;

        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    /**
     * Function : upload image file function
     * Parameter: upload_id, upload_type 1: user, 2: group, 3: goal,
     * Return   :
     *      returnCode
     *          201: result_success
     *          202: result_failed
     *      returnData
     *          updated user paypal email
     * Creator  : mars
     * Date     : 20191030
     */
    function uploadImageFile_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        try {
            $dir_Year = date("Y");
            $dir_Month = date("m");
            $dir_Date = date("d");
            $uploadId = $this->post('upload_id');
            $user_type = $this->post('upload_type');
            if ($user_type == 1) {
                $filePath = 'upload/user';
                $tableName = 'user';
            }
            else if ($user_type == 2){
                $filePath = 'upload/group';
                $tableName = 'group_table';
            }
            else if ($user_type == 3){
                $filePath = 'upload/goal';
                $tableName = 'goal';
            }
            if(!file_exists($filePath))
                mkdir($filePath,0777,true);
            if(!file_exists($filePath.'/'.$dir_Year))
                mkdir($filePath.'/'.$dir_Year, 0777, true);
            if(!file_exists($filePath.'/'.$dir_Year.'/'.$dir_Month))
                mkdir($filePath.'/'.$dir_Year.'/'.$dir_Month, 0777, true);
            if(!file_exists($filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date))
                mkdir($filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date, 0777, true);
            if(!file_exists($filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date.'/'.$uploadId))
                mkdir($filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date.'/'.$uploadId, 0777, true);

            $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/'.$filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date.'/'.$uploadId.'/';
            $config['allowed_types'] = '*';
            $this->load->library('upload');
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
                $resultData = $error;
                $this->response($error,404);
            }
            else
            {
                $postData =  [];
                $data = array('upload_data' => $this->upload->data());
                $currentPhotoUrl = $this->CommunicationModel->getDataArray($tableName, 'id', $uploadId)[0]['photo_url'];
                if (!empty($currentPhotoUrl)) {
                    $tempList = explode('upload', $currentPhotoUrl);
                    $deleteURL = "upload" . $tempList[1];
                    if (file_exists($deleteURL))
                        unlink($deleteURL);
                }
                $postData['photo_url'] = SERVER_ADDRESS.'/'.$filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date.'/'.$uploadId.'/'.$data['upload_data']['file_name'];
                $this->CommunicationModel->updateImageData($tableName, $postData, $uploadId);
                $localPath = $filePath.'/'.$dir_Year.'/'.$dir_Month.'/'.$dir_Date.'/'.$uploadId.'/'.$data['upload_data']['file_name'];
                $resultData['photo_url'] = $this->CommunicationModel->getDataArray($tableName, 'id', $uploadId)[0]['photo_url'];
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,200);
    }

    public function sendEmailForForgotPassword_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        try {
            $email = $this->post('email');
            if (empty($email))
                $returnCode = $this->RESULT_FAILED;
            else {
                $userData = $this->BaseModel->getDataArray('user', 'email', $email);
                if (empty($userData) || count($userData) < 1)
                    $returnCode = $this->RESULT_EMAIL_INCORRECT;
                else {
                    $verificationCode = $this->generateVerificationCode();
                    $userId = $userData[0]['id'];

                    $content = "<div style='padding: 5%;'>
                        <label style='font-size: 24px;'>" . EMAIL_TITLE . "</label><br/><br/>
                        <label style='font-size: 16px; color: grey;'>The verification code is ".$verificationCode.".</label><br/><br/><br/>
                       </div>";

                    $result =  $this->sendEmail($userData[0]['email'], EMAIL_TITLE, $content);
                    if($result == 1){
                        $postData = [];
                        $postData['verification_code'] = $verificationCode;
                        $postData['verification_used'] = 0;
                        $this->BaseModel->updateItemData('user', $postData, $userId);
                        $resultData['userId'] = $userId;
                        $returnCode = $this ->RESULT_SUCCESS;
                    }
                    else if ($result == 2){
                        $returnCode = $this ->RESULT_SEND_EMAIL_FAILED;
                    }
                }
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }

    public function sendEmailForRegister_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        try {
            $email = $this->post('email');
            if (empty($email))
                $returnCode = $this->RESULT_FAILED;
            else {
                $emailList = $this->BaseModel->getDataArray('user', 'email', $email);
                if (empty($emailList) || count($emailList) < 1){
                    $verificationCode = $this->generateVerificationCode();

                    $content = "<div style='padding: 5%;'>
                        <label style='font-size: 24px;'>" . EMAIL_TITLE . "</label><br/><br/>
                        <label style='font-size: 16px; color: grey;'>The verification code is ".$verificationCode.".</label><br/><br/><br/>
                       </div>";

                    $result =  $this->sendEmail($email, EMAIL_TITLE, $content);
                    if($result == 1){
                        $postData = [];
                        $postData['verification_code'] = $verificationCode;
                        $postData['verification_used'] = 0;
                        $postData['email'] = $email;
                        $this->BaseModel->updateItemData('user', $postData, 0);
                        $resultData['userId'] = $this->BaseModel->getDataArray('user', 'email', $email)[0]['id'];
                        $returnCode = $this ->RESULT_SUCCESS;
                    }
                    else if ($result == 2){
                        $returnCode = $this ->RESULT_SEND_EMAIL_FAILED;
                    }
                }
                else {
                    $returnCode = $this->RESULT_EMAIL_DUPLICATE;
                }
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }

    public function sendEmail($email, $title, $content) {
        if (!empty($email) && !empty($title) && !empty($content)) {
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = SMTP_SERVER;
            $config['smtp_user'] = SYSTEM_MAIL;
            $config['smtp_pass'] = SMTP_PASSWORD;
            $config['smtp_port'] = 465;
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'html';
            // $config['smtp_timeout'] = '5';
            $config['newline'] = "\r\n";
            $this->load->library('email', $config);

            $this->email->from(SYSTEM_MAIL, 'nSofts');
            $this->email->to($email);
            $this->email->subject($title);
            $this->email->message($content);

            if($this->email->send())
                return 1;
            else {
                return 2;
            }
        } else {
            return 2;
        }
    }

    public function sendVerificationCode_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $updateData = [];
        try {
            $userId = $this->post('userId');
            $verificationCode = $this->post('code');
            if (empty($userId) || empty($verificationCode))
                $returnCode = $this->RESULT_FAILED;
            else {
                $userData = $this->BaseModel->getDataArray('user', 'id', $userId)[0];
                if ($verificationCode == $userData['verification_code']){
                    if ($userData['verification_used'] == 0){
                        $updateData['verification_used'] = 1;
                        $this->BaseModel->updateItemData('user', $updateData, $userId);
                    }
                    else{
                        $returnCode = $this->RESULT_VERIFICATION_CODE_USED;
                    }
                }
                else{
                    $returnCode = $this->RESULT_VERIFICATION_CODE_INCORRECT;
                }
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }

    public function changePassword_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];
        try {
            $userId = $this->post('userId');
            $postData['password'] = $this->post('password');
            if (!empty($postData['password']) && !empty($userId)){
                $userList = $this->CommunicationModel->getDataArray('user', 'id', $userId);
                if (!empty($userList)){
                    $this->CommunicationModel->updateItemData('user', $postData, $userId);
                    $resultData["password"] = $this->CommunicationModel->getDataArray('user', 'id', $userId)[0]['password'];
                }
                else{
                    $returnCode = $this->RESULT_FAILED;
                }
            }
            else{
                $returnCode = $this->RESULT_FAILED;
            }

        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }

    public function trySocialRegister_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];
        try {
            $keys = ['email', 'facebook_id','name','photo_url'];
            foreach ($keys as $key)
            {
                $postData[$key] = $this->post($key);
            }
            $facebookId = $this->post('facebook_id');
            if (empty($facebookId))
                $returnCode = $this->RESULT_FAILED;
            else {
                $emailList = $this->BaseModel->getDataArray('user', 'facebook_id', $facebookId);

                if (empty($emailList) || count($emailList) < 1){
                    $this->CommunicationModel->updateItemData('user', $postData, 0);
                    $resultData = $this->BaseModel->getDataArray('user', 'facebook_id', $facebookId)[0];
                }
                else {
                    $returnCode = $this->RESULT_EMAIL_DUPLICATE;
                }
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }

    public function trySocialRegisterNew_post(){
        $returnCode = $this->RESULT_SUCCESS;
        $resultData = [];
        $postData = [];
        try {
            $keys = ['email', 'facebook_id','name','photo_url'];
            foreach ($keys as $key)
            {
                $postData[$key] = $this->post($key);
            }
            $facebookId = $this->post('facebook_id');
            if (empty($facebookId))
                $returnCode = $this->RESULT_FAILED;
            else {
                $emailList = $this->BaseModel->getDataArray('user', 'facebook_id', $facebookId);

                if (empty($emailList) || count($emailList) < 1){
                    $this->CommunicationModel->updateItemData('user', $postData, 0);
                    $resultData = $this->BaseModel->getDataArray('user', 'facebook_id', $facebookId)[0];
                }
                else {
                    $returnCode = $this->RESULT_EMAIL_DUPLICATE;
                }
            }
        } catch (Exception $e) {
            $returnCode = $this->RESULT_FAILED;
        }

        $result = $this->getResultData($returnCode, $resultData);
        $this->response($result,REST_Controller::HTTP_OK);
    }


}