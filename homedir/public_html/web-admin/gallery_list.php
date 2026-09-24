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
$select  = mysqli_query($con,"delete from `gallery` where `id`='".$_REQUEST['d_id']."' ")or die(mysqli_error($con));
?>
<script type="text/javascript">
alert('Delete Successfully');
window.location='gallery_list.php';
</script>
<?php
}

if($_REQUEST['msg']=='updated')
{
$msg ='<center><span style="color:#ff0000;">gallery Updated Successfully<span></center>';
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
		
									<a href="#">Gallery</a>
							</li>
						<li class="active">
		
									<strong>Gallery List</strong>
							</li>
							</ol>



		<h2>Gallery List <span style="float: right;"><a href="create_gallery.php">Add Gallery</a></span></h2>

		<?php
			if(!empty($msg)){ echo $msg;}
			?>
					
			
		<table class="table table-bordered datatable" id="table-4">
			<thead>
				<tr>
					<th>SI No</th>
					<!--<th>Category</th>-->
					<th>Title</th>
					<th>Gallery Image</th>
					<th>Order</th>
					<th>Status</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

				<?php
				//echo "select * from `admin` order by `id` desc ";
				$select  = mysqli_query($con,"select * from `gallery` where `id`!='' order by `id` desc ")or die(mysqli_error($con));
				$i='1';
                while($select1 = mysqli_fetch_array($select))
                {
                /*$category  = mysqli_query($con,"select * from `category` where `id`='".$select1['c_id']."' ")or die(mysqli_error($con));
                $category1 = mysqli_fetch_array($category);*/
                ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<!--<td><?php echo $category1['name']; ?></td>-->
					<td><?php echo $select1['name']; ?></td>
					<td><img src="../gallery/<?php echo $select1['image']; ?>" width="100px" height="100px"></td>
					<td><?php echo $select1['order']; ?></td>
					<td><?php echo $select1['status']; ?></td>
					<td class="center"><?php echo date('d-m-Y',strtotime($select1['c_date'])); ?></td>
					<td class="sorting_1">
						<a href="create_gallery.php?e_id=<?php echo $select1['id']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
							<i class="entypo-pencil"></i>
							Edit
						</a>
						<!--<a href="create_add_image.php?id=<?php echo $select1['id']; ?>" style="padding-left: 10px;" class="btn btn-default btn-sm btn-icon icon-left">
							
							Add Image
						</a>-->
						<?php //if($select1['type']=='1'){ ?>
						<a href="javascript:confirmDelete('gallery_list.php?d_id=<?php echo $select1['id']; ?>')" class="btn btn-danger btn-sm btn-icon icon-left">
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
		
		<br />
		<!-- Footer -->

		<?php include('footer.php'); ?>
		
	</div>

		
	
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