<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require_once 'textlocal.class.php';
// require_once '../includes/DbOperations.php';

class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        $response = array();
       
        // $_SESSION['mob']=$_POST['mobile_number'];
             
        // if($_SESSION['mob'])
        //  {
            
                switch ($_POST["action"]) 
                {
                    case "send_otp":
                        $mobile_number = $_POST['mobile_number'];
                        $apiKey = urlencode('f09OyB3e1L8-Fgv5Xspujf1fAVlEvdPCKSyo3QZDBZ');
                        $Textlocal = new Textlocal(false, false, $apiKey);
                        $numbers = array(
                            $mobile_number
                        );
                        $sender = 'TXTLCL';
                        $otp = rand(100000, 999999);
                        $_SESSION['session_otp'] = $otp;
                        $message = "hi user,wlcm to Smart Gate Your One Time Password to Login is " . $otp;
                        try
                        { echo $otp;
                           // $response = $Textlocal->sendSms($numbers, $message, $sender);
                            require_once ("verification-form.php");
                            exit();
                        }catch(Exception $e)
                        {
                            die('Error: '.$e->getMessage());
                        }
                        break;
                    case "verify_otp":
                        $otp = $_POST['otp'];
                        echo $otp;
                        if ($otp == $_SESSION['session_otp']) 
                        {
                            unset($_SESSION['session_otp']);
                            // $response['type'] = "success";
                            $response['success'] = true;
                            $response['message'] = "Your mobile number is verified!";
                            // echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                            echo json_encode($response);
                         //   exit();
                         //   $this->load->view('user/UserDashboard');
                        } 
                        else
                        {
                            // $response['type'] = "error";
                            
                            $response['success'] = false;
                            $response['message'] = "Mobile number verification failed";
                            // echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                            echo json_encode($response);
                        }
                        break;
                }
        }
        // else
        // {
        //     echo json_encode(array("type"=>"error", "message"=>"user not exists! please register first"));
        //    // header('Location:registerPg.php');
        // }

        
    //}
}
$controller = new Controller();
?>