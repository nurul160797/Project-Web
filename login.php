<?php
session_start();

include_once("dbconnect.php");
$email =$_POST["email"];
$pass =$_POST["pass"];

try {
  $sql = "SELECT * FROM register WHERE email = '$email' AND pass = '$pass'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $count =$stmt->rowCount();
  $register = $stmt->fetchAll();


  if ($count > 0) {
    foreach($register as $register){
      $l_as = $register['l_as'];
      $name = $register['name'];
    }
    setcookie("timer", "10s", time()+10000000,"/");
    
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;

    echo "<script> alert('Login Success')</script>";
    echo "<script> window.location.replace('mainpage.php?l_as=".$l_as."&name=".$name."')</script>";
  }else {
    echo "<script> alert('Login Failure')</script>";
    echo "<script> window.location.replace('login.html')</script>";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>