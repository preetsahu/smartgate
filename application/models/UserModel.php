<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{

    public function chkUserLoginModel($email,$encPass)
    {
        $sql = "SELECT * FROM `registereduser` WHERE `REG_USR_CONTACT`='$email' OR `REG_USER_EMAIL`='$email' AND `REG_USR_PASSWORD`='$encPass';";
        try
        {
            $rs = $this->db->query($sql);
            return $rs;
        }
        catch(Exception $e) 
        {
            redirect('error');
        }
       
    }
    
    public function getAllStudentDetailsModel()
    {
      $str=$this->input->post('str',TRUE);
      if($str=='')
      {
        $sql="SELECT st.REGISTRATION_ID,reguser.IMAGE,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,st.EMAIL_ID,st.COURSE_YEAR,st.SEMESTER,c.COURSE_NAME FROM`tblstudent`  st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tblcourse` c ON c.COURSE_ID=st.COURSE_ID;";
        $rs=$this->db->query($sql);
        return $rs;
      }
      else 
      {
        $sql="SELECT st.REGISTRATION_ID,reguser.IMAGE,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,st.EMAIL_ID,st.COURSE_YEAR,st.SEMESTER,c.COURSE_NAME FROM`tblstudent`  st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tblcourse` c ON c.COURSE_ID=st.COURSE_ID WHERE st.FIRST_NAME LIKE '%".$str."%' OR st.STUDENT_ID LIKE '%".$str."%' OR st.MOBILE_NUMBER LIKE '%".$str."%' OR dt.DEPARTMENT_NAME LIKE '%".$str."%';";
        $rs=$this->db->query($sql);
        return $rs;
      }
    }

    public function chkUserExistanceModel($mobile_number)
    {
        $sql = "SELECT * FROM `registereduser` WHERE `REG_USR_CONTACT`='$mobile_number';";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function UserDetails($email)
    {
        $sql = "SELECT * FROM `registereduser` WHERE `REGISTRATION_ID`='$email' or `REG_USR_CONTACT`='$email' OR `REG_USER_EMAIL`='$email';";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function getUsrProfileModel($uID,$usertype)
    {
        if($usertype=='1')
            {
                $sql="SELECT st.`REGISTRATION_ID`, st.`STAFF_ID`, st.`FIRST_NAME`, st.`LAST_NAME`, st.`EMAIL_ID`, st.`MOBILE_NUMBER`, st.`DEPARTMENT_ID`, st.`DESIGNATION`, st.`ADDRESS_ID`, reg.`IMAGE` ,reg.REGISTRATION_TYPE  FROM `tblstaff` st INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=st.REGISTRATION_ID WHERE reg.REGISTRATION_ID='$uID'";
                $res = $this->db->query($sql);
                return $res;
            }
            elseif($usertype=='2')
            {
                $sql="SELECT st.`REGISTRATION_ID`, st.`STUDENT_ID`, st.`FIRST_NAME`, st.`LAST_NAME`, st.`EMAIL_ID`, st.`MOBILE_NUMBER`, st.`STU_PASSWORD`, st.`STUDENT_DOB`, st.`DEPARTMENT_ID`, st.`COURSE_ID`, st.`COURSE_YEAR`, st.`SEMESTER`, reg.`IMAGE` ,reg.REGISTRATION_TYPE  FROM `tblstudent` st INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=st.REGISTRATION_ID WHERE reg.REGISTRATION_ID='$uID'";
                $res = $this->db->query($sql);
                return $res;
            }
            else
            {
                $sql="SELECT v.`VISITOR_ID`, v.`VISITOR_FIRST_NAME`, v.`VISITOR_LAST_NAME`, v.`VISITOR_EMAIL`, v.`VISITOR_ADDRESS`, v.`VISITOR_CONTACT`, v.`ID_PROOF_TYPE`, v.`ID_PROOF_DETAILS`, reg.`IMAGE` ,reg.`REGISTRATION_TYPE `,reg.`REGISTRATION_ID` FROM `tblvisitors` v INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=v.VISITOR_ID; where REGISTRATION_ID='$uID'";    
                $res = $this->db->query($sql);
                return $res;
            }
    }
    
    public function getUsrDetailModel($uID,$usertype)
    {
        if($usertype=='1')
            {
                $sql="SELECT st.`REGISTRATION_ID`, st.`STAFF_ID`, st.`FIRST_NAME`, st.`LAST_NAME`, st.`EMAIL_ID`, st.`MOBILE_NUMBER`, st.`DEPARTMENT_ID`, st.`DESIGNATION`, st.`ADDRESS_ID`, reg.`IMAGE` ,reg.REGISTRATION_TYPE  FROM `tblstaff` st INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=st.REGISTRATION_ID WHERE reg.REGISTRATION_ID='$uID'";
                $res = $this->db->query($sql);
                return $res;
            }
            elseif($usertype=='2')
            {
                $sql="SELECT st.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.STUDENT_DOB,st.LAST_NAME,st.DEPARTMENT_ID,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER,st.EMAIL_ID,st.COURSE_YEAR,st.SEMESTER,c.COURSE_NAME,c.COURSE_ID,a.COUNTRY,a.STATE,a.CITY,a.PIN,a.AREA,m.MESS_ID,m.MESS_NAME,h.HOSTEL_NAME,h.HOSTEL_ID FROM `tblstudent` st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tblcourse` c ON c.COURSE_ID=st.COURSE_ID INNER JOIN `address` a ON a.REGISTRATION_ID=reg.REGISTRATION_ID INNER JOIN hostel h on h.HOSTEL_ID=st.HOSTEL_ID INNER JOIN  tblmess m on st.REGISTRATION_ID=m.REGISTRATION_ID WHERE reg.REGISTRATION_ID='$uID' limit 1";
                $res = $this->db->query($sql);
                return $res;
            }
            else
            {
                $sql="SELECT v.`VISITOR_ID`, v.`VISITOR_FIRST_NAME`, v.`VISITOR_LAST_NAME`, v.`VISITOR_EMAIL`, v.`VISITOR_ADDRESS`, v.`VISITOR_CONTACT`, v.`ID_PROOF_TYPE`, v.`ID_PROOF_DETAILS`, reg.`IMAGE` ,reg.`REGISTRATION_TYPE `,reg.`REGISTRATION_ID` FROM `tblvisitors` v INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=v.VISITOR_ID; where REGISTRATION_ID='$uID';";    
                $res = $this->db->query($sql);
                return $res;
            }
    }
    
    public function updateAddressModel($uid)
    {
        $cid= $this->input->post('country');
        $sis=$this->input->post('state');
        $cityid=$this->input->post('city');
        $area=$this->input->post('area');
        $pin=$this->input->post('Pin');
        $sql="UPDATE `address` SET `COUNTRY`='$cid',`STATE`='$sis',`CITY`='$cityid',`AREA`='$area',`PIN`='$pin' WHERE `REGISTRATION_ID`='$uid'";
        $res=$this->db->query($sql);
        return $res;
    }
    public function updateCurrentAddressModel($uid)
    {
        $cid= $this->input->post('country1');
        $sis=$this->input->post('state1');
        $cityid=$this->input->post('city1');
        $area=$this->input->post('area1');
        $pin=$this->input->post('Pin1');
        $sql="UPDATE `address` SET `COUNTRY`='$cid',`STATE`='$sis',`CITY`='$cityid',`AREA`='$area',`PIN`='$pin',`ADDRESS_TYPE`='CURRENT' WHERE `REGISTRATION_ID`='$uid'";
        $res=$this->db->query($sql);
        return $res;
    }
    public function getUsrAddressModel($uID)
    {
        $sql="SELECT * FROM `address` WHERE `REGISTRATION_ID`='$uID'";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function updateUsrPass($mobile_number,$pass)
    {
        $sql="UPDATE `registereduser` SET `REG_USR_PASSWORD`='$pass' WHERE `REGISTRATION_ID`='$mobile_number'";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function UserRegistrationModel($usertype,$fname,$lname,$mob,$pass,$image)
    {
        $sql="INSERT INTO `registereduser`(`REGISTRATION_ID`, `REGISTRATION_TYPE`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, `REG_USR_CONTACT`, `REG_USR_PASSWORD`,`REG_USER_QR`) VALUES ('$mob','$usertype','$fname','$lname','$mob','$pass','$image');";
        $rs = $this->db->query($sql);
        
        if($rs>0)
        {
            if($usertype=='1')
            {
                $sql="INSERT INTO `tblstudent`(`REGISTRATION_ID`,`FIRST_NAME`,`LAST_  NAME`,`MOBILE_NUMBER`) VALUES ('$mob','$fname','$lname','$mob');";
                $res = $this->db->query($sql);
                return $res;
            }
            elseif($usertype=='2')
            {
                $sql="INSERT INTO `tblstaff`(`REGISTRATION_ID`,`FIRST_NAME`,`LAST_NAME`,`MOBILE_NUMBER`) VALUES ('$mob','$fname','$lname','$mob');";
                $res = $this->db->query($sql);
                return $res;
            }
            else
            {
                $sql="INSERT INTO `tblvisitors`(`VISITOR_ID`,`VISITOR_FIRST_NAME`,`VISITOR_LAST_NAME`,`VISITOR_CONTACT`) VALUES ('$mob','$fname','$lname','$mob');";    
                $res = $this->db->query($sql);
                return $res;
            }
           
        }
        else
        {
            return false;
        }
    }

    public function chkUsrExistance($mob)
    {
        $sql="SELECT `REGISTRATION_ID` FROM `registereduser` WHERE `REGISTRATION_ID`='$mob'";
        $res=$this->db->query($sql);
        return $res;
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

    public function verifyCheckIn($data)
    {
        $sql="SELECT `REGISTRATION_ID` ,PRESENCE_STATUS,`OUT_DATE_TIME`, IN_DATE_TIME FROM `tblpeoplepresence` WHERE REGISTRATION_ID='$data'  order by REGISTRATION_ID DESC  LIMIT 1";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function UserCheckOutModel($data,$inTime)
    {
          // Change the line below to your timezone!
          $timezone =date_default_timezone_set('Asia/Kolkata');
          //    echo "The current server timezone is: " . $timezone;
             $date = date('Y-m-d H:i:s', time());
          //    echo "The current server timezone is: " . $date;
        $sql="UPDATE `tblpeoplepresence` SET `OUT_DATE_TIME`='$date' ,`PRESENCE_STATUS`='OUT' WHERE `REGISTRATION_ID`='$data' AND `IN_DATE_TIME`='$inTime'";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function updateProfilePic($filename,$usertype,$id)
    {
        $sql="UPDATE `registereduser` SET `IMAGE`='$filename' WHERE `REGISTRATION_ID`='$id' AND `REGISTRATION_TYPE`='$usertype'";
        $res=$this->db->query($sql);
        return $res;
    }

    public function studentMailerModel()
    {
        $sender=$this->session->userdata('uSID');
        $sid=$this->input->post('sid',true);
        $sub=$this->input->post('sub',true);
        $content=$this->input->post('content',true);
         // Change the line below to your timezone!
         $timezone =date_default_timezone_set('Asia/Kolkata');
         //    echo "The current server timezone is: " . $timezone;
            $date = date('Y-m-d H:i:s', time());
        $sql="INSERT INTO `studentmailing`(`REGISTRATION_ID`, `MAIL_SENDER_ID`, `MAIL_DATETIME`, `MAIL_SUBJECT`, `MAIL_CONTENT`, `MAIL_STATUS`) VALUES ('$sid','$sender','$date','$sub','$content','0')";
        $res=$this->db->query($sql);
        return $res;
    }

    public function mailBoxDataModel($uID)
    {
        $sql="SELECT  s.`REGISTRATION_ID`,`SERIAL`,`MAIL_SENDER_ID`, `MAIL_DATETIME`, `MAIL_SUBJECT`, `MAIL_CONTENT`, `MAIL_STATUS`, `MAIL_REPLY` ,s.STAFF_ID ,s.FIRST_NAME ,s.LAST_NAME,s.DESIGNATION,s.EMAIL_ID,s.DEPARTMENT_ID FROM `studentmailing` m INNER JOIN tblstaff s ON s.REGISTRATION_ID=m.MAIL_SENDER_ID WHERE m.`REGISTRATION_ID`='$uID'";
        $res=$this->db->query($sql);
        return $res;
    }

    public function mailDetailModel($uID,$eid)
    {
        $upSql="UPDATE `studentmailing` SET `MAIL_STATUS`='1' WHERE `SERIAL`='$eid'";
        $res=$this->db->query($upSql);
        if($res>0)
        {
            $sql="SELECT st.`FIRST_NAME`,st.`LAST_NAME`,st.`DESIGNATION` ,st.`DEPARTMENT_ID`,st.`EMAIL_ID`,s.`REGISTRATION_ID`,`SERIAL`,`MAIL_SENDER_ID`, `MAIL_DATETIME`, `MAIL_SUBJECT`, `MAIL_CONTENT`, `MAIL_STATUS`, `MAIL_REPLY` ,s.STAFF_ID ,s.FIRST_NAME ,s.LAST_NAME,s.DESIGNATION,s.EMAIL_ID,s.DEPARTMENT_ID FROM `studentmailing` m INNER JOIN tblstaff s ON s.REGISTRATION_ID=m.MAIL_SENDER_ID INNER JOIN tblstaff st ON st.`REGISTRATION_ID`=m.`MAIL_SENDER_ID`  WHERE m.`REGISTRATION_ID`='$uID' and m.SERIAL='$eid'";
            $res=$this->db->query($sql);
            return $res;
        }
    }

}


?>