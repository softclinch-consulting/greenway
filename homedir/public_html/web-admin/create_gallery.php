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
$order = $_REQUEST['order'];
$status = $_REQUEST['status'];
$c_date = date('Y-m-d h:i:s');

if($_REQUEST['edit_id']=='')
{

$qry_validate = mysqli_query($con,"select * from `gallery` where `name`='$name' ") or die(mysqli_error($con));
if(mysqli_num_rows($qry_validate)>0)
{
$msg ='<center><span style="color:#ff0000;">gallery Already Exists<span></center>';
}
else
{

$insert = mysqli_query($con,"insert into `gallery`(`name`,`order`,`status`,`c_date`)values('$name','$order','$status','$c_date')") or die(mysqli_error($con));

$last = mysqli_insert_id($con);		
		
if($_FILES['image']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $last.'_'.str_replace(' ','',$_FILES['image']['name']);

$source_image1 = $_FILES['image']['tmp_name']; 

mkdir("../gallery/", 0755);
	   
$destination1 ='../gallery/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `gallery` set `image`='$imagename1' where `id`='$last'");

}
}


$msg ='<center><span style="color:#ff0000;">Gallery Insert Successfully<span></center>';
}

}
else
{


$update = mysqli_query($con,"update `gallery` set `name`='$name',`order`='$order',`status`='$status' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));

if($_FILES['image']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['image']['name']);

$source_image1 = $_FILES['image']['tmp_name'];

mkdir("../gallery/", 0755); 
	   
$destination1 ='../gallery/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `gallery` set `image`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}
}


//$msg ='<center><span style="color:#ff0000;">Admin Updated Successfully<span></center>';
?>
<script type="text/javascript">
//alert('Delete Successfully');
window.location='gallery_list.php?msg=updated';
</script>
<?php
}


}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `gallery` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
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
		
									<a href="#">Gallery</a>
							</li>
						<li class="active">
		
									<strong>Create Gallery</strong>
							</li>
							</ol>
					
		<h2>Create Gallery <span style="float: right;"><a href="gallery_list.php">Gallery List</a></span></h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							gallery Info
						</div>

					</div>

<script type="text/javascript">
function category(c_id,type)
{

//alert(c_id);

//alert(type);

var xmlhttp;
if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp = new XMLHttpRequest();
} else { // for IE6, IE5
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState != 4 && xmlhttp.status == 200) {
document.getElementById("sub_cat").innerHTML = "Please wait...";
} else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("sub_cat").innerHTML = xmlhttp.responseText;
} else {
document.getElementById("sub_cat").innerHTML = "Error Occurred.";
}
}
xmlhttp.open("GET", "ajax_page.php?c_id=" + c_id + "&type=" + type, false);
xmlhttp.send();
}
</script>
					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">


							<!--<div class="form-group">
								<label class="col-sm-3 control-label">Category <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
								<select class="form-control" name="c_id"  onchange="category(this.value,'category');">
										
						<option value="">Select</option>
                        <?php
                        $category  = mysqli_query($con,"select * from `category` order by `name` asc ")or die(mysqli_error($con));
                        while ($category1 = mysqli_fetch_array($category)) 
                        {
                        ?>
						<option value="<?php echo $category1['id']; ?>" <?php if($select1['c_id']==$category1['id']){?> selected="selected" <?php } ?> ><?php echo $category1['name']; ?></option>
						<?php
					    }
					    ?>
						
									</select>
								</div>
							</div>-->

			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Title <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="name" placeholder="Title" required="required" value="<?php echo $select1['name']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Image <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="image" <?php if($select1['image']=='') { ?> required="required" <?php } ?> value="<?php echo $select1['image']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Order <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" id="field-1" name="order" placeholder="order" required="required" value="<?php echo $select1['order']; ?>" min="0">
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