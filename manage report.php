<?php
include_once("dbconnect.php");
$l_as =$_GET['l_as'];
$name =$_GET['name'];

if (isset($_GET['problem'])) {
  $problem = $_GET['problem'];
  $date = $_GET['date'];
  $status = $_GET['status'];
 

  try {
    $sql = "INSERT INTO m_report(problem, date, status, l_as)
    VALUES ('$problem', '$date', '$status', '$l_as')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('report.php?l_as=".$l_as."&name=".$name."') </script>;";

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

<body>

  <form action="manage report.php" method="get" onsubmit="return confirm('Insert new report?')";>
  <div class="content" align="center">
      <h1>Manage Report</h1>

      <input type="hidden" placeholder="" name="name" value="<?php echo $name; ?>"><br>
      <input type="hidden" placeholder="" name="l_as" value="<?php echo $l_as; ?>"><br>

      <label for="problem"><b>Problem</b></label>
      <input type="text" placeholder="" name="problem" required>

      <label for="date"><b>Date</b></label>
      <input type="text" placeholder="" name="date" required>

      <label for="status"><b>Status</b></label><br>
        <select name="status" id="status" required>
        <option value="N_Started">Not Started</option>
        <option value="I_Progress">In Progress</option>
        <option value="Completed">Completed</option>
        <option value="Cancelled">Cancelled</option>
      </select><br><br>

      <input type="submit" value="Submit"><br><br>
      <a href="report.php?l_as=<?php echo $l_as.'&name='.$name?>">Cancel</a>
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
