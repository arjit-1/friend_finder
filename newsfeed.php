 <!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from thunder-team.com/friend-finder/newsfeed.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Nov 2018 18:06:43 GMT -->
<head>
  <?php
    
    session_start();
    $_SESSION['error']="";
    
   $frid="";
   $query="";
$error="\nerror ";
     $con=mysqli_connect("localhost","root","","social_network");
     if(!mysqli_connect_errno($con))
     {
       if(isset($_POST['login_button']))
       {
         $user=$_POST['Email'];
         $_SESSION['Email']=$user;
         $po=mt_rand(1,20);
         $_SESSION['co']=$po;
         $pword=$_POST['password'];
         $sql="Select *from users where email='$user' AND password='$pword'";
         
         $result=mysqli_query($con,$sql);
         $c=mysqli_num_rows($result);
           if($c!=1)
           {
             header('Location: /sn/friend-finder/index.php');
           }

           
       }
       elseif (!empty($_GET['frid'])) 
       {
        $frid=$_SESSION['fid'];
         $user=$_SESSION['Email'];
          $query="insert into ".substr($user,0,strpos($user,"@"))."_friends (select email, first_name, last_name from users where email='".$frid."');";
          $result=mysqli_query($con,$query);
          $_SESSION['error']=$frid;

          $query="insert into ".substr($frid,0,strpos($frid,"@"))."_friends (select email, first_name, last_name from users where email='".$user."');";
          
          $result=mysqli_query($con,$query);
       }
       elseif(isset($_POST['register_now']))
       {
        $opassword=$_POST['oldpassword'];
        $e=$_SESSION['Email'];

        $sql="select * from users where password='$opassword' AND email='$e'";
        $query=mysqli_query($con,$sql);
        if(mysqli_num_rows($query)==1)
        {
          $npassword=$_POST['newpassword'];
          $sql="update users set password='$npassword' where email='$e'";
          $query=mysqli_query($con,$sql);
        }




       }
     }
     
  ?>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>News Feed | Check what your friends are doing</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/ionicons.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link href="css/emoji.css" rel="stylesheet">
    
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
            <a class="navbar-brand" href="index-register.php"><img src="images/logo.png" alt="logo" /></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-menu">
              
              
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span><img src="images/down-arrow.png" alt="" /></span></a>
                <ul class="dropdown-menu login">
                  <li><a href="index.php">Log Out</a></li>                                                          
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
            ?>
            <ul class="nav-news-feed">
              <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.php">My Newsfeed</a></div></li>
              
              <form action='newsfeed-friends.php' method='GET'>
              <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.php?Email=<?php echo $e?>">Friends</a></div></li>
              </form>
              
            </ul><!--news-feed links ends-->
            
          </div>
          <form action="newsfeed.php" method="post">
    			<div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->            
            <div class="create-post">
            	<div class="row">
                <?php
                $po=$_SESSION['co'];
                
            		echo "<div class='col-md-7 col-sm-7'>
                  <div class='form-group'>
                  <img src='images/users/user-".$po.".jpg' alt='' class='profile-photo-md'/>
                    
                    <textarea name='texts' id='exampleTextarea' cols='70' rows='1' class='form-control' placeholder='Write what you wish'></textarea>
                  </div>
                </div>";
                ?>
            		
                                   
                     <input type="submit" name="Publish" class="btn btn-primary" value="Publish">
                 
               </form>
            	</div>
            </div><!-- Post Create Box End-->
            <?php
	             $con=mysqli_connect("localhost","root","","social_network");

	             if(!mysqli_connect_errno($con))
	             {
	              if(isset($_POST['Publish']))
	              {
	                $feed=$_POST['texts'];
	                $e=$_SESSION['Email'];

	                $sql="INSERT INTO post VALUES('$feed','$e')";                  
	                $c=mysqli_query($con,$sql);
	              }
	             }
	             ?>
            <!-- Post Content
            ================================================= -->
             <?php
              $e=$_SESSION['Email'];
              $po=$_SESSION['co'];
              $con=mysqli_connect("localhost","root","","social_network");
              $sql="SELECT * FROM post where user in (select friendid from ".substr($e,0,strpos($e,"@"))."_friends) OR user='".$e."';";              
              $result=mysqli_query($con,$sql);
              $r=mysqli_num_rows($result);              

              $f=1;
             
              while($row=mysqli_fetch_array($result))
              {


              echo"<div class='post-content'>
                    <img src='images/post-images/".$f.".jpg' alt='post-image' class='img-responsive post-image'/>
                    <div class='post-container'>
                      <img src='images/users/user-".$f.".jpg' alt='user' class='profile-photo-md pull-left'/>
                      <div class='post-detail'>
                        <div class='user-info'>
                          <h5><a href='timeline.php' class='profile-link'>".$row['user']."</a> <span class='following'>following</span></h5>
                          
                        </div>
                       
                  <div class='line-divider'></div>
                  <div class='post-text'>
                    <p>".$row['post']."</p>
                  </div>
                  <div class='line-divider'></div>
                </div>
                  
              </div>
            </div>";
            $f=$f+1;
            if($f==21)
            	$f=1;
        	  }
            ?>
                

               <div class="post-content">
              <img src="images/post-images/11.jpg" alt="" class="img-responsive post-image" />
              <div class="post-container">
                <img src="images/users/user-9.jpg" alt="user" class="profile-photo-md pull-left" />
                <div class="post-detail">
                  <div class="user-info">
                    <h5><a href="timeline.html" class="profile-link">Anna Young</a> <span class="following">following</span></h5>
                    <p class="text-muted">Published a photo about 4 hour ago</p>
                  </div>
                  <div class="line-divider"></div>
                  <div class="post-text">
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
                  </div>
                  <div class="line-divider"></div>
                 
                </div>
              </div>
            </div>
          </div>

          <!-- Newsfeed Common Side Bar Right
          ================================================= -->
    			<div class="col-md-2 static">
            <div class="suggestions" id="sticky-sidebar">
              <h4 class="grey">Who to Follow</h4>    
            <?php   
				        $e=$_SESSION['Email'];
				        $po=$_SESSION['co'];
				        $con=mysqli_connect("localhost","root","","social_network");
				        $sql="select * from ".substr($e,0,strpos($e,"@"))."_friends;";
				        $result=mysqli_query($con,$sql);
				        $count=0;
				        while($row=mysqli_fetch_array($result))
				        {
				            $fn=$row['friendid'];
				            
				            $query="select * from ".substr($fn,0,strpos($fn,"@"))."_friends where friendid not in (select friendid from ".substr($e,0,strpos($e,"@"))."_friends);";
                    
				            $res=mysqli_query($con,$query);
				            while($rw=mysqli_fetch_array($res))
				            {     
                    if($count>10)
                            break;       
                      if($rw['friendid']!=$e)

                      {
                        $frid=$rw['friendid'];
                        echo"<div class='follow-user'>
                              <img src='images/users/user-".mt_rand(1,20).".jpg' alt='' class='profile-photo-sm pull-left' />
                              <div>
                                <h5>".$rw['first_name']." ".$rw['last_name']."</h5>
                                <form action='newsfeed.php' method='GET'>
                                  <li><i class='text-green'></i><div><a href='newsfeed.php?frid=<?php echo $e?>'>Add Friend</a></div></li>
                                </form>                        
                              </div>
                            </div>";
                          
                        $_SESSION['fid']=$frid;

                        echo $_SESSION['error'];
                        }
				            }
				            if($count>10)
				                break;
				        }
				    ?>
            </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTMXfmDn0VlqWIyoOxK8997L-amWbUPiQ&amp;callback=initMap"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky-kit.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/script.js"></script>
  </body>

<!-- Mirrored from thunder-team.com/friend-finder/newsfeed.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Nov 2018 18:06:53 GMT -->
</html>
