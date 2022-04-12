<!DOCTYPE html>
<html>
<body>
<?php 
include("connect.php");
$id=$_REQUEST['id'];
$sql="select * from blood where id=$id;";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

if(isset($_POST['submit']))
{
	$dname=$_POST['dname'];
    $sex=$_POST['sex'];
    $age=$_POST['age'];
    $bgroup=$_POST['bgroup'];
    $lastdate=$_POST['lastdate'];
	$update="update blood set dname='$dname',sex='$sex',age='$age',bgroup='$bgroup',lastdate='$lastdate' where id=$id;";
	$res1=mysqli_query($con,$update);
	if($res1)
		echo "<br> Row update";
	else
		echo "Row not updated";

}
else
{
	?>
	<form action="" method="POST">
		ID<input type="text" name="id" value="<?php echo $row['id'];?>"><br>
		Name<input type="text" name="dname"  value="<?php echo $row['dname'];?>"><br>
		Salary<input type="text" name="sex"  value="<?php echo $row['sex'];?>"><br>
		Department<input type="text" name="age"  value="<?php echo $row['age'];?>"><br>
        Department<input type="text" name="bgroup"  value="<?php echo $row['bgroup'];?>"><br>
        Department<input type="date" name="lastdate"  value="<?php echo $row['lastdate'];?>"><br>
		<input type="submit" name="submit" value="update">
		<a href="main.php">View Record</a>	
	<?php 
}
?>
	</form>
</body>
</html> 