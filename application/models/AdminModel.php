<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model
{

    public function AdminRegistration($fname,$lname,$email,$pass)
    {
        $Qins = "INSERT INTO `tblsystemadmin`(`ADM_ID`, `ADM_FIRST_NAME`, `ADM_LAST_NAME`,`ADM_EMAIL`,`ADM_PASSWORD`) VALUES ('$email','$fname','$lname','$email','$pass')";
        $res = $this->db->query($Qins);
        return $res;
    }
    public function chkAdminModel($email,$encPass)
    {
        $sql = "SELECT * FROM `tblsystemadmin` WHERE `ADM_EMAIL`='$email' AND `ADM_PASSWORD`='$encPass' AND `ADM_STATUS` <> 'BLOCKED'";
        $rs = $this->db->query($sql);
        return $rs;
    }
    public function chkAdminUsrExistance($email)
    {
      $sql = "SELECT `ADM_EMAIL` FROM `tblsystemadmin` WHERE `ADM_EMAIL`='$email';";
      $rs = $this->db->query($sql);
      return $rs;
    }
    public function GetUserDetailsModel($StudentID)
    {
      $sql="SELECT pre.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstudent` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE st.STUDENT_ID='$StudentID';";
      $rs = $this->db->query($sql);
      return $rs;
    }

    public function GetAcademicSectionModel($val)
    {
      if($val=='1')
      {
        $sql="SELECT `SECTION_ID` AS ID, `SECTION_NAME` AS NAME FROM `tblacademicsections`;";
        $rs = $this->db->query($sql);
        return $rs;
      }

      if($val=='2')
      {
        $sql="SELECT `DEPARTMENT_ID` AS ID, `DEPARTMENT_NAME` AS NAME FROM `tbldepartment`;";
        $rs = $this->db->query($sql);
        return $rs;
      }
    }

    public function GetVisitorNameModel($sectionID)
    {
      // if($sectionT=='1')
      // {
        // $sql="SELECT V.VISITOR_ID,VI.VISITOR_FIRST_NAME,SEC.SECTION_NAME,VI.VISITOR_LAST_NAME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tblacademicsections` sec ON sec.SECTION_ID=V.VISIT_SECTION;";
        $sql="SELECT DISTINCT V.VISITOR_ID,V.VISITOR_FIRST_NAME,SEC.SECTION_NAME,V.VISITOR_LAST_NAME FROM `tblvisitingdetails` VI INNER JOIN `tblvisitors` V ON VI.VISITOR_ID =V.VISITOR_ID INNER JOIN `tblacademicsections` sec ON sec.SECTION_ID=vi.VISIT_SECTION WHERE sec.SECTION_ID='$sectionID'";
        $rs = $this->db->query($sql);
        return $rs;
      // }
      // if($sectionT=='2')
      // {
      //   $sql="SELECT V.VISITOR_ID,VI.VISITOR_FIRST_NAME,SEC.SECTION_NAME,VI.VISITOR_LAST_NAME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tbldepartment` dt ON V.VISIT_SECTION=dt.DEPARTMENT_ID;";
      //   $rs = $this->db->query($sql);
      //   return $rs;
      // }
    }

    public function GetVisitorDetailsModel($visitorId,$sectionT)
    {
      if($sectionT=='1')
      {
        // $sql="SELECT V.VISIT_PURPOSE ,V.VISITOR_ID,VI.VISITOR_FIRST_NAME,VI.VISITOR_LAST_NAME,VI.VISITOR_CONTACT,V.STATUS,V.IN_DATE_TIME,V.OUT_DATE_TIME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tblacademicsections` sec ON sec.SECTION_ID=V.VISIT_SECTION WHERE V.VISITOR_ID='$visitorId' AND V.VISIT_SECTION='$sectionID';";
        $sql="SELECT V.VISIT_PURPOSE ,V.VISITOR_ID,SEC.SECTION_NAME,VI.VISITOR_FIRST_NAME,VI.VISITOR_LAST_NAME,VI.VISITOR_CONTACT,V.STATUS,V.IN_DATE_TIME,V.OUT_DATE_TIME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tblacademicsections` sec ON sec.SECTION_ID=V.VISIT_SECTION WHERE V.VISITOR_ID='$visitorId';";
        $rs = $this->db->query($sql);
        return $rs;
      }
      if($sectionT=='2')
      {
        // $sql="SELECT V.VISIT_PURPOSE , V.VISITOR_ID,VI.VISITOR_FIRST_NAME,VI.VISITOR_LAST_NAME,VI.VISITOR_CONTACT,V.STATUS,V.IN_DATE_TIME,V.OUT_DATE_TIME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tbldepartment` dt ON V.VISIT_SECTION=dt.DEPARTMENT_ID WHERE V.VISITOR_ID='$visitorId' AND V.VISIT_SECTION='$sectionID';";
        $sql="SELECT V.VISIT_PURPOSE , V.VISITOR_ID,SEC.SECTION_NAME,VI.VISITOR_FIRST_NAME,VI.VISITOR_LAST_NAME,VI.VISITOR_CONTACT,V.STATUS,V.IN_DATE_TIME,V.OUT_DATE_TIME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tbldepartment` dt ON V.VISIT_SECTION=dt.DEPARTMENT_ID WHERE V.VISITOR_ID='$visitorId';";
        $rs = $this->db->query($sql);
        return $rs;
      }

    }

    public function GetVisitorAllDetailsModel($vname)
    {
       $sql="SELECT V.VISIT_PURPOSE ,V.VISITOR_ID,SEC.SECTION_NAME,VI.VISITOR_FIRST_NAME,VI.VISITOR_LAST_NAME,VI.VISITOR_CONTACT,V.STATUS,V.IN_DATE_TIME,V.OUT_DATE_TIME FROM (SELECT `VISITOR_ID` ,`STATUS`,`VISIT_PURPOSE`,`VISIT_SECTION`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblvisitingdetails` GROUP BY `VISITOR_ID`) as V INNER JOIN `tblvisitors` VI ON V.VISITOR_ID=VI.VISITOR_ID INNER JOIN `tblacademicsections` sec ON sec.SECTION_ID=V.VISIT_SECTION WHERE VI.VISITOR_FIRST_NAME LIKE '%".$vname."%' OR VI.VISITOR_CONTACT LIKE '%".$vname."%';";
       $rs = $this->db->query($sql);
       return $rs;
    }

    public function GetDepartmentModel()
    {
      $sql="SELECT * FROM `tbldepartment`";
      $rs = $this->db->query($sql);
      return $rs;
    }

    public function GetCourseModel($DepartmentID)
    {
      $sql="SELECT c.COURSE_ID , c.COURSE_NAME FROM `tblcourse` c INNER JOIN `tbldepartment` d ON c.DEPARTMENT_ID=d.DEPARTMENT_ID WHERE c.DEPARTMENT_ID='$DepartmentID';";
      $rs = $this->db->query($sql);
      return $rs;
    }

    public function GetStudentModel($CourseID)
    {
      $sql="SELECT s.STUDENT_ID,s.FIRST_NAME,s.LAST_NAME FROM `tblstudent` 	s INNER JOIN `tblcourse` c ON c.COURSE_ID=s.COURSE_ID WHERE c.COURSE_ID='$CourseID';";
      $rs = $this->db->query($sql);
      return $rs;
    }

    public function viewAvailStudentsModel()
    {
      $str=$this->input->post('str',TRUE);
      if($str=='')
      {
        //$sql="SELECT st.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,st.EMAIL_ID,st.COURSE_YEAR,st.SEMESTER,c.COURSE_NAME FROM`tblstudent`  st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tblcourse` c ON c.COURSE_ID=st.COURSE_ID;";
       $sql="SELECT pre.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,st.EMAIL_ID,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstudent` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID;";
        $rs=$this->db->query($sql);
        return $rs;
      }
      else 
      {
       $sql="SELECT pre.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,st.EMAIL_ID,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstudent` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE st.FIRST_NAME LIKE '%".$str."%' OR st.STUDENT_ID LIKE '%".$str."%' OR st.MOBILE_NUMBER LIKE '%".$str."%' OR dt.DEPARTMENT_NAME LIKE '%".$str."%';";
      //  $sql="SELECT pre.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstudent` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE st.FIRST_NAME LIKE '%".$str."%' OR st.STUDENT_ID LIKE '%".$str."%' OR st.MOBILE_NUMBER LIKE '%".$str."%' OR dt.DEPARTMENT_NAME LIKE '%".$str."%';";
        $rs=$this->db->query($sql);
        return $rs;
      }
    }

    public function getStudentByIDModel($str)
    {
      $sql="SELECT st.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,st.EMAIL_ID,st.COURSE_YEAR,st.SEMESTER,c.COURSE_NAME FROM`tblstudent`  st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tblcourse` c ON c.COURSE_ID=st.COURSE_ID WHERE st.STUDENT_ID='$str' or st.REGISTRATION_ID='$str';";
      $rs=$this->db->query($sql);
      return $rs;
    }

    public function getNewUserModel($usrType,$str)
    {
      if($usrType=='' && $str=='')
      {
        $sql="SELECT `REGISTRATION_ID`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, ru.`REGISTRATION_TYPE`,`REG_USR_CONTACT`,`REG_USER_QR`, `STATUS`,rt.TYPE_NAME FROM `registereduser` ru INNER JOIN `registeredusertype` rt ON rt.`REGISTRATION_TYPE`=ru.`REGISTRATION_TYPE`  order by ru.STATUS desc";
        $rs=$this->db->query($sql);
        return $rs;
      }
      elseif($usrType!='' && $str=='')
      {
        $sql="SELECT `REGISTRATION_ID`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, ru.`REGISTRATION_TYPE`,`REG_USR_CONTACT`,`REG_USER_QR`, `STATUS`,rt.TYPE_NAME FROM `registereduser` ru INNER JOIN `registeredusertype` rt ON rt.`REGISTRATION_TYPE`=ru.`REGISTRATION_TYPE` WHERE  ru.REGISTRATION_TYPE='$usrType'  order by ru.STATUS desc";
        $rs=$this->db->query($sql);
        return $rs;
      }
      elseif($usrType!='' && $str!='')
      {
        $sql="SELECT `REGISTRATION_ID`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, ru.`REGISTRATION_TYPE`,`REG_USR_CONTACT`,`REG_USER_QR`, `STATUS`,rt.TYPE_NAME FROM `registereduser` ru INNER JOIN `registeredusertype` rt ON rt.`REGISTRATION_TYPE`=ru.`REGISTRATION_TYPE` WHERE  ru.REGISTRATION_TYPE='$usrType' and (ru.REGISTRATION_ID LIKE '%".$str."%' or ru.REG_USR_FIRSTNAME LIKE '%".$str."%' OR ru.REG_USR_CONTACT LIKE '%".$str."%') order by ru.STATUS desc";
        $rs=$this->db->query($sql);
        return $rs;
      }
      elseif($usrType=='' && $str!='')
      {
        $sql="SELECT `REGISTRATION_ID`, `REG_USR_FIRSTNAME`, `REG_USR_LASTNAME`, ru.`REGISTRATION_TYPE`,`REG_USR_CONTACT`,`REG_USER_QR`, `STATUS`,rt.TYPE_NAME FROM `registereduser` ru INNER JOIN `registeredusertype` rt ON rt.`REGISTRATION_TYPE`=ru.`REGISTRATION_TYPE` WHERE ru.REGISTRATION_ID LIKE '%".$str."%' or ru.REG_USR_FIRSTNAME LIKE '%".$str."%' OR ru.REG_USR_CONTACT LIKE '%".$str."%' order by ru.STATUS desc";
        $rs=$this->db->query($sql);
        return $rs;
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

    public function getAllStaffDetailsModel()
    {
      $str=$this->input->post('str',TRUE);
      if($str=='')
      {
        $sql="SELECT regusr.REG_USER_QR,regusr.IMAGE,st.REGISTRATION_ID,st.STAFF_ID,st.FIRST_NAME,st.LAST_NAME,st.ADDRESS_ID,dt.DEPARTMENT_NAME,dt.DEPARTMENT_ID,st.MOBILE_NUMBER ,st.EMAIL_ID,st.DESIGNATION FROM `tblstaff` st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` regusr ON regusr.REGISTRATION_ID=st.REGISTRATION_ID";
        $rs=$this->db->query($sql);
        return $rs;
      }
      else 
      {
        $sql="SELECT regusr.REG_USER_QR,regusr.IMAGE,st.REGISTRATION_ID,st.STAFF_ID,st.FIRST_NAME,st.LAST_NAME,dt.DEPARTMENT_NAME,dt.DEPARTMENT_ID,st.MOBILE_NUMBER ,st.EMAIL_ID,st.DESIGNATION FROM `tblstaff` st INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` regusr ON regusr.REGISTRATION_ID=st.REGISTRATION_ID WHERE st.FIRST_NAME LIKE '%".$str."%' OR st.STAFF_ID LIKE '%".$str."%' OR st.MOBILE_NUMBER LIKE '%".$str."%' OR dt.DEPARTMENT_NAME LIKE '%".$str."%';";
        $rs=$this->db->query($sql);
        return $rs;
      }
    }

    public function completeStudentActivityViewModel($str)
    {
      $sql="SELECT pre.REGISTRATION_ID,st.STUDENT_ID,st.FIRST_NAME,st.LAST_NAME,st.EMAIL_ID,dt.DEPARTMENT_NAME,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM `tblpeoplepresence` as pre INNER JOIN `tblstudent` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE st.STUDENT_ID='$str' or st.REGISTRATION_ID='$str' order by pre.PRESENCE_STATUS ASC ";
      $rs=$this->db->query($sql);
      return $rs;
    }

    public function CountStudentInsideModel()
    {
      $sql="SELECT COUNT(DISTINCT st.REGISTRATION_ID) as stuCount FROM `registereduser` st INNER JOIN `tblpeoplepresence` pre ON pre.REGISTRATION_ID=st.REGISTRATION_ID WHERE pre.PRESENCE_STATUS='IN' AND REGISTRATION_TYPE='2';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }
    public function CountStaffInsideModel()
    {
      $sql="SELECT COUNT(DISTINCT st.REGISTRATION_ID) as staffCount FROM `registereduser` st INNER JOIN `tblpeoplepresence` pre ON pre.REGISTRATION_ID=st.REGISTRATION_ID WHERE pre.PRESENCE_STATUS='IN' AND REGISTRATION_TYPE='1';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }
    public function CountGaurdianInsideModel()
    {
      $sql="SELECT COUNT(DISTINCT `VISITOR_ID`) AS GaurdianCount FROM `tblvisitingdetails` VI INNER JOIN `tblvisitorcategories` CAT ON VI.CATEGORY_ID=CAT.CATEGORY_ID WHERE VI.STATUS='IN' AND VI.CATEGORY_ID='VICAT02';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }
    public function CountOthersInsideModel()
    {
      $sql="SELECT COUNT(DISTINCT `VISITOR_ID`) AS OtherCount FROM `tblvisitingdetails` VI INNER JOIN `tblvisitorcategories` CAT ON VI.CATEGORY_ID=CAT.CATEGORY_ID WHERE VI.STATUS='IN' AND VI.CATEGORY_ID <> 'VICAT02';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }

    // ------------------

    public function CountRegStudentModel()
    {
      $sql="SELECT COUNT(DISTINCT st.REGISTRATION_ID) as stuCount FROM `registereduser` st where REGISTRATION_TYPE='2';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }

    public function CountRegStaffModel()
    {
      $sql="SELECT COUNT(DISTINCT st.REGISTRATION_ID) as staffCount FROM `registereduser` st  WHERE REGISTRATION_TYPE='1';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }

    public function CountRegVisitorModel()
    {
      $sql="SELECT COUNT(DISTINCT `VISITOR_ID`) AS OtherCount FROM `tblvisitingdetails` VI INNER JOIN `tblvisitorcategories` CAT ON VI.CATEGORY_ID=CAT.CATEGORY_ID WHERE VI.CATEGORY_ID <> 'VICAT02';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }

    public function CountRegGaurdianModel()
    {
      $sql="SELECT COUNT(DISTINCT `VISITOR_ID`) AS OtherCount FROM `tblvisitingdetails` VI INNER JOIN `tblvisitorcategories` CAT ON VI.CATEGORY_ID=CAT.CATEGORY_ID WHERE VI.CATEGORY_ID == 'VICAT02';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }
    public function CountRegWorkersModel()
    {
      $sql="SELECT COUNT(DISTINCT `VISITOR_ID`) AS OtherCount FROM `tblvisitingdetails` VI INNER JOIN `tblvisitorcategories` CAT ON VI.CATEGORY_ID=CAT.CATEGORY_ID WHERE VI.CATEGORY_ID <> 'VICAT02' and VI.CATEGORY_ID <> 'VICAT01' and VI.CATEGORY_ID <> 'VICAT03';";
      $rs=$this->db->query($sql);
      return  $rs->result();
    }

    // ---------------------
    public function GetAdminModel()
    {
      $str=$this->input->post('str',TRUE);
      if($str=='')
      {
      $sql="SELECT `ADM_ID`, `ADM_FIRST_NAME`, `ADM_LAST_NAME`, `ADM_STATUS`, `ADM_EMAIL`, `ADM_CONTACT`, `ADM_PASSWORD`, `ADM_DOB`, `ADM_QR` FROM `tblsystemadmin` where `ADM_ID` <> 'preetsahu17@gmail.com' ;";
      $rs=$this->db->query($sql);
      return $rs;
      }
      else 
      {
        $sql="SELECT `ADM_ID`, `ADM_FIRST_NAME`, `ADM_LAST_NAME`, `ADM_STATUS`, `ADM_EMAIL`, `ADM_CONTACT`, `ADM_PASSWORD`, `ADM_DOB`, `ADM_QR` FROM `tblsystemadmin` where `ADM_ID` <> 'preetsahu17@gmail.com' AND `ADM_FIRST_NAME` LIKE '%".$str."%';";
        $rs=$this->db->query($sql);
        return $rs;
      }
    }

    public function GetDetailsModel()
    {
      $sql="SELECT `ADM_ID`, `ADM_FIRST_NAME`, `ADM_LAST_NAME`, `ADM_STATUS`, `ADM_EMAIL`, `ADM_CONTACT`, `ADM_PASSWORD`, `ADM_DOB`, `ADM_QR` FROM `tblsystemadmin` where `ADM_ID` <> 'preetsahu17@gmail.com';";
      $rs=$this->db->query($sql);
      return $rs;
    }

    public function DeleteAdminModel()
    {
      $email = $this->input->get('eid',TRUE);
      $this->db->where('ADM_ID',$email);
      $this->db->delete('tblsystemadmin');
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    
    public function removeRegUserModel()
    {
      $uid = $this->input->get('uid',TRUE);
      $inSql="INSERT INTO `removeduser` SELECT * FROM `registereduser` WHERE `REGISTRATION_ID`='$uid'";
      $this->db->query($inSql);
      // --------------------------------
      
      $this->db->where('REGISTRATION_ID',$uid);
      $this->db->delete('registereduser');
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function DeleteRegisteredStudentModel()
    {
      $regID = $this->input->get('regID',TRUE);
      $this->db->where('REGISTRATION_ID',$regID);
      $this->db->delete('registereduser');
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function DeleteRegisteredStaffModel()
    {
      $regID = $this->input->get('regID',TRUE);
      $this->db->where('REGISTRATION_ID',$regID);
      $this->db->delete('registereduser');
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function viewAvailStaffModel()
    {
      $deptID=$this->input->post('deptID',TRUE);
      if($deptID=='')
      {
        //$sql="SELECT s.`REGISTRATION_ID`,s.STAFF_ID,s.`FIRST_NAME`,s.`LAST_NAME`, s.`EMAIL_ID`,s.`MOBILE_NUMBER`,s.`DEPARTMENT_ID`,s.`DESIGNATION`,d.`DEPARTMENT_NAME` FROM `tblstaff` s INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=s.REGISTRATION_ID INNER JOIN `tbldepartment` d ON d.DEPARTMENT_ID=s.DEPARTMENT_ID";
        $sql="SELECT pre.REGISTRATION_ID,st.FIRST_NAME ,st.STAFF_ID,st.EMAIL_ID,st.LAST_NAME,dt.DEPARTMENT_NAME,st.DESIGNATION,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstaff` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE reguser.REGISTRATION_TYPE='1';";
        $rs=$this->db->query($sql);
        return $rs;
      }
      else 
      {
        $sql="SELECT s.`REGISTRATION_ID`,s.STAFF_ID,s.`FIRST_NAME`,s.`LAST_NAME`, s.`EMAIL_ID`,s.`MOBILE_NUMBER`,s.`DEPARTMENT_ID`,s.`DESIGNATION`,d.`DEPARTMENT_NAME` FROM `tblstaff` s INNER JOIN `registereduser` reg ON reg.REGISTRATION_ID=s.REGISTRATION_ID INNER JOIN `tbldepartment` d ON d.DEPARTMENT_ID=s.DEPARTMENT_ID WHERE d.DEPARTMENT_NAME LIKE '%".$deptID."%';";
        $rs=$this->db->query($sql);
        return $rs;
      }
    }

    public function recentStaffActivityViewModel($str)
    {
      // $sql="SELECT pre.REGISTRATION_ID,st.FIRST_NAME ,st.STAFF_ID,st.EMAIL_ID,st.LAST_NAME,dt.DEPARTMENT_ID,dt.DEPARTMENT_NAME,st.DESIGNATION,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME FROM (SELECT `REGISTRATION_ID` ,`PRESENCE_STATUS`,`OUT_DATE_TIME`, MAX(IN_DATE_TIME) AS IN_DATE_TIME FROM `tblpeoplepresence` GROUP BY `REGISTRATION_ID`) as pre INNER JOIN `tblstaff` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE reguser.REGISTRATION_TYPE='1' And reguser.REGISTRATION_ID='$str';";
      $sql="SELECT reguser.REGISTRATION_ID,reguser.STATUS,reguser.IMAGE,st.FIRST_NAME ,st.STAFF_ID,st.EMAIL_ID,st.LAST_NAME,dt.DEPARTMENT_ID,dt.DEPARTMENT_NAME,st.DESIGNATION,st.MOBILE_NUMBER FROM `registereduser` reguser INNER JOIN `tblstaff` st ON st.`REGISTRATION_ID`=reguser.`REGISTRATION_ID` INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID  WHERE reguser.REGISTRATION_TYPE='1' and reguser.REGISTRATION_ID='$str';";
      $rs=$this->db->query($sql);
      return $rs;
    }

    public function completeStaffActivityViewModel($str)
    {
      $sql="SELECT pre.REGISTRATION_ID,st.FIRST_NAME ,st.STAFF_ID,st.EMAIL_ID,st.LAST_NAME,dt.DEPARTMENT_ID,dt.DEPARTMENT_NAME,st.DESIGNATION,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME  FROM `tblpeoplepresence` as pre INNER JOIN `tblstaff` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE reguser.REGISTRATION_TYPE='1' AND reguser.REGISTRATION_ID='$str';";
      $rs=$this->db->query($sql);
      return $rs->result();
    }

    public function activityViewModel()
    {
      $sql="SELECT pre.REGISTRATION_ID,st.FIRST_NAME ,st.STAFF_ID,st.EMAIL_ID,st.LAST_NAME,dt.DEPARTMENT_ID,dt.DEPARTMENT_NAME,st.DESIGNATION,st.MOBILE_NUMBER ,pre.PRESENCE_STATUS,pre.IN_DATE_TIME,pre.OUT_DATE_TIME  FROM `tblpeoplepresence` as pre INNER JOIN `tblstaff` st ON pre.REGISTRATION_ID=st.REGISTRATION_ID INNER JOIN `tbldepartment` dt ON st.DEPARTMENT_ID=dt.DEPARTMENT_ID INNER JOIN `registereduser` reguser ON reguser.REGISTRATION_ID=pre.REGISTRATION_ID WHERE reguser.REGISTRATION_TYPE='1' AND reguser.REGISTRATION_ID='8965756856';";
      $rs=$this->db->query($sql);
      return $rs->result();
    }

    public function ChangeAdminStatusModel()
    {
      $email = $this->input->get('eid',TRUE);
      $status = $this->input->get('status',TRUE);

      if($status=='BLOCKED')
      {
        $SQL = "UPDATE `tblsystemadmin` SET `ADM_STATUS`='ACTIVATED' WHERE `ADM_ID`='$email';";
        $rs = $this->db->query($SQL);
        return $rs;
      }
      else 
      {
        $SQL = "UPDATE `tblsystemadmin` SET `ADM_STATUS`='BLOCKED' WHERE `ADM_ID`='$email';";
        $rs = $this->db->query($SQL);
        return $rs;
      }
    }

    public function ChangeUserStatusModel()
    {
      $uid = $this->input->get('uid',TRUE);
      $status = $this->input->get('status',TRUE);

      if($status=='BLOCKED')
      {
        $SQL = "UPDATE `registereduser` SET `STATUS`='ACTIVE' WHERE `REGISTRATION_ID`='$uid';";
        $rs = $this->db->query($SQL);
        return $rs;
      }
      else 
      {
        $SQL = "UPDATE `registereduser` SET `STATUS`='BLOCKED' WHERE `REGISTRATION_ID`='$uid';";
        $rs = $this->db->query($SQL);
        return $rs;
      }
    }

    public function saveData($data)
	  {
      if($this->db->insert('tblsystemadmin',$data))
      {
      return 1;
      }
      else
      {
      return 0;
      }
    }

    public function AdminDetails($email)
    {
        $sql = "SELECT * FROM `tblsystemadmin` WHERE `ADM_EMAIL`='$email'";
        $rs = $this->db->query($sql);
        return $rs;
    }

    public function get_single_user($id)
    {
        $u = "select * from users where uid = '$id'";
        return $this->db->query($u)->result();
    }

    public function upd_user_model($fname,$lname,$phone,$email,$id)
    {
        $upd = "UPDATE users SET fname = '$fname', lname = '$lname', phone = '$phone', email = '$email' where uid  = '$id'";
        return $this->db->query($upd);
    }

}