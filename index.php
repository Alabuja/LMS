<?php
session_start();
include("includes/connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
          <!--Javascript and jquery-->
    <title>Schools</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
        <!--link rel="stylesheet" type="text/css" href="assets/css/custom.css" -- > 
        <!--use the custom.css for this index page -->
    <link rel="stylesheet" type="text/css" href="assets/css/scroll.css">
</head>
<body id="top" data-spy="scroll"> 

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#top" style="text-transform: uppercase; font-weight: 400; font-size: 18px; font-family: Verdana; color: #ffffff;">Schools</a>
            </div>

            <div class="collapse navbar-collapse page">
                <ul class="nav navbar-nav navbar-right" style="text-transform: uppercase;">
                    <li class="hidden">
                        <a href="#top" class="page-scroll"></a>
                    </li>
                    <li>
                      <a href="#about" class="page-scroll">About</a>
                    </li>
                    <li>
                        <a href="#view" class="page-scroll">Overview</a>
                    </li>
                    <li>
                        <a href="#contact" class="page-scroll">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
.
    <section class="first">
       <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-3" style="background-color:#9e5d32;">
                    <h1>Welcome to Schools</h1><br>
                    <p style="text-align: justify;">Welcome to Schools where education meets Collaboration resulting in good user experience. With Schools, Lecturers are able to collaborate with students on issues relating to academics and life as a resulting bringing the classrom to the students. 
                    </p>

                    <a class="btn btn-primary btn-md" data-toggle="modal" style="margin-top: 100px; margin-bottom: 30px;" data-target="#loginModal">Login</a>
                </div>
            </div>
        </div>
    </section>

    <!--Section modal-->
    <section id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >Login</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                          <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                          <input class="form-control" placeholder="Password" name="password" type="password">
                        </div>
                        <button class="btn btn-lg btn-success btn-block" name="user_login">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </section>
    <!--Section modal-->

    <section id="about">
        <div class
        ="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Open Course Ware is free open Learning Management System design inoder to speedy the delivery of lectures while at the same time making it convenient for the lectures and 
                    students to both collaborate on pressing issues as it concerns academics. 
                    <strong>Note:</strong> It is open for collaboration and contributions.
                </div>
            </div>
        </div>
    </section>

    <!--About Section-->

     <!--Overview Section-->
    <section id="view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Open Course Ware is free open Learning Management System design inoder to speedy the delivery of lectures while at the same time making it convenient for the lectures and 
                    students to both collaborate on pressing issues as it concerns academics. 
                    <strong>Note:</strong> It is open for collaboration and contributions.
                </div>
            </div>
        </div>
    </section>

    <!--Overview Section-->
    <!--Contact Section-->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h3> Alatech Incorporation</h3>
                    <p>24 June Street Yaba, Lagos State, Nigeria.</p>

                    <ul class="list-unstyled">
                      <li> <i class="fa fa-phone"></i> 08132964727</li>
                      <li><i class="fa fa-envelope"></i> info@alatech.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
     <!--Contact Section-->

     <footer style="background-color: #ffffff;">
         &copy; Copyright <?php echo date(" Y"); ?> | All Rights Reserved.
     </footer>

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
    <!--Custom js-->
    <script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>

<?php 
  if(isset($_POST['user_login'])){
      $email = mysql_real_escape_string($_POST['email']);
      $pass = md5($_POST['password']);

      $get_user = "SELECT * FROM users WHERE(email = '$email' AND password='$pass' AND role = 'Student')";
      $run_user = mysql_query($get_user);

      $check = mysql_num_rows($run_user);

      $get_lec = "SELECT * FROM users WHERE(email = '$email' AND password='$pass' AND role = 'Lecturer')";
      $run_lec = mysql_query($get_lec);

      $check_lec = mysql_num_rows($run_lec);

      $get_admin = "SELECT * FROM admin WHERE(admin_email = '$email' AND admin_pass='$pass')";
      $run_admin = mysql_query($get_admin);

      $check_admin = mysql_num_rows($run_admin);

      if($check > 0){
          $_SESSION['email'] = $email;

          echo "<script>window.open('students/home.php','_self')</script>";
      }
      else if($check_lec > 0){
          $_SESSION['email'] = $email;

          echo "<script>window.open('lecturer/home.php','_self')</script>";
      }
      else if($check_admin > 0){
          $_SESSION['admin_email'] = $email;

          echo "<script>window.open('admin/home.php','_self')</script>";
      }
      else{
          echo "<script>alert('Email or password not correct!!!')</script>";
      }
  }
?>