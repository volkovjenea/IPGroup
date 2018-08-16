<!DOCTYPE HTML>
<html>
  <head>
    <title>Sort methods</title>
  </head>
  <body>
    <form class="form-horizontal" action="add_article.php" method="POST" >
      <legend>Update article</legend>
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="title">Title</label>  
          <div class="col-md-4">
            <input id="title" name="title" type="text" placeholder="Your title" class="form-control input-md" required>
          </div>
        </div>
<!--Body FIELD -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Body">Body</label>
          <div class="col-md-4">
            <textarea id="body" name="body" placeholder="Your text" class="form-control input-md"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="Body">Category</label>
          <div class="col-md-4">
            <select name="category">
              <option value="Economics">Economics</option>
              <option value="Fashion">Fashion</option>
              <option value="Cars">Cars</option>
            </select><br/>
          </div>
        </div>
<!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="add"></label>
          <div class="col-md-8">
            <button id="update" name="update_article" class="btn btn-success">Save Article</button>
            <button id="clear" name="clear" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </fieldset>
    </form>
  </body>
</html>