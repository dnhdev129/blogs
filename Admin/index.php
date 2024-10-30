<?php
session_start();
include "database/database.php";
include "database/blogcategories.php";
include "database/blogs.php";
include "database/sliders.php";
include "database/socials.php";
include "database/links.php";
include "database/about.php";
include "database/contact.php";
include "database/terms.php";
include "database/settings.php";
include "database/mailsettings.php";
include "database/subscribers.php";
include "database/comments.php";
include "database/users.php";
include "helper/help_function.php";


$database = new database();
$db = $database->connect();

/*Check session user_id*/
if(empty($_SESSION['user_id'])){
    header("location:login.php");
}

$blogcategories = new blogcategories($db);
$stmt_blogcategories = $blogcategories->readAll();


$settings = new settings($db);
$settings->id = 1;
$settings->read();

$page = isset($_GET['page'])?$_GET['page']:'dashboard';
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  </head>
  <body>
    <header class="header"> 
      <?php  
            include "includes/header.php";
        ?>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <?php include "includes/sidebar.php" ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <?php
          //print_r(session_id());
          if($page == 'dashboard'){
              include "includes/dashboard.php"; 
          }else if($page == 'blogcategories'){
              include "includes/blogcategories.php"; 
          }else if($page == 'blogcategories_add'){
              include "includes/blogcategories_add.php"; 
          }else if($page == 'blogcategories_edit'){
              include "includes/blogcategories_edit.php"; 
          }

          else if($page == 'blogs'){
              include "includes/blogs.php"; 
          }else if($page == 'blogs_add'){
              include "includes/blogs_add.php"; 
          }else if($page == 'blogs_edit'){
              include "includes/blogs_edit.php"; 
          }

          else if($page == 'sliders'){
              include "includes/sliders.php"; 
          }else if($page == 'sliders_add'){
              include "includes/sliders_add.php"; 
          }else if($page == 'sliders_edit'){
              include "includes/sliders_edit.php";
          }

          else if($page == 'socials'){
              include "includes/socials.php"; 
          }else if($page == 'socials_add'){
              include "includes/socials_add.php"; 
          }else if($page == 'socials_edit'){
              include "includes/socials_edit.php"; 
          }

          else if($page == 'links'){
              include "includes/links.php"; 
          }else if($page == 'links_add'){
              include "includes/links_add.php"; 
          }else if($page == 'links_edit'){
              include "includes/links_edit.php"; 
          }

          else if($page == 'users'){
              include "includes/users.php"; 
          }else if($page == 'users_add'){
              include "includes/users_add.php"; 
          }else if($page == 'users_edit'){
              include "includes/users_edit.php"; 
          }


          else if($page == 'about'){
              include "includes/about.php"; 
          }else if($page == 'contact'){
              include "includes/contact.php"; 
          }else if($page == 'terms'){
              include "includes/terms.php";
          }else if($page == 'settings'){
              include "includes/settings.php"; 
          }else if($page == 'mailsettings'){
              include "includes/mailsettings.php";
          }else if($page == 'subscribers'){
                include "includes/subscribers.php"; 
          }else if($page == 'subscribers_add'){
              include "includes/subscribers_add.php"; 
          }else if($page == 'comments'){
              include "includes/comments.php";
          }
    ?>
      </div>
       <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
               <p class="no-margin-bottom"><?php echo $settings->site_footer ?><a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
            </div>
          </div>
        </footer>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('#summernote').summernote({
        placeholder: ' ',
        tabsize: 2,
        height: 100
      });

      $('#summernote1').summernote({
        placeholder: ' ',
        tabsize: 2,
        height: 100
      });

      //sendmail
      function sendMail(){
        var title = document.getElementById("title").value;
        var content = document.getElementById("content").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //console.log("this.responseText");
                //alert(this.responseText);
                if(this.responseText == "success"){
                    document.getElementById("msg").innerHTML = "<div class='alert alert-success'>Mail has been send to all Users successfully!</div>";
                }else{
                    document.getElementById("msg").innerHTML = "<div class='alert alert-warning'>No user available to send email</div>";
                }                
            }
        }
        xhttp.open("POST","mail/sendmail.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("title="+title+"&content="+content);
      }
    </script>
  </body>
</html>