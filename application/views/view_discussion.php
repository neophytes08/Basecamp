<!DOCTYPE html>
<html lang="en" class="no-js">
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
    <script src="<?php echo base_url('js/modernizr-latest.js')?>"></script>
    <script src="<?php echo base_url('js/jquery-1.8.0.min.js')?>"></script>
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
          <a class="navbar-brand color-white" href="<?php echo base_url('index.php/camp/profile') ?>" > Welcome <?php echo ucwords($user->fname).' '.ucwords($user->lname) ?></a>
        </div>
         <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav menu-nav">
            <li><a href="<?php echo base_url('index.php/camp/profile') ?>">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo base_url('index.php/camp/profile') ?>">Projects</a></li>
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
          <?php foreach ($project as $ID) {} ?>
            <li class="active"><a href="<?php echo base_url('index.php/project/view_project_files/'.$ID->project_id) ?>">Projects</br> » <?php echo $ID->project_name; ?></br> » Discussion </a></li> 
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/upload_icon.png') ?>" atl="upload icon" width="30" height="30"> Upload File</a></li>
            <li><a href="#create" data-toggle="modal"><img src="<?php echo base_url('images/discussion_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Discussions</a></li>
            <li><a href="<?php echo base_url('index.php/todo/create_todo_list/'.$ID->project_id);?>"><img src="<?php echo base_url('images/todo_list.png') ?>" atl="upload icon" width="30" height="30"> Add To-do-list</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/text_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Text Document</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/event_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Event</a></li>
            <li><a href="<?php echo base_url('index.php/membership/add_team/'.$ID->project_id);?>"><img src="<?php echo base_url('images/add_member.png') ?>" atl="upload icon" width="30" height="30"> Add Members to this Project</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header project-bar fixed-bar">Discussion for Project: <?php echo ucwords($ID->project_name) ?></h1>
        <?php foreach ($project_owner->result() as $own) {} ?>
        <?php foreach ($member_include->result() as $team_member)  {} ?>
        <?php  if(isset($edit_discuss))
        {
          foreach ($edit_discuss->result() as $discuss){}
          echo '<form method="post" action='.base_url('index.php/discussion/update_discuss/'.$discuss->project_id).'>';
          echo  '<div class="row">';
          echo  '<div class="jumbotron resize">';
          echo  '<h4><img src='.base_url('profile_pic/'.$discuss->profile_pic).' class="pic-round"> '.ucwords($discuss->fname).' '.ucwords($discuss->mname).' '.ucwords($discuss->lname).'</h4>';
          echo  '<h5>Subject:</h5><input type="text" class="form-control resize-input" name="discuss_subject" value='.ucwords($discuss->discuss_subject).' required />';
          echo  '<p>Content: <textarea column="20" name="discuss_content" class="form-control">'.$discuss->discuss_content.'</textarea></p>';
          echo  '<input type="submit" class="btn btn-primary" value="Update"/>';
          echo  '<input type="hidden" name="discuss_id" value='.$discuss->discuss_id.'>';
          echo  '</div>';
          echo  '</div>';
          echo  '</form>';
        }
        else
        {
          foreach ($discussion->result() as $discuss)
          {
          echo  '<div class="row">';
          echo  '<div class="jumbotron resize">';
          echo  '<h4><img src='.base_url('profile_pic/'.$discuss->profile_pic).' class="pic-round"> '.ucwords($discuss->fname).' '.ucwords($discuss->mname).' '.($discuss->lname).'</h4>';
          echo  '<h5>Subject: '.ucwords($discuss->discuss_subject).'</h5>';
          echo  '<h6>Date Posted: '.date('l js \of F Y h:i:s A', strtotime($discuss->discuss_posted)).'</h6>';
          echo  '<p> » '.$discuss->discuss_content.'</p>';
          echo  '</br>';
          if($user->user_ID == $discuss->user_ID && $own->owner == 'owner')
          {
            echo  '<ul class="nav nav-pills"><li class="active"><a href='.base_url('index.php/discussion/get_discussion/'.$discuss->discuss_id.'/'.$ID->project_id).'>Edit »</a></li></ul>';
            echo '</br>';
            echo  '<a class="btn btn-xs btn-danger" href='.base_url('index.php/discussion/delete_discussion/'.$discuss->discuss_id.'/'.$ID->project_id).'>Delete »</a>';
          }
          echo  '</div>';
          echo  '</div>';
          }
        }
        ?>
        </div>
  	  </div>
      <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Create Discussion</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('index.php/discussion/save_discussion/'.$ID->project_id)?>" method="POST">
                <img class="img_design" width="150px" src="<?php echo base_url('images/discussion_icon.png')?>">
                <p>Subject: </p>
                <p>
                  <input type="text" class="form-control np in_one"  name="discuss_subject" placeholder="Add subject" id="subject" required/>
                </p>
                <p>
                  <textarea rows="8" class="form-control np" name="discuss_content" placeholder="Type your messages here ..." id="contents" required></textarea>
                <br>
                <input type="hidden" name="user_ID" value="<?php echo $user->user_ID ?>">
                <input type="hidden" name="project_id" value="<?php echo $ID->project_id ?>">
                </p> 
              </div>
              <div class="modal-footer">
                <input type="submit" value="Submit" class="btn btn-primary" >
                 </form>
              </div>
          </div>
        </div>
      </div>

    <script type="text/javascript">
        if(Modernizr.localstorage)
        {
          var subject = document.getElementById('subject'), contents = document.getElementById('contents'), updateInterval;

          !!localStorage.subject && (subject.value = localStorage.subject);
          !!localStorage.contents && (contents.value = localStorage.contents);

          subject.addEventListener('focus',function(){
            updateInterval = setInterval(function(){
              localStorage.subject = subject.value;
            }, 5000);
          }, false);

          subject.addEventListener('blur', function(){
            clearInterval(updateInterval);
          }, false)

          contents.addEventListener('focus',function(){
            updateInterval = setInterval(function(){
              localStorage.contents = contents.value;
            }, 5000);
          }, false);

          contents.addEventListener('blur', function(){
            clearInterval(updateInterval);
          }, false)
        }
    </script>
    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
<div data-original-title="Copy to clipboard" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" height="100%" width="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1408073161694">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="Dashboard%20Template%20for%20Bootstrap_files/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" height="100%" width="100%"></object>
</div>
</body>
</html>