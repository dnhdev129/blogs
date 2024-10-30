<?php  
$mailsettings = new mailsettings($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $mailsettings->email = $_POST['email'];
    $mailsettings->mail_server = $_POST['mail_server'];
    $mailsettings->mail_username = $_POST['mail_username'];
    $mailsettings->mail_password = $_POST['mail_password'];
    $mailsettings->mail_port = $_POST['mail_port'];
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $mailsettings->created_at = date("Y-m-d h:i:s",time());
    $mailsettings->updated_at = date("Y-m-d h:i:s",time());

    if($mailsettings->readAll()->rowCount()>0){
        $mailsettings->id = 1;        
        $mailsettings->update();
    }else{
        $mailsettings->create();
    }
    $message = "Mail settings page updated successfully!";
}
$mailsettings->id = 1;
$mailsettings->read();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Mail settings Page
        </h1>
    </div>
</div> 
<!-- /. ROW  -->
<?php  
if(!empty($message)){
?>
<div class="alert alert-success">
    <?php echo $message ?>
</div>
<?php  
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="Post" action="index.php?page=mailsettings">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $mailsettings->email ?>">
                            </div>
                            <div class="form-group">
                                <label>Mail Server</label>
                                <input type="text" name="mail_server" class="form-control" value="<?php echo $mailsettings->mail_server ?>">
                            </div>
                            <div class="form-group">
                                <label>Mail Username</label>
                                <input type="text" name="mail_username" class="form-control" value="<?php echo $mailsettings->mail_username ?>">
                            </div>
                            <div class="form-group">
                                <label>Mail Password</label>
                                <input type="password" name="mail_password" class="form-control" value="<?php echo $mailsettings->mail_password ?>">
                            </div>
                            <div class="form-group">
                                <label>Mail Port</label>
                                <input type="text" name="mail_port" class="form-control" value="<?php echo $mailsettings->mail_port ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>