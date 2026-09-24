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
//$name = $_REQUEST['name'];
/*$header_phone = $_REQUEST['header_phone'];
$m1_address = addslashes($_REQUEST['m1_address']);
$m1_phone = $_REQUEST['m1_phone'];
$m1_tel = $_REQUEST['m1_tel'];
$m1_email = $_REQUEST['m1_email'];
$m2_address = addslashes($_REQUEST['m2_address']);
$m2_phone = $_REQUEST['m2_phone'];
$m2_tel = $_REQUEST['m2_tel'];
$m2_email = $_REQUEST['m2_email'];
$footer_title = $_REQUEST['footer_title'];*/
$footer_about = $_REQUEST['footer_about'];
$address1 = addslashes($_REQUEST['address1']);
$address2 = addslashes($_REQUEST['address2']);
$telephone = $_REQUEST['telephone'];
$mobile = $_REQUEST['mobile'];
$mobile2 = $_REQUEST['mobile2'];
$purchase_mobile = $_REQUEST['purchase_mobile'];
$email = $_REQUEST['email'];
$email2 = $_REQUEST['email2'];
$sales_mail = $_REQUEST['sales_mail'];
$purchase_mail = $_REQUEST['purchase_mail'];
$whatsapp = $_REQUEST['whatsapp'];
$facebook_link = $_REQUEST['facebook_link'];
$instagram_link = $_REQUEST['instagram_link'];
$linkedin_link = $_REQUEST['linkedin_link'];
$youtube_link = $_REQUEST['youtube_link'];


$update = mysqli_query($con,"update `settings` set `whatsapp`='$whatsapp',`purchase_mobile`='$purchase_mobile',`footer_about`='$footer_about',`address1`='$address1',`address2`='$address2',`telephone`='$telephone',`mobile`='$mobile',`mobile2`='$mobile2',`email`='$email',`email2`='$email2',`sales_mail`='$sales_mail',`purchase_mail`='$purchase_mail',`facebook_link`='$facebook_link',`instagram_link`='$instagram_link',`linkedin_link`='$linkedin_link',`youtube_link`='$youtube_link' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));


if($_FILES['c_image']['tmp_name'])
{

$fil_type = $_FILES['c_image']['type'];


$c_imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['c_image']['name']);

$source_image1 = $_FILES['c_image']['tmp_name']; 

mkdir("../settings/", 0755);
	   
$destination1 ='../settings/'.$c_imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `settings` set `c_image`='$c_imagename1' where `id`='".$_REQUEST['edit_id']."'");

}

if($_FILES['f_image']['tmp_name'])
{

$fil_type = $_FILES['f_image']['type'];


$f_imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['f_image']['name']);

$source_image1 = $_FILES['f_image']['tmp_name']; 

mkdir("../settings/", 0755);
	   
$destination1 ='../settings/'.$f_imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `settings` set `f_image`='$f_imagename1' where `id`='".$_REQUEST['edit_id']."'");

}

$msg ='<center><span style="color:#ff0000;">Settings Updated Successfully<span></center>';

}


$select  = mysqli_query($con,"select * from `settings` where `id`='1' ")or die(mysqli_error($con));
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
		
									<a href="#">Settings</a>
							</li>
						<li class="active">
		
									<strong>Settings</strong>
							</li>
							</ol>
					
		<h2>Settings</h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Settings Info
						</div>

					</div>
					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">
			
							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Header Title <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="name" placeholder="Title" required="required" value="<?php echo $select1['name']; ?>">
								</div>
							</div>-->
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Footer About <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">

									<textarea name="footer_about" class="form-control ckeditor" placeholder="Footer About" required="required"><?php echo $select1['footer_about']; ?></textarea>

								</div>
							</div>
							
							
			<div class="panel-heading">
			<div class="panel-title">
				Corporat Office Address
			</div>
			</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Corporat Office Address <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">
									<textarea name="address1" class="form-control ckeditor" placeholder="Head Office Address" required="required"><?php echo $select1['address1']; ?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Corporat Mobile Number <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="mobile" placeholder="Mobile Number" required="required" value="<?php echo $select1['mobile']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Corporat Email<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="email" class="form-control" id="field-1" name="email" placeholder="Email" required="required" value="<?php echo $select1['email']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Corporat Image<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="c_image" value="<?php echo $select1['c_image']; ?>">
								</div>
							</div>
							
							
			<div class="panel-heading">
			<div class="panel-title">
				Factory Address
			</div>
			</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Factory Address <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">
									<textarea name="address2" class="form-control ckeditor" placeholder="Warehouse Address" required="required"><?php echo $select1['address2']; ?></textarea>
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Factory Mobile Number <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="mobile2" placeholder="Factory Mobile Number" required="required" value="<?php echo $select1['mobile2']; ?>">
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Factory mail<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="email" class="form-control" id="field-1" name="email2" placeholder="Factory mail" required="required" value="<?php echo $select1['email2']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Factory Image<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="f_image" value="<?php echo $select1['f_image']; ?>">
								</div>
							</div>
							
							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Purchase mail<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="email" class="form-control" id="field-1" name="purchase_mail" placeholder="Purchase mail" required="required" value="<?php echo $select1['purchase_mail']; ?>">
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Head Office <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="telephone" placeholder="Phone Number" required="required" value="<?php echo $select1['telephone']; ?>">
								</div>
							</div>

							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Purchase Mobile Number <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="purchase_mobile" placeholder="Purchase Mobile Number" required="required" value="<?php echo $select1['purchase_mobile']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">WhatsApp Number <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="whatsapp" placeholder="WhatsApp Number" required="required" value="<?php echo $select1['whatsapp']; ?>">
								</div>
							</div>-->
							
							
							

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">FaceBook Link<span style="color:#ee4749">*</span></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="facebook_link" placeholder="FaceBook Link" required="required" value="<?php echo $select1['facebook_link']; ?>">
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Instagram Link<span style="color:#ee4749">*</span></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="instagram_link" placeholder="Instagram Link" required="required" value="<?php echo $select1['instagram_link']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Youtube Link<span style="color:#ee4749">*</span></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="youtube_link" placeholder="youtube Link" required="required" value="<?php echo $select1['youtube_link']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Linkedin Link<span style="color:#ee4749">*</span></label>

								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="linkedin_link" placeholder="Linkedin Link" required="required" value="<?php echo $select1['linkedin_link']; ?>">
								</div>
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