<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];
$problem = $_GET['problem'];
$date = $_GET['date'];
$status = $_GET['status'];

if (isset($_GET['operation'])) {
  try {
     $sqlupdate = "UPDATE m_report SET problem = '$problem', date = '$date' WHERE l_as = '$l_as' AND problem = '$problem'";
     $conn->exec($sqlupdate);
     echo "<script> alert('Update Success')</script>";
     echo "<script> window.location.replace('report.php?l_as=".$l_as."&name=".$name."')</script>;";
    } 
    catch(PDOException $e) {
     echo "<script> alert('Update Error')</script>";
 }
}
?>
<p>
<h2 align="center"><?php echo $name;?></h2>
</p>

<body>
    <form action="update report.php" method="get" onsubmit="return confirm('Update?');">
        <div class="content" align="center">
        <h3>Update <?php echo $problem;?></h3>

            <input type="hidden" placeholder="" name="name" value="<?php echo $name;?>">
            <input type="hidden" placeholder="" name="l_as" value="<?php echo $l_as;?>">
            <input type="hidden" id="operation" name="operation" value="update">

            <label for="problem"><b>Problem</b></label>
            <input type="text" placeholder="" name="problem" value="<?php echo $problem;?>" required>
            
            <label for="date"><b>Date</b></label>
            <input type="text" placeholder="" name="date" value="<?php echo $date;?>" required>

            <label for="status"><b>Status</b></label><br>
            <select name="status" id="status" value="<?php echo $status;?>" required>
            <option value="N_Started">Not Started</option>
            <option value="I_Progress">In Progress</option>
            <option value="Completed">Completed</option>
            <option value="Cancelled">Cancelled</option>
            </select><br><br>
            <input type="submit" value="Update"><br><br>

            <a href="manage report.php?l_as=<?php echo $l_as.'&name='.$name?>">Cancel</a></p>
        </div>
    </form>
    </div>
</body>
</html>