<?php
$confirm=false;
$error_msg=false;
if(isset($_POST['fname'])){
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Your existing code
$server = "localhost";
$username = "root";
$password = "";
$database = "ctrip";

$con = mysqli_connect($server, $username, $password, $database,3306);

// Check connection
if(!$con){
    die("FAILED CONNECTION: " . mysqli_connect_error());
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phno = $_POST['phno'];
$desci = $_POST['desci'];

if(empty($fname)||empty($lname)||empty($email)||empty($phno)||empty($desci))
{
  $error_msg=true;
  // $error_msg = "Input field should not be empty";
}
else{

$sql = "INSERT INTO `ctrip`.`ctrip` (`fname`, `lname`, `email`, `phno`, `desci`, `dt`) VALUES ('$fname', '$lname', '$email', '$phno', '$desci', current_timestamp());";


// echo $sql;

if($con->query($sql)== true){
  $confirm=true;
  // echo "Successfullt inserted";
}
else{
  echo "ERROR : $sql <br> $con->error";
}
}
$con->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="main-container">
    <div class="head">
      <h1>College Trip Form</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum nulla officia facilis veniam nisi perferendis impedit corporis</p>
    </div>
    <div class="form">
      <form action="index1.php" method="post">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" placeholder="Harsh"></br>
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname" placeholder="Gupta"></br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="abc@mail.com"></br>
        <label for="phno">Phone No:</label>
        <input type="number" id="phno" name="phno" placeholder="82XXXXXX07"></br>
        <label for="desci">Description:</label>
        <textarea id="desci" name="desci" rows="5" cols="30" placeholder="Write a description..."></textarea></br>
        
          <!-- <button class="btns">Reset</button> -->
          <button class="btns">Submit</button>
          <?php
          if($confirm==true){ 
            echo "<div class='confirm-msg'>Form Submited</div>";
          }
          elseif($error_msg==true){
            echo"<div class='error-msg'>Input field should not be empty</div>";
          }
          else{
            echo"";
          }
          ?>
      </form>
    </div>
  </div>
  <script src="./app.js"></script>
</body>
</html>



