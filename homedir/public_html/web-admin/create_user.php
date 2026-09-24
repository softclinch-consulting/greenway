<?php 
error_reporting(0);
include('config.php'); 
session_start();

if($_SESSION['memid']=='')
{
header('location:index.php');
}

if(isset($_REQUEST['create_user']))
{
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$type = '0';
$address = $_REQUEST['address'];
$l_id = $_REQUEST['l_id'];
$s_id = $_REQUEST['s_id'];
$c_id = $_REQUEST['c_id'];
$zipcode = $_REQUEST['zipcode'];
$about = $_REQUEST['about'];

$facebook = $_REQUEST['facebook'];
$twitter = $_REQUEST['twitter'];
$linkedin = $_REQUEST['linkedin'];
$instagram = $_REQUEST['instagram'];

$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$status = $_REQUEST['status'];
$c_date = date('Y-m-d h:i:s');

if($_REQUEST['edit_id']=='')
{

$qry_validate = mysqli_query($con,"select * from `user_vendor` where `user`='$user' and `type`='0'  ") or die(mysqli_error($con));
if(mysqli_num_rows($qry_validate)>0)
{
$msg ='<center><span style="color:#ff0000;">Username already exists<span></center>';
}
else
{

$insert = mysqli_query($con,"insert into `user_vendor`(`name`,`email`,`mobile`,`type`,`address`,`l_id`,`s_id`,`zipcode`,`about`,`c_id`,`facebook`,`twitter`,`linkedin`,`instagram`,`user`,`pass`,`status`,`c_date`)values('$name','$email','$mobile','$type','$address','$l_id','$s_id','$zipcode','$about','$c_id','$facebook','$twitter','$linkedin','$instagram','$user','$pass','$status','$c_date')") or die(mysqli_error($con));

$msg ='<center><span style="color:#ff0000;">User Create Successfully<span></center>';
}

}
else
{


$update = mysqli_query($con,"update `user_vendor` set `name`='$name',`email`='$email',`mobile`='$mobile',`type`='$type',`address`='$address',`l_id`='$l_id',`s_id`='$s_id',`c_id`='$c_id',`zipcode`='$zipcode',`about`='$about',`facebook`='$facebook',`twitter`='$twitter',`linkedin`='$linkedin',`instagram`='$instagram',`user`='$user',`pass`='$pass',`status`='$status' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));

//$msg ='<center><span style="color:#ff0000;">Admin Updated Successfully<span></center>';
?>
<script type="text/javascript">
//alert('Delete Successfully');
window.location='user_list.php?msg=updated';
</script>
<?php
}


}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `user_vendor` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
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
		
									<a href="#">User</a>
							</li>
						<li class="active">
		
									<strong>Create User</strong>
							</li>
							</ol>
					
		<h2>Create User <span style="float: right;"><a href="user_list.php">User List</a></span></h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Basic Info
						</div>

					</div>
					
					<div class="panel-body">
						
						<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST">
			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Name <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="name" placeholder="Name" required="required" value="<?php echo $select1['name']; ?>">
								</div>
							</div>


								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Mobile Number <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" id="field-1" name="mobile" placeholder="Mobile Number" required="required" value="<?php echo $select1['mobile']; ?>" min="0">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Address <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="address" placeholder="Address" required="required" value="<?php echo $select1['address']; ?>">
								</div>
							</div>


							<script type="text/javascript">
function country(c_id,type)
{

var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById("state_result").innerHTML = "Please wait...";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("state_result").innerHTML = xmlhttp.responseText;
} else {
document.getElementById("state_result").innerHTML = "Error Occurred.";
}
}
xmlhttp.open("GET", "ajax_page.php?c_id=" + c_id + "&type=" + type, false);
xmlhttp.send();
}

function state(s_id,type)
{

var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById("location_result").innerHTML = "Please wait...";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("location_result").innerHTML = xmlhttp.responseText;
} else {
document.getElementById("location_result").innerHTML = "Error Occurred.";
}
}
xmlhttp.open("GET", "ajax_page.php?s_id=" + s_id + "&type=" + type, false);
xmlhttp.send();

}
</script>
							

								<div class="form-group">
								<label class="col-sm-3 control-label">Country <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="c_id" required="required" onchange="country(this.value,'country');">
										
						<option value="">Select</option>
                        <?php
                        $country  = mysqli_query($con,"select * from `country` order by `name` asc ")or die(mysqli_error($con));
                        while ($country1 = mysqli_fetch_array($country)) 
                        {
                        ?>
						<option value="<?php echo $country1['id']; ?>" <?php if($select1['c_id']==$country1['id']){?> selected="selected" <?php } ?> ><?php echo $country1['name']; ?></option>
						<?php
					    }
					    ?>
						
									</select>
								</div>
							</div>

							  <div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">State<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<?php if($_REQUEST['e_id']==''){ ?>
									<span id="state_result">Choose contry</span>
								   <?php } else{ ?>
									<select class="form-control" name="s_id" id="state_result" required="required" onchange="state(this.value,'state');">
										
<option value="">Select</option>
<?php
$state  = mysqli_query($con,"select * from `state` where `c_id`='".$select1['c_id']."' order by `name` asc ")or die(mysqli_error($con));
while ($state1 = mysqli_fetch_array($state)) 
{
?>
<option value="<?php echo $state1['id']; ?>" <?php if($select1['s_id']==$state1['id']){?> selected="selected" <?php } ?> ><?php echo $state1['name']; ?></option>
<?php
}
?>
</select>
<?php } ?>
								</div>
							</div>

							 <div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Location<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<?php if($_REQUEST['e_id']==''){ ?>
									<span id="location_result">Choose State</span>
								   <?php } else{ ?>
									<select class="form-control" name="l_id" id="location_result" required="required">
										
<option value="">Select</option>
<?php
$location  = mysqli_query($con,"select * from `location` where `s_id`='".$select1['s_id']."' order by `name` asc ")or die(mysqli_error($con));
while ($location1 = mysqli_fetch_array($location)) 
{
?>
<option value="<?php echo $location['id']; ?>" <?php if($select1['l_id']==$location['id']){?> selected="selected" <?php } ?> ><?php echo $location['name']; ?></option>
<?php
}
?>
</select>
<?php } ?>
								</div>
							</div>
							

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Zipcode <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" id="field-1" name="zipcode" placeholder="Zipcode" required="required" value="<?php echo $select1['zipcode']; ?>" min="0">
								</div>
							</div>


							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">About <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">

									<textarea name="about" class="form-control ckeditor" placeholder="About" required="required"><?php echo $select1['about']; ?></textarea>

								</div>
							</div>-->


							<div class="form-group" style="display: none;">
								<label class="col-sm-3 control-label">Type</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="type">
										<option value="">Select</option>
								<option value="1" <?php if($select1['type']=='1'){?> selected="selected" <?php } ?> >Admin</option>
									</select>
								</div>
							</div>



							<div class="form-group">
								<label class="col-sm-3 control-label">Status <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="status" required="required">
										
						<option value="Active" <?php if($select1['status']=='Active'){?> selected="selected" <?php } ?> >Active</option>
						<option value="Pending" <?php if($select1['status']=='Pending'){?> selected="selected" <?php } ?> >Pending</option>
									</select>
								</div>
							</div>


							<!--<div class="panel-heading">
						<div class="panel-title">
							Socail Accounts
						</div>

					</div>

					<hr>


					<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Facebook <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="facebook" placeholder="Facebook" value="<?php echo $select1['facebook']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Twitter <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="twitter" placeholder="Twitter" value="<?php echo $select1['twitter']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">LinkedIn <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="linkedin" placeholder="LinkedIn" value="<?php echo $select1['linkedin']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Instagram <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="instagram" placeholder="Instagram" value="<?php echo $select1['instagram']; ?>">
								</div>
							</div>-->


                      
							<div class="panel-heading">
						<div class="panel-title">
							Login Info
						</div>

					</div>

					<hr>
							
							
							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Username <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" name="user" id="field-1" placeholder="Username" required="required" value="<?php echo $select1['user']; ?>">
								</div>
							</div>-->
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Email ID</label>
								
								<div class="col-sm-5">
									<input type="email" class="form-control" id="field-1" name="email" placeholder="Email ID" value="<?php echo $select1['email']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-3" class="col-sm-3 control-label">Password <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required="required" value="<?php echo $select1['pass']; ?>" >
									<i class="entypo-eye" aria-hidden="true" onclick="myFunction()" style="margin: 0% 0% 0% 100%;"></i>
								</div>
							</div>
							

							<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
							
							
			
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<input type="hidden" name="edit_id" value="<?php echo $select1['id']; ?>">
									<button type="submit" class="btn btn-default" name="create_user">Submit</button>
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