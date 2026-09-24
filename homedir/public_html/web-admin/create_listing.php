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
$name = $_REQUEST['name'];
$meta_title = $_REQUEST['meta_title'];
$meta_key = $_REQUEST['meta_key'];
$meta_desc = $_REQUEST['meta_desc'];
$cat_id = $_REQUEST['cat_id'];
$v_id = $_REQUEST['v_id'];
$sub_cat_id = $_REQUEST['sub_cat_id'];
$tag = $_REQUEST['tag'];
$desc = $_REQUEST['desc'];
$c_id = $_REQUEST['c_id'];
$s_id = $_REQUEST['s_id'];
$l_id = $_REQUEST['l_id'];
$email = $_REQUEST['email'];
$c_code = $_REQUEST['c_code'];
$mobile = $_REQUEST['mobile'];
$c_code1 = $_REQUEST['c_code1'];
$land_line_no = $_REQUEST['land_line_no'];
$website = $_REQUEST['website'];
$fax_no = $_REQUEST['fax_no'];
$address = $_REQUEST['address'];
$facebook_url = $_REQUEST['facebook_url'];
$linkedin_url = $_REQUEST['linkedin_url'];
$twitter_url = $_REQUEST['twitter_url'];
$instagram_url = $_REQUEST['instagram_url'];
$pinterest_url = $_REQUEST['pinterest_url'];
$youtube_url = $_REQUEST['youtube_url'];
$price_range = $_REQUEST['price_range'];
$price_from = $_REQUEST['price_from'];
$price_to = $_REQUEST['price_to'];
$order = $_REQUEST['order'];
$status = $_REQUEST['status'];
$map_link = $_REQUEST['map_link'];
$type ='0';
$c_date = date('Y-m-d h:i:s');

if($_REQUEST['edit_id']=='')
{

$qry_validate = mysqli_query($con,"select * from `listing` where `name`='$name' ") or die(mysqli_error($con));
if(mysqli_num_rows($qry_validate)>0)
{
$msg ='<center><span style="color:#ff0000;">listing already exists<span></center>';
}
else
{

$insert = mysqli_query($con,"insert into `listing`(`name`,`meta_title`,`meta_key`,`meta_desc`,`cat_id`,`v_id`,`sub_cat_id`,`tag`,`desc`,`c_id`,`s_id`,`l_id`,`email`,`c_code`,`mobile`,`c_code1`,`land_line_no`,`website`,`fax_no`,`address`,`facebook_url`,`linkedin_url`,`twitter_url`,`instagram_url`,`pinterest_url`,`youtube_url`,`video_link`,`type`,`order`,`status`,`c_date`,`map_link`)values('$name','$meta_title','$meta_key','$meta_desc','$cat_id','$v_id','$sub_cat_id','$tag','$desc','$c_id','$s_id','$l_id','$email','$c_code','$mobile','$c_code1','$land_line_no','$website','$fax_no','$address','$facebook_url','$linkedin_url','$twitter_url','$instagram_url','$pinterest_url','$youtube_url','$video_link','$type','$order','$status','$c_date','$map_link')") or die(mysqli_error($con));


if($_FILES['logo']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $last.'_'.str_replace(' ','',$_FILES['logo']['name']);

$source_image1 = $_FILES['logo']['tmp_name']; 
	   
$destination1 ='../logo/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `logo`='$imagename1' where `id`='$last'");

}
}

if($_FILES['photo']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $last.'_'.str_replace(' ','',$_FILES['photo']['name']);

$source_image1 = $_FILES['photo']['tmp_name']; 
	   
$destination1 ='../photo/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `photo`='$imagename1' where `id`='$last'");

}
}

if($_FILES['banner']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $last.'_'.str_replace(' ','',$_FILES['banner']['name']);

$source_image1 = $_FILES['banner']['tmp_name']; 
	   
$destination1 ='../banner/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `banner`='$imagename1' where `id`='$last'");

}
}


$msg ='<center><span style="color:#ff0000;">listing insert successfully<span></center>';
}

}
else
{


$update = mysqli_query($con,"update `listing` set `name`='$name',`meta_title`='$meta_title',`meta_key`='$meta_key',`meta_desc`='$meta_desc',`sub_cat_id`='$sub_cat_id',`v_id`='$v_id',`cat_id`='$cat_id',`tag`='$tag',`desc`='$desc',`c_id`='$c_id',`s_id`='$s_id',`l_id`='$l_id',`email`='$email',`c_code`='$c_code',`mobile`='$mobile',`c_code1`='$c_code1',`land_line_no`='$land_line_no',`website`='$website',`fax_no`='$fax_no',`facebook_url`='$facebook_url',`linkedin_url`='$linkedin_url',`twitter_url`='$twitter_url',`instagram_url`='$instagram_url',`pinterest_url`='$pinterest_url',`youtube_url`='$youtube_url',`video_link`='$video_link',`address`='$address',`price_range`='$price_range',`price_from`='$price_from',`price_to`='$price_to',`type`='$type',`order`='$order',`status`='$status',`map_link`='$map_link' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));


if($_FILES['logo']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['logo']['name']);

$source_image1 = $_FILES['logo']['tmp_name']; 
	   
$destination1 ='../logo/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `logo`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}
}

if($_FILES['photo']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['photo']['name']);

$source_image1 = $_FILES['photo']['tmp_name']; 
	   
$destination1 ='../photo/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `photo`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}
}

if($_FILES['banner']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['banner']['name']);

$source_image1 = $_FILES['banner']['tmp_name']; 
	   
$destination1 ='../banner/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `listing` set `banner`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}
}

//$msg ='<center><span style="color:#ff0000;">Admin Updated Successfully<span></center>';
?>
<script type="text/javascript">
//alert('Delete Successfully');
window.location='listing_list.php?msg=updated';
</script>
<?php
}


}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `listing` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
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
		
									<a href="#">Listing</a>
							</li>
						<li class="active">
		
									<strong>Create Listing</strong>
							</li>
							</ol>
					
		<h2>Create Listing <span style="float: right;"><a href="listing_list.php">Listing List</a></span></h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Listing Info
						</div>

					</div>
					
					<div class="panel-body">
						
			<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">



							<div class="form-group">
								<label class="col-sm-3 control-label">Vendor<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="v_id" required="required">
										
						<option value="">Select</option>
                        <?php
    $user_vendor  = mysqli_query($con,"select * from `user_vendor` where `type`='1' order by `name` asc ")or die(mysqli_error($con));
                        while ($user_vendor1 = mysqli_fetch_array($user_vendor)) 
                        {
                        ?>
						<option value="<?php echo $user_vendor1['id']; ?>" <?php if($select1['v_id']==$user_vendor1['id']){?> selected="selected" <?php } ?> ><?php echo $user_vendor1['name']; ?></option>
						<?php
					    }
					    ?>
						
									</select>
								</div>
							</div>



			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Listing Title<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="name" placeholder="Listing Title" required="required" value="<?php echo $select1['name']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Meta Title<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="meta_title" placeholder="Meta Title" required="required" value="<?php echo $select1['meta_title']; ?>">
								</div>
							</div>


                             <div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Meta Keywpord<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="meta_key" placeholder="Meta Keyword" required="required" value="<?php echo $select1['meta_key']; ?>">
								</div>
							</div>


                             <div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Meta Description<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="meta_desc" placeholder="Meta Description" required="required" value="<?php echo $select1['meta_desc']; ?>">
								</div>
							</div>


<script type="text/javascript">
function category(c_id,type)
{

var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById("subcategory_result").innerHTML = "Please wait...";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("subcategory_result").innerHTML = xmlhttp.responseText;
} else {
document.getElementById("subcategory_result").innerHTML = "Error Occurred.";
}
}
xmlhttp.open("GET", "ajax_page.php?c_id=" + c_id + "&type=" + type, false);
xmlhttp.send();
}
</script>

							

							<div class="form-group">
								<label class="col-sm-3 control-label">Category <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="cat_id" required="required" onchange="category(this.value,'category_listing');">
										
						<option value="">Select</option>
                        <?php
                        $category  = mysqli_query($con,"select * from `category` order by `name` asc ")or die(mysqli_error($con));
                        while ($category1 = mysqli_fetch_array($category)) 
                        {
                        ?>
						<option value="<?php echo $category1['id']; ?>" <?php if($select1['cat_id']==$category1['id']){?> selected="selected" <?php } ?> ><?php echo $category1['name']; ?></option>
						<?php
					    }
					    ?>
						
									</select>
								</div>
							</div>


							 <div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Sub Category<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<?php if($_REQUEST['e_id']==''){ ?>
									<span id="subcategory_result">Choose Category</span>
								   <?php } else{ ?>
									<select class="form-control" name="sub_cat_id" id="subcategory_result">
										
<option value="">Select</option>
<?php
$sub_category  = mysqli_query($con,"select * from `sub_category` where `c_id`='.$select1[cat_id].' order by `name` asc ")or die(mysqli_error($con));
while ($sub_category1 = mysqli_fetch_array($sub_category)) 
{
?>
<option value="<?php echo $sub_category1['id']; ?>" <?php if($select1['sub_cat_id']==$sub_category1['id']){?> selected="selected" <?php } ?> ><?php echo $sub_category1['name']; ?></option>
<?php
}
?>
</select>
<?php } ?>
								</div>
							</div>



							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Tagline <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="tag" placeholder="Tagline" required="required" value="<?php echo $select1['tag']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Description <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">

									<textarea name="desc" class="form-control ckeditor" placeholder="Description" required="required"><?php echo $select1['desc']; ?></textarea>
								</div>
							</div>
							

							

							<div class="form-group" style="display: none;">
								<label for="field-1" class="col-sm-3 control-label">Video Link</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="link" placeholder="Video Link" value="<?php echo $select1['link']; ?>">
								</div>
							</div>


								<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Order <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" id="field-1" name="order" placeholder="Order" required="required" value="<?php echo $select1['order']; ?>">
								</div>
							</div>-->




							<div class="form-group">
								<label class="col-sm-3 control-label">Status <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="status" required="required">
										
						<option value="Active" <?php if($select1['status']=='Active'){?> selected="selected" <?php } ?> >Active</option>
						<option value="Pending" <?php if($select1['status']=='Pending'){?> selected="selected" <?php } ?> >Pending</option>
									</select>
								</div>
							</div>


							<div class="panel-heading">
						<div class="panel-title">
							   Google Map
						</div>

					</div>	


					<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Map Link <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									
									<!--<input type="text" class="form-control" id="field-1" name="map_link" placeholder="Map Link" value="<?php echo $select1['map_link']; ?>">-->

									<textarea name="map_link" class="form-control" placeholder="Map Link"><?php echo $select1['map_link']; ?></textarea>

								</div>
							</div>



							<div class="panel-heading">
						<div class="panel-title">
							 Location Information
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
									<?php if($_REQUEST[e_id]==''){ ?>
									<span id="state_result">Choose contry</span>
								   <?php } else{ ?>
									<select class="form-control" name="s_id" id="state_result" required="required">
										
<option value="">Select</option>
<?php
$state  = mysqli_query($con,"select * from `state` where `c_id`='$select1[c_id]' order by `name` asc ")or die(mysqli_error($con));
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
$location  = mysqli_query($con,"select * from `location` where `s_id`='.$select1[s_id].' order by `name` asc ")or die(mysqli_error($con));
while ($location1 = mysqli_fetch_array($location)) 
{
?>
<option value="<?php echo $location1['id']; ?>" <?php if($select1['l_id']==$location1['id']){?> selected="selected" <?php } ?> ><?php echo $location1['name']; ?></option>
<?php
}
?>
</select>
<?php } ?>
								</div>
							</div>
							
							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Location <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="l_id" placeholder="Location" required="required" value="<?php echo $select1['l_id']; ?>">
								</div>
							</div>-->


								<div class="panel-heading">
						<div class="panel-title">
							 Business Information
						</div>

					</div>	


					<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Email <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="email" class="form-control" id="field-1" name="email" placeholder="Email" required="required" value="<?php echo $select1['email']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Mobile <span style="color:#ee4749">*</span></label>


								<div class="col-sm-2">
									<select class="form-control" name="c_code" required="required">
						<option value="">Country Code</option>
						<option value="+91" <?php if($select1['c_code']=='+91'){?> selected="selected" <?php } ?> >+91</option>
						<option value="+673" <?php if($select1['c_code']=='+673'){?> selected="selected" <?php } ?> >+673</option>
									</select>
								</div>
								
								<div class="col-sm-3">
									<input type="number" class="form-control" id="field-1" name="mobile" placeholder="Mobile" required="required" value="<?php echo $select1['mobile']; ?>" min="0">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Land Line Number</label>

								<div class="col-sm-2">
									<select class="form-control" name="c_code1" >
						<option value="">Country Code</option>
						<option value="044" <?php if($select1['c_code']=='044'){?> selected="selected" <?php } ?> >044</option>
						<option value="+673" <?php if($select1['c_code']=='+673'){?> selected="selected" <?php } ?> >+673</option>
									</select>
								</div>
								
								<div class="col-sm-3">
									<input type="number" class="form-control" id="field-1" name="land_line_no" placeholder="Land Line Number" value="<?php echo $select1['land_line_no']; ?>" min="0">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Website</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="website" placeholder="Website" value="<?php echo $select1['website']; ?>">
								</div>
							</div>

							<!--<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Fax No <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="fax_no" placeholder="Fax No" required="required" value="<?php echo $select1['fax_no']; ?>">
								</div>
							</div>-->

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Address <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="address" placeholder="Address" required="required" value="<?php echo $select1['address']; ?>">
								</div>
							</div>


							<div class="panel-heading">
						<div class="panel-title">
							  Social Account
						</div>

					</div>	


					<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Facebook URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="facebook_url" placeholder="Facebook URL" value="<?php echo $select1['facebook_url']; ?>">
								</div>
							</div>


							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">LinkedIn URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="linkedin_url" placeholder="LinkedIn URL" value="<?php echo $select1['linkedin_url']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Twitter URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="twitter_url" placeholder="Twitter URL" value="<?php echo $select1['twitter_url']; ?>">
								</div>
							</div>

							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Instagram URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="instagram_url" placeholder="Instagram URL" value="<?php echo $select1['instagram_url']; ?>">
								</div>
							</div>


								<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Pinterest URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="pinterest_url" placeholder="Pinterest URL" value="<?php echo $select1['pinterest_url']; ?>">
								</div>
							</div>

							<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Youtube URL <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="youtube_url" placeholder="Youtube URL" value="<?php echo $select1['youtube_url']; ?>">
								</div>
							</div>
							

							<div class="panel-heading">
						<div class="panel-title">
							   Video Link
						</div>

					</div>	


					<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Video Link <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="video_link" placeholder="Video Link" value="<?php echo $select1['video_link']; ?>">
								</div>
							</div>



							<div class="panel-heading">
						<div class="panel-title">
							   Images
						</div>

					</div>	


					<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Listing Logo <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="logo" placeholder="Listing Logo" value="<?php echo $select1['logo']; ?>">
								</div>
							</div>

							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Listing Photo <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="photo" placeholder="Listing Photo" value="<?php echo $select1['photo']; ?>">
								</div>
							</div>


							<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Listing Banner <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="banner" placeholder="Listing Banner" value="<?php echo $select1['banner']; ?>">
								</div>
							</div>



							


							<div class="panel-heading">
						<div class="panel-title">
							     Price Range
						</div>

					</div>	


					<div class="form-group">
						
						       <div class="col-sm-4">

									<!--<input type="text" class="form-control" id="field-1" name="order" placeholder="Price Range" required="required" value="<?php echo $select1[order]; ?>">-->

									<select class="form-control" name="price_range">
										<option value="">Price Range</option>
						<option value="$" <?php if($select1['status']=='$'){?> selected="selected" <?php } ?> >$</option>
						<option value="$$" <?php if($select1['status']=='$$'){?> selected="selected" <?php } ?> >$$</option>
						<option value="$$$" <?php if($select1['status']=='$$$'){?> selected="selected" <?php } ?> >$$$</option>
						<option value="$$$$" <?php if($select1['status']=='$$$$'){?> selected="selected" <?php } ?> >$$$$</option>
						<option value="$$$$$" <?php if($select1['status']=='$$$$$'){?> selected="selected" <?php } ?> >$$$$$</option>
									</select>

								</div>
								
								<div class="col-sm-4">
									<input type="number" class="form-control" id="field-1" name="price_from" placeholder="Price From ($)" value="<?php echo $select1['price_from']; ?>" min="0">
								</div>

								<div class="col-sm-4">
									<input type="number" class="form-control" id="field-1" name="price_to" placeholder="Price To ($)"  value="<?php echo $select1['price_to']; ?>" min="0">
								</div>
							</div>




							<!--<div class="panel-heading">
						<div class="panel-title">
							      Add Pricing
						</div>

					</div>	


					<div class="form-group">
						
						       <div class="col-sm-4">
									<input type="text" class="form-control" id="field-1" name="order" placeholder="Title" required="required" value="<?php echo $select1['order']; ?>">
								</div>
								
								<div class="col-sm-4">
									<input type="text" class="form-control" id="field-1" name="order" placeholder="Description" required="required" value="<?php echo $select1['order']; ?>">
								</div>

								<div class="col-sm-4">
									<input type="text" class="form-control" id="field-1" name="order" placeholder="Price" required="required" value="<?php echo $select1['order']; ?>">
								</div>
							</div>-->
							
			
							
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