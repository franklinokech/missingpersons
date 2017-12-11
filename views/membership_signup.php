<?php 
require_once('masterview.php');
require_once('../config/dbconfig.php');
require_once('../config/security.php');
?>
<title>Create account</title>

<!-- Start of the sign up form -->
<div class="loginform">
<div class="container">
<div class = "panel panel-default">
<div class = "panel-heading">
     <h3 class = "panel-title">
         Create Account
      </h3>
   </div>
   <div class = "panel-body">
<form method="post" action="../app/process-signup.php">
  <div class="form-group">
    <label for="txtFirstName">First Name</label>
    <input type="text" class="form-control" id="txtFirstName" placeholder="First Name" name="txtFirstName" required maxlength="32">
  </div>
  <div class="form-group">
    <label for="txtLastName">Last Name</label>
    <input type="text" class="form-control" id="txtLastName" placeholder="Last Name" name="txtLastName" required maxlength="32">
</div>
  <div class="form-group">
    <label for="txtEmail">Email</label>
    <input type="email" class="form-control" id="txtEmail" placeholder="Email Address" name="txtEmail" required maxlength="32">
</div>

<div class="form-group">
    <label for="pwdPass">Password</label>
    <input type="password" class="form-control" id="pwdPass" placeholder="Create Password" name="pwdPass" required maxlength="32">
</div>

<div class="form-group">
    <label for="confirmPass">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPass" placeholder="Confirm Password" name="confirmPass" required maxlength="32">
</div>


  
  
  <button type="submit" id="btnCreateAcc" name="btnCreateAcc" class="btn btn-default">Create Account</button>
  
 <button type="button" class="btn btn-link">Already Have Account?</button>
</form>
</div>
</div>
</div>
</div>
<!-- End of the login form -->
<?php require_once('footer.php')?>
