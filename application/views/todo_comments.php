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
    <script src="<?php echo base_url('js/modernizr-latest.js')?>"></script>
    <script src="<?php echo base_url('js/jquery-1.8.0.min.js')?>"></script>
    <style type="text/css" id="holderjs-style"></style>
</head>
 <?php foreach ($userID->result() as $user) {} ?>
 <?php foreach ($todo_id->result() as $todo) {} ?>
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
            <li class="active"><a href="<?php echo base_url('index.php/project/view_project_files/'.$ID->project_id) ?>">Projects</br> » <?php echo $ID->project_name; ?></br> »» To-Do-List</a></li> 
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/upload_icon.png') ?>" atl="upload icon" width="30" height="30"> Upload File</a></li>
            <li><a href="<?php echo base_url('index.php/discussion/create_discussion/'.$ID->project_id);?>"><img src="<?php echo base_url('images/discussion_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Discussions</a></li>
            <li><a href="#create" data-toggle="modal"><img src="<?php echo base_url('images/todo_list.png') ?>" atl="upload icon" width="30" height="30"> Add To-do-list</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/text_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Text Document</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/event_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Event</a></li>
            <li><a href="<?php echo base_url('index.php/membership/add_team/'.$ID->project_id);?>"><img src="<?php echo base_url('images/add_member.png') ?>" atl="upload icon" width="30" height="30"> Add Members to this Project</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2" id="top">
        <h1 class="page-header project-bar fixed-bar">Comment Section</h1> 
        <?php 
          foreach ($todo_id->result() as $todo) {
          echo '<div class="col-sm-9">';
          echo '<a href="#bottom">See Bottom</a>';
          echo '<div class="panel panel-primary">';
          echo '<div class="panel-heading">';
          echo '<h3 class="panel-title">Assigned to: <img src='.base_url('profile_pic/'.$todo->profile_pic).' class="pic-round"> '.ucwords($todo->fname).' '.ucwords($todo->mname).' '.ucwords($todo->lname).'</h3>';
          echo '</div>';
          echo '<div class="panel-body">';
          echo '<p class="move-little">Date Posted: '.$todo->datetime.'</p>';
          echo '<p class="move-little">Status: '.$todo->status.'</p>';
          echo 'Task: <h2> » '.$todo->info.'</h2>';
          echo '</div>';
          echo '</div>';
          if(isset($edit))
          {
            // echo '<audio controls autoplay type="hidden"><source src='.base_url('sounds/popup.ogg').' type="audio/ogg"><source src='.base_url('sounds/popup.mp3').' type="audio/mpeg"></audio>';

            foreach ($edit as $edit_comment){}
            echo '<form method="post" action='.base_url('index.php/todo/update_comment/'.$edit_comment->todo_id.'/'.$edit_comment->project_id).'>';
            echo  '<div class="row">';
            echo  '<div class="jumbotron resize">';
            echo  '<h4><img src='.base_url('profile_pic/'.$edit_comment->profile_pic).' class="pic-round"> '.ucwords($edit_comment->fname).' '.ucwords($edit_comment->mname).' '.ucwords($edit_comment->lname).'</h4>';
            echo  '<p>Content: <textarea column="20" rows="5" name="comment" class="form-control" autofocus="">'.$edit_comment->comment.'</textarea></p>';
            echo  '<input type="submit" class="btn btn-primary" value="Update"/>';
            echo  '<input type="hidden" name="comment_id" value='.$edit_comment->comment_id.'>';
            echo  '</div>';
            echo  '</div>';
            echo  '</form>';
          }
          else
          {
          foreach ($comment_list->result() as $comment) 
          {    
            echo '<div class="panel panel-default resize-box">';
            echo '<div class="navbar-collapse collapse">';
            echo '<div class="panel-heading">';
            echo '<ul class="nav navbar-nav options-nav-todo">';
            echo '<ul class="nav navbar-nav">';
            echo '<li class="dropdown">';
            echo '<a href="#" class="dropdown-toggle caret-edit" data-toggle="dropdown"><img src='.base_url('images/dropDownArrow.png').' width="20" height="20"></a>';
            echo '<ul class="dropdown-menu dropdown-edit" role="menu">';
            echo '<li><a href='.base_url('index.php/todo/edit_comment/'.$comment->comment_id.'/'.$comment->todo_id.'/'.$comment->project_id).'>Edit</a></li>';
            echo '<li><a href='.base_url('index.php/todo/delete_comment/'.$comment->comment_id.'/'.$comment->todo_id.'/'.$comment->project_id).'>Delete</a></li>';
            echo '</ul>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '<div class="panel-heading">';
            echo '<p><img src='.base_url('profile_pic/'.$comment->profile_pic).' class="pic-round"> '.ucwords($comment->fname).' '.ucwords($comment->mname).' '.ucwords($comment->lname).'</p>'.$comment->comment.'</p><p>Posted: '.date('l, F j Y h:i:s A', strtotime($comment->dateposted)).'';
            echo '</div>';
            echo '</div>';
            echo '</div>';
              }
            }
          }

         // <a href='.base_url('index.php/todo/edit_comment/'.$comment->comment_id.'/'.$comment->todo_id.'/'.$comment->project_id).'>Edit</a><p><a href='.base_url('index.php/todo/delete_comment/'.$comment->comment_id.'/'.$comment->todo_id.'/'.$comment->project_id).'>Delete</a>
        ?>
       <!--  <div class="col-sm-9"> -->
          <div class="panel panel-default comment-box" id="bottom">
            <form action='<?php echo base_url('index.php/todo/add_comment/'.$todo->project_id.'/'.$todo->todo_id)?>' method="post">
            <div class="panel-heading">
              <h3 class="panel-title"><img src='<?php echo base_url('profile_pic/'.$user->profile_pic)?>' class="pic-square"><input type="text" name="comment" class="form-control adjust" placeholder="Write a comment..."/></h3>
              <input type="hidden" name="user_ID" value="<?php echo $user->user_ID ?>">
              <input type="hidden" name="project_id" value="<?php echo $todo->project_id ?>">
              <input type="hidden" name="todo_id" value="<?php echo $todo->todo_id ?>">
            </div>
          </div>
          </form>
          <a href="#top">Go Top</a>
        </div>
      
    <div class="modal fade" id="create" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Create To-Do-List</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url('index.php/todo/save_todolist/'.$ID->project_id)?>" method="POST">
                <img class="img_design" width="150px" src="<?php echo base_url('images/project_icon.png')?>">
                <p>
                  <textarea class="form-control np" name="info" placeholder="Make some To-Do-List here..." required></textarea>
                <br>
                <p>Assign to:</p>
                <select name="user_ID">
                  <?php foreach ($team_list->result() as $team) 
                  {
                    if($user->user_ID != $team->user_ID)
                    {
                    echo '<option value='.$team->user_ID.'>'.$team->fname.' '.$team->mname.' '.$team->lname.'</option>';
                    }
                  } 
                ?>
                </select>
                <p>Status</p>
                <select name="status">
                  <option value="Done"> Done </option>
                  <option value="Undone"> Undone </option>
                </select>
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
    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
<div data-original-title="Copy to clipboard" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" height="100%" width="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1408073161694">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="Dashboard%20Template%20for%20Bootstrap_files/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" height="100%" width="100%"></object>

</div>
</body>
</html>