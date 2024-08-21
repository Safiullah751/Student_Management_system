<?php
//connect to server 
$connection = mysqli_connect("localhost","root","","account");
if(isset($_GET['Edit_User'])){
$Edit_User = $_GET['Edit_User'];
$sql = "DELETE FROM `users` WHERE id='$Edit_User'";
$query = mysqli_query($connection, $sql);

if($query){

  header("location:List_of_users.php?Deleted=1");
  die;
}


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
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
    <!-- ======= main ======= -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>List_OF_Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">List_OF_Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">       
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Img</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">LastName</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                         <th scope="col">Operation</th>
                  </tr>
                </thead>
                <tbody>
        <?php
                   $connection= mysqli_connect("localhost","root","","account"); 
                   $sql = "SELECT * FROM `users`";
                   $query =mysqli_query($connection , $sql);
                   $num=1;
              while($row = mysqli_fetch_assoc($query)){
                     $id= $row['id'];
                     $img =$row['image'];
                     $fname =$row['firstname'];
                     $lname =$row['lastname'];
                     $uname =$row['username'];
                     $password =$row['password'];
                     $status=$row['status'];
          echo "
                  <tr>
                  <td>$num</td>
                  <td><img width='90' hight='50' src='imgs/$img'></td>
                    <td>$fname</td>
                    <td>$lname</td>
                    <td>$uname</td>
                    <td>$password</td>
                    <td>$status</td>
                    <td>
                     <a href='edit_profile.php?Edit_User=$id' title='Edit_User'>  <i class='bi bi-pencil-square' style='font-size:25px;  margin:10px; color:green'></i> </a> 
                     <a  data-bs-toggle='modal' data-bs-target='#verticalycentered' title='Delet_sudent'><i class='bx bxs-trash' style='font-size:25px; margin:10px; color:red'></i> </a> 
                    </td>
                  </tr>"
                  ;
           echo"
              <div class='modal fade ' id='verticalycentered' tabindex='-1' aria-hidden='true' style='display: none; '>
                <div class='modal-dialog modal-dialog-centered '>
                  <div class='modal-content bg-dark text-light'>
                    <div class='modal-header '>
                      <button type='button' class='btn-close bg-danger' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' style='font-size:30px;'>
                           Do you want to delete it ?
                    </div>
                    <div class=modal-footer>
                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>No</button>
                      <a type='button' class='btn btn-primary' href='List_of_users.php?Edit_User=$id'>Yes</a>
                    </div>
                  </div>
                </div>
              </div>
            
              ";
              $num++;
           }     
       ?>
                </tbody>            
              </table>
            </div>
        </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
   <?php
    include('footer.php')
   ?>
</body>
</html>