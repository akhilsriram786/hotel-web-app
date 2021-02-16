<?php
	ini_set("display_errors",0);
	error_reporting(E_ERROR);
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hotel Booking System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="assets/css/sequence.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">


  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <!-- JavaScript Library Files -->
    <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/sequence/sequence.jquery-min.js"></script>
  <script src="assets/js/sequence/setting.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>
  <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>
</head>

<body>
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="index.php" style="color: #000000; font-size: 26px; margin-top: 35px;">
            Hotel Booking System
          </a>
          <!-- end logo -->
          <!-- top menu -->
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <li class="dropdown"><a href="index.php">Home</a></li>
                <li class="dropdown"><a href="about.php">About</a></li>
                <?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
                <li class="dropdown">
                  <a href="#">Adminstration</a>
                  <ul class="dropdown-menu">
                    <li><a href="user.php?type=1">Add New System User</a></li>
                    <li><a href="user.php?type=2">Add New Customer</a></li>
                    <li><a href="room.php">Add New Room</a></li>
                    <li><a href="category.php">Add New Category</a></li>
                    <li><a href="facility.php">Add New Facility</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Reports</a>
                  <ul class="dropdown-menu">
                    <li><a href="user-report.php?type=1">System User Reports</a></li>
                    <li><a href="user-report.php?type=2">Customer Reports</a></li>
                    <li><a href="room-report.php">Room Reports</a></li>
                    <li><a href="category-report.php">Category Reports</a></li>
                    <li><a href="facility-report.php">Facility Reports</a></li>
                    <li><a href="booking-report.php">Booking Reports</a></li>
                  </ul>
                </li>
                <?php } if($_SESSION['user_details']['user_level_id'] == 2) {?>
                  <li><a href="./book_room.php">Book Room</a></li>
                  <li><a href="./booking-report.php">My Booking</a></li>
                <?php } if($_SESSION['login'] == 1) {?>
                  <li><a href="./user.php?user_id=<?php echo $_SESSION['user_details']['user_id']; ?>">My Account</a></li>
                  <li><a href="change-password.php">Change Password</a></li>
                  <li><a href="./lib/login.php?act=logout">Logout</a></li>
                <?php } else { ?>
                  <li><a href="./book_room.php">Book Room</a></li>
                  <li><a href="./room-list.php">Room Lists</a></li>
                  <li><a href="./user.php">Register</a></li>					
                  <li><a href="./login.php">Login</a></li>
                  <li><a href="./contact.php">Contact Us</a></li>
                <?php }?>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>
  