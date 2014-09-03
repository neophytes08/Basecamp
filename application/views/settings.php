<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile</title>
	<link href="<?php echo base_url('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/dashboard.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
	<style type="text/css" id="holderjs-style"></style>
  </head>
  <?php foreach ($userID->result() as $user) {} ?>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand color-white" href="<?php echo base_url('index.php/camp/profile') ?>"> Welcome <?php echo ucwords($user->fname).' '.ucwords($user->lname) ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav menu-nav">
            <li><a href="<?php echo base_url('index.php/camp/profile/'.$user->user_ID)?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo base_url('index.php/camp/profile') ?>">Projects</a></li>
                <li><a href="#">List of Members in Projects</a></li>
                <li><a href="<?php echo base_url('index.php/settings/account_settings/'.$user->user_ID)?>">Accounts</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Exit Basecamp</li>
                <li><a href="<?php echo base_url('index.php/membership/logout')?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="list-group group-prof">
            <li class="list-group-item text-muted"><img src="<?php echo base_url('profile_pic/'.$user->profile_pic)?>" alt="profile icon" width="170" height="130" ></li>
            <li class="list-group-item text-left"><span class="pull-left"><strong>Username</strong></span> </br> <?php echo $user->username ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-left"><span class="pull-left"><strong>Real name</strong></span> </br> Allan Cheam Vallente Alzula</li>
          </ul> 
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo base_url('index.php/camp/profile') ?>">Pojects</a></li>
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Everything</a></li>
            <li><a href="#">Progress</a></li>
          </ul>
        </div>
        <div class="col-sm-9 tab-section">
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Members per Project</a></li>
            <!-- <li><a href="#messages" data-toggle="tab">Messages</a></li> -->
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <tr>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                    <ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div><!--/table-resp-->
              <hr>
              <!-- <h4>Recent Activity</h4> -->
             <!--  <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 1:00 - Jeff Manzi liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 12:23 - Mark Friendo liked and shared your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Today, 12:20 - You posted a new blog entry title "Why social media is".</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> Yesterday - Karen P. liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> 2 Days Ago - Philip W. liked your post.</td>
                    </tr>
                    <tr>
                      <td><i class="pull-right fa fa-edit"></i> 2 Days Ago - Jeff Manzi liked your post.</td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
             </div><!--/tab-pane-->
             <!-- <div class="tab-pane" id="messages">
               <h2></h2>
               <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                  <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                </ul> 
             </div> --><!--/tab-pane-->
             <div class="tab-pane" id="settings">
                  <hr>
                  <form class="form" enctype="multipart/form-data" action="<?php echo base_url('index.php/membership/update_member') ?>" method="post" id="registrationForm">
                      <div class="form-group">
                          <?php foreach ($userID->result() as $data) { } ?>
                          <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Username</h4></label>
                              <input class="form-control" name="username" value="<?php echo $data->username ?>" id="last_name" placeholder="last name" title="enter your last name if any." type="text" required>
                          </div>
                          <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Password</h4></label>
                              <input class="form-control" name="password" value="<?php echo $data->password ?>" id="last_name" placeholder="last name" title="enter your last name if any." type="password">
                          </div>
                      </div>
                      </div>
                          <div class="col-xs-6">
                              <input type="hidden" name="user_ID" value="<?php echo $data->user_ID ?>">
                              <label for="first_name"><h4>First name</h4></label>
                              <input class="form-control" name="fname" value="<?php echo $data->fname ?>" id="first_name" placeholder="first name" title="enter your first name if any." type="text" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Email</h4></label>
                              <input class="form-control" name="emailadd" value="<?php echo $data->emailadd ?>" id="last_name" placeholder="last name" title="enter your last name if any." type="text" required>
                          </div>
                      </div>
                      <div class="form-group">  
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Middle name</h4></label>
                              <input class="form-control" name="mname" value="<?php echo $data->mname ?>" id="last_name" placeholder="last name" title="enter your last name if any." type="text" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Profile Picture</h4></label>
                              <input  type="file" name="userfile" class="btn btn-lg btn-info">
                          </div>
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input class="form-control" name="lname" value="<?php echo $data->lname ?>" id="last_name" placeholder="last name" title="enter your last name if any." type="text" required>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                          </div>
                      </div>
                </form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div>
      </div>
    </div>
	
    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
  

<div data-original-title="Copy to clipboard" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" height="100%" width="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1408073161694">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="Dashboard%20Template%20for%20Bootstrap_files/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" height="100%" width="100%">                </object></div></body></html>