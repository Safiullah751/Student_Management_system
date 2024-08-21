<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
       include('header.php')
   ?>

  <!-- ======= Sidebar ======= -->
    <?php
       include('sidbar.php')
    ?>
  <!-- ======= main ======= -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
     <?php
            $connection =mysqli_connect("localhost","root","","regesterition");
            $sql ="SELECT * FROM `department`";
            $selectQuery  = mysqli_query($connection , $sql);
        $num=1;
          while($row=mysqli_fetch_assoc($selectQuery)){
           $depname = $row['dName'];
           $depid = $row['dID'];
          //number of Student for each Department
            $sql_student = "SELECT count(*) as students FROM `student` WHERE Department_dID='$depid'";
            $selectQuery_student =mysqli_query($connection , $sql_student);
            $row_student=mysqli_fetch_assoc($selectQuery_student);
            $numberof_Student = $row_student['students'];
        //number of Student for all Department
           $sql_all_student = "SELECT count(*) as all_student from `student` ";
            $selectQuery_all_student =mysqli_query($connection , $sql_all_student);
            $row_all_student=mysqli_fetch_assoc($selectQuery_all_student);
            $numberof_all_Student = $row_all_student['all_student'];
            $student_percentage=round(((100 * $numberof_Student)/$numberof_all_Student),2);
            echo "
   <div class='col-xxl-4 col-md-6'>
              <div class='card info-card sales-card'>
                <div class='card-body'>
                  <h4 class='card-title'>$depname</h4>
                  <div class='d-flex align-items-center'>
                    <div class='card-icon rounded-circle d-flex align-items-center justify-content-center'>
                      <i class='bi bi-building'></i>
                    </div>
                    <div class='ps-3'>
                      <h6>$numberof_Student Student</h6>
                      <span class='text-success small pt-1 fw-bold'>$student_percentage%</span> <span class='text-muted small pt-2 ps-1'>increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Sales Card -->
   ";
}
?>
            <!-- Customers Card -->
            <?php
            $connect =mysqli_connect("localhost","root","","account");
            $sql ="SELECT * FROM `users`";
            $selectQuery  = mysqli_query($connect , $sql);
          $num=1;
          while($row=mysqli_fetch_assoc($selectQuery)){
          //number of users
           $sql_user = "SELECT * from `users`"; 
           $selectQuery_users =mysqli_query($connect , $sql_user);
           $numberof_users = $num;
            $num++;
          }
           ?>
          <div class='col-xxl-4 col-xl-12'>
              <div class='card info-card customers-card'>
                <div class='card-body'>
                  <h5 class='card-title'> Users</h5>

                  <div class='d-flex align-items-center'>
                    <div class='card-icon rounded-circle d-flex align-items-center justify-content-center'>
                      <i style="font-size:70px; color:blue;" class='ri-account-circle-fill '></i>
                    </div>
                    <div class='ps-3'>
                      <h6><?php echo " $numberof_users    User "; ?></h6>
                      <span class='text-danger small pt-1 fw-bold'>12%</span> <span class='text-muted small pt-2 ps-1'>decrease</span>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <?php
      include('footer.php')
    ?>

</body>

</html>