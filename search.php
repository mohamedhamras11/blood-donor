<html>
<body>

<form action="" method="post">
Search <input type="text" name="search"><br>
<input type ="submit">
</form>

<?php
include("connect.php");
$search = $_POST['search'];
$sql = "select * from blood where dname like '%$search%'";
$result = mysqli_query($con,$sql);
if($result)
{
while($row1=mysqli_fetch_assoc($result))
{
    echo "<br>";
	echo $row1["dname"]."<br>  ".$row1["sex"]."<br>  ".$row1["age"]."<br>  ".$row1["bgroup"]." <br> ".$row1["lastdate"] ;
}
} 
else 
echo "records not found";
?>

</body>
</html>