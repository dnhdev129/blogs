<?php  
$users = new users($db);

if($_GET['id']){
    $users->id = $_GET['id'];
    $users->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $users->name = $_POST['name'];
    $users->username = $_POST['username'];
    $users->password = sha1($_POST['password']);
    $users->phone = $_POST['phone'];
    $users->email = $_POST['email'];
    $users->role = $_POST['role'];
    $users->status = $_POST['status']=="on"?1:0;
    $users->email_verified = "verified";

    if(!empty($_FILES['image']['name'])){
        if($users->image){
            $upload_file_name = updateImage($_FILES['image'],$users->image,"img/users/");
        }else{
            $upload_file_name = uploadImage($_FILES['image'],"img/users/");
        }
        $users->image = $upload_file_name;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $users->updated_at = date("Y-m-d h:i:s",time());

    if($users->update()){
        $message = "User updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit User
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
                        <form role="form" method="Post" action="index.php?page=users_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" value="<?php echo $users->name ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" value="<?php echo $users->username ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" value="<?php echo $users->password ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" value="<?php echo $users->phone ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="<?php echo $users->email ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="0" <?php echo $users->role==0?"selected":"" ?>>User</option>
                                    <option value="1" <?php echo $users->role==1?"selected":"" ?>>Mod</option>
                                    <option value="2" <?php echo $users->role==2?"selected":"" ?>>Admin</option>
                                </select>                                
                            </div>
                            <?php  
                            if($users->image){
                            ?>
                            <div class="form-group">
                                <img src="<?php echo "img/users/".$users->image ?>" width="100px" alt="">
                            </div>
                            <?php  
                            }
                            ?>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image">                                
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="checkbox" name="status" <?php echo $users->status==1?"checked":"" ?> >
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>