<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"db2");
if($con)
echo "connection established";
else
die("not established".mysqli_error());
?>