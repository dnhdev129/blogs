<?php
$blogcategories = new blogcategories($db);
$stmt_category = $blogcategories->readAll();

$blogs = new blogs($db);

if($_GET['id']){
    $blogs->id = $_GET['id'];
    $blogs->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $blogs->id_user = $_SESSION['user_id'];

    $blogs->title = $_POST['title'];
    $blogs->content = $_POST['content'];
    $blogs->id_category = $_POST['id_category'];
    $blogs->status = isset($_POST['status'])=="on"?1:0;

    /*Update image*/
    if(!empty($_FILES['image']['name'])){
        if($blogs->image){
            $upload_file_name = updateImage($_FILES['image'],$blogs->image,'img//blogs/');
        }else{
            $upload_file_name = uploadImage($_FILES['image'],'img//blogs/');
        }
        
        $blogs->image = $upload_file_name;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogs->updated_at = date("Y-m-d h:i:s",time());

    if($blogs->update()){
        $message = "Blog post updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Blog Post
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
                        <form role="form" method="Post" action="index.php?page=blogs_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Selects</label>
                                <select name="id_category" class="form-control">
                                <?php  
                                while($rows = $stmt_category->fetch()){
                                ?>
                                
                                    <option value="<?php echo $rows['id'] ?>" <?php echo $rows['id']==$blogs->id_category?"selected":"" ?>><?php echo $rows['title'] ?></option>
                                
                                <?php  
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $blogs->title ?>">
                                
                            </div>
                            <div class="form-group">
                                <img src="<?php echo "img//blogs/".$blogs->image ?>" width="200px" alt="">
                            </div>
                            <div class="form-group">
                                <label>File input</label>
                                <input name="image" type="file">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="status" type="checkbox" <?php echo $blogs->status==1?"checked":"" ?>>Status
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Text area</label>
                                <textarea id="summernote" name="content" class="form-control" rows="3"><?php echo $blogs->content ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>