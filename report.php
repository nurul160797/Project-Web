<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $problem = $_GET['problem'];
      try {
        $sql = "DELETE FROM m_report WHERE l_as='$l_as' AND problem='$problem'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {
        $sql = "SELECT * FROM m_report WHERE l_as = '$l_as' ORDER BY date ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $m_report = $stmt->fetchAll();
        echo "<p><h1 align='center'>Your Current Report</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
            <th>Problem Name</th>
            <th>Date</th>
            <th>Status</th>
            <th>Operation</th>
        </tr>";

     foreach($m_report as $m_report){
            echo "<tr>";
            echo "<td>".$m_report['problem']."</td>";
            echo "<td>".$m_report['date']."</td>";
            echo "<td>".$m_report['status']."</td>";
            echo "<td><a href='report.php?l_as=".$l_as."&name=".$name."&problem=".$m_report['problem']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update report.php?l_as=".$l_as."&name=".$name."&problem=".$m_report['problem']."&date=".$m_report['date']."&status=".$m_report['status']."&operation=update' onclick= 'return confirm(\"Update?\");'>update</a>";
            echo "</tr>";
    }   
        echo "<table>";
        echo "<p align='center'><a href='manage report.php?l_as=".$l_as."&name=".$name."'>Insert new report</a></p>";
        echo "<p align='center'><a href='mainpage.php?l_as=".$l_as."&name=".$name."'>Back</a></p>";
 
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}else{
  echo "<script> alert ('Timer expired!!!')</script>";
  echo "<script> window.location.replace('login.html')</script>";
}
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
body {background-color: powderblue;}

.content {
  max-width: 500px;
  margin: auto;
  background: powderblue;
  padding: 10px;
  
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 14px 0px 22px 0;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid rgb(193, 122, 221);
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color:rgb(21, 98, 212);
  color: white;
  padding: 14px 20px;
  margin: 8px 0px;
  border: none;
  cursor: pointer;
  width: 20%;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}
/*Extra style for the submit button */
.submitbtn {
  padding: 14px 20px;
  background-color: #4CAF50;
}
/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .submitbtn {
  float: auto;
  width: 20%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 100px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

</style>
</html>