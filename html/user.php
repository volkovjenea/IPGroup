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
  elseif (alreadyExists($email) >= 1) {
    echo 'User with this email already exists. Please fill another email or <a href="/login.php">login.</a>';
  }
  else{
    echo "New user ".$email." has been created!";
    createUser($email,$pass);
    header("Location: login.php");
  }
}
require 'user.tpl.php';
