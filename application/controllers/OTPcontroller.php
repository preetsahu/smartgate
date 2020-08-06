<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(E_ALL & ~ E_NOTICE);
require_once 'textlocal.class.php';
class OTPcontroller extends CI_Controller
{
    public function otp()
    {
        $this->load->view('user/otpLogin');
    }

    public function forgotPassword()
    {
        $this->load->view('user/forgotPassword');
    }
    public function updatePasswordView()
    {
        $this->load->view('user/updatePasswordPage');
    } 
    public function updatePassword()
    {
        $verifymob=$this->session->userdata('mob');
        $pass=$this->input->post('pass',true);
        $res = $this->UserModel->updateUsrPass($mobile_number,md5($pass));
        $row = $res->num_rows();
		if($res->num_rows()>0)
		{
            unset($_SESSION['mob']);
            $data['success'] = true;
            echo json_encode($data);
        }
        else
        {
            $data['success'] = false;
            echo json_encode($data);
        }
    } 
    public function getOTP()
    {
        $mobile_number = $this->input->post('mob',true);
        $res = $this->UserModel->chkUserExistanceModel($mobile_number);
        $row = $res->num_rows();
		if($res->num_rows()>0)
		{
            $apiKey = urlencode('f09OyB3e1L8-Fgv5Xspujf1fAVlEvdPCKSyo3QZDBZ');
            $Textlocal = new Textlocal(false, false, $apiKey);
            $numbers = array(
                $mobile_number
            );
            $sender = 'TXTLCL';
            $otp = rand(100000, 999999);
            $this->session->set_userdata('otp',$otp);
            $this->session->set_userdata('mob',$mobile_number);
            $message = "hi user,wlcm to Smart Gate Your One Time Password to Login is " . $otp;
            try
            { 
               // echo $otp;
                $response = $Textlocal->sendSms($numbers, $message, $sender);
                $resp['success']=true;
                $resp['type']='success';
                require_once ("verification-form.php");
                // echo json_encode($resp);
                exit();
            }
            catch(Exception $e)
            {
               die('Error: '.'Please check your network connection');
            }
        }
        else
        {
            $resp = 'You are not registered User';
            // $resp['type'] = 'error';
            // $resp['success']=false;
            // $data['error']="Failed to send OTP";
            echo json_encode($resp);
        }

    }

    public function verifyOTP()
    {
        // $Genotp=$this->session->flashdata('usrOTP');
        $Genotp=$this->session->userdata('otp');
        $verifymob=$this->session->userdata('mob');
        // $otp = $_POST['otp'];
        $inOTP=$this->input->post('otp',true);
        $requestType=$this->input->post('reqType',true);
        // echo $inOTP;
        if($inOTP == $Genotp) 
        {
            if($requestType=='verify_updatepassotp')
            {
                $data['success'] = true;
                // unset($_SESSION['mob']);
                unset($_SESSION['usrOTP']);
                echo json_encode($data);
            }
            if($requestType=='verify_loginotp')
            {
                $data['success'] = true;
                $data['otpm']=$Genotp;
                unset($_SESSION['usrOTP']);
                $r = $this->UserModel->UserDetails($verifymob);
                $r = $r->row_array();
                $user = array(
                        'uNAME' => $r['REG_USR_FIRSTNAME'].' '.$r['REG_USR_LASTNAME'],
                        'uSID' => $r['REGISTRATION_ID'],
                        'uEMAIL' => $r['REG_USER_EMAIL'],
                        'uMOB' => $r['REG_USR_CONTACT'],
                        'uRTYPE' => $r['REGISTRATION_TYPE'],
                        'uqr' => $r['REG_USER_QR'],
                        'usr_logged_in' => true);
                $this->session->set_userdata($user);
                unset($_SESSION['mob']);
                echo json_encode($data);
            }
            
        } 
        else
        {
            // echo json_encode($Genotp);
            $data['success'] = false;
            echo json_encode($data);
        } 
    }

    public function verifyUpdatePassOTP()
    {
        // $Genotp=$this->session->flashdata('usrOTP');
        $Genotp=$this->session->userdata('otp');
        $mob=$this->session->userdata('mob');
        // $otp = $_POST['otp'];
        $inOTP=$this->input->post('otp',true);
        // echo $inOTP;
        if($inOTP == $Genotp) 
        {
             $data['success'] = true;
             $data['otpm']=$Genotp;
             unset($_SESSION['usrOTP']);
             $r = $this->UserModel->UserDetails($mob);
             $r = $r->row_array();
             $user = array(
                     'uNAME' => $r['REG_USR_FIRSTNAME'].' '.$r['REG_USR_LASTNAME'],
                     'uSID' => $r['REGISTRATION_ID'],
                     'uEMAIL' => $r['REG_USER_EMAIL'],
                     'uMOB' => $r['REG_USR_CONTACT'],
                     'uRTYPE' => $r['REGISTRATION_TYPE'],
                     'uqr' => $r['REG_USER_QR'],
                     'usr_logged_in' => true);
             $this->session->set_userdata($user);
             unset($_SESSION['mob']);
             echo json_encode($data);
        } 
        else
        {
            // echo json_encode($Genotp);
            $data['success'] = false;
            echo json_encode($data);
        } 
    }

}

?>