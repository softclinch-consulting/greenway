<?php 
error_reporting(0);
include('config.php'); 
session_start();

$type = $_REQUEST['type'];

/*
$c_id = $_REQUEST['c_id'];

if($type=='country')
{
?>
<select class="form-control" name="s_id" required="required" onchange="state(this.value,'state');">
										
<option value="">Select</option>
<?php
$state  = mysqli_query($con,"select * from `state` where `c_id`='$c_id' order by `name` asc ")or die(mysqli_error($con));
while ($state1 = mysqli_fetch_array($state)) 
{
?>
<option value="<?php echo $state1['id']; ?>"><?php echo $state1['name']; ?></option>
<?php
}
?>
	
</select>
<?php
}*/

$s_id = $_REQUEST['s_id'];

if($type=='state')
{
?>
<select class="form-control" name="dt_id" required="required" onchange="district(this.value,'district');">
										
<option value="">Select</option>
<?php
$district  = mysqli_query($con,"select * from `district` where `s_id`='$s_id' order by `name` asc ")or die(mysqli_error($con));
while ($district1 = mysqli_fetch_array($district)) 
{
?>
<option value="<?php echo $district1['id']; ?>"><?php echo $district1['name']; ?></option>
<?php
}
?>
	
</select>
<?php
}


$dt_id = $_REQUEST['dt_id'];

if($type=='district')
{
?>
<select class="form-control" name="l_id" required="required">
										
<option value="">Select</option>
<?php
$location  = mysqli_query($con,"select * from `location` where `dt_id`='$dt_id' order by `name` asc ")or die(mysqli_error($con));
while ($location1 = mysqli_fetch_array($location)) 
{
?>
<option value="<?php echo $location1['id']; ?>"><?php echo $location1['name']; ?></option>
<?php
}
?>
	
</select>
<?php
}


if($type=='category')
{
?>
<select class="form-control" name="s_id">
										
<option value="">Select</option>
<?php
$sub_category  = mysqli_query($con,"select * from `sub_category` where `c_id`='$c_id' order by `name` asc ")or die(mysqli_error($con));
while ($sub_category1 = mysqli_fetch_array($sub_category)) 
{
?>
<option value="<?php echo $sub_category1['id']; ?>"><?php echo $sub_category1['name']; ?></option>
<?php
}
?>
	
</select>
<?php
}


if($type=='category_listing')
{
?>
<select class="form-control" name="sub_cat_id">
										
<option value="">Select</option>
<?php
$sub_category  = mysqli_query($con,"select * from `sub_category` where `c_id`='$c_id' order by `name` asc ")or die(mysqli_error($con));
while ($sub_category1 = mysqli_fetch_array($sub_category)) 
{
?>
<option value="<?php echo $sub_category1['id']; ?>"><?php echo $sub_category1['name']; ?></option>
<?php
}
?>
	
</select>
<?php
}

?>