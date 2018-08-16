<?php
require_once 'database.php';
require_once '/var/www/templates/header.tpl.php';
session_start();

$email = !empty($_POST['email']) ? $_POST['email'] : false;
$pass = !empty($_POST['password']) ? $_POST['password'] : false;


if(isset($_POST['submit'])){
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please insert valid email address!";
  }
  elseif (strlen($_POST['password'])<4 || strlen($_POST['password'])>20) {
    echo "Your password must contain more than 4 symbols and less than 20";
  }
  elseif (!findUser($email, $pass)) {
    echo "Wrong email or password.";
  }
  else{
    $_SESSION ['email'] = $email;
    echo "Welcome ".$email."!";
    
  }
}
if (findUser($email, $pass)) {
  echo '<a href="/add_article.php"><button id="add" name="add_article" class="btn">Add Article</button></a>';
}
else {
  require 'login.tpl.php';
}
