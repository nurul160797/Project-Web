<?php
include_once("dbconnect.php");

$l_as = $_GET['l_as']; 
$name = $_GET['name'];

$sql = "SELECT * FROM register WHERE l_as = '$l_as' AND name = '$name'";
$stmt = $conn->prepare($sql );
$stmt->execute();
$register = $stmt->fetchAll(); 
echo "<head></head><link rel='stylesheet' href='styles.css'></head>";
echo "<p><h1 align='center'>Your Profile</h1></p>";
echo "<table border='1' align='center'>";

 foreach($register as $register) {
    echo "<tr>";
    echo "<tr><td colspan='2' > <img src='images/$l_as.jpg' width='150' height='250' class = 'center'> </td></tr>";
    echo "<tr><td>Name</td><td>".$register['name']."</td></tr>";
    echo "<tr><td>l_as</td><td>".$register['l_as']."</td></tr>";
    echo "<tr><td>Email</td><td>".$register['email']."</td></tr>";
    echo "<tr><td>Phone Number</td><td>".$register['phone']."</td></tr>";
   // echo "<tr><td>Registration Date</td><td>".date_format(date_create($user['timereg']),"d/m/Y H:i a")."</td></tr>"; 
 }
 echo "</table><br>";

 //echo "<p align='center'><a href='mainpage.php?l_as=".$l_as."'>Cancel</a></p>";
 echo "<p align='center'><a href='mainpage.php?l_as=".$l_as."&name=".$name."'>Cancel</a></p>";
?>

<!DOCTYPE html>
<html>
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