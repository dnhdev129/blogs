<?php  
$sliders = new sliders($db);

/*Delete slider*/
if(!empty($_GET['id'])){
    $sliders->id = $_GET['id'];
    $sliders->read();

    if($sliders->image){
        deleteImage($sliders->image,"img/sliders/");
    }

    if($sliders->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all sliders*/
$stmt_sliders = $sliders->readAll();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Sliders
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
                 <a class="btn btn-primary btn-sm" href="index.php?page=sliders_add">Add</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th style="text-align: center;">Title</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            while($rows = $stmt_sliders->fetch()){
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo htmlspecialchars($rows['id']) ?></td>
                                <td>
                                    <img src="<?php echo "img/sliders/".$rows['image'] ?>" width="80px" alt="">
                                </td>
                                <td><?php echo htmlspecialchars($rows['title']) ?></td>
                                <td class="center" style="text-align: center;">
                                    <?php echo isset($rows['created_at']) ? htmlspecialchars($rows['created_at']) : 'N/A'; ?>
                                </td>
                                <td class="center" style="text-align: center;">
                                    <a href="index.php?page=sliders_edit&id=<?php echo $rows['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=sliders&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
