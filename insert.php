<html>
    <body>
        <a href="main.php">View</a>

        <?php
        include("connect.php");
        ?>

        <form action="" method="POST">
            <table border="1">
            <tr>
                    <td>Enter ID</td>
                    <td>
                        <input type="text" name="id">
                    </td>
                </tr>
                <tr>
                    <td>Enter Name </td>
                    <td>
                        <input type="text" name="dname">
                    </td>
                </tr>
                <tr>
                    <td>Enter Gender </td>
                    <td><input type="text" name="sex"></td>
                </tr>
                <tr>
                    <td>Enter Age </td>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <td>Enter Blood group </td>
                    <td><input type="text" name="bgroup"></td>
                </tr>
                <tr>
                    <td>Enter last date of donation</td>
                    <td><input type="date" name="lastdate"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center;"><input type="submit" name="insert" value="insert"></td>
                </tr>

                <?php
                    if(isset($_POST['insert']))
                    {
                        $id=$_POST['id'];
                        $dname=$_POST['dname'];
                        $sex=$_POST['sex'];
                        $age=$_POST['age'];
                        $bgroup=$_POST['bgroup'];
                        $lastdate=$_POST['lastdate'];
                        $tbl = "create table if not exists blood(id int AUTO_INCREMENT PRIMARY KEY ,dname varchar(20),sex char,age int(3),bgroup varchar(5),lastdate date);";
                        $sql="insert into blood(dname,sex,age,bgroup,lastdate) values('$dname','$sex',$age,'$bgroup','$lastdate');";

                        $res1=mysqli_query($con,$tbl);
                        if($res1)
                            echo "Table is Created";
                        else
                            echo "Table is not Created";

                        $res=mysqli_query($con,$sql);
                        if($res)
                            echo "<br>Value is inserted";
                        else
                            echo "<br>Value is not inserted";
                    }
                ?>
            </table>
        </form>
    </body>
</html>
