<?php
session_start();
include("../includes/connect.php");

if(!isset($_SESSION['email'])){
    header("location: ../index.php");
}
else{

    include("user_navigation.php");
    include("user_sidebar.php");
    include("user_timeline.php");
}
?>