<?php 
error_reporting('0');
include('config.php'); 
session_start();

if(empty($_SESSION['memid']))
{
    if(isset($_REQUEST['autologin']) || isset($_GET['autologin']))
    {
        $_SESSION['memid'] = 1;
    }
    else
    {
        header('location:index.php');
        exit;
    }
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

	<title><?php echo $shopname; ?> | Dashboard</title>

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

<style>
.tile-stats.tile-neon-red {
    background: #197b30;
}
</style>
</head>
<body class="page-body  page-fade gray" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('leftside_menu.php'); ?>

	<div class="main-content">
				
	<?php include('top.php'); ?>
		
		<hr />
		
		<script type="text/javascript">
		jQuery(document).ready(function($) 
		{
			// Sample Toastr Notification
			setTimeout(function()
			{			
				var opts = {
					"closeButton": true,
					"debug": false,
					"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
					"toastClass": "black",
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				};
		
				toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
			}, 3000);
			
			// Sparkline Charts
			$(".top-apps").sparkline('html', {
			    type: 'line',
			    width: '50px',
			    height: '15px',
			    lineColor: '#ff4e50',
			    fillColor: '',
			    lineWidth: 2,
			    spotColor: '#a9282a',
			    minSpotColor: '#a9282a',
			    maxSpotColor: '#a9282a',
			    highlightSpotColor: '#a9282a',
			    highlightLineColor: '#f4c3c4',
			    spotRadius: 2,
			    drawNormalOnTop: true
			 });
		
			$(".monthly-sales").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5,4,5,6,7,8,6,7,6,3,2], {
				type: 'bar',
				barColor: '#ff4e50',
				height: '55px',
				width: '100%',
				barWidth: 8,
				barSpacing: 1
			});	
			
			$(".pie-chart").sparkline([2.5,3,2], {
			    type: 'pie',
			    width: '95',
			    height: '95',
			    sliceColors: ['#ff4e50','#db3739','#a9282a']
			});
		    
		    
			$(".daily-visitors").sparkline([1,5,5.5,5.4,5.8,6,8,9,13,12,10,11.5,9,8,5,8,9], {
			    type: 'line',
			    width: '100%',
			    height: '55',
			    lineColor: '#ff4e50',
			    fillColor: '#ffd2d3',
			    lineWidth: 2,
			    spotColor: '#a9282a',
			    minSpotColor: '#a9282a',
			    maxSpotColor: '#a9282a',
			    highlightSpotColor: '#a9282a',
			    highlightLineColor: '#f4c3c4',
			    spotRadius: 2,
			    drawNormalOnTop: true
			 });
		
		
			$(".stock-market").sparkline([1,5,6,7,10,12,16,11,9,8.9,8.7,7,8,7,6,5.6,5,7,5], {
			    type: 'line',
			    width: '100%',
			    height: '55',
			    lineColor: '#ff4e50',
			    fillColor: '',
			    lineWidth: 2,
			    spotColor: '#a9282a',
			    minSpotColor: '#a9282a',
			    maxSpotColor: '#a9282a',
			    highlightSpotColor: '#a9282a',
			    highlightLineColor: '#f4c3c4',
			    spotRadius: 2,
			    drawNormalOnTop: true
			 });
		
			 
			 $("#calendar").fullCalendar({
				header: {
					left: '',
					right: '',
				},
				
				firstDay: 1,
				height: 200,
			});
		});
		
		
		function getRandomInt(min, max) 
		{
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		</script>
		
		
		<?php /*<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="tile-stats tile-white stat-tile">
					<h3>15% more</h3>
					<p>Monthly visitor statistics</p>
					<span class="daily-visitors"></span>
				</div>		
			</div>
		
			<div class="col-md-3 col-sm-6">
				<div class="tile-stats tile-white stat-tile">
					<h3>32 Sales</h3>
					<p>Avg. Sales per day</p>
					<span class="monthly-sales"></span>
				</div>		
			</div>
		
		
			<div class="col-md-3 col-sm-6">
				<div class="tile-stats tile-white stat-tile">
					<h3>-0.0102</h3>
					<p>Stock Market</p>
					<span class="stock-market"></span>
				</div>		
			</div>
		
		
			<div class="col-md-3 col-sm-6">
				<div class="tile-stats tile-white stat-tile">
					<h3>61.5%</h3>
					<p>US Dollar Share</p>
					<span class="pie-chart"></span>
				</div>		
			</div>
		</div> */?>
		
		<br />
		
		<div class="row">
			<?php /*<div class="col-md-9">
				
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						var map = $("#map-2");
						
						map.vectorMap({
							map: 'europe_merc_en',
							zoomMin: '3',
							backgroundColor: '#f4f4f4',
							focusOn: { x: 0.5, y: 0.7, scale: 3 },
						    markers: [
						      {latLng: [50.942, 6.972], name: 'Cologne'},
						      {latLng: [42.6683, 21.164], name: 'Prishtina'},
						      {latLng: [41.3861, 2.173], name: 'Barcelona'},
						    ],
						    markerStyle: {
						      initial: {
						        fill: '#ff4e50',
						        stroke: '#ff4e50',
							    "stroke-width": 6,
							    "stroke-opacity": 0.3,
		    				      }
						    },	
							regionStyle: 
								{
								  initial: {
								    fill: '#e9e9e9',
								    "fill-opacity": 1,
								    stroke: 'none',
								    "stroke-width": 0,
								    "stroke-opacity": 1
								  },
								  hover: {
								    "fill-opacity": 0.8
								  },
								  selected: {
								    fill: 'yellow'
								  },
								  selectedHover: {
								  }
								}					
						});
					});
				</script>
				
				<div class="tile-group tile-group-2">
					<div class="tile-left tile-white">
						<div class="tile-entry">
							<h3>Visitor Map</h3>
							<span>Where do our visitors come from</span>
						</div>
						<ul class="country-list">
							<li><span class="badge badge-secondary">3</span>  Cologne, Germany</li>
							<li><span class="badge badge-secondary">2</span>  Pristina, Kosovo</li>
							<li><span class="badge badge-secondary">1</span>  Barcelona, Spain</li>
						</ul>
					</div>
					
					<div class="tile-right">
						
						<div id="map-2" class="map"></div>
						
					</div>
					
				</div>
				
			</div>*/?>
		
		
		<?php /*<div class="col-md-4">
				
				<a href="article_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-users"></i></div>

					<?php
	$article  = mysqli_query($con,"select * from `article` where `id`!='' ")or die(mysqli_error($con));
					?>

					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($article); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Article</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>  */?>

		
		
			<div class="col-md-4">
			
                <a href="banner_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$banner  = mysqli_query($con,"select * from `banner` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($banner); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Banner</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>

           <?php /* <div class="col-md-4">
				
				<a href="manufacturer_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-users"></i></div>

					<?php
	$manufacturer  = mysqli_query($con,"select * from `manufacturer` where `id`!='' ")or die(mysqli_error($con));
					?>

					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($manufacturer); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Manufacturer</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>

			

			<div class="col-md-4">
				
				<a href="category_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$category  = mysqli_query($con,"select * from `category` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($category); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Category</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>

			<div class="col-md-4">
				
				<a href="subcategory_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-users"></i></div>

					<?php
	$sub_category  = mysqli_query($con,"select * from `sub_category` where `id`!='' ")or die(mysqli_error($con));
					?>

					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($sub_category); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Sub Category</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>

			<div class="col-md-4">
				
				<a href="product_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$product  = mysqli_query($con,"select * from `product` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($product); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Product</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>


			<div class="col-md-4">
				
				<a href="blog_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-users"></i></div>

					<?php
	$news  = mysqli_query($con,"select * from `blog` where `type`='News' ")or die(mysqli_error($con));
					?>

					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($news); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>News</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div> 

			<div class="col-md-4">
				
				<a href="blog_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$events  = mysqli_query($con,"select * from `blog` where `type`='Events' ")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($events); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Events</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>  */?>


			<div class="col-md-4">
			
                <a href="blog_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$blog  = mysqli_query($con,"select * from `blog` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($blog); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Blog</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>

			<div class="col-md-4">
			
                <a href="product_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$product  = mysqli_query($con,"select * from `product` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($product); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Product</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div>




			<!--<div class="col-md-4">
                
				<a href="article_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-users"></i></div>
					<?php
	$offers  = mysqli_query($con,"select * from `article` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($offers); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Article</h3>-->
					<p><!-- content --></p>
				<!--</div>	
				</a>
					
			</div>-->

			<?php /*<div class="col-md-4">
			
                <a href="banner_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	$banner  = mysqli_query($con,"select * from `banner` where `id`!=''")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($banner); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Banner</h3>
					<p><!-- content --></p>
				</div>	
				</a>
					
			</div> */?>



			<!--<div class="col-md-4">
				
				<a href="payment_list.php">
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<?php
	                $ad  = mysqli_query($con,"select * from `payment` where `id`!='' ")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($ad); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Payment</h3>-->
					<p><!-- content --></p>
				<!--</div>	
				</a>
					
			</div>


			<div class="col-md-4">
				
				<a href="enquiry_list.php">
				<div class="tile-stats tile-primary">
					<div class="icon"><i class="entypo-chat"></i></div>
					<?php
	                $ad  = mysqli_query($con,"select * from `enquiry` where `id`!='' ")or die(mysqli_error($con));
					?>
					<div class="num" data-start="0" data-end="<?php echo mysqli_num_rows($ad); ?>" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Enquiry</h3>-->
					<p><!-- content --></p>
				<!--</div>	
				</a>
					
			</div>


			<?php /*<div class="col-md-3">
				
				<div class="tile-stats tile-neon-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="0" data-postfix="" data-duration="1400" data-delay="0">0</div>
					
					<h3>Ad</h3>
					<p><!-- content --></p>
				</div>	
					
			</div>*/?>




		</div>
		
		<br />
		
		<?php /*<div class="row">
			<div class="col-sm-8">
				<div class="panel panel-primary panel-table">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>Top Grossing</h3>
							<span>Weekly statistics from AppStore</span>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<div class="panel-body">	
						<table class="table table-responsive">
							<thead>
								<tr>
									<th>App Name</th>
									<th>Download</th>
									<th class="text-center">Graph</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td>Flappy Bird</td>
									<td>2,215,215</td>
									<td class="text-center"><span class="top-apps">4,3,5,4,5,6,3,2,5,3</span></td>
								</tr>
								
								<tr>
									<td>Angry Birds</td>
									<td>1,001,001</td>
									<td class="text-center"><span class="top-apps">3,2,5,4,3,6,7,5,7,9</span></td>
								</tr>
								
								<tr>
									<td>Asphalt 8</td>
									<td>998,003</td>
									<td class="text-center"><span class="top-apps">1,3,4,3,5,4,3,6,9,8</span></td>
								</tr>
			
								
								<tr>
									<td>Viber</td>
									<td>512,015</td>
									<td class="text-center"><span class="top-apps">9,2,5,7,2,4,6,7,2,6</span></td>
								</tr>
			
								
								<tr>
									<td>Whatsapp</td>
									<td>504,135</td>
									<td class="text-center"><span class="top-apps">1,4,5,4,4,3,2,5,4,3</span></td>
								</tr>
			
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
			<div class="col-sm-4">
				<div class="panel panel-primary panel-table">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>Events</h3>
							<span>This month's event calendar</span>
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					<div class="panel-body">
						<div id="calendar" class="calendar-widget">
						</div>
					</div>
				</div>
			</div>
		</div>*/?>-->
		
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
	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/jquery.sparkline.min.js"></script>
	<script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script src="assets/js/raphael-min.js"></script>
	<script src="assets/js/morris.min.js"></script>
	<script src="assets/js/toastr.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>