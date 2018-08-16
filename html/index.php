<?php
  session_start(); 
  require_once '/var/www/templates/header.tpl.php';
  include_once 'database.php';
   $title = '';
  $body = '';
  $category = '';

if (isset($_REQUEST['delid'])) {
   $delid=$_REQUEST['delid'];
   deleteArticle($delid);
}
if (isset($_GET['edtid'])) {
  $id = $_GET['editid'];
  header('Location: update_article.php');

}
?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>Article Page</title>
    <meta charset="utf-8">
  </head>
    <body>
      <table class="table" align="center">
        <tr align="center" >
          <td scope="col" ><h4><b>Title:</b></h4></td>
          <td scope="col" ><h4><b>Body:</b></h4></td>
          <td scope="col" ><h4><b>Category:</b></h4></td>
          <?php 
            if (!empty($_SESSION['email'])) {
              echo "<td scope='col' ><h4><b>Delete it:</b></h4></td>";
            }
          ?>
        </tr>
           <?php
            $articles = getArticles();
            if (!empty($articles)) {
              foreach ($articles as $id => $article) { ?>
                <tr>
                  <form action=" " method="POST" role="form"> 
                  <td align="center"><?php echo $article['title']; ?></td>
                  <td align="center"><?php echo $article['body']; ?></td>
                  <td align="center"><?php echo $article['category']; ?></td>
                  <?php if (!empty($_SESSION['email'])) { ?>
                    <td align="center">
                      <button id="edit" name="edit_article" class="btn btn-warning">
                        <a href="index.php?edid=<?php echo $article['id']?>">Edit</a>
                      </button>
                      <button id="delete" name="delete_article" class="btn btn-danger">
                        <a href="index.php?delid=<?php echo $article['id'] ?>">Delete</a>
                      </button>
                    </td>
                    <td align="center">
                      
                    </td>
                  <?php } 
                  ?>
                  </form>   
                </tr>
            <?php }
            ?>     
          <?php } 
          ?>
      </table>
      <?php 
      if (!empty($_SESSION['email'])) {
      echo "<form action='logout.php'>";
      echo " <input type='submit' name='submit' value='Logout' class='btn'>";
      echo "</form>";
      echo "<br>";
      echo "<form action='add_article.php'>";
      echo "<button id='add' name='add_article' class='btn btn-success'>Add Article</button>";
      echo "</form>";

      }
      else{
        echo "<form action='login.php'>";
      echo " <input type='submit' name='submit' value='Login' class='btn btn-success'>";
      echo "</form>";
      } ?>
    </body>
</html>
