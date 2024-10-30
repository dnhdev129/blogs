<?php
$database = new database();
$db = $database->connect();

if ($db) {
    $sliders = new sliders($db);

    // Retrieve all sliders
    $stmt = $sliders->readAll();
    ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php
            $index = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $active = ($index == 0) ? 'active' : '';
                echo '<li data-target="#myCarousel" data-slide-to="' . $index . '" class="' . $active . '"></li>';
                $index++;
            }
            ?>
        </ol>
        <div class="carousel-inner" role="listbox">
            <?php
            // Reset cursor to the beginning
            $stmt->execute();
            $index = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $active = ($index == 0) ? 'active' : '';
                $imagePath = 'Admin/img/sliders/' . htmlspecialchars($image);
            ?>
                <div class="item <?php echo $active; ?>">
                    <div class="container">
                        <div class="carousel-caption">
                            <h3><?php echo htmlspecialchars($title); ?></h3>
                            <div class="top-buttons">
                                <div class="bnr-button">
                                    <a class="" href="single.html">Read More</a>
                                    <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($title); ?>" class="img-responsive">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $index++;
            }
            ?>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <?php
} else {
    echo "Database connection failed.";
}
?>
