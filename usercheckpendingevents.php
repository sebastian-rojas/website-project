<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
header('Location: index.php');
}
else{
$myfile = fopen("userlog.txt", "a") or die("Unable to open file!");
$txt = " user open accepted events".PHP_EOL;
fwrite($myfile, $txt);
}

?>
<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>We Serve You INC | Pending Events</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="book_event.php">
                            <img src="assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-quick-sidebar-toggler">
                                <a href="userlogout.php">
                                    <i class="icon-logout"></i>
                                </a>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="nav-item start">
                                <a href="book_event.php" class="nav-link nav-toggle">
                                    <i class="icon-calendar"></i>
                                    <span class="title">Book Event</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Utilities</h3>
                            </li>
                            <li class="nav-item active">
                                <a href="usercheckpendingevents.php" class="nav-link nav-toggle">
                                    <i class="icon-clock"></i>
                                    <span class="title">Pending Events</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="usercheckacceptedevents.php" class="nav-link nav-toggle">
                                    <i class="icon-check"></i>
                                    <span class="title">Accepted Events</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="usercheckrejectedevents.php" class="nav-link nav-toggle">
                                    <i class="icon-close"></i>
                                    <span class="title">Rejected Events</span>
                                    <span class="arrow"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">User Panel</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Pending Events</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Pending events </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                            <div class="row">
                                <div class="col-md-12">
<?php


$id=$_SESSION['customer_id'];
include('connection.php');
$query = mysqli_query($conn,"SELECT * FROM events where status='pending' and customer_id='$id'");
if ($query){

		while ($data = mysqli_fetch_assoc ($query)){
		$eventid=$data['event_id'];
		$sql1="select * from invoice where event_id='$eventid'";
		$result1=mysqli_query($conn,$sql1);
		$data1 = mysqli_fetch_assoc ($result1);


								echo "
                                <div class='portlet box blue-hoki'>
                                    <div class='portlet-title'>
                                        <div class='caption'>
                                            <strong><i class='fa fa-calendar'></i> Date:</strong> ".$data['event_date']." | <strong><i class='fa fa-check'></i> Event Type:</strong> ".$data['event_type']. " | <strong><i class='fa fa-question'></i> Status:</strong> " .$data['status']." </div>
                                        <div class='tools'>
                                            <a href='javascript:;' class='collapse'> </a>
                                            <a href='' class='fullscreen'> </a>
                                        </div>
                                    </div>
                                    <div class='portlet-body'>
                                        <div class='scroller' style='height:60px' data-rail-visible='1' data-rail-color='blue' data-handle-color='red'>
                                            <strong> Services: </strong>".$data['things_for_events']."<br>
											<strong> Participants: </strong>".$data['number_of_participents']."<br>
											<strong> Description: </strong>".$data['description']."<br>
										</div>
                                    </div>
                                </div>";

					}
	} 
?>
                                </div>
                            </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner">
                    Copyright &copy; We Serve You INC. 2016
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>