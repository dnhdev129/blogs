<?php  
$users = new users($db);

/*Delete user*/
if(!empty($_GET['id'])){
    $users->id = $_GET['id'];
    $users->read();

    if($users->image){
        deleteImage($users->image,"img/users/");
    }

    if($users->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all users*/
$stmt_users = $users->readAll();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Users
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
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 <a class="btn btn-primary btn-sm" href="index.php?page=users_add">Add</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            while($rows = $stmt_users->fetch()){
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $rows['id'] ?></td>
                                <td>
                                    <img src="<?php echo "img/users/".$rows['image'] ?>" width="80px" alt="">
                                    <?php //echo $rows['image'] ?>
                                        
                                </td>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['username'] ?></td>
                                <td><?php echo userRole($rows['role']) ?></td>
                                <td style="text-align: center;">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" <?php echo $rows['status']?"checked":"" ?>>
                                        </label>
                                    </div>
                                    <?php //echo $rows['status'] ?>
                                        
                                </td>
                                <td class="center" style="text-align: center;"><?php echo $rows['created_at'] ?></td>

                                <td class="center" style="text-align: center;">
                                    <a href="index.php?page=users_edit&id=<?php echo $rows['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=users&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php 
                            
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->