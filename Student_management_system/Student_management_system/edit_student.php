<?php
 
 //1 connect to server
  include('db.php');
 $Add_student = $_GET['Add_student']; 
// get old data
$sql ="SELECT student.*, department.dName  as de_name ,department.dID as d_id FROM `student` inner join department on department.dID=student.Department_dID  where id='$Add_student' order by id desc";
$query = mysqli_query($connection, $sql);
 $row = mysqli_fetch_assoc($query);
  $id =$row['id'];  
  $student_id_old =$row['student_id'];  
   $name_old = $row['Name'];    
   $fname_old = $row['FatherName'];
   $lName_old = $row['LastName'];
   $st_dp_old_id= $row['department_dID'];
    $dep_old_id= $row['d_id'];
  if(isset($_POST['update'])){
    $new_id=$_POST["id"];
    $new_student_id=$_POST["sid"];
    $new_name=$_POST["name"];
    $new_fname=$_POST["fname"];
    $new_lname=$_POST["lname"];
    $new_dep=$_POST["dep"];
    $file_name = $_FILES['img']['name'];
    $source = $_FILES['img']['tmp_name'];
    $_FILES['img']['size'];
    $_FILES['img']['type'];
    $allowed = array('image/jpeg', 'image/jpg','image/png');
    $et = substr($file_name, strrpos($file_name, '.') + 1);
     $time = time();
        if(in_array($_FILES['img']['type'], $allowed)){
        // if($ext=="JPG" or  $ext=="pdf"){
                 $destination = "files/";
        move_uploaded_file($source, $destination.$file_name);
    
        }else{

      echo   $msgErr = "this type of file is not allowed!";
     }
      $pdf_name = $_FILES['cv']['name'];
      $source_pdf = $_FILES['cv']['tmp_name'];
      $allowedPDF = array('application/pdf');
      $extPDF = substr($pdf_name, strrpos($pdf_name, '.') + 1);
      $time = time();
      $pdf_name = $time.".".$extPDF;
      if(in_array($_FILES['cv']['type'], $allowedPDF)){
      $destination = "files/";
      move_uploaded_file($source_pdf, $destination.$pdf_name);   
    }
    $query = "UPDATE `student` SET `student_id`='$new_student_id', `img`='$file_name',`cv`='$pdf_name',`Name`='$new_name',`FatherName`='$new_fname',`LastName`='$new_lname',`Department_dID`='$new_dep' WHERE  id ='$id'";
    $result = mysqli_query($connection, $query);

    if($result){
      header("location:List_OF_Student.php?updated=1");
     die;
    }
   else{
       echo "error";
      
   }
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Student</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
        <!-- links -->
         <?php
           include('links.php')
         ?>
</head>
<body>

  <!-- ======= Header ======= -->
       <?php
         include("header.php");
       ?>
  <!-- ======= Sidebar ======= -->
    <?php
       include("sidbar.php");
    ?>

     <!-- main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Edit Student</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="sid" value="<?php echo $student_id_old;?>">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">img</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="img" require>
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">CV</label>
                  <div class="col-sm-10">
                    <input  type="file" class="form-control" name="cv" require>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Department</label>
                  <div class="col-sm-9">
                   <select type="text" class="form-control" name="dep" id="department" value="" require>
         <?php
             include('db.php');
             $sql = "SELECT * FROM `department`";
             $query= mysqli_query($connection,$sql);
              while($row = mysqli_fetch_assoc($query)){
                  $department_name = $row['dName'];
                     $department_id = $row['dID'];
                         
                            if ($department_id == $dep_old_id) {
                              echo "
                            <option value='$department_id' selected>$department_name</option>
                                ";
                            }
                            else {
                              echo "
                            <option value='$department_id' >$department_name</option>
                                ";
                            }
                            } 
            ?>
                   </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $name_old;?>" require>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">FatherName</label>
                  <div class="col-sm-10">
                    <input type="text" name="fname" class="form-control"  value="<?php echo $fname_old;?> " require>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">LastName</label>
                  <div class="col-sm-10">
                    <input type="text" name="lname" class="form-control" value="<?php echo $lName_old;?>"  require>
                  </div>
                </div>
               
                 <div class="text-center">
                  <button type="submit" name="update" class="btn btn-primary">Udate</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
              <!-- End Horizontal Form -->
            </div>
          </div>
        </div>
    </section>
  </main>

  <!-- ======= Footer ======= -->
        <?php
          include('footer.php');
         ?>
</body>

</html>