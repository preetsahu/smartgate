<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserController extends CI_Controller
{
    public function usrLogout()
    {
        // Unset User Data
        $this->session->unset_userdata('uNAME');
        $this->session->unset_userdata('uSID');
        $this->session->unset_userdata('uqr');
        $this->session->unset_userdata('uEMAIL');
        $this->session->unset_userdata('uRTYPE');
        $this->session->unset_userdata('uMOB');
        $this->session->unset_userdata('usr_logged_in');
        
        // Check if user is logged into backend, if so do not delete session
        if (!$this->session->userdata('adm_logged_in'))
         {
            $this->session->sess_destroy();
         }
        redirect('User-Login-View');
    }

    public function ResetPasswordView()
    {
        $this->load->view('user/forgot_password');
    }
    
    public function usrLoginView()
	{
       if(isset($_SESSION['uEMAIL']))
        redirect('User-Dashboard');
       else
        $this->load->view('user/INDEX');
    }
    
    public function usrDashboard()
	{
        if(isset($_SESSION['uMOB']))
        {
            $data['stuCount']=$this->AdminModel->CountStudentInsideModel();
            $data['staffCount']=$this->AdminModel->CountStaffInsideModel();
            $data['GaurdianCount']=$this->AdminModel->CountGaurdianInsideModel();
            $data['OthersCount']=$this->AdminModel->CountOthersInsideModel();
            $this->load->view('user/UserDashboard',$data);
        }
        else
        redirect('User-Login-View');
    }

    public function usrQRView()
    {
        if(isset($_SESSION['uMOB']))
        {
         $this->load->view('user/UserQR');
        }
        else
         redirect('User-Login-View');
    }

    public function studentProfileView()
    {
        if(isset($_SESSION['uMOB']) && $_SESSION['uRTYPE']=='2')
        {
            // $str=$_SESSION['uSID'];
            $str= $this->session->userdata('uSID');
            if(!$str)
                redirect('User-Login-View');
            else
            {
                $student['StudentDetails']=$this->AdminModel->GetStudentByIDModel($str)->result();
                $student['completeStudentActivity']=$this->AdminModel->completeStudentActivityViewModel($str)->result();
                $this->load->view('user/student',$student);
            }
            //passing registration id to generatepdf function using session 
            $this->session->set_flashdata('studentActivity',$str);
            // $this->session->set_userdata($str);
        }
        else
            redirect('User-Login-View');
    }

    public function staffProfileView()
    {
        if(isset($_SESSION['uMOB']) && $_SESSION['uRTYPE']=='1')
        {
            $str= $this->session->userdata('uSID');
            error_reporting(0);
            if(!$str)
            $this->load->view('User-Login-View');
            else
            {
            $staff['recentStaffActivity']=$this->AdminModel->recentStaffActivityViewModel($str)->result();
            $staff['completeStaffActivity']=$this->AdminModel->completeStaffActivityViewModel($str);
            $this->load->view('user/staffActivityView',$staff);
            }
            //passing registration id to generatepdf function using session 
                $this->session->set_flashdata('staffActivity',$str);
                // $this->session->set_userdata($str);
        }
        else
             redirect('User-Login-View');
    }

    public function visitorProfileView()
    {
        if(isset($_SESSION['uMOB']))
        {
         $this->load->view('user/visitor');
        }
        else
         redirect('User-Login-View');
    }
    
    public function FacultiesView()
    {
        if(isset($_SESSION['uMOB']))
        {
         $this->load->view('user/Faculties');
        }
        else
         redirect('User-Login-View');
    }
    public function availStudentPage()
    {
        if(isset($_SESSION['uMOB']))
        $this->load->view('user/studentAvailability');
        else
        $this->load->view('user/INDEX');
        
    }

    public function studentActivityView()
    {
        $str=$this->input->get('SID');
        
        if(!$str)
            $this->load->view('admin/studentAvailability');
        else
        {
            $student['StudentDetails']=$this->AdminModel->GetStudentByIDModel($str)->result();
            $student['completeStudentActivity']=$this->AdminModel->completeStudentActivityViewModel($str)->result();
            $this->load->view('user/studentActivityView',$student);
        }
        //passing registration id to generatepdf function using session 
        $this->session->set_flashdata('studentActivity',$str);
        // $this->session->set_userdata($str);
    }

    public function viewStudentPage()
    {
        if(isset($_SESSION['EMAIL']))
        $this->load->view('user/StudentsSearch');
        else
        $this->load->view('user/INDEX');
        
    }

    public function studentsView()
    {
        if(isset($_SESSION['uMOB']))
        {
         //$this->load->view('user/searchStudent');
         $student['studentCard']=$this->UserModel->getAllStudentDetailsModel()->result();
        // echo json_encode($res);
         $this->load->view('user/searchStudent1',$student);

        }
        else
         redirect('User-Login-View');
    }

    public function mailBoxView()
    {
        if(isset($_SESSION['uMOB']))
        {
         $uID=$this->session->userdata('uSID');
         $inbox['mails']=$this->UserModel->mailBoxDataModel($uID)->result();
        //  $inbox['mailCount']=$this->UserModel->mailBoxCountModel($uID)->result();
         $this->load->view('user/mailbox',$inbox);
        }
        else
         redirect('User-Login-View');
    }

    public function EmailView()
    {
        if(isset($_SESSION['uMOB']))
        {
            $eid=$this->input->get('e');
            if(!$eid)
            {
                $uID=$this->session->userdata('uSID');
                $inbox['mails']=$this->UserModel->mailBoxDataModel($uID)->result();
                $this->load->view('user/mailbox',$inbox);
            }
            else
            {
                $uID=$this->session->userdata('uSID');
                // $student['StudentDetails']=$this->AdminModel->GetStudentByIDModel($str)->result();
                $student['sMails']=$this->UserModel->mailDetailModel($uID,$eid)->result();
                $this->load->view('user/mail_detail',$student);
            }
        }
        else
         redirect('User-Login-View');
    }

    public function composeEmailView()
    {
        if(isset($_SESSION['uMOB']))
        {
         $this->load->view('user/mail_compose');
        }
        else
         redirect('User-Login-View');
    }

    public function FacultyMailer()
    {
        $res=$this->UserModel->FacultyMailerModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

    public function studentMailer()
    {
        $res=$this->UserModel->studentMailerModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

    public function queryMailer()
    {
        $res=$this->UserModel->queryMailerModel();
        $msg['success']=false;
        if($res){
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

    public function availStaffpage()
    {
        if(isset($_SESSION['EMAIL']))
        $this->load->view('user/staffAvailability');
        else
        $this->load->view('user/staffAvailability');
       
    }


    public function Profile()
    {
        $timezone = date_default_timezone_get();
        echo "The current server timezone is: " . $timezone;
        // Change the line below to your timezone!
        $timezone =date_default_timezone_set('Asia/Kolkata');
        echo "The current server timezone is: " . $timezone;
        $date = date('Y-m-d H:i:s ', time());
        echo "The current server timezone is: " . $date;
    }

    public function chkUserLogin()
    {
        $email = $this->input->post('txtCredential');
        $pass = $this->input->post('txtPass');
        $encPass = md5($pass);
    
        $res = $this->UserModel->chkUserLoginModel($email,$encPass);
        $row = $res->num_rows();
		    if($res->num_rows()>0)
			{
                $r = $this->UserModel->UserDetails($email);
                $r = $r->row_array();
                if($r['STATUS']=='ACTIVE')
                {
                $user = array(
                    'uNAME' => $r['REG_USR_FIRSTNAME'].' '.$r['REG_USR_LASTNAME'],
                    'uSID' => $r['REGISTRATION_ID'],
                    'uEMAIL' => $r['REG_USER_EMAIL'],
                    'uMOB' => $r['REG_USR_CONTACT'],
                    'uRTYPE' => $r['REGISTRATION_TYPE'],
                    'uqr' => $r['REG_USER_QR'],
                    'uPic' => $r['IMAGE'],
                    'usr_logged_in' => true);
                $this->session->set_userdata($user);
                redirect('User-Dashboard');
                }
                else
                {
                    $this->session->set_flashdata('err',"Invalid Credential ! please try again");
                    redirect('User-Login-View');
                }
			}
			else
			{
                //$this->session->unset($user);
                $this->session->set_flashdata('err',"Invalid Credential ! please try again");
                redirect('User-Login-View');
			}
    }


    public function registerUserView()
    {
        $this->load->view('user/registerPg');
    }

    public function errorpage()
    {
        $this->load->view('user/404');
    }
    public function registerUser()
    {
        $usertype = $this->input->post('regType');
        $fname = $this->input->post('txtFname');
        $lname = $this->input->post('txtLname');
        $mob = $this->input->post('txtMob');
        $pass = $this->input->post('txtPass');
        $image= $mob;

        if($usertype=='1')
        {
            $user="staff";
        }
        elseif($usertype=='2')
        {
            $user="student";
        }
        else
        {
            $user="visitor";
        }
        
        $this->load->helper('download');

        // -- ------------Generate qr code PART 1---------------- 

        // if($usertype=='1')
        //   $PNG_TEMP_DIR = dirname(__FILE__) .DIRECTORY_SEPARATOR."RegisteredUserQR".DIRECTORY_SEPARATOR."staff".DIRECTORY_SEPARATOR.$mob.DIRECTORY_SEPARATOR;
        // elseif($usertype=='2')
        //   $PNG_TEMP_DIR =dirname(__FILE__) .DIRECTORY_SEPARATOR."RegisteredUserQR".DIRECTORY_SEPARATOR."student".DIRECTORY_SEPARATOR.$mob.DIRECTORY_SEPARATOR;
        // else
        //   $PNG_TEMP_DIR =dirname(__FILE__) . DIRECTORY_SEPARATOR."RegisteredUserQR".DIRECTORY_SEPARATOR."visitor".DIRECTORY_SEPARATOR.$mob.DIRECTORY_SEPARATOR;
        //setup image saving destination
        // echo dirname(__FILE__);

        if($usertype=='1')
            $PNG_TEMP_DIR ="assets/RegisteredUserQR/staff/".$mob."/";
        elseif($usertype=='2')
           $PNG_TEMP_DIR ="assets/RegisteredUserQR/student/".$mob."/";
        else
            $PNG_TEMP_DIR ="assets/RegisteredUserQR/visitor/".$mob."/";
            // echo $PNG_TEMP_DIR;

        require_once(APPPATH.'libraries/QRgeneratorLib/qrlib.php');
        
        if (!file_exists($PNG_TEMP_DIR)) 
        {
            mkdir($PNG_TEMP_DIR,0777);
        }
        // -- ------------Generate qr code PART 1---------------- 

        // ----------------------------Generate qr code PART 2----------------------------- 
        
        $filename = $PNG_TEMP_DIR.$mob.'.png';
        //  echo $filename;
        QRcode::png($mob, $filename, 'H', 10, 2);

        $pass = md5($pass);
        // $res1= $this->UserModel->UserRegistrationModel($fname,$lname,$mob);
        $chkDuplicate=$this->UserModel->chkUsrExistance($mob);
        $chkFlag=$chkDuplicate->num_rows();
        if($chkFlag>0)
		{
            $this->session->set_flashdata('err',"This credential are already registered to system !");
            redirect('User-Registration');
        }
        else
        {
            $res = $this->UserModel->UserRegistrationModel($usertype,$fname,$lname,$mob,$pass,$image);
     
            if($res>0)
            {
                $this->session->set_flashdata('success',"Registered successfully");
                $data = file_get_contents("assets/RegisteredUserQR/".$user."/".$mob."/".$mob.".png"); // Read the file's contents
                $filename = $mob.".png";
                
                //redirect('User-Login-View');
                force_download($filename, $data);
            }
            else
            {
                $this->session->set_flashdata('err',"Something went wrong please try again");
                redirect('User-Registration');
            }
        }
        // -------------------------------Generate qr code PART 2------------------------
    }

    public function qrDownload()
    {
        $this->load->helper('download'); 
        $file = $this->session->userdata('uqr');
        $usertype=$this->session->userdata('uRTYPE');
        if($usertype=='1')
        {
            $user="staff";
        }
        elseif($usertype=='2')
        {
            $user="student";
        }
        else
        {
            $user="visitor";
        }
        
        $data = file_get_contents("assets/RegisteredUserQR/".$user."/".$file."/".$file.".png"); // Read the file's contents
        //echo base_url()."assets/user/RegisteredUserQR/".$user."/".$file."/".$file.".png";
        $filename = $file.".png";
        force_download($filename, $data);
        error_reporting(0);
    }

    public function QRscanner()
    {
        $this->load->view('user/scanQR');
    }

    public function authenticateScannedQR()
    {
        $success=$this->input->post('send',TRUE);
        $data=$this->input->post('credential',TRUE);
        // if($success)
        // {
        $res=$this->UserModel->authenticateScannedQRModel($data);
        $msg['success']=false;
        $row = $res->num_rows();
        if($res->num_rows()>0)
        {
            //check for already check in
            $row=$this->UserModel->verifyCheckIn($data)->result();
            foreach($row as $r)
            {
                $status=$r->PRESENCE_STATUS;
                $outTime=$r->OUT_DATE_TIME;
                $inTime=$r->OUT_DATE_TIME;
            }
            $msg['out']=$outTime;
            if($outTime=='0000-00-00 00:00:00')
            {
                $msg['success']=true;
                $msg['outMsg']='Check out!';
                $res=$this->UserModel->UserCheckOutModel($data,$inTime);
            }
            else
            {
                $msg['success']=true;
                $msg['outMsg']='Check in!'.$data;
                $res=$this->UserModel->UserCheckInModel($data);
            }
           
        }
        echo json_encode($msg);
       // }
    }

    public function updateStudentInfo()
    {
        if(isset($_SESSION['uMOB']))
        {
            $uID=$this->session->userdata('uSID');
            $usertype=$this->session->userdata('uRTYPE');
            $details['studentprofile'] = $this->UserModel->getUsrDetailModel($uID,$usertype)->result();
           $details['userAddress']=$this->UserModel->getUsrAddressModel($uID)->result();
            $this->load->view('user/updateStudentInfo',$details);
        }
        else
        redirect('User-Login-View');       
    }

    public function updateStaffInfo()
    {
        if(isset($_SESSION['uMOB']))
        {
            $uID=$this->session->userdata('uSID');
            $usertype=$this->session->userdata('uRTYPE');
            $details['studentprofile'] = $this->UserModel->getUsrDetailModel($uID,$usertype)->result();
           $details['userAddress']=$this->UserModel->getUsrAddressModel($uID)->result();
            $this->load->view('user/updateStaffInfo',$details);
        }
        else
        redirect('User-Login-View');     
    }

    public static function deleteDir($dirPath) 
    {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
        return ;
    }
    
    public function uploadPic()
    {
        if(isset($_SESSION['uMOB']))
        {
            $usertype=$this->session->userdata('uRTYPE');
            $uID=$this->session->userdata('uSID');
            $mob=$this->session->userdata('uMOB');
            $pic=$this->session->userdata('uPic');
           
            if($usertype=='1')
            {
                $PNG_TEMP_DIR ="assets/ProfilePic/staff/".$mob."/";
                $user="staff";
            }
            elseif($usertype=='2')
            {
                $PNG_TEMP_DIR ="assets/ProfilePic/student/".$mob."/";
                $user="student";
            }
            else
            {
                $PNG_TEMP_DIR ="assets/ProfilePic/visitor/".$mob."/";
                $user="visitor";
            }

            if($pic!='')
            {
                $this->deleteDir($PNG_TEMP_DIR);
            }
                // echo $PNG_TEMP_DIR;
            
            if (!file_exists($PNG_TEMP_DIR)) 
            {
                mkdir($PNG_TEMP_DIR,0777);
            }
            if(isset($_FILES["image_file"]["name"]))
            {
                $filename=$_FILES["image_file"]["name"];
                  $config['upload_path']=$PNG_TEMP_DIR;
                    $config['allowed_types']='jpeg|png|svg|jpg|gif';
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload('image_file'))
                    {
                        echo $this->upload->display_errors();
                    }
                    else
                    {
                        $res=$this->UserModel->updateProfilePic($filename,$usertype,$uID);

                        if($res>0)
                        {
                          echo 'Profile picture updated Successfully';
                        }
                        else
                        {
                            echo 'Profile picture update failed Try again!!';
                        }
                        // $data=$this->upload->data();
                        // echo '<img src="'.base_url().'assets/ProfilePic/'.$data["file_name"].'" />';
                    }
            }
        }
        else
        redirect('User-Login-View');
    }

    public function updateAddress()
    {
        $uid=$this->session->userdata('uSID');
        $res=$this->UserModel->updateAddressModel($uid);
        $msg['success']=false;
        $msg['type']="update";
        if($res)
        {
            $msg['success']=true;
        }
        echo json_encode($msg);
        
    }
    public function updateCurrentAddress()
    {
        $uid=$this->session->userdata('uSID');
        $res=$this->UserModel->updateCurrentAddressModel($uid);
        $msg['success']=false;
        $msg['type']="update";
        if($res)
        {
            $msg['success']=true;
        }
        echo json_encode($msg);
    }

   }
?>
