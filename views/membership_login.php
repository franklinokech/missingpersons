<?php 
require_once('masterview.php');
require_once('../config/dbconfig.php');
require_once('../config/security.php');
?>
<title>Login</title>

<!-- Start of the login form -->
<div class="loginform">
<div class="container">
<div class = "panel panel-default">
<div class = "panel-heading">
     <h3 class = "panel-title">
         Login
      </h3>
   </div>
   <div class = "panel-body">
<form method="post" action="../app/process-login.php">
  <div class="form-group">
    <label for="txtEmail">Email address</label>
    <input type="email" class="form-control" id="txtEmail" placeholder="Email" name="txtEmail" required>
  </div>
  <div class="form-group">
    <label for="pwdPassword">Password</label>
    <input type="password" class="form-control" id="pwdPassword" placeholder="Password" name="pwdPassword" required>

  <div class="checkbox">
    <label>
      <input type="checkbox">Remember Me
    </label>
  </div>
  <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-default">Login</button>
  <button type="submit" id="btnSignup" name="btnSignup" class="btn btn-default">Sign Up</button><br>
  
 <button type="button" class="btn btn-link">Forgotten Account?</button>
</form>
</div>
</div>
</div>
</div>
<!-- End of the login form -->

<?php 
require_once('footer.php');
?>