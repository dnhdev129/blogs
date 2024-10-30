<?php  
$comments = new comments($db);

/*Delete comment*/
if(!empty($_GET['id'])){
    $comments->id = $_GET['id'];
    if($comments->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all comments*/
$stmt_categories = $comments->readAll();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Comments
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
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment</th>
                                <th>Id Parent Comment</th>
                                <th>Id Blog</th>
                                
                                <th>Email</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            while($rows = $stmt_categories->fetch()){
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $rows['id'] ?></td>
                                <td><?php echo $rows['comment'] ?></td>
                                <td><?php echo $rows['id_parent_comment'] ?></td>
                                <td><?php echo $rows['id_blog'] ?></td>
                                
                                <td><?php echo $rows['email'] ?></td>                                
                                <td class="center" style="text-align: center;"><?php echo $rows['created_at'] ?></td>
                                <td class="center" style="text-align: center;">
                                    <a href="index.php?page=comments&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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