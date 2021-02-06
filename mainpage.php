<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $c_name = $_GET['c_name'];
      try {
        $sql = "DELETE FROM m_intern WHERE l_as='$l_as' AND c_name='$c_name'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

try {
    $sql = "SELECT * FROM m_intern WHERE l_as = '$l_as' ORDER BY place ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $m_intern = $stmt->fetchAll();
    echo "<p><h1 align='center'>Your Current Internship Info</h1></p>";
    echo "<table border='1' align='center'>
    <tr>
        <th>Company Name</th>
        <th>Address</th>
        <th>Place</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Phone</th>
        <th>Operation</th>
    </tr>";

    foreach($m_intern as $m_intern){
        echo "<tr>";
        echo "<td>".$m_intern['c_name']."</td>";
        echo "<td>".$m_intern['c_address']."</td>";
        echo "<td>".$m_intern['place']."</td>";
        echo "<td>".$m_intern['position']."</td>";
        echo "<td>".$m_intern['salary']."</td>";
        echo "<td>".$m_intern['phone']."</td>";
        echo "<td><a href='mainpage.php?l_as=".$l_as."&name=".$name."&c_name=".$m_intern['c_name']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
        <a href='update.php?l_as=".$l_as."&name=".$name."&c_name=".$m_intern['c_name']."&c_address=".$m_intern['c_address']."&place=".$m_intern['place']."&position=".$m_intern['position'].
        "&salary=".$m_intern['salary']."&phone=".$m_intern['phone']."&operation=update' onclick= 'return confirm(\"Update?\");'>update</a>";
        echo "</tr>";

    }   
        echo "<table>";
        echo "<p align='center'><a href='manage intern.php?l_as=".$l_as."&name=".$name."'>Insert new info</a></p>";
        echo "<p align='center'><a href='report.php?l_as=".$l_as."&name=".$name."'>Manage Report</a></p>";
        echo "<p align='center'><a href='profile.php?l_as=".$l_as."&name=".$name."'>Your Profile</a></p>";
        //echo "<p align='center'><a href='login.html'>Login</a></p>";
        echo "<p align='center'><a href='register.html'>Sign Out</a></p>";
 
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



