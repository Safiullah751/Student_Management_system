  <?php
    session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
  <link href="assets/css/form.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
 <?php
  $connection = mysqli_connect("localhost","root","","account");
   $sql ="SELECT * FROM `users`";
   $query = mysqli_query($connection , $sql);
 ?>
<body>
  <?php
    if(isset($_POST["send"])){

     $uname = $_POST["uname"];
     $password = $_POST["password"];
       while($row=mysqli_fetch_assoc($query)){
        $uname_user =$row['username'];
        $password_user =$row['password'];
        $id_user =$row['id'];
         if($uname==$uname_user && $password==$password_user){
             
            // to redirect another page in php
            if(isset($_POST["remember"])){
            setcookie("username",$uname,time()+60*60);
            setcookie("password",$password,time()+60*60);
            }
       
            $_SESSION["login_session"]=$uname;
            $_SESSION["id_session"]=$id_user;
    
              header("location:index.php?true=1");
              exit;

        }else{
            echo  "<h1 style='color:red'>Either user name or password incorrect!</h1>";
        }
    }
       }
        
    ?>
  <main>
    <div class="container">

       <section>
        <div class="imgBox">
            <img src="assets/img/com.jpg" alt="">
        </div>
        <div class="contentBox">
            <div class="form">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="input" >
                        <span> User Name </span>
                        <input type="text" value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];} ?>" name="uname">
                    </div>
                    <div class="input">
                        <span> Password</span>
                        <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
                    </div>
                    <div class="remember">
                        <label for="">
                            <input type="checkbox" name="remember" value="<?php if(isset($_COOKIE["username"]) && isset($_COOKIE['password'])){ echo "remember='remember'";} ?>" > Remember Me 
                        </label>
                        <div class="input">
                            <input type="submit" value="Login" name="send">
                        </div>
                        <div class="input">
                            <p> Don `t have an account <a href="#"> Sign up </a> </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>