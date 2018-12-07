<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-friends.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Nov 2018 18:06:54 GMT -->
<head>
<?php
                session_start();
?>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Friend List | Your Friend List</title>

		<!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="images/fav.png"/>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="newsfeed.php"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
             
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  <li><a href="timeline.php">Log Out</a></li>                                                          
                  <li><a href="edit-profile-password.php">Change Password</a></li>
                </ul>
              </li>
              
              
             
            </ul>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <div id="page-contents">
    	<div class="container">
    		<div class="row">

    			<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    			
          <div class="col-md-3 static">
            <?php
            $e=$_SESSION['Email'];
            $po=$_SESSION['co'];
            $con=mysqli_connect("localhost","root","","social_network");
            $sql="select * from users where email='$e'";
            $result=mysqli_query($con,$sql);
            
            while($row=mysqli_fetch_array($result))
            {
            echo "<div class='profile-card'>
              <img src='images/users/user-".$po.".jpg' alt='user' class='profile-photo' />
              <h5><a href='newsfeed.php' class='text-white'>".$row['first_name']."</a></h5>
              <a href='#' class='text-white'><i class='ion ion-android-person-add'></i> 1,299 followers</a>
            </div>";
            
                  
            }
            ?>            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.php">My Newsfeed</a></div></li>
              

              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.php">Friends</a></div></li>
              
              
            </ul><!--news-feed links ends-->
            
          </div>
    			<div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            

            <!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                <?php

                $e=$_SESSION['Email'];
                $email=$e;
                $con=mysqli_connect("localhost","root","","social_network");
                $tname=substr($e,0,strpos($e,"@"))."_friends";
                
                $sql="Select * from ".$tname.";";
                $result=mysqli_query($con,$sql);
                $c=1;
                $co=1;
                while($row=mysqli_fetch_array($result))
                {

                echo  "<div class='col-md-6 col-sm-6'>                 
                  <div class='friend-card'>
                    <img src='images/covers/".$co.".jpg' al='profile-cover' class='img-responsive cover' />
                    <div class='card-info'>
                      <img src='images/users/user-".$c.".jpg' alt='user' class='profile-photo-lg' />
                      <div class='friend-info'>
                        <a href='#' class='pull-right text-green'>My Friend</a>
                        <h5><a href='timeline.php' class='profile-link'>".$row['friendid']."</a></h5>
                        <p>Student at JIIT</p>
                      </div>
                    </div>
                  </div>
                </div>";
                $c++;
                $co++;
                if($c==20)
                  $c=1;
                if($co==10)
                  $co=1;


                }
                ?>



            		
                
            </div>
          </div>

    			<!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			
            
          </div>
    		</div>
    	</div>
    </div>

    <!-- Footer
    ================================================= -->
    <footer id="footer">
      <div class="container">
      	<div class="row">
          <div class="footer-wrapper">
            <div class="col-md-3 col-sm-3">
              <a href="#"><img src="images/logo-black.png" alt="" class="footer-logo" /></a>
              <ul class="list-inline social-icons">
              	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
              	<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For individuals</h5>
              <ul class="footer-links">
                <li><a href="#">Signup</a></li>
                <li><a href="#">login</a></li>
                <li><a href="#">Explore</a></li>
                <li><a href="#">Finder app</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Language settings</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>For businesses</h5>
              <ul class="footer-links">
                <li><a href="#">Business signup</a></li>
                <li><a href="#">Business login</a></li>
                <li><a href="#">Benefits</a></li>
                <li><a href="#">Resources</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">Setup</a></li>
              </ul>
            </div>
            <div class="col-md-2 col-sm-2">
              <h5>About</h5>
              <ul class="footer-links">
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
            <div class="col-md-3 col-sm-3">
              <h5>Contact Us</h5>
              <ul class="contact">
                <li><i class="icon ion-ios-telephone-outline"></i>+1 (234) 222 0754</li>
                <li><i class="icon ion-ios-email-outline"></i>info@thunder-team.com</li>
                <li><i class="icon ion-ios-location-outline"></i>228 Park Ave S NY, USA</li>
              </ul>
            </div>
          </div>
      	</div>
      </div>
      <div class="copyright">
        <p>Thunder Team © 2016. All rights reserved</p>
      </div>
		</footer>
    
    <!--preloader-->
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>
    
    
    <!-- Scripts
    ================================================= -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
    
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/newsfeed-friends.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Nov 2018 18:07:02 GMT -->
</html>
