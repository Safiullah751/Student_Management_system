<?php
include( 'db.php' );
if (isset( $_GET[ 'Add_student' ])) {
    $Add_student = $_GET[ 'Add_student' ];
    $sql = "DELETE FROM `student` WHERE id='$Add_student'";
    $query = mysqli_query( $connection, $sql );
    if ( $query ) {
        header( 'location:List_OF_Student.php?Deleted=1' );
        die;
    }
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>

    <title>Tables / General - NiceAdmin Bootstrap Template</title>
    <meta content='' name='description'>
    <meta content='' name='keywords'>

     <!-- links -->
      <?php
        include('links.php');
      ?>
</head>

<body>

    <!-- ===  ===  = Header ===  ===  = -->
    <?php
          include( 'header.php' );
    ?>

    <!-- ===  ===  = Sidebar ===  ===  = -->
     <?php
        include( 'sidbar.php' )
      ?>
     <!-- ===  ===  = main ===  ===  = -->
    <main id='main' class='main'>
        <div class='pagetitle'>
            <h1>List_OF_Student</h1>
            <nav>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                    <li class='breadcrumb-item active'>List_OF_Student</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class='section'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'></h5>
                    <!-- Table with stripped rows -->
                    <table class='table table-striped'>
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
                        <tbody>
<?php
            include( 'db.php' );
            $sql = 'SELECT student.*, department.dName as de_name  FROM `student` inner join department on department.dID=student.Department_dID order by id desc';
            $query = mysqli_query( $connection, $sql );
            $num = 1;
       while( $row = mysqli_fetch_assoc( $query ) ) {
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
                      <a type='button' class='btn btn-primary' href='List_OF_Student.php?Add_student=$id'>Yes</a>
                    </div>
                  </div>
                </div>
              </div>
            
       ";
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <!-- ===  ===  = Footer ===  ===  = -->
     <?php
       include('footer.php')
     ?>
</body>
</html>