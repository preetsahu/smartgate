<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            
            <?php 
            foreach($user as $u)
            {
             ?>
            <tr>
                <td><?=$u->fname?></td>
                <td><?=$u->lname?></td>
                <td><?=$u->email?></td>
                <td><?=$u->phone?></td>
                <td>
                    <a href="<?= base_url('Welcome/edit_data')?>/<?=$u->uid?>">Edit</a>
                </td>
            </tr>
            
            <?php } ?>
            
        </table>
        <h1><?= $this->session->userdata('upd');?></h1>
        <img src="<?= base_url()?>lms/22.jpg" width="500" height="250">
    </body>
</html>
