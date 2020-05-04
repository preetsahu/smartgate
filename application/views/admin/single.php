<?php
        
foreach ($userDetail as $value)
{
    $id = $value->uid;
    $fname = $value->fname;
    $lname = $value->lname;
    $phone = $value->phone;
    $email = $value->email;
    
}        
        

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <form action="<?= base_url('Welcome/upd_data')?>" method="post">
            
            <input type="text" name="n1" value="<?=$fname?>">
            <br>
            <input type="text" name="n2" value="<?=$lname?>">
            <br>
            <input type="number" name="n3" value="<?=$phone?>">
            <br>
            <input type="email" name="n4" value="<?=$email?>">
            <br>
            <input type="text" name="id" value="<?=$id?>" readonly="">
            <br>
            <input type="submit" value="Update">
        </form>
        
        <br>
         <h1><?= $this->session->userdata('upderr');?></h1>
    </body>
</html>
