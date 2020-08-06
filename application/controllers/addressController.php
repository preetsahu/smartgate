<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class addressController extends CI_Controller
{
    public function getCountry()
    {
        $data=$this->AddressModel->getCountryModel()->result();
        echo json_encode($data);
    }

    public function getState()
    {
        $id=$this->input->post('id',true);
        $data=$this->AddressModel->getStateModel($id)->result();
        echo json_encode($data);
    }

    public function getCity()
    {
        $id=$this->input->post('id',true);
        $data=$this->AddressModel->getCityModel($id)->result();
        echo json_encode($data);
    }
}

?>