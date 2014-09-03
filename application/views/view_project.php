<!DOCTYPE html>
<html lang="en">
<head>
<?php foreach ($project_title as $row) {}?>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $row->project_name; ?></title>
	<link href="<?php echo base_url('css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('css_new/dashboard.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('js_new/ie-emulation-modes-warning.js')?>"></script>
    <script src="<?php echo base_url('js_new/ie10-viewport-bug-workaround.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('jquery-1.8.0.min.js')?>"></script>
	<style type="text/css" id="holderjs-style"></style></head>
   <?php foreach ($userID->result() as $user) {} ?>
    <?php foreach ($project_owner->result() as $own) {} ?>
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
                <li><a href="<?php echo base_url('index.php/camp/profile') ?>">Projects</a></li>
                <li><a href="#">List of Members in Projects</a></li>
                <li><a href="<?php echo base_url('index.php/settings/account_settings/')?>">Accounts</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Sign out</li>
                <li><a href="<?php echo base_url('index.php/membership/logout')?>">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php  if(isset($project_ID)) $ID = $project_ID[0]; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="list-group group-prof">
            <li class="list-group-item text-muted"><img src="<?php echo base_url('profile_pic/'.$user->profile_pic)?>" alt="profile icon" width="170" height="130" ></li>
             <li class="list-group-item text-left"><span class="pull-left"><strong>Username</strong></span> </br> <?php echo $user->username ?></li>
            <li class="list-group-item text-left"><span class="pull-left"><strong>Joined</strong></span> </br> <?php echo $user->datejoin ?></li>
            <li class="list-group-item text-left"><span class="pull-left"><strong>Real name</strong></span> </br> <?php echo ucwords($user->fname).' '.ucwords($user->mname).' '.ucwords($user->lname) ?></li>
          </ul> 

        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="<?php echo base_url('index.php/camp/profile') ?>">Projects</br> » <?php echo ucwords($ID->project_name); ?></a></li> 
            <li><a href="#upload" data-toggle="modal"><img src="<?php echo base_url('images/upload_icon.png') ?>" atl="upload icon" width="30" height="30"> Upload File</a></li>
            <li><a href="<?php echo base_url('index.php/discussion/create_discussion/'.$ID->project_id);?>"><img src="<?php echo base_url('images/discussion_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Discussions</a></li>
            <li><a href="<?php echo base_url('index.php/todo/create_todo_list/'.$ID->project_id);?>"><img src="<?php echo base_url('images/todo_list.png') ?>" atl="upload icon" width="30" height="30"> Add To-do-list</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/text_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Text Document</a></li>
            <li><a href="<?php echo base_url('index.php/file/create/'.$ID->project_id);?>"><img src="<?php echo base_url('images/event_icon.png') ?>" atl="upload icon" width="30" height="30"> Add Event</a></li>
            <li><a href="<?php echo base_url('index.php/membership/add_team/'.$ID->project_id);?>"><img src="<?php echo base_url('images/add_member.png') ?>" atl="upload icon" width="30" height="30"> Add Members to this Project</a></li>
          </ul>
        </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="sub-header"><?php echo $row->project_name; ?></h2>
      <h2 class="sub-header">Files</h2>
      <?php foreach ($files->result() as $file)
      {

       echo '<div class="col-sm-3">';
       echo '<div class="thumbnail">';
       echo '<p><img src='.base_url('images/file_icon.png').' width=""><p>Filename: '.ucwords($file->filename).'</p><p>Size: '.$file->size.' Kb</p><p>File Type: '.$file->type.'</p>';
       echo '<div class="caption text-center">';
       echo '<a href='.base_url('index.php/file/download_file/'.$file->file_id).' class="btn btn-primary" role="button">Download</a>';
       echo '<p><a href='.base_url('index.php/file/delete_file/'.$file->file_id.'/'.$ID->project_id).' class="label label-danger">Delete</a></p>';
       echo '</div>';
       echo '</div>';
       echo '</div>';
    }
    ?>
        </div>
        <?php foreach ($discussion_count->result() as $count_discuss){} ?>
        <?php foreach ($todo_count->result() as $count_todo){} ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h2 class="sub-header"></h2>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title">Discussions</h3>
                        </div>
                        <div class="panel-body">
                          <ul class="nav nav-pills"><li class="active"><a href="<?php echo base_url('index.php/discussion/view_discuss/'.$ID->project_id);?>">View Discussions <span class="badge"><?php echo $count_discuss->count_discuss;?></span></a></a></li></ul>
                        </div>
                       </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="panel panel-primary ">
                        <div class="panel-heading">
                          <h3 class="panel-title">To do list</h3>
                        </div>
                        <div class="panel-body">
                         <ul class="nav nav-pills"><li class="active"><a href="<?php echo base_url('index.php/todo/todo_list_view/'.$ID->project_id);?>">View To-Do-List <span class="badge"><?php echo $count_todo->count_todo ?></span></a></a></li></ul>
                        </div>
                       </div>    
                      </div>
                     <div class="col-sm-4">
                        <div class="panel panel-primary ">
                        <div class="panel-heading">
                          <h3 class="panel-title">Text Documents</h3>
                        </div>
                        <div class="panel-body">
                         <ul class="nav nav-pills"><li class="active"><a href="<?php echo base_url('index.php/todo/todo_list_view/'.$ID->project_id);?>">View Text Documents <span class="badge"><?php echo $count_todo->count_todo ?></span></a></a></li></ul>
                        </div>
                       </div>
                      </div>
                     </div>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4 side-margin">
          <div class="list-group">
            <p class="list-group-item active">
              People who invited for this Project
            </p>
            <?php 
              foreach ($member_include->result() as $team_member) 
              {
                if($ID->user_ID == $team_member->user_ID && $ID->owner == 'owner')
                {
                  echo '<p>» Owner:<img src='.base_url('profile_pic/'.$own->profile_pic).' class="pic-round-project"> '.ucwords($own->fname).' '.ucwords($own->mname).' '.ucwords($own->lname).'</p>';
                }
                else
                {
                echo '<p class="list-group-item">';
                  if($user->user_ID == $team_member->user_ID && $ID->owner != 'owner')
                  {
                     echo '<img src='.base_url('profile_pic/'.$team_member->profile_pic).' class="pic-round-project"> '.ucwords($team_member->fname).' '.ucwords($team_member->mname).' '.ucwords($team_member->lname).'</p>';
                  }
                  else
                  {
                    echo '<a href='.base_url('index.php/membership/delete_team/'.$team_member->team_id.'/'.$ID->project_id).'> Remove <img src='.base_url('profile_pic/'.$team_member->profile_pic).' class="pic-round-project"> '.ucwords($team_member->fname).' '.ucwords($team_member->mname).' '.ucwords($team_member->lname).'</p></a>'; 
                  }
                     
                }
              }
             ?>
          </div>
        </div>
        <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3 class="panel-title">Event Calendar</h3>
          </div>
              <?php 
                $prefs['template'] = '

                 {table_open}<table class="table table-bordered table-striped">{/table_open}

                 {heading_row_start}<tr>{/heading_row_start}

                 {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
                 {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
                 {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

                 {heading_row_end}</tr>{/heading_row_end}

                 {week_row_start}<tr>{/week_row_start}
                 {week_day_cell}<td>{week_day}</td>{/week_day_cell}
                 {week_row_end}</tr>{/week_row_end}

                 {cal_row_start}<tr>{/cal_row_start}
                 {cal_cell_start}<td>{/cal_cell_start}

                 {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
                 {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

                 {cal_cell_no_content}{day}{/cal_cell_no_content}
                 {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

                 {cal_cell_blank}&nbsp;{/cal_cell_blank}

                 {cal_cell_end}</td>{/cal_cell_end}
                 {cal_row_end}</tr>{/cal_row_end}

                 {table_close}</table>{/table_close}';

                $this->load->library('calendar', $prefs);

                echo $this->calendar->generate();
               ?>
        </div>
        </div>
      </div>
      <div class="modal fade" id="upload" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Upload a File</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('file/do_upload');?>
                <img class="img_design" width="150px" src="<?php echo base_url('images/file_icon.png')?>">
                <p>
                  <input id="input-1" type="file" name="userfile" class="file" required>
                  <input type="hidden" name="project_id" value="<?php echo $ID->project_id; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $user->user_ID; ?>">
                </p>
              </div>
              <div class="modal-footer">
                <input type="submit" value="Upload" class="btn btn-primary" >
                 </form>
              </div>
          </div>
        </div>
      </div>
       <?php 
          if(isset($error))
          {
             echo '<a href="#error" data-toggle="modal" clicked></a>';
           }else if(isset($success))
           {
             echo '<a href="#success" data-toggle="modal" clicked></a>';
           }
        ?>
      <div class="modal fade" id="error" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Error!</h4>
              </div>
              <div class="modal-body">
                <?php 
                   echo '<div class="alert alert-danger" role="alert">';
                   echo '<strong>Oh snap!</strong> You uploaded a wrong file! Try the correct one.';
                   echo '</div>';
                 ?>
              </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="success" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h4>Success!</h4>
              </div>
              <div class="modal-body">
                <?php 
                   echo '<div class="alert alert-info" role="alert">';
                 echo '<strong>Oh yeah!</strong> You uploaded a file! Upload another.';
                 echo '</div>';
                 ?>
              </div>
          </div>
        </div>
      </div>
    <script src="<?php echo base_url('js_new/jquery.js')?>"></script>
    <script src="<?php echo base_url('js_new/bootstrap.js')?>"></script>
    <script src="<?php echo base_url('js_new/docs.js')?>"></script>
  

<div data-original-title="Copy to clipboard" title="" style="position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" class="global-zeroclipboard-container" id="global-zeroclipboard-html-bridge">      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="global-zeroclipboard-flash-bridge" height="100%" width="100%">         <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1408073161694">         <param name="allowScriptAccess" value="sameDomain">         <param name="scale" value="exactfit">         <param name="loop" value="false">         <param name="menu" value="false">         <param name="quality" value="best">         <param name="bgcolor" value="#ffffff">         <param name="wmode" value="transparent">         <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">         <embed src="Dashboard%20Template%20for%20Bootstrap_files/ZeroClipboard.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" name="global-zeroclipboard-flash-bridge" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com" scale="exactfit" height="100%" width="100%">                </object></div></body></html>