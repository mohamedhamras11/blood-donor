<html>
<body>
    <a href="insert.php">Insert new records</a>
    <table border="1">
        <tr>
            <td>id</td>
            <td>dname</td>
            <td>sex</td>
            <td>age</td>
            <td>bgroup</td>
            <td>lastdate</td>


            <?php
            include("connect.php");
            $con=mysqli_connect("localhost","root","");
            mysqli_select_db($con,"db2");
            $limit=10;
            if(isset($_GET['page']))
            {
                $page=$_GET['page']-1;
                $offset=$page*$limit;
            }
            else
            {
                $page=0;
                $offset=0;
            }
            $sql="select count(id) from blood";
            $res=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($res);
            $totrow=$row[0];
            if($totrow>$limit)
            {
                $nop=ceil($totrow/$limit);
            }
            else
            {
                $nop=0;
            }

            $res1=mysqli_query($con,"Select * from blood order by age asc LIMIT $offset,$limit");
            $count=1;

            while($row1=mysqli_fetch_array($res1))
            {
                echo "<tr><td>";
                echo $count;
                echo "</td><td>".$row1['dname'];
                echo "</td><td>".$row1['sex'];
                echo "</td><td>".$row1['age'];
                echo "</td><td>".$row1['bgroup'];
                echo "</td><td>".$row1['lastdate'];
                echo "</td></tr>";
                $count++;
            }
            echo "</table>";
            for($i=1;$i<=$nop;$i++)
            {
                echo "<td><a href='main.php?page=$i'>".$i."</a>";
            }
            ?>
            

        </body>
        </html>


<html>
<body>
    <form action="" method="POST">
    <table border="1">
        <tr>
            <td>id</td>
            <td>dname</td>
            <td>sex</td>
            <td>age</td>
            <td>bgroup</td>
            <td>lastdate</td>
            <input type="submit" name="delete" value="delete">

            <?php
					include("connect.php");
					$sql="select * from blood order by age asc LIMIT $offset,$limit";
					$res=mysqli_query($con,$sql);
					$count=1;
                    
            while($row1=mysqli_fetch_assoc($res))
            {
                echo "<tr><td>";
                echo $count;
                echo "</td><td>".$row1['dname'];
                echo "</td><td>".$row1['sex'];
                echo "</td><td>".$row1['age'];
                echo "</td><td>".$row1['bgroup'];
                echo "</td><td>".$row1['lastdate'];
                echo "</td>";
                ?>
                <td><a href="delete.php?id=<?phpecho$row['id'];?>">Delete</a></td></tr>
                <?php
                $count++;
            }
            ?>
            </table>
        </form>
        </body>
        </html>

        <html>
<body>
    <form action="" method="POST">
    <table border="1">
        <tr>
            <td>id</td>
            <td>dname</td>
            <td>sex</td>
            <td>age</td>
            <td>bgroup</td>
            <td>lastdate</td>
        </tr>
        <?php
					include("connect.php");
					$sql="select * from blood order by age asc LIMIT $offset,$limit";
					$res=mysqli_query($con,$sql);
					$count=1;
                    
            while($row1=mysqli_fetch_assoc($res))
            {
                echo "<tr><td>";
                echo $count;
                echo "</td><td>".$row1['dname'];
                echo "</td><td>".$row1['sex'];
                echo "</td><td>".$row1['age'];
                echo "</td><td>".$row1['bgroup'];
                echo "</td><td>".$row1['lastdate'];
                echo "</td>";
                ?>
                <td><a href="update.php?id=<?php echo $row1['id'];?>" target="_blank">Edit</a></td></tr>
                <?php
                $count++;
            }
            ?>
            </table>
        </form>
        </body>
        </html>




