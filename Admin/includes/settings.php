<?php  
$settings = new settings($db);

if($_SERVER['REQUEST_METHOD']=='POST'){    

    if($settings->readAll()->rowCount()>0){
        $settings->id = 1;
        $settings->read();
        if(!empty($_FILES['site_logo']['name'])){
            $settings->site_logo = updateImage($_FILES['site_logo'],$settings->site_logo,"img/");
        }
        if(!empty($_FILES['site_favicon']['name'])){
            $settings->site_favicon = updateImage($_FILES['site_favicon'],$settings->site_favicon,"img/");
        }
        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_address = $_POST['contact_address'];
        
        if($_POST['site_timezone']){
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date("Y-m-d h:i:s",time());
        $settings->updated_at = date("Y-m-d h:i:s",time());
            $settings->update();
    }else{
        if(!empty($_FILES['site_logo']['name'])){
            $settings->site_logo = uploadImage($_FILES['site_logo'],"img/");
        }
        if(!empty($_FILES['site_favicon']['name'])){
            $settings->site_favicon = uploadImage($_FILES['site_favicon'],"img/");
        }
        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_address = $_POST['contact_address'];
        
        if($_POST['site_timezone']){
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date("Y-m-d h:i:s",time());
        $settings->updated_at = date("Y-m-d h:i:s",time());
        $settings->create();
    }
    $message = "Settings page updated successfully!";
}
$settings->id = 1;
$settings->read();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Settings Page
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
                        <form role="form" method="Post" action="index.php?page=settings" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" class="form-control" name="site_name" value="<?php echo $settings->site_name ?>">
                            </div>
                            <?php  
                            if($settings->site_logo){
                            ?>
                            <div class="form-group">
                                <img src="<?php echo "img/".$settings->site_logo; ?>" width="150px" alt="">
                            </div>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <label>Site Logo</label>
                                <input type="file" name="site_logo">
                            </div>
                            <?php  
                            if($settings->site_favicon){
                            ?>
                            <div class="form-group">
                                <img src="<?php echo "img/".$settings->site_favicon; ?>" width="150px" alt="">
                            </div>
                            <?php
                            }
                            ?>
                            <div class="form-group">
                                <label>Site Favicon</label>
                                <input type="file" name="site_favicon">
                            </div>
                            <div class="form-group">
                                <label>Site Map</label>
                                <input type="text" class="form-control" name="site_map" value="<?php echo htmlspecialchars($settings->site_map) ?>">
                            </div>
                            <div class="form-group">
                                <label>Site Timezone</label>
                                <select name="site_timezone" id="" class="form-control">
                                    <option value="Asia/Ho_Chi_Minh">Select Timezone</option>
                                    <?php  
                                    foreach(setTimezone() as $key=>$value){
                                    ?>
                                    <option value="<?php echo $key ?>" <?php echo $key==$settings->site_timezone?"selected":"" ?>><?php echo $value ?></option>
                                    <?php    
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Site Footer</label>
                                <input type="text" class="form-control" name="site_footer" value="<?php echo $settings->site_footer ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="contact_email" value="<?php echo $settings->contact_email ?>">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="contact_phone" value="<?php echo $settings->contact_phone ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="contact_address" value="<?php echo $settings->contact_address ?>">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>