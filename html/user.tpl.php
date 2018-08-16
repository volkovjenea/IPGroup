<!DOCTYPE HTML>
<html>
  <head>
    <title>IPGroup</title>
  </head>
  <body>
    <form class="form-horizontal" action="user.php" method="POST" >
      <legend>Registration Page</legend>
      <fieldset>
        <div class="form-group">
          <label class="col-md-4 control-label" for="email">Email</label>  
          <div class="col-md-4">
            <input id="email" name="email" type="text" placeholder="mail@example.com" class="form-control input-md">
          </div>
        </div>
<!--PASSWORD FIELD -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="password">Password</label>
          <div class="col-md-4">
            <input id="password" name="password" type="password" placeholder="" class="form-control input-md">
          </div>
        </div>
<!-- Button (Double) -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="save"></label>
          <div class="col-md-8">
            <button id="save" name="submit" class="btn btn-success">Register</button>
            <button id="clear" name="clear" class="btn btn-danger">Reset</button>
          </div>
        </div>
      </fieldset>
    </form>
  </body>
</html>