<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="text-align: center";>Dashboard</h1>
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
                        if(isset($_GET['view_students'])){
                            echo "View Students";
                        }
                        if(isset($_GET['view_lecturers'])){
                            echo "View Lecturers";
                        }
                        if(isset($_GET['discussion'])){
                            echo "View Discussion";
                        }
                        if(isset($_GET['create_course'])){
                            echo "Create and Assign to a new course";
                        }
                        if (isset($_GET['add_users'])) {
                            echo "Add a user";
                        }
                         if (isset($_GET['view_profile'])) {
                            echo "View a User's Profile";
                        }
                        if (isset($_GET['user_profile'])) {
                            echo "My Profile";
                        }
                        if (isset($_GET['edit-profile'])) {
                            echo "Edit a User's Profile";
                        }
                        if(isset($_GET['view'])){
                            echo "View Comments";
                        }
                        if(isset($_GET['views'])){
                            echo "View a user's profile";
                        }
                    ?>
                </div>
                    <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php 
                        if(isset($_GET['view_students'])){
                            include("view_students.php");
                        }
                        if(isset($_GET['view_lecturers'])){
                            include("view_lecturers.php");
                        }
                        if(isset($_GET['discussion'])){
                            include("topics.php");
                        } 
                        if(isset($_GET['create_course'])){
                            include("create_course.php");
                        }
                        if (isset($_GET['add_users'])) {
                            include("add_users.php");
                        }
                        if (isset($_GET['user_profile'])) {
                            include("user_profile.php");
                        }
                        if (isset($_GET['view_profile'])) {
                            include("view_profile.php");
                        }
                         if (isset($_GET['edit-profile'])) {
                            include("edit-profile.php");
                        }
                        if (isset($_GET['view'])) {
                            include("view_discussion.php");
                        }
                        if(isset($_GET['views'])){
                            include("view_profile.php");
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
