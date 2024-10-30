<?php  
$about = new about($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $about->content = $_POST['content'];
    $about->footer = $_POST['footer'];
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $about->created_at = date("Y-m-d h:i:s",time());
    $about->updated_at = date("Y-m-d h:i:s",time());

    if($about->readAll()->rowCount()>0){
        $about->id = 1;        
        $about->update();
    }else{
        $about->create();
    }
    $message = "About page updated successfully!";
}
$about->id = 1;
$about->read();
?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            About Page
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
                        <form role="form" method="Post" action="index.php?page=about">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content"><?php echo @$about->content ?></textarea>
                                
                            </div>
                            <div class="form-group">
                                <label>Footer</label>
                                <textarea id="summernote1" name="footer"><?php echo @$about->footer ?></textarea>
                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>