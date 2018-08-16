<?php 
  require_once '/var/www/templates/header.tpl.php';
  require_once 'database.php';
  session_start();
  $email = !empty($_POST['email']) ? $_POST['email'] : false;
  $pass = !empty($_POST['password']) ? $_POST['password'] : false;
  if (!empty($_SESSION['$email'])){
    echo "You are loged out!<br />";
    echo '<a href="login.php">Login</a>';
  }
  else{
    echo 'Please <a href="/login.php">Login</a>';
  }
  session_unset();
  session_destroy();
?>