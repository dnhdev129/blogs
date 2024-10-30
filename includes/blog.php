<?php
$database = new database();
$db = $database->connect();

if ($db) {
    $blogs = new blogs($db);

    // Retrieve all blog posts
    $stmt = $blogs->readAll();
    if ($stmt) {
        $num = $stmt->rowCount();
    } else {
        $num = 0;
    }
} else {
    $num = 0;
    echo "Database connection failed.";
}
?>

<div class="blog_sec">
    <h3 class="tittle-w3ls">Latest Blogs</h3>
    <div class="row">
    <?php
    if ($num > 0) {
        // Display blogs in the desired structure
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            // Define the base path for images
            $basePath = 'Admin/img/blogs/';
            // Combine base path with the image filename from the database
            $imagePath = $basePath . htmlspecialchars($image);
            ?>
            <div class="col-md-6 banner-btm-left">
                <div class="banner-btm-top">
                    <div class="banner-btm-inner a1">
                        <div class="blog_date">
                            <h4><?php echo date('M.d.Y', strtotime($created_at)); ?></h4>
                        </div>
                        <h6><a href="404.php?id=<?php echo $id; ?>"><?php echo htmlspecialchars($title); ?></a></h6>
                        <p class="paragraph"><?php echo htmlspecialchars(substr(strip_tags($content), 0, 100)); ?>...</p>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($title); ?>" class="img-responsive blog-img">
                        <div class="clearfix"></div>
                        <a href="404.php?id=<?php echo $id; ?>" class="blog-btn">Know More</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>Không có bài đăng.</p>";
    }
    ?>
    </div>
    <div class="clearfix"></div>
</div>

<style>
.blog_sec {
    padding: 20px;
}

.tittle-w3ls {
    text-align: center;
    margin-bottom: 30px;
}

.banner-btm-left {
    margin-bottom: 30px;
}

.banner-btm-inner {
    padding: 15px;
    background: #f8f8f8;
    margin-bottom: 15px;
}

.blog_date h4 {
    font-size: 16px;
    color: #333;
}

h6 a {
    font-size: 18px;
    color: #007bff;
    text-decoration: none;
}

h6 a:hover {
    text-decoration: underline;
}

.paragraph {
    font-size: 14px;
    color: #000 !important; /* Set text color to black */
}

.img-responsive {
    width: 100%;
    height: auto;
    margin-top: 10px;
}

.blog-img {
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Maintain aspect ratio and cover the element */
    width: 100%; /* Make sure the width is 100% */
}

.blog-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background: #007bff;
    color: #fff;
    text-decoration: none;
}

.blog-btn:hover {
    background: #0056b3;
}
</style>