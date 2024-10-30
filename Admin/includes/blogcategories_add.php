<?php  
$blogcategories = new blogcategories($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $blogcategories->title = $_POST['title'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogcategories->created_at = date("Y-m-d h:i:s",time());
    $blogcategories->updated_at = date("Y-m-d h:i:s",time());

    if($blogcategories->create()){
        $message = "New blog category added successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add New Blog Category
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
                        <form role="form" method="Post" action="index.php?page=blogcategories_add">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title">
                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>