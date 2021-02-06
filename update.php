<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];
$c_name = $_GET['c_name'];
$c_address = $_GET['c_address'];
$place = $_GET['place'];
$position = $_GET['position'];
$salary = $_GET['salary'];
$phone = $_GET['phone'];

if (isset($_GET['operation'])) {
    try {
       $sqlupdate = "UPDATE m_intern SET c_address = '$c_address', place = '$place', position = '$position', salary = '$salary', phone = '$phone' WHERE l_as = '$l_as' AND c_name = '$c_name'";
       $conn->exec($sqlupdate);
       echo "<script> alert('Update Success')</script>";
       echo "<script> window.location.replace('mainpage.php?l_as=".$l_as."&name=".$name."')</script>;";
      } 
      catch(PDOException $e) {
       echo "<script> alert('Update Error')</script>";
   }
}
?>

<!DOCTYPE html>
<html>
<style>

</style>
<p>
<h2 align="center"><?php echo $name;?></h2>
</p>

<body>
    <form action="update.php" method="get" onsubmit="return confirm('Update?');">
        <div class="content" align="center">
        <h3>Update <?php echo $c_name;?></h3>

            <input type="hidden" placeholder="" name="name" value="<?php echo $name;?>">
            <input type="hidden" placeholder="" name="l_as" value="<?php echo $l_as;?>">
            <input type="hidden" placeholder="" name="c_name" value="<?php echo $c_name;?>">
            <input type="hidden" id="operation" name="operation" value="update">

            <label for="c_address"><b>Address</b></label>
            <input type="text" placeholder="" name="c_address" value="<?php echo $c_address;?>" required>

            <label for="place"><b>Place</b></label><br>
            <select name="place" id="place" value="<?php echo $place;?>" required>
                <option value="Kedah">Kedah</option>
                <option value="Perlis">Perlis</option>
            </select><br><br><br>

            <label for="position"><b>Internship Position</b></label>
            <input type="text" placeholder="" name="position" value="<?php echo $position;?>" required>

            <label for="salary"><b>Salary</b></label>
            <input type="text" placeholder="" name="salary" value="<?php echo $salary;?>" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="text" placeholder="" name="phone" value="<?php echo $phone;?>" required>

            <input type="submit" value="Update"><br><br>

            <a href="mainpage.php?l_as=<?php echo $l_as.'&name='.$name?>">Cancel</a></p>
        </div>
    </form>
    </div>
</body>
</html>