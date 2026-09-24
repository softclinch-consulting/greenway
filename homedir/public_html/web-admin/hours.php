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

$l_id = $_REQUEST['l_id'];
$day = $_REQUEST['day'];
$open_time = $_REQUEST['open_time'];
$am_pm = $_REQUEST['am_pm'];
$close_time = $_REQUEST['close_time'];
$am_pm1 = $_REQUEST['am_pm1'];
$status = 'Active';
$date = date('Y-m-d h:i:s');

$delete = mysqli_query($con,"delete from `listing_business_hours` where `l_id`='$l_id' ")or die(mysqli_error($con));

$count = count($day);

for ($i=0;$i<$count;$i++) 
{

$insert = mysqli_query($con,"insert into `listing_business_hours`(`l_id`,`day`,`open_time`,`am_pm`,`close_time`,`am_pm1`,`status`,`date`)values('$l_id','$day[$i]','$open_time[$i]','$am_pm[$i]','$close_time[$i]','$am_pm1[$i]','$status','$date')") or die(mysqli_error($con));

}

$msg ='<center><span style="color:#ff0000;">business hours insert successfully<span></center>';



}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `offers` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
$select1 = mysqli_fetch_array($select);
}


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
		
									<a href="#">Business Hours</a>
							</li>
						<li class="active">
		
									<strong>Create Business Hours</strong>
							</li>
							</ol>
					
		<h2>Create Business Hours</h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Business Hours Info
						</div>

					</div>


					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="l_id" value="<?php echo $_REQUEST['l_id']; ?>">

                          <?php
                          $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
                         foreach ($days as $day)
                          {

                $business_hours  = mysqli_query($con,"select * from `listing_business_hours` where `l_id`='".$_REQUEST['l_id']."' and `day`='$day' ")or die(mysqli_error($con));
                $business_hours1 = mysqli_fetch_array($business_hours);
                          ?>

                          <input type="hidden" name="day[]" value="<?php echo $day; ?>">

                          <div class="form-group">
							<label for="field-1" class="col-sm-2 control-label"><?php echo $day; ?><span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-3">
									<input type="text" class="form-control" id="field-1" name="open_time[]" placeholder="Opening Time" required="required" value="<?php echo $business_hours1['open_time']; ?>">
								</div>

								<div class="col-sm-2">

									<select class="form-control" name="am_pm[]">
						<option value="" <?php if($business_hours1['am_pm']==''){?> selected="selected" <?php } ?> >Select</option>
						<option value="AM" <?php if($business_hours1['am_pm']=='AM'){?> selected="selected" <?php } ?> >AM</option>
						<option value="PM" <?php if($business_hours1['am_pm']=='PM'){?> selected="selected" <?php } ?> >PM</option>
									</select>

									<!--<input type="text" class="form-control" id="field-1" name="am_pm[]" placeholder="AM or PM" required="required" value="<?php echo $business_hours1['am_pm']; ?>">-->

								</div>

								<div class="col-sm-3">
									<input type="text" class="form-control" id="field-1" name="close_time[]" placeholder="Closing Time" required="required" value="<?php echo $business_hours1['close_time']; ?>">
								</div>

								<div class="col-sm-2">

									<select class="form-control" name="am_pm1[]">
					<option value="" <?php if($business_hours1['am_pm1']==''){?> selected="selected" <?php } ?> >Select</option>
					<option value="AM" <?php if($business_hours1['am_pm1']=='AM'){?> selected="selected" <?php } ?> >AM</option>
					<option value="PM" <?php if($business_hours1['am_pm1']=='PM'){?> selected="selected" <?php } ?> >PM</option>
									</select>

									<!--<input type="text" class="form-control" id="field-1" name="am_pm[]" placeholder="AM or PM" required="required" value="<?php echo $business_hours1['am_pm']; ?>">-->

								</div>

							</div>
							<?php
							} 
							?>



							<div class="form-group" style="display: none;">
								<label class="col-sm-3 control-label">Status <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="status" required="required">
										
						<option value="Active" <?php if($select1['status']=='Active'){?> selected="selected" <?php } ?> >Active</option>
						<option value="Pending" <?php if($select1['status']=='Pending'){?> selected="selected" <?php } ?> >Pending</option>
									</select>
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