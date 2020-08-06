<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller
{

    public function Profile()
    {
        if(isset($_SESSION['EMAIL']))
        $this->load->view('admin/profile');
        else
        redirect('Admin-Login-View');
    }

    public function Dashboard()
	{
        if(isset($_SESSION['MOB']))
        {
            $data['stuCount']=$this->AdminModel->CountStudentInsideModel();
            $data['staffCount']=$this->AdminModel->CountStaffInsideModel();
            $data['GaurdianCount']=$this->AdminModel->CountGaurdianInsideModel();
            $data['OthersCount']=$this->AdminModel->CountOthersInsideModel();
            $this->load->view('admin/dashboard',$data);
            // $this->load->view('admin/dashboard');
        }
        else
        redirect('Admin-Login-View');
    }

    public function ActivateAdmin()
    {
        // if(isset($_SESSION['EMAIL']))
        $this->load->view('admin/ActivateAdmin');
        // else
        // redirect('Admin-Login-View');
    }

    public function AdminLogout()
    {
         // Unset User Data
         $this->session->unset_userdata('NAME');
         $this->session->unset_userdata('ADMID');
         $this->session->unset_userdata('MOB');
         $this->session->unset_userdata('EMAIL');
         $this->session->unset_userdata('STATUS');
         $this->session->unset_userdata('adm_logged_in');
         
        if (!$this->session->userdata('usr_logged_in'))
        {
            $this->session->sess_destroy();
        }
        redirect('Admin-Login-View');
    }

	public function registerAdminView()
	{
        if(isset($_SESSION['MOB']) AND $_SESSION['NAME']!='PREET SAHU')
        redirect('Admin-Dashboard');
        else
        $this->load->view('admin/register');
    }
    
    public function createAdmin()
    {
        $this->load->view('admin/createAdmin');
    }

    public function AllUsers()
	{
          $this->load->view('admin/users');
    }

    public function loginAdminView()
	{
        if(isset($_SESSION['EMAIL']))
        redirect('Admin-Dashboard');
        else
        $this->load->view('admin/login');
    }

    public function ResetPasswordView()
    {
        $this->load->view('admin/forgot_password');
    }

    public function RegisterAdmin()
    {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
            $pass = md5($pass);
            $chkDuplicate=$this->AdminModel->chkAdminUsrExistance($email);
            $chkFlag=$chkDuplicate->num_rows();
            if($chkFlag>0)
            {
                $this->session->set_flashdata('err',"This credential are already registered to system !");
                redirect('Register-Admin-View');
            }
            else
            {
                $res = $this->AdminModel->AdminRegistration($fname,$lname,$email,$pass);
                if($res>0)
                {
                    $this->session->set_flashdata('success',"Registered successfully");
                    redirect('Admin-Login-View');
                }
                else
                {
                    $this->session->set_flashdata('err',"Something went wrong please try again");
                    redirect('Register-Admin-View');
                }
            }
    }

    public function ChkLogin()
    {

        $email = $this->input->post('txtEmail');
        $pass = $this->input->post('txtPass');
        $encPass = md5($pass);

        $res = $this->AdminModel->chkAdminModel($email,$encPass);
        $row = $res->num_rows();
		    if($res->num_rows()>0)
			{
                $r = $this->AdminModel->AdminDetails($email);
                $r = $r->row_array();
                $admin = array(
                    'NAME' => $r['ADM_FIRST_NAME'].' '.$r['ADM_LAST_NAME'],
                    'ADMID' => $r['ADM_ID'],
                    'EMAIL' => $r['ADM_EMAIL'],
                    'MOB' => $r['ADM_CONTACT'],
                    'STATUS' => $r['ADM_STATUS'],
                    'adm_logged_in' => true
                );

                $this->session->set_userdata($admin);
                redirect('Admin-Dashboard');
			}
			else
			{
                //$this->session->unset($admin);
                $this->session->set_flashdata('err',"Invalid Credential ! please try again");
                redirect('Admin-Login-View');
			}


    }

    public function GetAdmin()
    {
        ///ajax request
        $data=$this->AdminModel->GetAdminModel()->result();
        echo json_encode($data);
    }

    public function DeleteAdmin()
    {
        ///ajax request
        $res=$this->AdminModel->DeleteAdminModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

    public function removeRegUser()
    {
         ///ajax request
         $res=$this->AdminModel->removeRegUserModel();
         $msg['success']=false;
         if($res){
             $msg['success']=true;
         }
         echo json_encode($msg);
    }

    public function ChangeAdminStatus()
    {
        ///ajax request
        $res=$this->AdminModel->ChangeAdminStatusModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

    public function viewUsrActivities()
    {
        $this->load->view('admin/table_data_tables');
    }

    public function availStudentPage()
    {
        $this->load->view('admin/studentAvailability');
    }

    public function viewAvailStudents()
    {
        ///ajax request
        $data=$this->AdminModel->viewAvailStudentsModel()->result();
        echo json_encode($data);
    }

    public function viewStudentPage()
    {
        $this->load->view('admin/StudentsSearch');
    }

    public function getAllStudentDetails()
    {
        $res=$this->AdminModel->getAllStudentDetailsModel()->result();
        echo json_encode($res);
    }

    public function availStaffpage()
    {
        $this->load->view('admin/staffAvailability');
    }

    public function viewAvailStaff()
    {
        ///ajax request
        $data=$this->AdminModel->viewAvailStaffModel()->result();
        echo json_encode($data);
    }

    public function viewStaffpage()
    {
        $this->load->view('admin/StaffSearch');
    }

    public function getAllStaffDetails()
    {
        $res=$this->AdminModel->getAllStaffDetailsModel()->result();
        echo json_encode($res);
    }

   
    public function staffActivityView()
    {
        $str=$this->input->get('regID');
        
        if(!$str)
        $this->load->view('admin/staffAvailability');
        else
        {
        $staff['recentStaffActivity']=$this->AdminModel->recentStaffActivityViewModel($str)->result();
        $staff['completeStaffActivity']=$this->AdminModel->completeStaffActivityViewModel($str);
        $this->load->view('admin/staffActivityView',$staff);
        }


         //passing registration id to generatepdf function using session 
        $this->session->set_flashdata('staffActivity',$str);
            // $this->session->set_userdata($str);
    }
//////////////////////////////////////////////pdf///////////////////////////////////////////////////////////////////
public function generate_pdf()
{   
    ///getting registration id from session
    $str=$this->session->flashdata('staffActivity');

	//load pdf library
    $this->load->library('StaffReport');
 
	
	$pdf = new StaffReport(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('https://www.nitrr.ac.in');
	$pdf->SetTitle('Staff Acitivity Report');
	$pdf->SetSubject('Report generated using Codeigniter and TCPDF');
	$pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

	// set default header data
	//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set font
	$pdf->SetFont('times', 'BI', 12);
	
	// ---------------------------------------------------------
	
	
	//Generate HTML table data from MySQL - start
	$template = array(
		'table_open' => '<table border="0" cellpadding="1" cellspacing="1">'
	);

	$this->table->set_template($template);
    $this->table->set_heading('NAME:','MOBILE:', 'DEPARTMENT NAME:', 'REGISTRATION ID:');

    $staffactivity = $this->AdminModel->completeStaffActivityViewModel($str);

    foreach ($staffactivity as $s)
    {
        $regid=$s->REGISTRATION_ID;
        $mob=$s->MOBILE_NUMBER;
        $name=$s->FIRST_NAME.' '.$s->LAST_NAME;
        $dept=$s->DEPARTMENT_NAME;
       
    }
    $this->table->add_row($name,$mob,$dept,$regid);
    $html = $this->table->generate();
    //Generate HTML table data from MySQL - start
    // // add a page
	$pdf->AddPage();
	
	// output the HTML content
	$pdf->writeHTML($html, true, false, true, false, '');
	
	// // reset pointer to the last page
	$pdf->lastPage();


	$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
	);

	$this->table->set_template($template);

    $this->table->set_heading('DATE', 'IN TIME', 'OUT TIME', 'SPEND HOURS');
    foreach ($staffactivity as $sca)
    {
        $date1=date_create("$sca->IN_DATE_TIME");
        $date2=date_create("$sca->OUT_DATE_TIME");
        $dateFormat=date_format($date1,"d-M-Y");
        $inTime=date_format($date1,"H:i:s:A");
        $outTime=date_format($date2,"g:i:s:A");
        $diff=date_diff($date1,$date2);
        $this->table->add_row($dateFormat,$inTime, $outTime,$diff->format("%h hour %I minutes %s sec"));
    }
    
	$html = $this->table->generate();
	//Generate HTML table data from MySQL - end
	
	// add a page
	$pdf->AddPage();
	
	// output the HTML content
	$pdf->writeHTML($html, true, false, true, false, '');
	
	// reset pointer to the last page
	$pdf->lastPage();

	//Close and output PDF document
    $pdf->Output($str.'.pdf', 'I');
    // echo json_encode($msg);
    
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function studentActivityView()
    {
        $str=$this->input->get('SID');
        
        if(!$str)
            $this->load->view('admin/studentAvailability');
        else
        {
            $student['StudentDetails']=$this->AdminModel->GetStudentByIDModel($str)->result();
            $student['completeStudentActivity']=$this->AdminModel->completeStudentActivityViewModel($str)->result();
            $this->load->view('admin/studentActivityView',$student);
        }
        //passing registration id to generatepdf function using session 
        $this->session->set_flashdata('studentActivity',$str);
        // $this->session->set_userdata($str);
    }

    public function generate_student_report()
    {
         ///getting registration id from session
        $str=$this->session->flashdata('studentActivity');

        //load pdf library
        $this->load->library('StudentReport');
        
        $pdf = new StudentReport(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('https://www.nitrr.ac.in');
        $pdf->SetTitle('Student Acitivity Report');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="0" cellpadding="1" cellspacing="1">'
	);

	$this->table->set_template($template);
    $this->table->set_heading('NAME:','MOBILE:', 'DEPARTMENT NAME:', 'STUDENT ID:','COURSE:','SEMESTER:');

    $studentDetails = $this->AdminModel->GetStudentByIDModel($str)->result();

    foreach ($studentDetails as $s)
    {
        $sid=$s->STUDENT_ID;
        $mob=$s->MOBILE_NUMBER;
        $name=$s->FIRST_NAME.' '.$s->LAST_NAME;
        $dept=$s->DEPARTMENT_NAME;
        $course=$s->COURSE_NAME;
        $SEM=$s->SEMESTER;
        $this->table->add_row($name,$mob,$dept,$sid,$course,$SEM);
    }
    
    $html = $this->table->generate();
    //Generate HTML table data from MySQL - start
    // // add a page
	$pdf->AddPage();
	
	// output the HTML content
	$pdf->writeHTML($html, true, false, true, false, '');
	
	// // reset pointer to the last page
	$pdf->lastPage();


	$template = array(
		'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
	);

	$this->table->set_template($template);

    $this->table->set_heading('DATE', 'IN TIME', 'OUT TIME', 'SPEND HOURS');
    $studentactivity = $this->AdminModel->completeStudentActivityViewModel($str)->result();
    foreach ($studentactivity as $sca)
    {
        $date1=date_create("$sca->IN_DATE_TIME");
        $date2=date_create("$sca->OUT_DATE_TIME");
        $dateFormat=date_format($date1,"d-M-Y");
        $inTime=date_format($date1,"H:i:s:A");
        $outTime=date_format($date2,"g:i:s:A");
        $diff=date_diff($date1,$date2);
        $this->table->add_row($dateFormat,$inTime, $outTime,$diff->format("%h hour %I minutes %s sec"));
    }
    
	$html = $this->table->generate();
	//Generate HTML table data from MySQL - end
	
	// add a page
	$pdf->AddPage();
	
	// output the HTML content
	$pdf->writeHTML($html, true, false, true, false, '');
	
	// reset pointer to the last page
	$pdf->lastPage();

	//Close and output PDF document
    $pdf->Output($str.'.pdf', 'I');
    // echo json_encode($msg);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function DeleteRegisteredStudent()
    {
        $res=$this->AdminModel->DeleteRegisteredStudentModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }
    
    public function DeleteRegisteredStaff()
    {
        $res=$this->AdminModel->DeleteRegisteredStaffModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }
    
    public function GetUserDetails()
    {
        $StudentID = $this->input->post('id',TRUE);
        $data=$this->AdminModel->GetUserDetailsModel($StudentID)->result();
        echo json_encode($data);
    }

    public function GetDetails()
    {
        $data=$this->AdminModel->GetDetailsModel()->result();
        echo json_encode($data);
    }

    public function GetDepartment()
    {
      $usrType = $this->input->post('id',TRUE);
      $data=$this->AdminModel->GetDepartmentModel()->result();
      echo json_encode($data);
    }

    public function activateNewUser()
    {
        $this->load->view('admin/ActivateUsers');
    }
    
    public function getNewUser()
    {
        $usrType = $this->input->post('utype',TRUE);
        $str = $this->input->post('str',TRUE);
        
        $data=$this->AdminModel->getNewUserModel($usrType,$str)->result();
        echo json_encode($data);
    }

    public function ChangeUserStatus()
    {
         ///ajax request
         $res=$this->AdminModel->ChangeUserStatusModel();
         $msg['success']=false;
         if($res){
             $msg['success']=true;
         }
         echo json_encode($msg);
    }

    public function GetCourse()
    {
        $DepartmentID = $this->input->post('id',TRUE);
        $data=$this->AdminModel->GetCourseModel($DepartmentID)->result();
        echo json_encode($data);
    }

    public function GetStudent()
    {
      $CourseID = $this->input->post('id',TRUE);
      $data=$this->AdminModel->GetStudentModel($CourseID)->result();
      echo json_encode($data);
    }

    public function GetStudentByName()
    {
        $data=$this->AdminModel->GetStudentModel($CourseID)->result();
        echo json_encode($data);
    }

    //----------------------------------------------  dashboard visitor search ----------------------------------
    public function GetAcademicSection()
    {
        $val= $this->input->post('id',TRUE);
        $data=$this->AdminModel->GetAcademicSectionModel($val)->result();
        echo json_encode($data);
    }

    public function GetVisitorName()
    {
        $sectionID= $this->input->post('sid',TRUE);
        // $sectionT= $this->input->post('stype',TRUE);
        $data=$this->AdminModel->GetVisitorNameModel($sectionID)->result();
        echo json_encode($data);
    }

    public function GetVisitorDetails()
    {
        $visitorId= $this->input->post('vid',TRUE);
        // $sectionID= $this->input->post('sid',TRUE);
        $sectionT= $this->input->post('stype',TRUE);
        // $data=$this->AdminModel->GetVisitorDetailsModel($visitorId,$sectionID,$sectionT)->result();
        $data=$this->AdminModel->GetVisitorDetailsModel($visitorId,$sectionT)->result();
        echo json_encode($data);
    }

    public function GetVisitorAllDetails()
    {
        $vname= $this->input->post('vname',TRUE);
        $data=$this->AdminModel->GetVisitorAllDetailsModel($vname)->result();
        echo json_encode($data);

    }
    
    public function CountStudentInside()
    {
        $data['stucount']=$this->AdminModel->CountStudentInsideModel()->result();
        $this->load->view('admin/dashboard',$data);
    }



}

?>
