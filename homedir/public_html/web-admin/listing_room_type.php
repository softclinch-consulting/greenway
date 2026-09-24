<?php 
error_reporting(0);
include('config.php'); 
session_start();

if($_SESSION['memid']=='')
{
header('location:index.php');
}

if(isset($_REQUEST['d_id']))
{
$select  = mysqli_query($con,"delete from `listing_room_type` where `id`='".$_REQUEST['d_id']."' ")or die(mysqli_error($con));
?>
<script type="text/javascript">
alert('Delete Successfully');
window.location='listing_room_type.php?l_id=<?php echo $_REQUEST['l_id']; ?>';
</script>
<?php
}

if(isset($_REQUEST['create_admin']))
{

$l_id = $_REQUEST['l_id'];
$r_t_id = $_REQUEST['r_t_id'];
$title = $_REQUEST['title'];
$price = $_REQUEST['price'];
$status = $_REQUEST['status'];
$order = $_REQUEST['order'];
$date = date('Y-m-d h:i:s');

if($_REQUEST['edit_id']=='')
{


$insert = mysqli_query($con,"insert into `listing_room_type`(`l_id`,`r_t_id`,`title`,`price`,`status`,`order`,`date`)values('$l_id','$r_t_id','$title','$price','$status','$order','$date')") or die(mysqli_error($con));


$msg ='<center><span style="color:#ff0000;">room type insert successfully<span></center>';

}
else
{


$update = mysqli_query($con,"update `listing_room_type` set `l_id`='$l_id',`r_t_id`='$r_t_id',`title`='$title',`price`='$price',`status`='$status',`order`='$order' where `id`='".$_REQUEST['edit_id']."' ")or die(mysqli_error($con));

?>
<script type="text/javascript">
alert('Updated Successfully');
window.location='listing_room_type.php?l_id=<?php echo $_REQUEST['l_id']; ?>';
</script>
<?php
}


}

if(isset($_REQUEST['e_id']))
{
$select  = mysqli_query($con,"select * from `listing_room_type` where `id`='".$_REQUEST['e_id']."' ")or die(mysqli_error($con));
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

<script>

function confirmDelete(delUrl) {

  if (confirm("Are you sure you want to delete")) {

    document.location = delUrl;

  }

}

</script>

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
		
									<a href="#">Room Type</a>
							</li>
						<li class="active">
		
									<strong>Create Room Type</strong>
							</li>
							</ol>
					
		<h2>Create Room Type</h2>
		<br />

		    <?php
			if(!empty($msg)){ echo $msg;}
			?>
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							Room Type Info
						</div>

					</div>

					
					<div class="panel-body">
						
					<form role="form" class="form-horizontal form-groups-bordered" action="" method="POST" enctype="multipart/form-data">

						<input type="hidden" name="l_id" value="<?php echo $_REQUEST['l_id']; ?>">


						<div class="form-group">
								<label class="col-sm-3 control-label">Room Type<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<select class="form-control" name="r_t_id" required="required" >
										
						<option value="">Select</option>
                        <?php
                        $room_type = mysqli_query($con,"select * from `room_type` order by `name` asc ")or die(mysqli_error($con));
                        while ($room_type1 = mysqli_fetch_array($room_type)) 
                        {
                        ?>
						<option value="<?php echo $room_type1[id]; ?>" <?php if($select1['r_t_id']==$room_type1['id']){?> selected="selected" <?php } ?> ><?php echo $room_type1['name']; ?></option>
						<?php
					    }
					    ?>
						
									</select>
								</div>
							</div>

							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Title<span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="title" placeholder="Title" required="required" value="<?php echo $select1['title']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Price</label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="price" placeholder="Price" value="<?php echo $select1['price']; ?>">
								</div>
							</div>


								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Order <span style="color:#ee4749">*</span></label>
								
								<div class="col-sm-5">
									<input type="text" class="form-control" id="field-1" name="order" placeholder="order" required="required" value="<?php echo $select1['order']; ?>">
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
		

		<table class="table table-bordered datatable" id="table-4">
			<thead>
				<tr>
					<th>SI No</th>
					<th>Hotel</th>
					<th>Room Type</th>
					<th>Title</th>
					<th>Price</th>
					<th>Status</th>
					<th>Order</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$select  = mysqli_query($con,"select * from `listing_room_type` where `id`!='' and `l_id`='$_REQUEST[l_id]' order by `id` desc ")or die(mysqli_error($con));
				$i='1';
                while($select1 = mysqli_fetch_array($select))
                {
                $listing  = mysqli_query($con,"select * from `listing` where `id`='.$select1[l_id].'")or die(mysqli_error($con));
                $listing1 = mysqli_fetch_array($listing);

              $room_type  = mysqli_query($con,"select * from `room_type` where `id`='.$select1[r_t_id].'")or die(mysqli_error($con));
              $room_type1 = mysqli_fetch_array($room_type);
                ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $listing1['name']; ?></td>
					<td><?php echo $room_type1['name']; ?></td>
					<td><?php echo $select1['title']; ?></td>
					<td><?php echo $select1['price']; ?></td>
					<td><?php echo $select1['status']; ?></td>
					<td><?php echo $select1['order']; ?></td>
					<td class="center"><?php echo date('d-m-Y',strtotime($select1['date'])); ?></td>
					<td class="sorting_1">
						<a href="listing_room_type.php?e_id=<?php echo $select1['id']; ?>&l_id=<?php echo $_REQUEST['l_id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						<?php //if($select1[type]=='1'){ ?>
						<a href="javascript:confirmDelete('listing_room_type.php?d_id=<?php echo $select1['id']; ?>&l_id=<?php echo $_REQUEST['l_id']; ?>')" class="btn btn-danger btn-sm btn-icon icon-left">
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

</body>
</html>