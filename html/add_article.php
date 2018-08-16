<?php
require_once 'database.php';
require_once '/var/www/templates/header.tpl.php';
session_start();

$title = !empty($_REQUEST['title']) ? $_REQUEST['title'] : '';
$body = !empty($_REQUEST['body']) ? $_REQUEST['body'] : '';
$cat = !empty($_REQUEST['category']) ? $_REQUEST['category'] : '';

if(!empty($_SESSION['email'])) {
  require 'add_article.tpl.php';
  if(isset($_POST['add_article'])){
    createArticle($title,$body,$cat);
    header("Location: index.php");
  }
}
else{
  echo '<a href="/login.php">Please login</a>';
  return;
}



