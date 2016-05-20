<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="text-align: center";>Timeline</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
            
    <div class="row"> 
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!--Make the current page the header-->
                    <?php
                        if(isset($_GET['upload'])){
                            echo "Upload Lecture Notes";
                        }
                        if(isset($_GET['discussion'])){
                            echo "Discussion";
                        }
                        if(isset($_GET['comments'])){
                            echo "Comment on discussion";
                        }
                        if(isset($_GET['user_profile'])){
                            echo "View User Profile";
                        }
                        if(isset($_GET['change_password'])){
                            echo "Change Password";
                        }
                        if(isset($_GET['enrol'])){
                            echo "Enrol to lecture a course";
                        }
                        if(isset($_GET['single'])){
                            echo "All enrolled students in a course";
                        }
                        if(isset($_GET['question'])){
                            echo "Questions";
                        }
                    ?>
                </div>
                    <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php 
                        if(isset($_GET['upload'])){
                            include("upload.php");
                        }
                        if(isset($_GET['discussion'])){
                            include("discussion.php");
                        }
                        
                         if(isset($_GET['comments'])){
                            include("../comments.php");
                        }
                         if(isset($_GET['change_password'])){
                            include("../change_password.php");
                        }
                        if(isset($_GET['user_profile'])){
                            include("user_profile.php");
                        }
                        if(isset($_GET['enrol'])){
                            include("../enrol.php");
                        }
                        if(isset($_GET['single'])){
                            include("single.php");
                        }
                        if(isset($_GET['question'])){
                            include("question.php");
                        }
                    ?>
                </div>
                    <!-- /.panel-body -->
            </div>
                <!-- /.panel -->
                    
        </div>
                <!-- /.col-lg-8 -->
    </div>
            <!-- /.row -->
</div>  
     <!-- /#page-wrapper -->
     
    <!-- jQuery -->
    <script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../assets/bower_components/raphael/raphael-min.js"></script>
    <script src="../assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="../assets/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../assets/js/sb-admin-2.js"></script>

</body>

</html>
