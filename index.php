<?php 
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="A fan site for Kim Yerim">
    <meta name="author" content="Haoze Xu">


    <link rel="icon" href="images/favicon.png">

    <title>ALL FOR YERI</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <script type="text/javascript" src="js/main.js" ></script>
    <link href="css/uikit.min.css" rel="stylesheet">
</head>

<body>
  <!-- banner -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6 banner">
        <div id="site_logo">
          <img src="images/LOGO.png" alt="All For Yeri" height="100" width="400" >
        </div>
      </div>
      <div class="col-xs-6 banner">
        <div id="banner_decoration">
          <img src="images/decoration.png" alt="decoration">
        </div>
      </div>
    </div>
  </div>

  <!-- navigation bar -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse nav_bar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="About_Yeri.php">About Yeri</a></li>
          <li><a href="About_Us.php">About Us</a></li>
          <li><a href="Feedback.php">Feedback</a></li>
          <li class="dropdown">
            <a href="http://v3.bootcss.com/examples/navbar-fixed-top/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
            <ul class="dropdown-menu" id="account">
              <?php
                 if($_SESSION['auth']){
              ?> 
                <li><a class="dropdown_item" id="currentUser">Current User: <?php echo $_SESSION['username'] ?></a></li>
                <li id="logout"><a class="dropdown_item" data-toggle="modal" data-target="#LogoutModal">Log Out</a></li>
                <li id="changePassword"><a class="dropdown_item" data-toggle="modal" data-target="#changePasswordModal">Change Password</a></li>
                <?php 
                   if($_SESSION['admin']){
                ?>
                  <li id="newContent"><a class="dropdown_item" href="Upload.php">New Content</a></li>
                <?php } ?>
              <?php }
                if(!isset($_SESSION['auth'])){
              ?>
                <li id="signup"><a class="dropdown_item" data-toggle="modal" data-target="#SignUpModal">Sign Up</a></li>
                <li id="login"><a class="dropdown_item"  data-toggle="modal" data-target="#LoginModal">Login</a></li>
              <?php } ?> 
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Tiles -->
  <div class="container main_content">
    <div class="row">
      <!-- Left-side Tile -->
      <div class="tiles left">
          <article class="post tag-ad">
            <div class="post-featured-image">
                <a class="thumbnail loaded" href="Content.php">
                  <img class="main_img" src="images/fancam1.jpg" alt="Content_1">
                </a>
            </div>
            <h2 class="post-title">
              <a href="#">Fancam 1</a>
            </h2>
          </article>
      </div>
      <!-- Right-side Tile -->
      <div class="tiles right">
        <article class="post tag-ad">
          <div class="post-featured-image">
              <a class="thumbnail loaded" href="#">
                <img class="main_img" src="images/fancam3.jpg" alt="Content_2">
              </a>
          </div>
          <h2 class="post-title">
            <a href="#">Fancam 2</a>
          </h2>
        </article>
      </div>
      <div class="tiles left">
        <article class="post tag-ad">
          <div class="post-featured-image">
              <a class="thumbnail loaded" href="#">
                <img class="main_img" src="images/1LUCkwE.jpg" alt="Content_3">
              </a>
          </div>
          <h2 class="post-title">
            <a href="#">Fancam 3</a>
          </h2>
        </article>
      </div>
      <div class="tiles right">
        <article class="post tag-ad">
          <div class="post-featured-image">
              <a class="thumbnail loaded" href="#">
                <img class="main_img" src="images/fancam2.jpg" alt="Content_4">
              </a>
          </div>
          <h2 class="post-title">
            <a href="#">Fancam 4</a>
          </h2>
        </article>
      </div>
    </div>
  </div>

  <hr>

  <!-- Sign Up Modal -->
  <div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Sign Up
            </h4>
         </div>
         <div class="modal-body">
           <form class="form-signin">
             <div id="info_span"><span id="signup_info"></span></div>             
             <label for="inputUsername" class="sr-only">Username</label>
             <input type="username" id="inputSignUpUsername" class="form-control" placeholder="Username" required="" autofocus="">
             <label for="inputPassword" class="sr-only">Password</label>
             <input type="password" id="inputSignUpPassword" class="form-control" placeholder="Password" required="">
             <label for="inputPassword" class="sr-only">Confirm Your Password</label>
             <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Your Password" required="">
           </form>
         </div>
         <div class="modal-footer">
           <button class="btn btn-primary" id="signupButton" onclick="submitSignUpForm();">Sign Up</button>
           <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close();">Close</button>
         </div>
      </div>
    </div>
  </div>


  <!-- Login Modal -->
  <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Login
            </h4>
         </div>
         <div class="modal-body">
           <form class="form-signin">
             <div id="info_span"><span id="login_info"></span></div>             
             <label for="inputUsername" class="sr-only">Username</label>
             <input type="username" id="inputLoginUsername" class="form-control" placeholder="Username" required="" autofocus="">
             <label for="inputPassword" class="sr-only">Password</label>
             <input type="password" id="inputLoginPassword" class="form-control" placeholder="Password" required="">
           </form>
         </div>
         <div class="modal-footer">
           <button class="btn btn-primary" id="LoginButton" onclick="submitLoginForm();">Login</button>
           <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close();">Close</button>
         </div>
      </div>
    </div>
  </div>

  <!-- Change Password Modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close"
               data-dismiss="modal" aria-hidden="true">
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Change Your Password
            </h4>
         </div>
         <div class="modal-body">
           <form class="form-signin">
             <div id="info_span"><span id="changePassword_info"></span></div>             
             <label for="inputPassword" class="sr-only">Your Current Password</label>
             <input type="passowrd" id="currentPassword" class="form-control" placeholder="Your Current Password" required="" autofocus="">
             <label for="inputPassword" class="sr-only">New Password</label>
             <input type="password" id="newPassword" class="form-control" placeholder="New Password" required="">
             <label for="inputPassword" class="sr-only">Confirm Your New Password</label>
             <input type="password" id="confirmNewPassword" class="form-control" placeholder="Confirm Your New Password" required="">
           </form>
         </div>
         <div class="modal-footer">
           <button class="btn btn-primary" id="signupButton" onclick="changePassword();">Submit</button>
           <button type="button" class="btn btn-default" data-dismiss="modal" onclick="close();">Close</button>
         </div>
      </div>
    </div>
  </div>

  <!-- Log Out Modal -->
  <div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">
                 Log Out
              </h4>
            </div>
          <div class="modal-body" id='sureLogout'>
              Are you sure to log out?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="logOut();">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>© 43400465, Haoze Xu</p>
    <div class="blank"></div>
  </footer>

</body>
