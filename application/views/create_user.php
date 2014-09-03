<!DOCTYPE html>
<html>
<head>
	<title> Create User</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>">
    <link href="<?php echo base_url('css_new/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/bootstrap-theme.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/theme.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
    <style type="text/css" id="holderjs-style"></style>
</head>
<body>
<div class="container"> 
	<div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo base_url('index.php/camp/') ?>">Sign In</a></div>
                </div>  
                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/membership/save_member') ?>">
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label" required>Username</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="username" placeholder="Username" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="email" class="col-md-3 control-label" required>Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="emailadd" placeholder="Email Address" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">First Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Middle Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="mname" placeholder="Middle Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Button -->                                        
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                            </div>
                        </div>	
                    </form>
                 </div>
            </div>     
        </div>
    </div>
</body>
</html>