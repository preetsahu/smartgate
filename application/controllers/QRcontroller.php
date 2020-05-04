<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRcontroller extends CI_Controller
{

	public function index()
	{
            $this->load->view('qr/index');
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
            $msg['success']=true;
            $res=$this->UserModel->UserCheckInModel($data);
        }
        echo json_encode($msg);
       // }
    }
}
?>