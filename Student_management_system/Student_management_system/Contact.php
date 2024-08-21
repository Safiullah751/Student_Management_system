<?php
include('user_atten.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
     <!-- links -->
       <?php
         include('links.php');
       ?>
</head>
<body>
      <!-- header -->
      <?php 
        include('header.php');
      ?>
       
       <!-- sidebar -->
       <?php
          include('sidbar.php');
      ?>
      
    <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Get In Touch
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
          <div class="form_container">
            <form action="" method="Post">
              <div>
                <input type="text" placeholder="Your Name"  name="name">
              </div>
              <div>
                <input type="email" placeholder="Your Email"  name="email">
              </div>
              <div>
                <input type="text" placeholder="Your Phone"  name="phone">
              </div>
              <div>
                <input type="text"  class="message-box text-dark" placeholder="Message"  name="message">
              </div>
              <div>
                 <input type="submit" class="bg-info" value="Send" placeholder="Message"  name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $fullName = "Name : ".$name."\n";
        $email = $_POST['email'];
        $youremail = "Email :" .$email ."\n";
        $phone = $_POST['phone'];
        $yourPhone = "Phone :" .$phone ."\n";
        $message =$_POST['message'];
        $yourMessage = "Message :" .$message ."\n"."------------------------------------------------------"."\n";
        $file = fopen("contact.txt", "a");
        fputs($file , $fullName);
        fputs($file , $youremail);
        fputs($file , $yourPhone);
        fputs($file , $yourMessage);
   }
?>
</body>
</html>