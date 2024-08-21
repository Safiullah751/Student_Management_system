<?php
session_start();
$id_session = $_SESSION["id_session"];
$connection = mysqli_connect("localhost","root","","account");
$sql ="SELECT * FROM `users`";
$query = mysqli_query($connection , $sql);
   while($row =mysqli_fetch_assoc($query)){
     if($id_session==$row['id']){
          $uname_user =$row['username'];
         $img_old = $row['image'];
          $fname = $row['firstname'];
          $lname = $row['lastname'];
          $uname = $row['username'];
          $password = $row['password'];
          $state = $row['status'];
     }
  }
 ?>

 <?php
 if(isset($_POST['update'])){
             $name_new  = $_POST['fname'];
            $lame_new  = $_POST['lname'];
             $uame_new  = $_POST['uname'];
             $password_new  = $_POST['pass'];
             $state_new  = $_POST['status'];
             $file_name = $_FILES['img']['name'];
             $source = $_FILES['img']['tmp_name'];
             $_FILES['img']['size'];
             $_FILES['img']['type'];
             $allowed = array('image/jpeg', 'image/jpg','image/png');
             $ext = substr($file_name, strrpos($file_name, '.') + 1);
             $time = time();
     if(in_array($_FILES['img']['type'], $allowed)){
        if($ext=="JPG" or  $ext=="pdf"){
                 $destination = "imgs/";
                 move_uploaded_file($source, $destination.$file_name);
       }
    
       else{
          echo   $msgErr = "this type of file is not allowed!";
        }
 
         $sql = "UPDATE `users` set `image`='$file_name' , `firstname`='$name_new',`lastname`='$lame_new',`username`='$uame_new',`password`='$password_new',`status`='$state_new' where id='$id_session'";
         $result= mysqli_query($connection , $sql);
     if($result){
         header("location:List_of_users.php?updated=1");
         die;
       }

   else{
       echo "error";
      
   }
  
 }
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Add User</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
          <!-- links -->
            <?php
              include('links.php');
            ?>
 </head>
<body>
        <!-- ======= Header ======= -->
          <?php
              include('header.php');
          ?>

        <!-- ======= sidebar ======= -->
        <?php
            include("sidbar.php");
        ?>
        
            <!-- main -->
        <main id="main" class="main">
            <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <h1 class="breadcrumb-item">Add New Users</h1>
                </ol>
            </nav>
            </div>
            <!-- End Page Title -->
            <section class="section">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <hr>
                    <!-- Horizontal Form -->
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="img" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="img" id="inputText">
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" id="inputText" value="<?php echo $fname;?>" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" id="inputText" value="<?php echo $lname;?>" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="uname" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uname" id="inputText"value="<?php echo $uname;?>" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pass" id="inputText" value="<?php echo $password;?>" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="stat" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="status" id="stat" value="status" value="<?php echo $state;?>" required>
                                <option value="active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                        </div>
                        <div class="text-center">
                        <button type="submit" name="update" class="btn btn-primary">update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    <!-- End Horizontal Form -->
                    </div>
                </div>

                </div>
            </div>
            </section>
        </main>
        <!-- ======= Footer ======= -->
        <?php
            include("footer.php");
        ?>
    </body>
</html>