<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
            $data['stuCount']=$this->AdminModel->CountStudentInsideModel();
            $data['staffCount']=$this->AdminModel->CountStaffInsideModel();
            $data['GaurdianCount']=$this->AdminModel->CountGaurdianInsideModel();
			$data['OthersCount']=$this->AdminModel->CountOthersInsideModel();
			$data['regStudentCount']=$this->AdminModel->CountRegStudentModel();
			$data['regStaffCount']=$this->AdminModel->CountRegStaffModel();
			$data['regVisitorCount']=$this->AdminModel->CountRegVisitorModel();
			$data['regWorkerCount']=$this->AdminModel->CountRegWorkersModel();
			$this->load->view('user/SmartGate',$data);
	}
    
}
?>