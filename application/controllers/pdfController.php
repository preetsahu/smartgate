<?php 

class pdfController extends CI_Controller {

   function generate_student_report()
    {
        ///getting registration id from session
        $str=$this->session->flashdata('studentActivity');
       $this->load->library('pdf');
        $this->load->model('UserModel');
        $data['studentDetails'] = $this->AdminModel->GetStudentByIDModel($str)->result();
        $data['studentactivity'] =$this->AdminModel->completeStudentActivityViewModel($str)->result();
        $this->load->view('generateReport',$data);
    } 
    
}

?>