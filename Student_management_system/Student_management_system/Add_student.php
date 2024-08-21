<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <!-- Links -->
    <?php
    include('links.php')
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

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add_Student</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add_Student</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                               <form method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="id" require>
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
                                        <input type="file" class="form-control" name="cv" require>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-9">
                                        <select type="text" class="form-control" name="dep" require id="department"
                                            value="depar">
                <?php
                  include('db.php');
                  $sql = "SELECT * FROM `department`";
                  $query= mysqli_query($connection,$sql);
                   while($row = mysqli_fetch_assoc($query)){
                        $department_name = $row['dName'];
                        $department_id = $row['dID'];

                       echo "
                       <option value='$department_id'>$department_name</option>
                           ";
                          } 
                   ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" require class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">FatherName</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fname" require class="form-control">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">LastName</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lname" require class="form-control">
                                    </div>
                                </div>

                                <div class="row text-center ">
                                    <div class="">
                                        <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                            <?php
                
                $connection =mysqli_connect("localhost" , "root" ,"","regesterition");
              if(isset($_POST['send'])){
                     $id =$_POST['id'];
                     $department = $_POST['dep'];
                     $name = $_POST['name'];
                     $fname =$_POST['fname'];
                     $lname= $_POST['lname'];
                     $file_name = $_FILES['img']['name'];
                     $source = $_FILES['img']['tmp_name'];
                     $_FILES['img']['size'];
                     $_FILES['img']['type'];
                     $allowed = array('image/jpeg', 'image/jpg','image/png');
                     $ext = substr($file_name, strrpos($file_name, '.') + 1);
                     $time = time();
              if(in_array($_FILES['img']['type'], $allowed)){
                 
                      $destination = "files/";
                     move_uploaded_file($source, $destination.$file_name);
        }
           else {
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
           else{
            echo   $msgErr = "this type of file is not allowed!";
              }
                $sql="INSERT INTO student(student_id, img , cv, Name ,FatherName,LastName,Department_dID ) VALUES('$id','$file_name','$pdf_name','$name','$fname','$lname', '$department')";
                $result =mysqli_query($connection ,$sql);
               if($result){
                   echo "
                 <div class='mt-5 alert alert-success bg-success text-light border-0 alert-dismissible fade show' role='alert'>
                Student Added!
                <button type='button' class='btn-close btn-close-white' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>  ";
                }

            }
        
               ?>
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