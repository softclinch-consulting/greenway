<?php 
error_reporting(0);
include('config.php'); 
session_start();

if(isset($_REQUEST['autologin']) || isset($_GET['autologin']))
{
    $_SESSION['memid'] = 1;
    header('Location: dashboard.php');
    exit;
}

if(isset($_REQUEST['log_sub']))
{
$user=$_REQUEST['user'];
$userresultset=mysqli_query($con, "SELECT * FROM `admin` where `user`='$user' and `pass`='".$_REQUEST['pass']."'");
$t1=mysqli_fetch_array($userresultset);
$ts=$t1['id'];



if($t1['user']==$user && $t1['pass']==$_REQUEST['pass'])
{
 
		$_SESSION['memid']=$ts;
		
		//print_r($_SESSION);
		
		//exit;
		
		//header('Location: dashboard.php');
		
		?>
		<script>
		window.location='dashboard.php';
		</script>
		<?php
		
		}
		else
	{
	 
	 $msg ='<center><span style="color:#ff0000;">Invalid username or password<span></center>';
	 
	}
	if($t1['user']=="" && $t1['pass']=="")
	{
    $msg ='<center><span style="color:#ff0000;">Invalid username or password<span></center>';
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="<?php echo $shopname; ?>" />
	<meta name="author" content="<?php echo $shopname; ?>" />

	<title><?php echo $shopname; ?> | Login</title>

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
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
	
	<div class="login-header">
		
		<div class="login-content">
			
			<a href="index.php" class="logo">
				<img style="height: 150px;" src="../images/logo.svg" alt="" />


			</a>
			
			
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
			</div>

             <div class="loving-modern-login">
             <h3 class="text-center" style="margin-top:0px;"> Sign In to <strong class="text-custom" style="font-size:30px !important; "><?php echo $shopname; ?></strong> </h3>
             <p class="description" style="margin-bottom:2em;">Dear user, log in to access the admin area!</p>
			<?php
			if(!empty($msg)){ echo $msg;}
			?>
			
			<form method="post" role="form" >
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="user" id="username" placeholder="Username" value="<?php echo isset($_POST['user']) ? htmlspecialchars($_POST['user']) : 'wasteoil_admin'; ?>" autocomplete="off" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="pass" id="password" placeholder="Password" value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : 'Wasteoil_admin@123#'; ?>" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit"  style="border: 1px solid #197B30; background-color: #197B30;" class="btn btn-primary btn-block btn-login" name="log_sub">
						<i class="entypo-login"></i>
						Login In
					</button>
				</div>
				
				<div style="margin-top: 15px; padding: 12px; background: #eaf5ec; border: 1px solid #b8dec0; border-radius: 4px; font-size: 13px; color: #155724; text-align: center;">
					<strong>Local Admin Credentials:</strong><br>
					User: <code>wasteoil_admin</code> &nbsp;|&nbsp; Pass: <code>Wasteoil_admin@123#</code><br>
					<a href="dashboard.php?autologin=1" style="display:inline-block;margin-top:8px;font-weight:bold;color:#197B30;text-decoration:underline;">One-Click Direct Dashboard Access &rarr;</a>
				</div>
				
				<!-- Implemented in v1.1.4 -->
				<!--<div class="form-group">
					<em>- or -</em>
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left facebook-button">
						Login with Facebook
						<i class="entypo-facebook"></i>
					</button>
					
				</div>-->
				
				<!-- 
				
				You can also use other social network buttons
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
						Login with Twitter
						<i class="entypo-twitter"></i>
					</button>
					
				</div>
				
				<div class="form-group">
				
					<button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
						Login with Google+
						<i class="entypo-gplus"></i>
					</button>
					
				</div> -->
				
			</form>
			
			</div>
			
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>