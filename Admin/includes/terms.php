<?php  
$terms = new terms($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $terms->content = $_POST['content'];
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $terms->created_at = date("Y-m-d h:i:s",time());
    $terms->updated_at = date("Y-m-d h:i:s",time());

    if($terms->readAll()->rowCount()>0){
        $terms->id = 1;      
        $terms->update();
    }else{
        $terms->create();
    }
    $message = "Terms page updated successfully!";
}
$terms->id = 1;
$terms->read();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Terms Page
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
                        <form role="form" method="Post" action="index.php?page=terms">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content"><?php echo @$terms->content ?></textarea>
                                
                            </div>                            
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>