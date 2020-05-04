<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function chkUserLoginModel($email,$encPass)
    {
        $sql = "SELECT * FROM `registereduser` WHERE `REG_USR_CONTACT`='$email' OR `REG_USER_EMAIL`='$email' AND `REG_USR_PASSWORD`='$encPass';";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function UserDetails($email)
    {
        $sql = "SELECT * FROM `registereduser` WHERE `REG_USR_CONTACT`='$email' OR `REG_USER_EMAIL`='$email';";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function UserRegistrationModel($usertype,$fname,$lname,$mob,$pass,$image)
    {
        $sql="INSERT INTO `registereduser`(`REGISTRATION_ID`, `REGISTRATION_TYPE`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, `REG_USR_CONTACT`, `REG_USR_PASSWORD`,`REG_USER_QR`) VALUES ('$mob','$usertype','$fname','$lname','$mob','$pass','$image');";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function FacultyMailerModel()
    {
        $fid=$this->input->post('fid',TRUE);
        // $sub=$this->input->post('sub',TRUE);
        // $content=$this->input->post('content',TRUE);
        $sub=$this->input->post('msubject');
        $content=$this->input->post('mbody');
        $sender=$this->input->post('sender',TRUE);

           // Change the line below to your timezone!
           $timezone =date_default_timezone_set('Asia/Kolkata');
        //    echo "The current server timezone is: " . $timezone;
           $date = date('Y-m-d H:i:s', time());
        //    echo "The current server timezone is: " . $date;

        $sql="INSERT INTO `staffmails`(`STAFF_ID`, `MAIL_SENDER_ID`, `MAIL_DATETIME`,`MAIL_SUBJECT`, `MAIL_CONTENT`) VALUES ('$fid','$sender','$date','$sub','$content')";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function authenticateScannedQRModel($data)
    {
        $sql="SELECT * FROM `registereduser` WHERE `REG_USER_QR`='$data';";
        $rs=$this->db->query($sql);
        return $rs;
    }

    public function UserCheckInModel($data)
    {
          // Change the line below to your timezone!
          $timezone =date_default_timezone_set('Asia/Kolkata');
          //    echo "The current server timezone is: " . $timezone;
             $date = date('Y-m-d H:i:s', time());
          //    echo "The current server timezone is: " . $date;
        $sql="INSERT INTO `tblpeoplepresence`(`REGISTRATION_ID`, `IN_DATE_TIME`, `PRESENCE_STATUS`) VALUES ('$data','$date','IN')";
        $rs = $this->db->query($sql);
        return $rs;
    }
}


?>