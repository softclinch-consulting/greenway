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
$a_id = $_REQUEST['a_id'];
$type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$type_image = $_REQUEST['type_image'];
$desc = $_REQUEST['desc'];
$order = $_REQUEST['order'];
$link = $_REQUEST['link'];
$status = $_REQUEST['status'];
$c_date = date('Y-m-d h:i:s');

if($_REQUEST['edit_id']=='')
{

$insert = mysqli_query($con,"insert into `add_article`(`a_id`,`type`,`type_image`,`name`,`desc`,`link`,`order`,`status`,`c_date`)values('$a_id','$type','$type_image','$name','$desc','$link','$order','$status','$c_date')") or die(mysqli_error($con));

$last = mysqli_insert_id($con);		
		
if($_FILES['image']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $last.'_'.str_replace(' ','',$_FILES['image']['name']);

$source_image1 = $_FILES['image']['tmp_name']; 

mkdir("../add_article/", 0755);
	   
$destination1 ='../add_article/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `add_article` set `image`='$imagename1' where `id`='$last'");

}
}

if($_FILES['document']['tmp_name'])
{


$imagename1 = $last.'_'.str_replace(' ','',$_FILES['document']['name']);

$source_image1 = $_FILES['document']['tmp_name']; 

mkdir("../add_article/", 0755);
	   
$destination1 ='../add_article/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `add_article` set `document`='$imagename1' where `id`='$last'");

}

$msg ='<center><span style="color:#ff0000;">article insert successfully<span></center>';
}
else
{


$update = mysqli_query($con,"update `add_article` set `a_id`='$a_id',`type`='$type',`type_image`='$type_image',`name`='$name',`desc`='$desc',`link`='$link',`order`='$order',`status`='$status' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));

if($_FILES['image']['tmp_name'])
{

$fil_type = $_FILES['image']['type'];
if($file_type != "image/jpeg" || $file_type != "image/png")
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['image']['name']);

$source_image1 = $_FILES['image']['tmp_name']; 

mkdir("../add_article/", 0755);
	   
$destination1 ='../add_article/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `add_article` set `image`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}
}

if($_FILES['document']['tmp_name'])
{

$imagename1 = $_REQUEST['edit_id'].'_'.str_replace(' ','',$_FILES['document']['name']);

$source_image1 = $_FILES['document']['tmp_name']; 

mkdir("../add_article/", 0755);
	   
$destination1 ='../add_article/'.$imagename1;
	        
move_uploaded_file($source_image1,$destination1);

mysqli_query($con,"update `add_article` set `document`='$imagename1' where `id`='".$_REQUEST['edit_id']."'");

}

//$msg ='<center><span style="color:#ff0000;">Admin Updated Successfully<span></center>';
?>
<script type="text/javascript">
//alert('Delete Successfully');
window.location='add_article.php?msg=updated&a_id=<?php echo $_REQUEST['a_id']; ?>&type=<?php echo $_REQUEST['type']; ?>';
</script>
<?php
}


}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `add_article` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
$select1 = mysqli_fetch_array($select);
}

if(isset($_REQUEST['d_id']))
{
$select  = mysqli_query($con,"delete from `add_article` where `id`='".$_REQUEST['d_id']."' ")or die(mysqli_error($con));
?>
<script type="text/javascript">
alert('Delete Successfully');
window.location='add_article.php?a_id=<?php echo $_REQUEST['a_id']; ?>&type=<?php echo $_REQUEST['type']; ?>';
</script>
<?php
}

if($_REQUEST['msg']=='updated')
{
$msg ='<center><span style="color:#ff0000;">article Updated Successfully<span></center>';
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
		
									<a href="#">Article</a>
							</li>
						<li class="active">
		
									<strong>Create Article</strong>
							</li>
							</ol>
					
		<h2>Create Article <span style="float: right;"><a href="article_list.php">Article List</a></span></h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Article Info
						</div>

					</div>
					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">
                          
                          <input type="hidden" name="a_id" required="required" value="<?php echo $_REQUEST['a_id']; ?>">
                          <input type="hidden" name="type" required="required" value="<?php echo $_REQUEST['type']; ?>">
						  
						  
						  <?php if($_REQUEST['type']=='image'){?>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Type<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="type_image">
										
						<option value="Image" <?php if($select1['type_image']=='Image'){?> selected="selected" <?php } ?> >Image</option>
						<option value="Product" <?php if($select1['type_image']=='Product'){?> selected="selected" <?php } ?> >Product</option>
						<option value="Training Categories" <?php if($select1['type_image']=='Training Categories'){?> selected="selected" <?php } ?> >Training Categories</option>
						<option value="Training" <?php if($select1['type_image']=='Training'){?> selected="selected" <?php } ?> >Training</option>
						<option value="Free Webiner" <?php if($select1['type_image']=='Free Webiner'){?> selected="selected" <?php } ?> >Free Webiner</option>
						<option value="Master Silks Development Centre" <?php if($select1['type_image']=='Master Silks Development Centre'){?> selected="selected" <?php } ?> >Master Silks Development Centre</option>
						<option value="End Effertor/Accessories" <?php if($select1['type_image']=='End Effertor/Accessories'){?> selected="selected" <?php } ?> >End Effertor/Accessories</option>
						<option value="Application" <?php if($select1['type_image']=='Application'){?> selected="selected" <?php } ?> >Application</option>
						<option value="Logo" <?php if($select1['type_image']=='Logo'){?> selected="selected" <?php } ?> >Logo</option>
						<option value="Safty" <?php if($select1['type_image']=='Safty'){?> selected="selected" <?php } ?> >Safty</option>
						
						<option value="Semi-con Machine" <?php if($select1['type_image']=='Semi-con Machine'){?> selected="selected" <?php } ?> >Semi-con Machine</option>
						<option value="Automotive Machine" <?php if($select1['type_image']=='Automotive Machine'){?> selected="selected" <?php } ?> >Automotive Machine</option>
						<option value="General Machine" <?php if($select1['type_image']=='General Machine'){?> selected="selected" <?php } ?> >General Machine</option>
						<option value="Switch Cabinet Builder" <?php if($select1['type_image']=='Switch Cabinet Builder'){?> selected="selected" <?php } ?> >Switch Cabinet Builder</option>
						<option value="Commercial Equipment" <?php if($select1['type_image']=='Commercial Equipment'){?> selected="selected" <?php } ?> >Commercial Equipment</option>
						
						<option value="Safety consulting services" <?php if($select1['type_image']=='Safety consulting services'){?> selected="selected" <?php } ?> >Safety consulting services</option>

									</select>
								</div>
							</div>
                           <?php } ?>

			
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Title <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="name" required="required" placeholder="Title" value="<?php echo $select1['name']; ?>">
								</div>
							</div>

                           <?php if($_REQUEST['type']=='content' || $_REQUEST['type']=='image'){?>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Description<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-9">				
	                            <textarea name="desc" class="form-control ckeditor" placeholder="Description" required="required"><?php echo $select1['desc']; ?></textarea>
								</div>
							</div>
                           <?php } ?>

                            
                            
                            <?php if($_REQUEST['type']=='image' || $_REQUEST['type']=='document' || $_REQUEST['type']=='video'){?>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Image <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="image" value="<?php echo $select1['image']; ?>">
								</div>
							</div>
							<?php } ?>

							<?php if($_REQUEST['type']=='document'){?>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Document <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="file" class="form-control" id="field-1" name="document" value="<?php echo $select1['document']; ?>">
								</div>
							</div>
							<?php } ?>

							<?php if($_REQUEST['type']=='video'){?>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Video Link <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="link" value="<?php echo $select1['link']; ?>" placeholder="Video link">
								</div>
							</div>
							<?php } ?>
						

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Order <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="number" class="form-control" id="field-1" name="order" placeholder="order"  value="<?php echo $select1['order']; ?>" min="0">
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label">Status <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="status">
										
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


		<table class="table table-bordered datatable" id="table-4">
			<thead>
				<tr>
					<th>SI No</th>
					<th>Type</th>
					<th>Article Category</th>
					<th>Article Name</th>
					<th>Name</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				//echo "select * from `admin` order by `id` desc ";
				$select  = mysqli_query($con,"select * from `add_article` where `a_id`='".$_REQUEST['a_id']."' and `type`='".$_REQUEST['type']."' order by `id` desc ")or die(mysqli_error($con));
				$i='1';
        while($select1 = mysqli_fetch_array($select))
        {
        $article  = mysqli_query($con,"select * from `article` where `id`='".$select1['a_id']."' ")or die(mysqli_error($con));
        $article1 = mysqli_fetch_array($article);

        $article_cat  = mysqli_query($con,"select * from `article` where `id`='".$article1['type']."' ")or die(mysqli_error($con));
        $article_cat1 = mysqli_fetch_array($article_cat);
        ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $select1['type']; ?></td>
					<td><?php echo $article_cat1['name']; ?></td>
					<td><?php echo $article1['name']; ?></td>
					<td><?php echo $select1['name']; ?></td>
					<td class="center"><?php echo date('d-m-Y',strtotime($select1['c_date'])); ?></td>
					<td class="sorting_1">
						<a href="add_article.php?e_id=<?php echo $select1['id']; ?>&a_id=<?php echo $_REQUEST['a_id']; ?>&type=<?php echo $_REQUEST['type']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						<?php //if($select1[type]=='1'){ ?>
						<a href="javascript:confirmDelete('add_article.php?d_id=<?php echo $select1['id']; ?>&a_id=<?php echo $_REQUEST['a_id']; ?>&type=<?php echo $_REQUEST['type']; ?>')" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a>
					    <?php //} ?>
						
						<?php if(1!=1) { ?>
						<a href="#" class="btn btn-info btn-sm btn-icon icon-left">
							<i class="entypo-info"></i>
							Profile
						</a>
						<?php
					    }
						?>
					</td>
				</tr>
				<?php
			     
			     $i++;
			     }
			    ?>								
			</tbody>
			
		</table>
		
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				var table = $("#table-4").dataTable({
					"sPaginationType": "bootstrap",
					"sDom": "<'row'<'col-xs-6 col-left'l><'col-xs-6 col-right'<>f>r>t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
					"oTableTools": {
					},
					
				});
			});
				
		</script>
		
		
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


    <script src="assets/js/ckeditor/ckeditor.js"></script>
	<script src="assets/js/ckeditor/adapters/jquery.js"></script>

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css">
	<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="assets/js/select2/select2.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/datatables/TableTools.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/dataTables.bootstrap.js"></script>
	<script src="assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
	<script src="assets/js/datatables/lodash.min.js"></script>
	<script src="assets/js/datatables/responsive/js/datatables.responsive.js"></script>
	<script src="assets/js/select2/select2.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

<script>

function confirmDelete(delUrl) {

  if (confirm("Are you sure you want to delete")) {

    document.location = delUrl;

  }

}

</script>


</body>
</html>