<?php 
	$server="localhost";

	$username="root";	

	$password="$@GreenWaySRS2026#$";

	$db_name="wasteoil_cms_db";// Database name

$con=mysqli_connect($server,$username,$password,$db_name);
  if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
	  



$timezone  = 5.5; //(GMT -5:00) EST (U.S. & Canada)
$timesss=date("H:i:s a", time() + 3600*($timezone+date("I")));

$days  = 5.5; //(GMT -5:00) EST (U.S. & Canada)
$daysss=date("Y-m-d", time() + 3600*($days+date("I")));

//$daysss=date("Y-m-d H:i:s").'<br>';

$dateyeter  = -24; //(GMT -5:00) EST (U.S. & Canada)
$yeterday=date("Y-m-d", time() + 3600*($dateyeter+date("I")));
																

$dayt  = 0; //(GMT -5:00) EST (U.S. & Canada)
$daytimesss=date("Y-m-d H:i:s", time() + 3600*($dayt+date("I")));

//$daytimesss=date("Y-m-d H:i:s");


$endtime  = 5; //(GMT -5:00) EST (U.S. & Canada)
$endtimesss=date("Y-m-d H:i:s a", time() + 3600*($endtime+date("I")));


// Removed (2026-08-27): dead date-range helpers ($weekdate, $monthdate_time,
// $monthdate, $thismonthend, $str_NextSundayDate, $years, $lastyear) left over
// from the original booking-template. $weekdate/$monthdate_time referenced an
// undefined $start variable (never set anywhere in this project), causing
// "Undefined variable $start" warnings. Traced every one of these variables
// across the whole codebase: none are read outside this file, so the block
// was removed rather than patched.
//session_start();
                           



$currency_value  = mysqli_query($con, "select * from `currency_value` where `status`='Active'") or die(mysqli_error($con));
// fetch_array() returns null when zero rows match; default to [] so the
// lookups below can't warn on a missing row, instead of assuming a row
// always exists.
$currency_value1 = mysqli_fetch_array($currency_value) ?: [];

$currency_code = $currency_value1['currency'] ?? '';

$code = $currency_value1['code'] ?? '';

$value = $currency_value1['value'] ?? '';


$settings  = mysqli_query($con, "select * from `settings` where `id`='1'") or die(mysqli_error($con));
$settings1 = mysqli_fetch_array($settings);

$moduleview  = mysqli_query($con, "select * from `module_view` where `id`='1'") or die(mysqli_error($con));
$moduleview1 = mysqli_fetch_array($moduleview);

///////////////////////////// Email Id ///////////////////////////////

$admin_form =$settings1['form_email_id'];

$admin_to =$settings1['to_email_id'];

///////////////////////////// Email Id ///////////////////////////////



$baseurlview = "http://localhost:8080/";

///////////////////////////// Url and Title ///////////////////////////////

$baseurl =$settings1['base_url'];

$siteurl =$settings1['site_url'];

$mainurl =$settings1['main_url'];

$adminurl =$settings1['admin_url'];

$shopname = $settings1['title']; 

$domain_name = $settings1['domain_name'];


///////////////////////////// Url and Title ///////////////////////////////


///////////////////////////// footer ///////////////////////////////

$footer = $settings1['footer_text'];

$footer1 = $settings1['footer_text1'];

$footer2 = $settings1['footer_text2'];

$footer_link = $settings1['footer_link'];

///////////////////////////// footer ///////////////////////////////



///////////////////////////// logo and favicon ///////////////////////////////

$logo = $baseurl.'settings/'.$settings1['logo'];

$favicon = $baseurl.'settings/'.$settings1['favicon'];

///////////////////////////// logo and favicon ///////////////////////////////


///////////////////////////// Contact info ///////////////////////////////

$c_email = $settings1['contact_email'];

$c_phone = $settings1['contact_phone'];

$c_address = $settings1['address'];

$c_address1 = $settings1['address1'];

$c_address2 = $settings1['address2'];

$c_city = $settings1['city'];

$c_state = $settings1['state'];

$c_pincode = $settings1['pincode'];

$c_country = $settings1['country'];


///////////////////////////// Contact info ///////////////////////////////



///////////////////////////// Social Links ///////////////////////////////

$c_facebook = $settings1['facebook_link'];

$c_google = $settings1['google'];

// `settings` has no Twitter-equivalent column (only facebook_link,
// instagram_link, google, youtube_link/youtube, linkedin_link exist) and
// $c_twitter has no consumer anywhere in this project — kept defined as an
// empty string rather than inventing a database column for it.
$c_twitter = '';

$c_youtube = $settings1['youtube'];

$c_linkedin = $settings1['linkedin_link'];

///////////////////////////// Social Links ///////////////////////////////


///////////////////////////// Payment ///////////////////////////////

$paypalmail =$settings1['paypalmail'];

///////////////////////////// Payment ///////////////////////////////


///////////////////////////// currency & shipping ///////////////////////////////

$currency = $settings1['currency'];

$shipping =$settings1['shipping'];

$free_shipping =$settings1['free_shipping'];

///////////////////////////// currency & shipping ///////////////////////////////


///////////////////////////// Url ///////////////////////////////
// Removed (2026-08-27): dead URL-segment parsing ($urld, $urla, $subid1-7,
// $level1-4). $urla[2]-[7] warned with "Undefined array key" on any request
// URI with fewer than 8 slash-separated segments (i.e. almost every real
// page in this app). Traced $urld/$urla/$subid1-7/$level1-4 across the whole
// codebase: none are read outside this file, so the block was removed
// rather than patched. The standalone ternary that used to sit here (an
// unassigned https/http URL expression) had no effect and was removed too.
///////////////////////////// Url ///////////////////////////////


///////////////////////////// Redirect ///////////////////////////////

function redirect($url) 
{
  echo '<script type="text/javascript">window.location = "' . $url . '";</script>';
}
///////////////////////////// Redirect ///////////////////////////////

error_reporting(0);
?>