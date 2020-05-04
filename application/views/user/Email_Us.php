<?php
// extract($_POST);
// if(isset($sendmail))
// {
//     echo $sendmail;
//     echo $txtSenderemail;
//     echo $txtSenderMessage;
    
// 	$to = 'pkseduction2016@gmail.com'; 
//     $subject ="Mail Function in PHP";
// 	$from=$txtSenderemail;
// 	$message =$txtSenderName." ".$txtSenderMessage;
//     $headers = "From:".$from;
//     mail($to,$subject,$message,$headers);
// 	echo "<h3 align='center'>Mail Sent Successfully</h3>";
// }	
 
?>

<?php
   $from = "preetsahu17@gmail.com"; // sender
   $subject = " My cron is working";
   $message = "My first Cron  :)";

   // message lines should not exceed 70 characters (PHP rule), so wrap it

   $message = wordwrap($message, 70);

   // send mail

   ini_set("SMTP","localhost");
   ini_set("smtp_port","25");
   ini_set("sendmail_from","preetsahu17@gmail.com");
   ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");

   mail("pkseduction2016@gmail.com",$subject,$message,"From: $from\n");

   echo "Thank you for sending us feedback";
 header('Location:usrprofile.php');
?>