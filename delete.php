<html>
    <body>
        <a href="main.php">Delete view</a>
</body>
<?php
include("connect.php");
$id=$_REQUEST['id'];
$sql="Delete from blood where id=$id";
$res=mysqli_query($con,$sql);
if($res)
echo "row deleted";
else
echo "not deleted";
?>
</html>