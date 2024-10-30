<?php  
$contact = new contact($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $contact->content = $_POST['content'];
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $contact->created_at = date("Y-m-d h:i:s",time());
    $contact->updated_at = date("Y-m-d h:i:s",time());

    if($contact->readAll()->rowCount()>0){
        $contact->id = 1;
        $contact->update();
    }else{
        $contact->create();
    }
    $message = "Contact page updated successfully!";
}
$contact->id = 1;
$contact->read();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Contact Page
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
                        <form role="form" method="Post" action="index.php?page=contact">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content"><?php echo @$contact->content ?></textarea>
                                
                            </div>                            
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>