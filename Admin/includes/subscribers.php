<?php  
$subscribers = new subscribers($db);

/*Delete subscriber*/
if(!empty($_GET['id'])){
    $subscribers->id = $_GET['id'];
    if($subscribers->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all subscribers*/
$stmt_categories = $subscribers->readAll();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Subscribers
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
                 <a class="btn btn-primary btn-sm" href="index.php?page=subscribers_add">Send Email to All Subscribers</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Verified Token</th>
                                <th style="text-align: center;">Status</th>
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
                                <td><?php echo $rows['email'] ?></td>
                                <td><?php echo $rows['verified_token'] ?></td>
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
                                    
                                    <a href="index.php?page=subscribers&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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