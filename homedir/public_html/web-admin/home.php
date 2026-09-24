<?php 
error_reporting(0);
include('config.php'); 
session_start();

if($_SESSION['memid']=='')
{
header('location:index.php');
}

if(isset($_REQUEST['create_admin']))
{
$t_name = addslashes($_REQUEST['t_name']);
$t_short_desc = addslashes($_REQUEST['t_short_desc']);
$t_desc = addslashes($_REQUEST['t_desc']);
$c_name1 = addslashes($_REQUEST['c_name1']);
$c_desc1 = addslashes($_REQUEST['c_desc1']);
$c_name2 = addslashes($_REQUEST['c_name2']);
$c_desc2 = addslashes($_REQUEST['c_desc2']);
$b_name = addslashes($_REQUEST['b_name']);
$b_short_desc = addslashes($_REQUEST['b_short_desc']);
$b_desc = addslashes($_REQUEST['b_desc']);


$update = mysqli_query($con,"update `home` set `t_name`='$t_name',`t_short_desc`='$t_short_desc',`t_desc`='$t_desc',`c_name1`='$c_name1',`c_name2`='$c_name2',`c_desc1`='$c_desc1',`c_desc2`='$c_desc2',`b_name`='$b_name',`b_short_desc`='$b_short_desc',`b_desc`='$b_desc' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));

if($_FILES['image']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/svg")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['image']['name']);

$source_image1 = $_FILES['image']['tmp_name']; 

mkdir("../home/", 0755);
	   
$destination1 ='../home/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `home` set `image`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");
}
}


if($_FILES['b_image1']['tmp_name'])
{

$fil_type = $_FILES['b_image1']['type'];
if($file_type != "b_image1/jpeg" || $file_type != "b_image1/svg")
{

$b1_imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['b_image1']['name']);

$source_image1 = $_FILES['b_image1']['tmp_name']; 

mkdir("../home/bottom/", 0755);
	   
$destination1 ='../home/bottom/'.$b1_imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `home` set `b_image1`='$b1_imagename1' where `id`='".$_REQUEST['edit_id']."'");
}
}

if($_FILES['b_image2']['tmp_name'])
{

$fil_type = $_FILES['b_image2']['type'];
if($file_type != "b_image2/jpeg" || $file_type != "b_image2/svg")
{

$b2_imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['b_image2']['name']);

$source_image1 = $_FILES['b_image2']['tmp_name']; 

mkdir("../home/bottom/", 0755);
	   
$destination1 ='../home/bottom/'.$b2_imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `home` set `b_image2`='$b2_imagename1' where `id`='".$_REQUEST['edit_id']."'");
}
}

if($_FILES['b_image3']['tmp_name'])
{

$fil_type = $_FILES['b_image3']['type'];
if($file_type != "b_image3/jpeg" || $file_type != "b_image3/svg")
{

$b3_imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['b_image3']['name']);

$source_image1 = $_FILES['b_image3']['tmp_name']; 

mkdir("../home/bottom/", 0755);
	   
$destination1 ='../home/bottom/'.$b3_imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `home` set `b_image3`='$b3_imagename1' where `id`='".$_REQUEST['edit_id']."'");
}
}




$msg ='<center><span style="color:#ff0000;">Home Updated Successfully<span></center>';

}


$select  = mysqli_query($con,"select * from `home` where `id`='1' ")or die(mysqli_error($con));
$select1 = mysqli_fetch_array($select);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title><?php echo $shopname; ?></title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('leftside_menu.php'); ?>

	<div class="main-content">
				
<?php include('top.php'); ?>
		<hr />
		
					<ol class="breadcrumb bc-3" >
								<li>
						<a href="dashboard.php"><i class="fa-home"></i>Home</a>
					</li>
							<li>
		
									<a href="#">Edit Content</a>
							</li>
						<li class="active">
		
									<strong>Edit Home</strong>
							</li>
							</ol>
					
		<h2>Edit Home</h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Home Info 
						</div>

					</div>
					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">
			
			        <div class="panel-heading">
					<div class="panel-title">
							 Top Content
				    </div>
					</div>
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Top Title <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="t_name" placeholder="Title" required="required" value="<?php echo $select1['t_name']; ?>">
								</div>
							</div>
							

							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Top Short Description <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<textarea name="t_short_desc"  class="form-control" placeholder="Short Description"><?php echo $select1['t_short_desc']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Top Description <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">				
	                             <textarea name="t_desc" class="form-control ckeditor" style="height: 150px;" placeholder="Description " ><?php echo $select1['t_desc']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Top Image <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="image" value="<?php echo $select1['image']; ?>">
								</div>
								
								<span>Height: 450 px and Width: 390 px</span>
								
							</div>
							
							
					<div class="panel-heading">
					<div class="panel-title">
							 Center Content
				    </div>
					</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Center Title One <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="c_name1" placeholder="Title" required="required" value="<?php echo $select1['c_name1']; ?>">
								</div>
							</div>
							
							
							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Center Description One<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">				
	                             <textarea name="c_desc1" class="form-control ckeditor" style="height: 150px;" placeholder="Description " ><?php echo $select1['c_desc1']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Center Title Two<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="c_name2" placeholder="Title" required="required" value="<?php echo $select1['c_name2']; ?>">
								</div>
							</div>
							
							
							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Center Description Two<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">				
	                             <textarea name="c_desc2" class="form-control ckeditor" style="height: 150px;" placeholder="Description " ><?php echo $select1['c_desc2']; ?></textarea>
								</div>
							</div>
							
							
					<div class="panel-heading">
					<div class="panel-title">
							 Bottom Content
				    </div>
					</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Title <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="b_name" placeholder="Title" required="required" value="<?php echo $select1['b_name']; ?>">
								</div>
							</div>
							

							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Short Description <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<textarea name="b_short_desc"  class="form-control" placeholder="Short Description"><?php echo $select1['b_short_desc']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group" >
								<label for="field-1" class="col-sm-3 control-label">Description <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">				
	                             <textarea name="b_desc" class="form-control ckeditor" style="height: 150px;" placeholder="Description " ><?php echo $select1['b_desc']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Bottom Image<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="b_image1" value="<?php echo $select1['b_image1']; ?>">
								</div>
								
								<span>Height: 195 px and Width: 165 px</span>
								
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Bottom Image<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="b_image2" value="<?php echo $select1['b_image2']; ?>">
								</div>
								
								<span>Height: 285 px and Width: 275 px</span>
								
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Bottom Image<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="b_image3" value="<?php echo $select1['b_image3']; ?>">
								</div>
								
								<span>Height: 195 px and Width: 165 px</span>
								
							</div>
							
							
                            <div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<input type="hidden" name="edit_id" value="<?php echo $select1['id']; ?>">
									<button type="submit" class="btn btn-default" name="create_admin">Submit</button>
								</div>
							</div>
							
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>
		
		
		<!-- Footer -->

		<?php include('footer.php'); ?>
		
	</div>

		
	<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">
	
		<div class="chat-inner">
	
	
			<h2 class="chat-header">
				<a href="#" class="chat-close"><i class="entypo-cancel"></i></a>
	
				<i class="entypo-users"></i>
				Chat
				<span class="badge badge-success is-hidden">0</span>
			</h2>
	
	
			<div class="chat-group" id="group-1">
				<strong>Favorites</strong>
	
				<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
				<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
				<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
				<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
			</div>
	
	
			<div class="chat-group" id="group-2">
				<strong>Work</strong>
	
				<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
				<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
				<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
			</div>
	
	
			<div class="chat-group" id="group-3">
				<strong>Social</strong>
	
				<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
				<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
				<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
			</div>
	
		</div>
	
		<!-- conversation template -->
		<div class="chat-conversation">
	
			<div class="conversation-header">
				<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>
	
				<span class="user-status"></span>
				<span class="display-name"></span>
				<small></small>
			</div>
	
			<ul class="conversation-body">
			</ul>
	
			<div class="chat-textarea">
				<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
			</div>
	
		</div>
	
	</div>
	
	
	<!-- Chat Histories -->
	<ul class="chat-history" id="sample_history">
		<li>
			<span class="user">Art Ramadani</span>
			<p>Are you here?</p>
			<span class="time">09:00</span>
		</li>
	
		<li class="opponent">
			<span class="user">Catherine J. Watkins</span>
			<p>This message is pre-queued.</p>
			<span class="time">09:25</span>
		</li>
	
		<li class="opponent">
			<span class="user">Catherine J. Watkins</span>
			<p>Whohoo!</p>
			<span class="time">09:26</span>
		</li>
	
		<li class="opponent unread">
			<span class="user">Catherine J. Watkins</span>
			<p>Do you like it?</p>
			<span class="time">09:27</span>
		</li>
	</ul>
	
	
	
	
	<!-- Chat Histories -->
	<ul class="chat-history" id="sample_history_2">
		<li class="opponent unread">
			<span class="user">Daniel A. Pena</span>
			<p>I am going out.</p>
			<span class="time">08:21</span>
		</li>
	
		<li class="opponent unread">
			<span class="user">Daniel A. Pena</span>
			<p>Call me when you see this message.</p>
			<span class="time">08:27</span>
		</li>
	</ul>

	
</div>




	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	<script src="assets/js/ckeditor/ckeditor.js"></script>
	<script src="assets/js/ckeditor/adapters/jquery.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>