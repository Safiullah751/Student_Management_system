<?php
$connection = mysqli_connect( 'localhost', 'root', '', 'regesterition' );
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
      <!-- links -->
       <?php
         include('links.php')
       ?>
</head>
<body>
    <!-- ===  ===  = Header ===  ===  = -->
      <?php
         include( 'header.php' );
      ?>
  <!-- ===  ===  = main ===  ===  = -->
    <main id='main' class='main'>
        <div class='pagetitle'>
            <h1>Dashboard</h1>
            <nav>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='index.html'>Home</a></li>
                    <li class='breadcrumb-item active'>Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
       <section class='section dashboard'>
            <div class='row'>
                <!-- Left side columns -->
                <div class='col-lg-12'>
                    <div class='row'>

                        <!-- Top Selling -->
                        <div class='col-12'>
                            <div class='card top-selling overflow-auto'>

                                <div class='filter'>
                                    <a class='icon' href='#' data-bs-toggle='dropdown'><i
                                            class='bi bi-three-dots'></i></a>
                                    <ul class='dropdown-menu dropdown-menu-end dropdown-menu-arrow'>
                                        <li class='dropdown-header text-start'>
                                            <h6>Filter</h6>
                                         </li>
                                        <li><a class='dropdown-item' href='#'>Today</a></li>
                                        <li><a class='dropdown-item' href='#'>This Month</a></li>
                                        <li><a class='dropdown-item' href='#'>This Year</a></li>
                                    </ul>
                                </div>
                                <div class='card-body pb-0'>
                                    <h5 class='card-title'>Student</h5>
                                    <table class='table table-striped'>
                                 </div>
           <tbody>
  
  <?php
       if ( $_GET[ 'search' ] ) {
           $search_name = $_GET[ 'search' ];
           $con = mysqli_connect( 'localhost', 'root', '', 'regesterition' );
           $sql = "SELECT student.*, department.dName as de_name   FROM `student`  inner join department on department.dID=student.Department_dID where Name like '%$search_name%'";
           $query = mysqli_query( $con, $sql );
    echo "
                    <thead>
                    <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>ID</th>
                    <th scope='col'>Img</th>
                    <th scope='col'>CV</th>
                    <th scope='col'>Department</th>
                    <th scope='col'>Name</th>
                    <th scope='col'>FathetName</th>
                    <th scope='col'>LastName</th>
                    <th scope='col'>Operations</th>
                  </tr>
                </thead>
           ";
         $num = 1;
              while ( $row = mysqli_fetch_assoc( $query ) ) {
                   $id = $row[ 'id' ];
                   $student_id = $row[ 'student_id' ];
                   $img = $row[ 'img' ];
                   $cv = $row[ 'cv' ];
                   $name = $row[ 'Name' ];
                   $fname = $row[ 'FatherName' ];
                   $lName = $row[ 'LastName' ];
                   $dep = $row[ 'de_name' ];

            echo "
                     <tr>
                     <td>$num</td>
                     <td>$student_id</td>
                    <td><img width='60' src='files/$img' open></td>
                    <td><a href='files/$cv' class='btn btn-dark px-4 ' download> $cv <i class=' bi bi-download mx-3'</i></a></td>
                     <td>$dep</td>
                     <td>$name</td>
                     <td>$fname</td>
                     <td>$lName</td>
                     <td>
                     <a href='edit_student.php?Add_student=$id' title='edit_student'>  <i class='bi bi-pencil-square' style='font-size:25px;  margin:10px; color:green'></i> </a>
                     <a  data-bs-toggle='modal' data-bs-target='#verticalycentered' title='Delet_sudent'><i class='bx bxs-trash' style='font-size:25px; margin:10px; color:red'></i> </a>
                    </td>
                  </tr>"
        ;
             $num++;
         echo "
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
                      <a type='button' class='btn btn-primary' href='List_OF_Student.php?Add_student=$id'>Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              ";
          }
       }
?>                                
            </tbody>
           </table>
        </div>
     </div>     
 </section>
</main>
</body>
</html>