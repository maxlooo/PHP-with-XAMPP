<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {
  color: #FF0000;
}
input[type=number]{
    width: 50px;
} 

</style>
</head>
<body> 

<?php
$totalErr = 0;
$fileUploaded = FALSE;
session_start() != FALSE
  or die('Could not start session. Cookies must be enabled in your browser.');

$uploadResumeErr = $passportNumErr = "";
$uploadResume = $passportNum = "";
$targetDir = "uploads/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $fileUploaded = $_POST["fileUploaded"];

  if (empty($_POST["passportNum"])) {
    $passportNumErr = " * Passport Number is required";
    $totalErr++;
  } else {
    $passportNum = testInput($_POST["passportNum"]);
  }

  if ($_FILES["uploadResume"]["size"] > 5500000) {
    $uploadResumeErr = " * Sorry, your Resume is larger than 5MB";
    $totalErr++;
  } else if ($_FILES["uploadResume"]["size"] == 0) {
    $uploadResumeErr .= " * Resume is required";
    $totalErr++;
  } else {
    $uploadResume = $targetDir . $passportNum . " - " . basename($_FILES["uploadResume"]["name"]);
  }

  if ($totalErr == 0 && !$fileUploaded) {
    if (move_uploaded_file($_FILES["uploadResume"]["tmp_name"], $uploadResume)) ;
    else {
      $uploadResumeErr = "Sorry, there was an error uploading your Resume";
    }
    $fileUploaded = TRUE;
  } 
}

function testInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$totalErr && $fileUploaded) {

  $servername = "localhost";
  $username = "admin";
  $password = "admin";
  $dbname = "tryDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  // prepare and bind
  $sqlStatement = $conn->prepare("INSERT INTO uploadTable (passportNum) 
    VALUES (?)");
  $sqlStatement->bind_param("s", $passportNum);

  if ($sqlStatement->execute() === TRUE) ;
  else {
    echo "Error: <br>" . $sqlStatement->error;
  }
  $sqlStatement->close();
  $conn->close();

  header("Location: http://localhost/tryphp/New%20Project/Thank%20You.html");
  die();

} 

if ($fileUploaded == FALSE) {

?>

<h1><center>Singapore Nursing Board</center></h1>
<h2>Application for Registration/Enrolment</h2>
<p><span class="error"> <?php if ($totalErr) echo "* required field.";?> </span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 
  
  <input type="hidden" name="fileUploaded" value="<?php echo $fileUploaded;?>">

  
  <h3>Particulars of Applicant</h3>
  Passport Number:
  <br><input type="text" name="passportNum" value="<?php echo $passportNum;?>">
  <span class="error"> <?php echo $passportNumErr;?></span>
  <br><br>

  <h3>Documents Upload</h3>
  <ol type="1"><li>Resume/CV 
    <br><input type="file" name="uploadResume" id="uploadResume"></li>
    <span class="error"> <?php echo $uploadResumeErr;?></span>
  </ol>
  <br>
  <input type="submit" name="submit" value="Acknowledge and Submit"> <br>
</form>

<?php

} else {
  echo "<h3>Thank you for applying to the Singapore Nursing Board. 
    <br><br> Please close your browser window to end this session. </h3>";
}

?>

</body>
</html>