<?php  
$links = new links($db);

if($_GET['id']){
    $links->id = $_GET['id'];
    $links->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $links->title = $_POST['title'];
    $links->url = $_POST['url'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $links->updated_at = date("Y-m-d h:i:s",time());

    if($links->update()){
        $message = "Menu link updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Link Menu
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
                        <form role="form" method="Post" action="index.php?page=links_edit&id=<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $links->title ?>">                                
                            </div>                            
                            <div class="form-group">
                                <label>URL</label>
                                <input class="form-control" name="url" value="<?php echo $links->url ?>">                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>