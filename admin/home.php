<?php
session_start();
include("../includes/connect.php");

if(!isset($_SESSION['admin_email'])){
    header("location: ../index.php");
}
else{

    include("navigation.php");
    include("sidebar.php");
    include("timeline.php");
}
?>