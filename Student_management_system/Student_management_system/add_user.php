  <?php
  session_start();
   $id_session = $_SESSION["id_session"];
  $connection = mysqli_connect("localhost","root","","account");
   $sql ="SELECT * FROM `users`";
   $query = mysqli_query($connection , $sql);
   while($row =mysqli_fetch_assoc($query)){
    if($id_session==$row['id']){
       echo $uname_user =$row['username'];
      echo $fname = $row['firstname'];
      echo $lname =$row['lastname'];
      
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

         <!--  Sidebar-->
      <?php
            include("sidbar.php");
    ?>
     
        <main id="main" class="main">
            <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <h1 class="breadcrumb-item">Add New Users</h1>
                </ol>
            </nav>
            </div>
            <section class="section">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <hr>
                    <form method="post" action="" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="img" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="img" id="inputText" value="" >
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" id="inputText" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lname" id="inputText" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="uname" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="uname" id="inputText" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="pass" id="inputText" required>
                        </div>
                        </div>
                        <div class="row mb-3">
                        <label for="stat" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select type="text" class="form-control" name="status" id="stat" value="status" required>
                                <option value="active">Active</option>
                                <option value="Deactive">Deactive</option>
                            </select>
                        </div>
                        </div>
                        <div class="text-center">
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                    </div>
                  </div>
               </div>
            </div>
            </section>
              <?php
                  if(isset($_POST['save'])){
                      $name =$_POST['fname'];
                      $lastname =$_POST['lname'];
                      $username =$_POST['uname'];
                      $password =$_POST['pass'];
                      $state =$_POST['status'];
                      $file_name = $_FILES['img']['name'];
                      $source = $_FILES['img']['tmp_name'];
                      $_FILES['img']['size'];
                      $_FILES['img']['type'];
                      $allowed = array('image/jpeg', 'image/jpg','image/png');
                      $ext = substr($file_name, strrpos($file_name, '.') + 1);
                      $time = time();
                if(in_array($_FILES['img']['type'], $allowed)){
                      $destination = "imgs/";
                    move_uploaded_file($source, $destination.$file_name);
             }
               else{     
                  echo  $msgErr = "this type of file is not allowed!";
                 }

             $connection = mysqli_connect("localhost","root","","account");
             $sql = "INSERT INTO `users`(image, firstname , lastname ,username , password ,status ) VALUES('$file_name' ,'$name' ,'$lastname','$username','$password','$state')"; 
             $query = mysqli_query($connection , $sql);
             if($query){
                   echo "
                 <div class='mt-5 alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert'>
                User Added!
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>  ";
            
             }
          }
            ?>
        </main>
            <!-- ======= Footer ======= -->
         <?php
              include("footer.php");
           ?>
    </body>
    </html>