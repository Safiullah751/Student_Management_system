<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="assets/css/style.css">
    <!-- links -->
      <?php
       include('links.php');
      ?>
</head>

<body>
 <aside id="sidebar"  class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Add_student.php">
              <i class="bi bi-circle"></i><span>Add Student</span>
            </a>
          </li>
          <li>
            <a href="Department.php">
              <i class="bi bi-circle"></i><span>Add Department</span>
            </a>
          </li>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
         <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="List_OF_Student.php">
              <i class="bi bi-circle"></i><span>List OF Student</span>
            </a>
          </li>
          <li>
            <a href="List_of_users.php">
              <i class="bi bi-circle"></i><span>List Of User</span>
            </a>
          </li>
          
        </ul>
      </li>
      <!-- End Tables Nav -->
      <li class="nav-item">
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav"></ul>
        <li class="nav-item">
        <a class="nav-link collapsed" href="Contact.php">
          <i class="bi bi-card-list"></i>
          <span>Contact</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="add_user.php">
          <i class="bi bi-person"></i>
          <span>Add User</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
    
      </li><!-- End Login Page Nav -->
       <li class="nav-item logout">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-left text-danger" ></i>
          <span class="outline-primary text-danger">Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->

</body>
</html>