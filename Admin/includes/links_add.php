<?php  
$links = new links($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $links->title = $_POST['title'];
    $links->url = $_POST['url'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $links->created_at = date("Y-m-d h:i:s",time());
    $links->updated_at = date("Y-m-d h:i:s",time());

    if($links->create()){
        $message = "New link menu added successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add New Link Menu
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
                        <form role="form" method="Post" action="index.php?page=links_add">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title">                                
                            </div>                           
                            <div class="form-group">
                                <label>URL</label>
                                <input class="form-control" name="url">                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>