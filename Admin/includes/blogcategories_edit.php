<?php  
$blogcategories = new blogcategories($db);

if($_GET['id']){
    $blogcategories->id = $_GET['id'];
    $blogcategories->read();

}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $blogcategories->title = $_POST['title'];
    $blogcategories->status = isset($_POST['status'])=='on'?1:0;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogcategories->updated_at = date("Y-m-d h:i:s",time());

    if($blogcategories->update()){
        $message = "Blog category updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Blog Category
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
                        <form role="form" method="Post" action="index.php?page=blogcategories_edit&id=<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $blogcategories->title ?>">
                                
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" <?php echo $blogcategories->status==1?"checked":"" ?>>Status
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>