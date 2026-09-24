<?php

include('config.php'); 

//if(isset($_REQUEST['Download'])){


$tip1=mysqli_query($con,"select * from `newsletter_subscription` where `id`!='' order by `id` asc") or die(mysqli_error($con));

// Functions for export to excel.

function xlsBOF() {

echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);

return;

}

function xlsEOF() {

echo pack("ss", 0x0A, 0x00);

return;

}

function xlsWriteNumber($Row, $Col, $Value) {

echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);

echo pack("d", $Value);

return;

}

function xlsWriteLabel($Row, $Col, $Value ) {

$L = strlen($Value);

echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);

echo $Value;

return;

}

$file ="email_subscribe_list_". date("Y-m-d"). ".xls";



header("Pragma: public");

header("Expires: 0");

header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

header("Content-Type: application/force-download");

header("Content-Type: application/octet-stream");

header("Content-Type: application/download");;

header("Content-Disposition: attachment;filename=\"$file\"");

header("Content-Transfer-Encoding: binary ");



xlsBOF();

// Make column labels. (at line 3)

xlsWriteLabel(0,0,"SI No");

xlsWriteLabel(0,1,"Email");


$xlsRow = 1;



// Put data records from mysql by while loop.

while($tip9=mysqli_fetch_array($tip1))

{


xlsWriteNumber($xlsRow,0,$xlsRow);


xlsWriteLabel($xlsRow,1,$tip9['email']);




$xlsRow++;

}

xlsEOF();

#exit();

#header('Location: registerlist.php?msg='.urlencode('Xls Sheet Created Successfully'));

//}

?>