<?php
require_once 'database.php';
require_once '/var/www/templates/header.tpl.php';
session_start();
var_dump($_GET['delid']);
$title = !empty($_REQUEST['title']) ? $_REQUEST['title'] : '';
$body = !empty($_REQUEST['body']) ? $_REQUEST['body'] : '';
$cat = !empty($_REQUEST['category']) ? $_REQUEST['category'] : '';

if(!empty($_SESSION['email'])) {
  require 'update_article.tpl.php';
  if(isset($_POST['add_article'])){
    updateArticle($title,$body,$cat,$id);
    header("Location: index.php");
  }
}
else{
  echo '<a href="/login.php">Please login</a>';
  return;
}



