<?php
// Khởi tạo đối tượng database và users
$database = new database();
$db = $database->connect();
$users = new users($db);
?>
<nav id="sidebar">
  <!-- Sidebar Header-->
  <?php if(isset($_SESSION['user_id'])): ?>
    <?php
    // Lấy thông tin người dùng từ session và hiển thị
    $users->id = $_SESSION['user_id'];
    $users->read(); // Đọc thông tin của người dùng từ CSDL
    ?>
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="<?php echo "img/users/".$users->image ?>" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5"><?php echo $users->name; ?></h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <?php else: ?>
    <a href="#" class="dropdown-toggle">Guest</a>
  <?php endif; ?>
  <ul class="list-unstyled">
    <li class="active">
      <a class="<?php echo setActive('dashboard') ?>" href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
    </li>
    <li>
      <a class="<?php echo setActive('blogs') ?>" href="index.php?page=blogs"><i class="fa fa-th"></i> Blog</a>
    </li>
    <?php
      /*Admin - Mod menu*/
      if(isset($_SESSION['user_role']) && $_SESSION['user_role'] >= 1){
    ?>
    <li>
       <a class="<?php echo setActive('blogcategories') ?>" href="index.php?page=blogcategories"><i class="fa fa-archive"></i> Blog Categories</a>
    </li>
     <li>
      <a class="<?php echo setActive('users') ?>" href="index.php?page=users"><i class="fa fa-user-circle"></i> Users</a>
    </li>
    <li>
      <a class="<?php echo setActive('subscribers') ?>" href="index.php?page=subscribers"><i class="fa fa-thumbs-up"></i> Subscribers</a>
    </li>
    <li>
      <a class="<?php echo setActive('comments') ?>" href="index.php?page=comments"><i class="fa fa-commenting"></i> Comments</a>
    </li>
    <?php
      }
      /*Admin menu*/
      if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2){
    ?>
    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-list-alt"></i>Pages </a>
      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
        <li><a class="<?php echo setActive('sliders') ?>" href="index.php?page=sliders"><i class="fa fa-sliders"></i> Sliders</a></li>
        <li><a class="<?php echo setActive('socials') ?>" href="index.php?page=socials"><i class="fa fa-share-square-o"></i> Social</a></li>
        <li><a class="<?php echo setActive('links') ?>" href="index.php?page=links"><i class="fa fa-link"></i> Links</a></li>
        <li><a class="<?php echo setActive('about') ?>" href="index.php?page=about"><i class="fa fa-book"></i> Abouts</a></li>
        <li><a class="<?php echo setActive('terms') ?>" href="index.php?page=terms"><i class="fa fa-terminal"></i> Terms</a></li>
        <li><a class="<?php echo setActive('contact') ?>" href="index.php?page=contact"><i class="fa fa-compress"></i> Contact</a></li>
        <li><a class="<?php echo setActive('settings') ?>" href="index.php?page=settings"><i class="fa fa-cogs"></i> Settings</a></li>
        <li><a class="<?php echo setActive('mailsettings') ?>" href="index.php?page=mailsettings"><i class="fa fa-envelope"></i> Mail Settings</a></li>
      </ul>
    </li>
    <?php  
      }
      ?>
  </ul>
</nav>
