
<?php

include 'layout/header.php';

      $MOB=$this->session->userdata('MOB');
    
      foreach($sMails as $s)
      {
          $sub=$s->MAIL_SUBJECT;
          $content=$s->MAIL_CONTENT;
          $SenderName=$s->FIRST_NAME.$s->LAST_NAME;
          $sender=$SenderName.'||' .$s->EMAIL_ID;
      }
?>
<link href="<?=base_url()?>assets/admin/css/plugins/iCheck/custom.css" rel="stylesheet">

        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">Compose Mail</a>
                            <div class="space-25"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li><a href="mailbox.html"> <i class="fa fa-inbox "></i> Inbox <span class="label label-warning pull-right">16</span> </a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-envelope-o"></i> Send Mail</a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-certificate"></i> Important</a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-file-text-o"></i> Drafts <span class="label label-danger pull-right">2</span></a></li>
                                <li><a href="mailbox.html"> <i class="fa fa-trash-o"></i> Trash</a></li>
                            </ul>
                            <h5>Categories</h5>
                            <ul class="category-list" style="padding: 0">
                                <li><a href="#"> <i class="fa fa-circle text-navy"></i> Work </a></li>
                                <li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-primary"></i> Social</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-info"></i> Advertising</a></li>
                                <li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
                            </ul>

                            <h5 class="tag-title">Labels</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="#"><i class="fa fa-tag"></i> Family</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Work</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Home</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Children</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Holidays</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Music</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Photography</a></li>
                                <li><a href="#"><i class="fa fa-tag"></i> Film</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mail_compose.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                </div>
                <h2>
                   Message From:<h3> <?=$s->FIRST_NAME.$s->LAST_NAME?></h3>
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <h3>
                        <span class="font-normal">Subject: </span><?=$sub?>
                    </h3>
                    <h5>
                        <span class="pull-right font-normal"><?=$date?></span>
                        <span class="font-normal">From: </span><?=$sender?>
                    </h5>
                </div>
            </div>
                <div class="mail-box">
                <div class="mail-body">
                    <p><?=$content?></p>
                </div>
                    <div class="mail-attachment">
                        <p>
                            <span><i class="fa fa-paperclip"></i> 3 attachments - </span>
                            <a href="#">Download all</a>
                            |
                            <a href="#">View all images</a>
                        </p>
                        <div class="attachment">
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2020.doc
                                            <br/>
                                            <small>Added: mar 11, 2020</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>
                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="img/p1.jpg">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br/>
                                            <small>Added: mar 6, 2020</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>
                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="img/p2.jpg">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br/>
                                            <small>Added: mar 7, 2020</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                        <div class="mail-body text-right tooltip-demo">
                                <a class="btn btn-sm btn-white" href="#"><i class="fa fa-reply"></i> Reply</a>
                                <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-arrow-right"></i> Forward</a>
                                <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
                                <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
        </div>
        </div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->

<?php include 'layout/rightSidebar.php' ?>

<!-- Mainly scripts -->
<script src="<?=base_url()?>assets/admin/js/jquery-3.1.1.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url()?>assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?=base_url()?>assets/admin/js/inspinia.js"></script>
<script src="<?=base_url()?>assets/admin/js/plugins/pace/pace.min.js"></script>

 <!-- iCheck -->
<script src="<?=base_url()?>assets/admin/js/plugins/iCheck/icheck.min.js"></script>
<script>
   $(document).ready(function(){
       $('.i-checks').iCheck({
           checkboxClass: 'icheckbox_square-green',
           radioClass: 'iradio_square-green',
       });
   });
</script>