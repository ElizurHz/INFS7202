<?php 
  session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A fan site for Kim Yerim">
    <meta name="author" content="Haoze Xu">

    <link rel="icon" href="images/favicon.png">

    <title>ALL FOR YERI</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-2.2.3.min.js" ></script>
    <script type="text/javascript" src="js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="uikit.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/Content.css" rel="stylesheet">
    <script type="text/javascript" src="js/main.js" ></script>
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/comment.css" rel="stylesheet">
    <link href="css/uikit.min.css" rel="stylesheet">
</head>

<body>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="About_Yeri.php">About Yeri</a></li>
          <li><a href="About_Us.php">About Us</a></li>
          <li class="active"><a href="Feedback.php">Feedback</a></li>
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


  <div class="container main_content">
    <div id="feedback_title">
      <h2>Feedback</h2>
      <div class="comment_handling" id="new_feedback">
        <a class="uk-button uk-button-large" href="#"><i class="uk-icon-plus"></i>   New</a>
      </div>
    </div>
    <ul class="uk-comment-list">
      <li>
        <article class="uk-comment comment">
          <hr>
          <header class="uk-comment-header">
              <img class="uk-comment-avatar" src="images/avatar4.jpg" alt="avatar4">
              <h4 class="uk-comment-title">Feedback 1</h4>
              <div class="uk-comment-meta">
                <a target="_blank" href="#">Wendy</a>
                Created at 1/4/2016 13:07, Last updated at 1/4/2016 13:07
              </div>
              <div class="comment_handling">
                <a target="_blank" class="uk-button" href="#"><i class="uk-icon-ban"></i>   Delete</a>
              </div>
          </header>
          <div class="uk-comment-body"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p></div>
          <ul>
            <li>
              <article class="uk-comment reply">
                <hr>
                <header class="uk-comment-header">
                  <img class="uk-comment-avatar" src="images/avatar1.jpg" alt="avatar1">
                  <h4 class="uk-comment-title"><a target="_blank" href="#">Yerim Kim</a></h4>
                  <div class="uk-comment-meta">
                    Created at 1/4/2016 13:12, Last updated at 1/4/2016 13:12
                  </div>
                  <div class="comment_handling">
                    <a target="_blank" class="uk-button" href="#"><i class="uk-icon-edit"></i>   Edit</a>
                    <a target="_blank" class="uk-button" href="#"><i class="uk-icon-ban"></i>   Delete</a>
                  </div>
                </header>
                <div class="uk-comment-body"><p>Thank you for your advice. We think it is resonable and we will consider it.</p></div>
              </article>
            </li>
          </ul>
        </article>
      </li>
      <li>
        <article class="uk-comment comment">
          <hr>
          <header class="uk-comment-header">
              <img class="uk-comment-avatar" src="images/avatar5.jpg" alt="avatar5">
              <h4 class="uk-comment-title">Feedback 2</h4>
              <div class="uk-comment-meta">
                <a target="_blank" href="#">Irene</a>
                Created at 1/4/2016 13:09, Last updated at 1/4/2016 13:10
              </div>
              <div class="comment_handling">
                <a target="_blank" class="uk-button" href="#"><i class="uk-icon-ban"></i>   Delete</a>
              </div>
          </header>
          <div class="uk-comment-body"><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p></div>
        </article>
      </li>
    </ul>
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

  <hr>

  <!-- Footer -->
  <footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>© 43400465, Haoze Xu</p>
    <div class="blank"></div>
  </footer>

  <script type="text/javascript" src="js/lightbox.js"></script>

</body>