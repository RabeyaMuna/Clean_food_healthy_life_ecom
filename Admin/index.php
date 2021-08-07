 <!-- <?php
        session_start();
        include('includes/config.php');
        error_reporting(0);
        $con = mysqli_connect('localhost', 'root', '', 'Fit_ecommerce');
        if ((!isset($_SESSION['username'])) || isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header("location: http://localhost/Clean_food_healthy_life_ecom/login.php");
        } else {
        ?> -->

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
     <meta name="author" content="Coderthemes">
     <!-- App title -->
     <title>CleanFood&FitLife | Dashboard</title>
     <link rel="stylesheet" href="../plugins/morris/morris.css">

     <!-- App css -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
     <script src="assets/js/modernizr.min.js"></script>

 </head>


 <body class="fixed-left">

     <!-- Begin page -->
     <div id="wrapper">

         <!-- Top Bar Start -->
         <div class="topbar">

             <!-- LOGO -->
             <div class="topbar-left">
                 <a href="index.php" class="logo"><span>CleanFood&FitLife <span> Admin </span></span><i class="mdi mdi-layers"></i></a>
                 <!-- Image logo -->
                 <!--<a href="index.php" class="logo">-->
                 <!--<span>-->
                 <!--<img src="assets/images/logo.png" alt="" height="30">-->
                 <!--</span>-->
                 <!--<i>-->
                 <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                 <!--</i>-->
                 <!--</a>-->
             </div>

             <!-- Button mobile view to collapse sidebar menu -->
             <?php include('includes/topheader.php'); ?>
         </div>
         <!-- Top Bar End -->


         <!-- ========== Left Sidebar Start ========== -->
         <?php include('includes/leftsidebar.php'); ?>
         <!-- Left Sidebar End -->


         <!-- ============================================================== -->
         <!-- Start right Content here -->
         <!-- ============================================================== -->
         <div class="content-page">
             <!-- Start content -->
             <div class="content">
                 <div class="container">
                     <div class="row">
                         <div class="col-xs-12">
                             <div class="page-title-box">
                                 <h4 class="page-title">Dashboard</h4>
                                 <ol class="breadcrumb p-0 m-0">
                                     <li>
                                         <a href="#">CleanFood&FitLife</a>
                                     </li>
                                     <li>
                                         <a href="#">Admin</a>
                                     </li>
                                     <li class="active">
                                         Dashboard
                                     </li>
                                 </ol>
                                 <div class="clearfix"></div>
                             </div>
                         </div>
                     </div>
                     <!-- end row -->

                     <div class="row">
                         <a href="manage-categories.php">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                 <div class="card-box widget-box-one">
                                     <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                                     <div class="wigdet-one-content">
                                         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Categories Listed</p>
                                         <?php $query = mysqli_query($con, "select * from categories where Is_Active=1");
                                            $countcat = mysqli_num_rows($query);
                                            ?>

                                         <h2><?php echo htmlentities($countcat); ?>
                                             <small></small>
                                         </h2>

                                     </div>
                                 </div>
                             </div>
                         </a><!-- end col -->
                      
                         <a href="manage-Nu.php">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                 <div class="card-box widget-box-one">
                                     <i class="mdi mdi-layers widget-one-icon"></i>
                                     <div class="wigdet-one-content">
                                         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Nutritionist</p>
                                         <?php $query = mysqli_query($con, "select * from users where usertype=2");
                                            $countNu = mysqli_num_rows($query);
                                            ?>
                                         <h2><?php echo htmlentities($countNu); ?>
                                             <small></small>
                                         </h2>

                                     </div>
                                 </div>
                             </div><!-- end col -->
                         </a>
                         <a href="manage-Products.php">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                 <div class="card-box widget-box-one">
                                     <i class="mdi mdi-layers widget-one-icon"></i>
                                     <div class="wigdet-one-content">
                                         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Listed Of Products</p>
                                         <?php $query = mysqli_query($con, "select * from product where status=1");
                                            $countPro = mysqli_num_rows($query);
                                            ?>
                                         <h2><?php echo htmlentities($countPro); ?>
                                             <small></small>
                                         </h2>

                                     </div>
                                 </div>
                             </div><!-- end col -->
                         </a>
                         <a href="manage-OrderList.php">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                 <div class="card-box widget-box-one">
                                     <i class="mdi mdi-layers widget-one-icon"></i>
                                     <div class="wigdet-one-content">
                                         <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Lists Of Order</p>
                                         <?php $query = mysqli_query($con, "select * from admin_orders");
                                            $countPro = mysqli_num_rows($query);
                                            ?>
                                         <h2><?php echo htmlentities($countPro); ?>
                                             <small></small>
                                         </h2>

                                     </div>
                                 </div>
                             </div><!-- end col -->
                         </a>

                     


                     </div>
                     <!-- end row -->
              

                 </div> <!-- container -->

             </div> <!-- content -->
             <?php include('includes/footer.php'); ?>

         </div>


       

     </div>
     <!-- END wrapper -->


     <script>
         var resizefunc = [];
     </script>
     Admin/assets/js/bootstrap.min.js
     <!-- jQuery  -->
     <script src="assets/js/jquery.min.js"></script>
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/detect.js"></script>
     <script src="assets/js/fastclick.js"></script>
     <script src="assets/js/jquery.blockUI.js"></script>
     <script src="assets/js/waves.js"></script>
     <script src="assets/js/jquery.slimscroll.js"></script>
     <script src="assets/js/jquery.scrollTo.min.js"></script>
     <script src="../plugins/switchery/switchery.min.css"></script>

     <!-- Counter js  -->
     <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
     <script src="../plugins/counterup/jquery.counterup.min.js"></script>

     <!--Morris Chart-->
     <script src="../plugins/morris/morris.min.js"></script>
     <script src="../plugins/raphael/raphael-min.js"></script>

     <!-- Dashboard init -->
     <script src="assets/pages/jquery.dashboard.js"></script>

     <!-- App js -->
     <script src="assets/js/jquery.core.js"></script>
     <script src="assets/js/jquery.app.js"></script>

 </body>

 </html>
 <?php } ?>