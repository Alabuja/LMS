<?php 
    $user_current = $_SESSION['admin_email'];
    $query= "SELECT * FROM admin WHERE admin_email='$user_current'";
    $result = mysql_query($query);

    while ($row = mysql_fetch_array($result)) {       
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome <?php echo strtoupper($row['admin_name']);?></title>

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Project</a>
            </div>
            <!-- /.navbar-header -->
            <!--form class="navbar-form navbar-top-links navbar-left" role="search" autocomplete="off" action="search.php">
                <div class="form-group">
                    <input type="text" name="search-form" class="search form-control" placeholder="Search courses">
                </div>

                <div id="display"></div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form-->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo strtoupper($row['admin_name']);?>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="home.php?user_profile">
                                <i class="fa fa-user fa-fw"></i> User Profile
                            </a>
                        </li>
                        <li>
                            <a href="home.php?edit-profile">
                                <i class="fa fa-edit"></i> Edit Profile
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="admin_logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>
    </div>

<?php } ?>