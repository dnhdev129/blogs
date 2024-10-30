<?php  
$sliders = new sliders($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $sliders->title = $_POST['title'];
    $sliders->image = uploadImage($_FILES['image'],"img/sliders/");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sliders->created_at = date("Y-m-d h:i:s",time());
    $sliders->updated_at = date("Y-m-d h:i:s",time());

    if($sliders->create()){
        $message = "New slider added successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add New Slider
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
                        <form role="form" method="Post" action="index.php?page=sliders_add" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title">
                                
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>