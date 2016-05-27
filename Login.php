<?php
$dsn = 'mysql:dbname=Login;host=173.194.227.39;';
$db_username = "yeri";
$db_password="yeri";

try {
    $connect = new PDO($dsn, $db_username, $db_password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

session_start();

$action = $_GET['action']; 

// Sign up
if ($action == 'signup') {  
  $username = $_POST['username'];
  $password = $_POST['password'];
  $pwd = md5($password);
  // write into MySQL table
  $sql = "SELECT * FROM users WHERE username=?";
  $query = $connect->prepare($sql);
  $query->bindParam(1, $username);
  $query->execute();

  if ($query->rowCount() == 0) {
    $signup_sql = "INSERT INTO users VALUES (?, ?, 0)";
    $signup_query = $connect->prepare($signup_sql);
    $signup_query->bindParam(1, $username);
    $signup_query->bindParam(2, $pwd);
    $signup_query->execute();

    $_SESSION['auth'] = true;
    $_SESSION['username'] = $username;

    $arr = array ('status'=>1,'username'=>$username);
    echo json_encode($arr);
  } else {
    echo json_encode(0);
  }
} 

// Login
if ($action == 'login') { 
  $username = $_POST['username'];
  $password = $_POST['password']; 
  $pwd = md5($password);
  // compare with the data from MySQL table
  $stmt = "SELECT * FROM users WHERE username=? AND password=?";
  $query = $connect->prepare($stmt);
  $query->bindParam(1, $username);
  $query->bindParam(2, $pwd);
  $query->execute();

  if ($query->rowCount() == 1) {
    // judge if the account is an administrator account
    $admin_sql = "SELECT * FROM users WHERE username=? AND password=? and admin=1";
    $admin_query = $connect->prepare($admin_sql);
    $admin_query->bindParam(1, $username);
    $admin_query->bindParam(2, $pwd); 
    $admin_query->execute();
    if ($admin_query->rowCount() == 1) {
      $admin = 1;
    } else {
      $admin = 0;
    }

    $_SESSION['auth'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['admin'] = $admin;

    $arr = array ('status'=> 1, 'username'=> $username, 'admin'=> $admin);
    echo json_encode($arr);
  } else {
    echo json_encode(0);
  }
}

// Log out
if ($action == 'logout') {
  unset($_SESSION);  
  session_destroy();  
  echo json_encode(1);  
}

// Change password
if ($action == 'changePassword') {
  $currUser = $_POST['currUser'];
  $currPassword = $_POST['currPassword'];
  $newPassword = $_POST['newPassword'];

  $currPwd = md5($currPassword);
  $newPwd = md5($newPassword);

  $changeSQL = "UPDATE users SET password = ? WHERE username = ? and password = ?";
  $changeQuery = $connect->prepare($changeSQL);
  $changeQuery->bindParam(1, $newPwd);
  $changeQuery->bindParam(2, $currUser);
  $changeQuery->bindParam(3, $currPwd);
  $changeQuery->execute();

  echo json_encode(1);
}