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
  <?php foreach($project_ID as $ID){ }?>  
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
            <li class="active"><a href="<?php echo base_url('index.php/camp/profile') ?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo base_url('index.php/camp/profile'.$ID->project_id.')/'.$user->user_ID.'/') ?>">Projects</a></li>
                <li><a href="#">List of Members in Projects</a></li>
                <li><a href="<?php echo base_url('index.php/settings/account_settings/'.$user->user_ID)?>">Accounts</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Sign out</li>
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
          <ul class="nav nav-sidebar">
            <li><a href="<?php echo base_url('index.php/project/view_project_files/'.$ID->project_id) ?>">Projects</br> » <?php echo $ID->project_name; ?></a></li> 
            <li class="active"><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/upload_icon.png') ?>" atl="upload icon" width="30" height="30"> Upload File</a></li>
            <li><a href="<?php echo base_url('index.php/discussion/create_discussion/'.$ID->project_id);?>"><img src="<?php echo base_url('images/discussion_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Discussions</a></li>
            <li><a href="<?php echo base_url('index.php/todo/create_todo_list/'.$ID->project_id);?>"><img src="<?php echo base_url('images/todo_list.png') ?>" atl="upload icon" width="30" height="30"> Add To-do-list</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/text_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Text Document</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/event_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Event</a></li>
            <li><a href="<?php echo base_url('index.php/membership/add_team/'.$ID->project_id);?>"><img src="<?php echo base_url('images/add_member.png') ?>" atl="upload icon" width="30" height="30"> Add Members to this Project</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <a href=""><h1 class="page-header project-bar"><img src="<?php echo base_url('images/add_icon.jpg')?>" alt="add icon" width="50" height="50">Upload File</h1></a>
          <div class="row">
          <div class="col-sm-4">
            <div class="panel panel-primary add-member">
              <div class="panel-heading">
                <h3 class="panel-title">Add Files to your Project</h3>
              </div>
              <?php 
              if(isset($error))
              {
                 echo '<div class="alert alert-danger" role="alert">';
                 echo '<strong>Oh snap!</strong> You uploaded a wrong file! Try the correct one.';
                 echo '</div>';
               }else if(isset($success))
               {
                 echo '<div class="alert alert-info" role="alert">';
                 echo '<strong>Oh yeah!</strong> You uploaded a file! Upload another.';
                 echo '</div>';
               }
               ?>
              <div class="panel-body">
                <div class="new_team">
                <h3><a href="">Upload files to your project</a></h3>
                <p>
                  <h4>This section will upload files to your corresponding project.</h4>
                  Start uploading file to your project. Any member of your team will visible to this projects.
                </p>
                <p>
            <?php echo form_open_multipart('file/do_upload');?>
            <img class="img_design" width="150px" src="<?php echo base_url('images/file_icon.png')?>">
            <p>
              <input id="input-1" type="file" name="userfile" class="file" required>
              <input type="hidden" name="project_id" value="<?php echo $ID->project_id; ?>">
              <input type="hidden" name="user_id" value="<?php echo $user->user_ID; ?>">
            </p>
            </p>
        <p> 
          <button class="btn btn-info" name="newproject" value="newproject" type="submit">Upload</button> or <a href="#" >cancel</a>  
        </p>
        </form>
        </div>
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