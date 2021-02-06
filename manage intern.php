<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];

if (isset($_GET['c_name'])) {
  $c_name = $_GET['c_name'];
  $c_address = $_GET['c_address'];
  $place = $_GET['place'];
  $position = $_GET['position'];
  $salary = $_GET['salary'];
  $phone = $_GET['phone'];

  try {
    $sql = "INSERT INTO m_intern(c_name, c_address, place, position, salary, phone, l_as, name)
    VALUES ('$c_name', '$c_address', '$place', '$position', '$salary', '$phone', '$l_as', '$name')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?l_as=".$l_as."&name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

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
<p><h1 align="center"><?php echo $name;?></h1></p>
<body>

  <form action="manage intern.php" method="get" onsubmit="return confirm('Insert new info?')";>
    <div class="content" align="center">
      <h1>Manage Internship Information</h1>

      <input type="hidden" placeholder="" name="name" value="<?php echo $name; ?>"><br>
      <input type="hidden" placeholder="" name="l_as" value="<?php echo $l_as; ?>"><br>

      <label for="c_name"><b>Company Name</b></label>
      <input type="text" placeholder="" name="c_name" required>

      <label for="c_address"><b>Address</b></label>
      <input type="text" placeholder="" name="c_address" required>

      <label for="Place"><b>Place</b></label><br>
        <select name="place" id="place" required>
        <option value="Kedah">Kedah</option>
        <option value="Perlis">Perlis</option>
      </select><br><br><br>

      <label for="position"><b>Internship Position</b></label>
      <input type="text" placeholder="" name="position" required>

      <label for="salary"><b>Salary</b></label>
      <input type="text" placeholder="" name="salary" required>

      <label for="phone"><b>Phone Number</b></label>
      <input type="text" placeholder="" name="phone" required>

      <input type="submit" value="Submit"><br><br>
      <a href="mainpage.php?l_as=<?php echo $l_as.'&name='.$name?>">Cancel</a>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
