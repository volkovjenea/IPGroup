<?php

function connect() {
  $servername = "localhost";
  $username = "admin";
  $password = "admin";
  $database = 'IPGroup';

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;

  } catch(PDOException $e){
      echo $e->getMessage();
  }
}

function createDB() {
  $conn = connect();
  // use exec() because no results are returned
  $conn->exec("CREATE DATABASE IF NOT EXISTS IPGroup");

}


function createTable(){
  $conn = connect();

  $user = "CREATE TABLE IF NOT EXISTS user(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    login varchar(20) not null,
    password varchar(20) not null
  )";

 $article = "CREATE TABLE IF NOT EXISTS article(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title varchar(20) not null,
    body varchar(200),
    category varchar(20)
  )";

  $tables = [$user,$article];

  foreach($tables as $k => $sql){
    $query= @$conn->query($sql);
  }
}

function createUser($login, $password){
  $q = 0;
  $conn = connect();
  $q = $conn->exec("INSERT INTO user (login,password) VALUES ('$login','$password')");
}

function deleteUser($id){
  $sql=0;
  $q=0;
  $conn = connect();
  $q = $conn->exec("DELETE FROM user WHERE id = '$id'");
}
function updateUser($login,$password,$id){
  $conn = connect();
  $q = $conn->prepare("UPDATE user set login = '$login', password = '$password' WHERE id = '$id'");
  $conn->exec("UPDATE user set login = '$login', password = '$password' WHERE id = '$id'");
}
function createArticle($title, $body, $category){
  $q = 0;
  $conn = connect();
  $q = $conn->exec("INSERT INTO article (title, body, category) VALUES ('$title', '$body', '$category')");
}
function deleteArticle($id){
  $sql=0;
  $q=0;
  $conn = connect();
  $q = $conn->exec("DELETE FROM article WHERE id = '$id'");
}
function updateArticle($title,$body,$category,$id){
  $conn = connect();
  $conn->exec("UPDATE article set title = '$title', body = '$body', category = '$category' WHERE id = '$id'");
}
function alreadyExists($login){
  $conn = connect();
  $stmt = $conn->prepare("SELECT * FROM user WHERE login = :login");
  $stmt->execute(['login' => $login]); 
  $result = $stmt->fetchAll();
  $c = count($result);
  return $c;
}

function findUser($login,$password) {
  $conn = connect();
  $stmt = $conn->prepare("SELECT * FROM user WHERE login = :login AND password = :password");
  $stmt->execute(['login' => $login, 'password' => $password]);
  $result = $stmt->fetchAll();
  return $result;
}


function getArticles() {
  $conn = connect();
  $stmt = $conn->prepare("SELECT * FROM article");
  $stmt->execute();
  $result = $stmt->fetchAll();
  
  return $result;
}
// createDB();
// createTable();
// createUser('test@example.com', '3333');
// deleteUser(4);
// updateUser('UpdateSucc','4444',9);
// createArticle('Test','Test','Test');
// updateArticle('Test1','Test1','Test1','1');
// deleteArticle(15);
// alreadyExists('test@example.com');
