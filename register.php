<?php
include_once("dbconnect.php");

//get data first
$l_as =$_POST["l_as"];
$name =$_POST["name"];
$email =$_POST["email"];
$pass =$_POST["pass"];
$phone =$_POST["phone"];

///if(!empty($_FILES['uploaded_file'])){
 // $path = "images/";
  //$path = $path . basename( $_FILES['uploaded_file']['name']);
  //$path = $path . $matric.'.jpg';
  // if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
//connect to db
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "internship";

try {
  //$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
 // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO register(l_as, name, email, pass, phone)
  VALUES ('$l_as', '$name', '$email', '$pass', '$phone')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "<script> alert('Registration success!!')</script>";
  echo "<script> window.location.replace('login.html')</script>";
  //echo "New record created successfully";
} catch(PDOException $e) {
  echo "<script> alert('Registration Failed!!')</script>";
  echo "<script> window.location.replace('register.html')</script>";
  //echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
  // }else{
   // echo "<script> alert('Image upload error')</script>";
   // echo "<script> window.location.replace('register.html') </script>;";
  // }
  //}
  
?>