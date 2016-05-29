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
    <link href="css/uikit.min.css" rel="stylesheet">
    <link href="css/About_Yeri.css" rel="stylesheet">
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
          <li class="active"><a href="About_Yeri.php">About Yeri</a></li>
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

  <!-- Main Contents -->
  <div class="container about_Yeri">
    <div class="row">
      <div class="col-md-12 about">
        <h2>About Yeri</h2>
        <hr>
        <p>Kim Yerim (Yeri), who was born in March 5, 1999 in Seoul, Korea, is a Korean singer and a member of the group "Red Velvet".</p>
        <p>Red Velvet (Hangul: 레드벨벳) is a South Korean girl group formed by S.M. Entertainment. The group debuted on August 1, 2014, with the digital single "Happiness." The group is composed of five members: Irene, Seulgi, Wendy, Joy, and Yeri.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 about">
        <h2>Awards in 2015</h2>
        <hr>
        <ul>
          <li>2015-09-24 : 첫 정규앨범 'The Red' - 'Dumb Dumb' Mnet ‘엠카운트다운’ 1위</li>
          <li>2015-09-20 : 첫 정규앨범 'The Red' - 'Dumb Dumb' SBS ‘인기가요’ 1위</li>
          <li>2015-09-17 : 첫 정규앨범 'The Red' - 'Dumb Dumb' Mnet ‘엠카운트다운’ 1위</li>
          <li>2015-09-16 : 첫 정규앨범 'The Red' - 'Dumb Dumb' MBC MUSIC '쇼! 챔피언’ 1위</li>
          <li>2015-09-15 : 첫 정규앨범 'The Red' - 'Dumb Dumb' SBS MTV '더쇼' 1위</li>
          <li>2015-09 : 첫 정규앨범 'The Red' - 'Dumb Dumb' 미국 빌보드 월드 앨범 차트 1위</li>
          <li>2015-09 : 첫 정규앨범 'The Red' - 'Dumb Dumb' 히트시커스 앨범 차트 24위</li>
          <li>2015-04-04 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ MBC ‘쇼! 음악중심’ 1위</li>
          <li>2015-04-02 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ Mnet ‘엠카운트다운’ 1위</li>
          <li>2015-04-01 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ MBC MUSIC '쇼! 챔피언’ 1위</li>
          <li>2015-03-31 : The 1st Mini Album 'Ice Cream Cake' - SBS MTV '더쇼' 1위</li>
          <li>2015-03-29 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ SBS ‘인기가요’ 1위</li>
          <li>2015-03-27 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ KBS ‘뮤직뱅크’ 1위(데뷔 후 첫 1위)</li>
          <li>2015-03 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ 미국 빌보드 월드 앨범 차트 2위</li>
          <li>2015-03 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ 히트시커스 앨범 차트 24위</li>
          <li>2015-03 : The 1st Mini Album 'Ice Cream Cake' - ‘Ice Cream Cake’ 미국 및 전 세계에서 가장 많이 본 K팝 뮤직비디오(Most Viewed K-Pop Videos in America and Around the World: March 2015) 선정</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 about">
        <h2>Albums</h2>
        <hr>
      </div>
    </div>
  </div>

  <div id="album_stream">
    <div class="albums">
      <ul>
        <li><a target="_blank" href="images/icc_l.jpg"><img id="1" src="images/icc.jpg" width="101" height="101" alt="Ice Cream Cake" data-lightbox="Albums"></a></li>
        <li>2015-03-17</li>
        <li>Red Velvet</li>
        <li>The 1st Mini Album 'Ice Cream Cake'</li>
      </ul>
    </div>
    <div class="albums">
      <ul>
        <li><a target="_blank" href="images/tr_l.jpg"><img id="2" src="images/tr.jpg" width="101" height="101" alt="The Red" data-lightbox="Albums"></a></li>
        <li>2015-09-09</li>
        <li>Red Velvet</li>
        <li>The 1st Album 'The Red'</li>
      </ul>    
    </div>
    <div class="albums">
      <ul>
        <li><a target="_blank" href="images/wt_l.jpg"><img id="3" src="images/wt.jpg" width="101" height="101" alt="Wish Tree" data-lightbox="Albums"></a></li>
        <li>2015-12-18</li>
        <li>Red Velvet</li>
        <li>Wish Tree - WINTER GARDEN</li>
      </ul>   
    </div>
    <div class="albums">
      <ul>
        <li><a target="_blank" href="images/tv_l.jpg"><img id="4" src="images/tv.jpg" width="101" height="101" alt="The Velvet" data-lightbox="Albums"></a></li>
        <li>2016-03-17</li>
        <li>Red Velvet</li>
        <li>The 2st Mini Album 'The Velvet'</li>
      </ul>   

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
             <input type="password" id="currentPassword" class="form-control" placeholder="Your Current Password" required="" autofocus="">
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
