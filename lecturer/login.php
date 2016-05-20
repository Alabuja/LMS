<?php
session_start();
include("../includes/connect.php");

?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lecturer Login</title>

    <link rel="icon" type="image/gif" href="assets/img/animated_favicon1.gif">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- MetisMenu CSS -->
    <link href="../assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../assets/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">User login...</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" name="user_login">Login</button>
                            </fieldset>
                        </form>

                        <?php 
                            if(isset($_POST['user_login'])){
                                $email = mysql_real_escape_string($_POST['email']);
                                $pass = $_POST['password'];

                                $get_user = "SELECT * FROM users WHERE (email = '$email' AND password='$pass' AND role='Lecturer')";
                                $run_user = mysql_query($get_user);


                                $check = mysql_num_rows($run_user);

                                if($check == 0){
                                    echo "<script>alert('Email or password not correct!!!')</script>";
                                }
                                else {
                                    while ($row = mysql_fetch_array($run_user, MYSQLI_BOTH)) {       
                                        $user_id = $row['user_id'];
                                    }
                                    $_SESSION['email'] = $email;
                                    $_SESSION['user_id'] = $user_id;

                                   echo "<script>window.open('index.php','_self')</script>";
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>