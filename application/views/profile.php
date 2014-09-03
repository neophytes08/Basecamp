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
	<style type="text/css" id="holderjs-style"></style></head>
  <?php foreach ($userID->result() as $user) {} ?>
  
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
        <form class="navbar-form navbar-right" method="post" action="index.php?action=search">
            <input class="form-control edit-input" placeholder="Search..." type="text" name="search_data" required>
          </form> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand color-white" href="<?php echo base_url('index.php/camp/profile') ?>"> Welcome <?php echo ucwords($user->fname).' '.ucwords($user->lname) ?></a>
        </div>
        <?php foreach($project->result() as $project_ID){}?>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav menu-nav">
            <li class="active"><a href="<?php echo base_url('index.php/camp/profile')?>">Home</a></li>
            <li><a href="#about" data-toggle="modal">About</a></li>
            <li><a href="#contacts" data-toggle="modal">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('index.php/camp/profile/'.$user->user_ID)?>">Profile</a></li>
                <li><a href="<?php echo base_url('index.php/camp/profile/'.$user->user_ID)?>">Projects</a></li>
                <li><a href="#">List of Members in Projects</a></li>
                <li><a href="<?php echo base_url('index.php/settings/account_settings/')?>">Accounts</a></li>
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
            <li class="list-group-item text-left"><span class="pull-left"><strong>Joined</strong></span> </br> <?php echo date('l, F j Y h:i:s A', strtotime($user->datejoin)) ?></li>
            <li class="list-group-item text-left"><span class="pull-left"><strong>Real name</strong></span> </br> <?php echo ucwords($user->fname).' '.ucwords($user->mname).' '.ucwords($user->lname) ?></li>
          </ul> 
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo base_url('index.php/camp/profile') ?>">Projects</a></li>
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Everything</a></li>
            <li><a href="#">Progress</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <a href="#create" data-toggle="modal"><h1 class="page-header project-bar"><img src="<?php echo base_url('images/add_icon.jpg')?>" alt="add icon" width="50" height="50">Add Project</h1></a>
          <div class="row placeholders">
          <?php 
          foreach($project->result() as $value)
          {
              echo '<div class="col-sm-2">';
              echo '<div class="thumbnail">';
              echo '<a href="'.base_url('index.php/project/view_project_files/'.$value->project_id).'"><img src=';
              echo  base_url('images/project_icon.png');
              echo " ";
              echo  'class="img-responsive" alt="200x200"></a>';
              echo '<a href="'.base_url('index.php/project/view_project_files/'.$value->project_id).'"><h4>'.ucwords($value->project_name).' </h4></a>';
              
             if($user->user_ID == $value->user_ID && $project_ID->owner != 'owner')
             {
              echo '<p>Owner: '.ucwords($value->fname).' '.ucwords($value->mname).' '.ucwords($value->lname).'</p>';
             }
             else
             {
              echo '<p>Owner: '.ucwords($value->fname).' '.ucwords($value->mname).' '.ucwords($value->lname).'</p>';
               echo '<a href="#options" data-toggle="modal" class="label label-danger">Delete</a>';
              
             }
              echo "</div>";
              echo "</div>";
          }
           ?>
          </div>
		  <h2 class="sub-header">Basecamp Section</h2>
        </div>
      </div>
    </div>
	   <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Create Project</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('index.php/project/save_project')?>" method="POST">
                <img class="img_design" width="150px" src="<?php echo base_url('images/project_icon.png')?>">
                <p>
                  <input type="text" class="form-control np" name="project_name" placeholder="Name of the project" required/>
                <br> <hr>
                <input type="text" class="form-control np in_one"  name="description" placeholder="add description" required/>
                <hr>
                <?php foreach ($userID->result() as $user) { } ?>
                <input type="hidden" name="user_ID" value="<?php echo $user->user_ID ?>">
                <!-- <input type="hidden" name="project_id" value="<?php //echo $project_ID->project_id ?>"> -->
                </p>
                </p>
                  <p> 
                  <button class="btn btn-info" name="newproject" value="newproject" type="submit">Start Project</button> or <a href="#" >cancel</a>  
                </p>
              </div>
              <div class="modal-footer">
                <input type="submit" value="Submit" class="btn btn-primary" >
                 </form>
              </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="options" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Are you sure you want to delete this Project?</h4>
              </div>
              <div class="modal-body">
               <a href="<?php echo base_url('index.php/project/delete_project/'.$value->project_id) ?>" class="btn btn-primary">Yes</a> <a href="" class="btn btn-primary" data-dismiss="modal">No</a>
              </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="about" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4><strong>About Basecamp</strong></h4>
              </div>
              <div class="modal-body">
                <p> Basecamp is a repository for all your projects. Basecamp gives you organize and to invite people to your projects.</br> Make a project now!</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-success" data-dismiss="modal">Exit</a>
              </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="contacts" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4><strong>About Basecamp</strong></h4>
              </div>
              <div class="modal-body">
                <div class="col-md-4">
                </div>                
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-success" data-dismiss="modal">Exit</a>
              </div>
          </div>
        </div>
      </div>
    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
  

<div data-original-title="Copy to clipboard" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" height="100%" width="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1408073161694">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="Dashboard%20Template%20for%20Bootstrap_files/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" height="100%" width="100%"></object>
</div>
</body>
</html>