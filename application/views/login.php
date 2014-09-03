    <!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">
    <title>Basecamp</title>
	  <link href="<?php echo base_url('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css/background.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css/signin.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('js/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js/ie10-viewport-bug-workaround.js')?>"></script>
  </head>   
  <body>
   <div class="container">
      <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
         <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav menu-nav move-up-nav">
            <!-- <li><a href="#login" data-toggle="modal">SignIn</a></li> -->
            <li ><a href="#signup" data-toggle="modal">SignUp</a></li>
          </ul>
        </div>
      </div>
    </div>
	<div class="login-box">
      <form class="form-signin" role="form" method="post" action="<?php echo base_url('index.php/membership/login')?>">
        <h2 class="form-signin-heading">Sign in to Basecamp</h2>
        <?php if(isset($error)){
         echo '<div class="alert alert-danger" role="alert">';
         echo '<strong>Oh snap!</strong> It was a login error! Try the correct one.';
         echo '</div>';
         } ?>
        </br>
        <input class="form-control input-text" name="username" placeholder="Username" required="" autofocus="" type="text">
        <input class="form-control input-text" name="password" placeholder="Password" required="" type="password">
        <div class="checkbox">
          <label>
            <input value="remember-me" type="checkbox"> Remember me
          </label>
		      <a href="#create" data-toggle="modal">Create Account </a>
        </div>
        <button class="btn btn-lg btn-primary btn-block submit" type="submit">Sign in</button>
      </form>
	 </div>
  </div>


    <div class="modal fade" id="signup" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
          <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/membership/save_member') ?>">
            <div class="modal-header">
              <h4>Sign Up</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="content-uname" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" id="sign-uname" placeholder="Username..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="content-password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="sign-password" placeholder="Password..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="content-fname" class="col-sm-2 control-label">Firstname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fname" id="sign-fname" placeholder="First Name..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="content-mname" class="col-sm-2 control-label">Middle</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mname" id="sign-mname" placeholder="Middle Name..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="content-lname" class="col-sm-2 control-label">Lastname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lname" id="sign-fname" placeholder="Last Name..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="content-email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="Email" class="form-control" name="emailadd" id="sign-fname" placeholder="example@domain.com" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
            </form>
          </div>
        </div>
      </div>

    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/jquery.min.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
</body>
</html>