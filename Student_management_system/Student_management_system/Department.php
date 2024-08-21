<?php
ob_start();
ob_clean();
?>
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
  <title>Department</title>
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

  <!-- ======= Sidebar ======= -->
      <?php
          include('sidbar.php')
      ?>

      <!-- main -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add_Department</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Add_Department</li>    
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12 ">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <form method="post" > 
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Department_Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="dname">
                  </div>  
                </div> 
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="save">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->
       <?php
                 $connection =mysqli_connect("localhost" , "root" ,"","regesterition");
                if(isset($_POST['save'])){
                      $Department =$_POST['dname'];
                      $sql="INSERT INTO department(dName) VALUES('$Department')";
                      $result =mysqli_query($connection ,$sql);
                if($result){
                 echo "
                 <div class='mt-5 alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert'>
                Department Added!
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>  ";
            
                }  
            }
        ?>
    </section>

  </main>
  <!-- ======= Footer ======= -->
     <?php
       include('footer.php');
     ?>
</body>
</html>