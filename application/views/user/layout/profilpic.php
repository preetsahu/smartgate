<?php

$uID=$this->session->userdata('uSID');
$usertype=$this->session->userdata('uRTYPE');
$profile = $this->UserModel->getUsrProfileModel($uID,$usertype)->result();

foreach($profile as $p)
    {
        $pic=$p->IMAGE;
        $utype=$p->REGISTRATION_TYPE;
        $id=$p->REGISTRATION_ID;
        $mob=$p->MOBILE_NUMBER;
        $email=$p->EMAIL_ID;
    }
    if($usertype=='1')
        $user="staff";
    elseif($usertype=="2")
        $user="student";
    else
        $user="visitor";
        error_reporting(0);

?>