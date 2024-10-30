<div class="tesimonials">
    <div class="container">
        <h3 class="tittle-w3ls cen">Comments</h3>
        <div class="inner_sec">
            <div class="test_grid_sec row">
                <!-- Comment List -->
                <div class="col-md-6">
                    <?php
                    include_once 'Admin/database/database.php';
                    include_once 'Admin/database/comments.php';

                    $database = new database();
                    $db = $database->connect();

                    if ($db) {
                        $comments = new comments($db);
                        $stmt = $comments->readAll();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            // Extract fields from the row
                            extract($row);
                    ?>
                            <div class="comment-container">
                                <div class="comment">
                                    <h4><?php echo htmlspecialchars($name); ?></h4>
                                    <p><?php echo htmlspecialchars($comment); ?></p>
                                    <span class="comment-date"><?php echo htmlspecialchars($created_at); ?></span>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "Database connection failed.";
                    }
                    ?>
                </div>

                <!-- Comment Form -->
                <div class="col-md-6">
                    <div class="comment-form">
                        <h4>Add a Comment</h4>
                        <form action="addcomment.php" method="post">
                            <div class="form-group">
                                <label for="name">Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Your Comment:</label>
                                <textarea class="form-control" id="comment" name="comment" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
	.comment-container {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.comment {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
}

.comment h4 {
    color: #333;
    margin-bottom: 5px;
}

.comment p {
    color: #666;
}

.comment-date {
    color: #999;
    font-size: 12px;
}

</style>