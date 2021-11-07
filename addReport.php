<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'Connection.php';
      ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Medical Report</title>
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body>
  <div class="container">
<nav class="navbar">
          <span class="logo">What'sUpDoc?</span>
          <ul class="nav__list">
            <li><a href="index.php" class="nav__link">home</a></li>
            <li><a href="#" class="nav__link">about</a></li>
            <li><a href="#" class="nav__link">contact</a></li>
          </ul>
          <a href="login.php"><button class="signIn">Logout</button></a>
</nav>  
    <form action="addReport.php" method=post>
      <div class="fieldset__patient">
        <h1 class="sign">Add Report</h1>
      <span class=input__text>Select Patient Name: </span>
      <select class="inputs" name="sel" id="sel" required>
      <?php
    if(!$con) die(mysqli_connect_error());
        $q="SELECT DISTINCT u.name,p.patientID FROM patient p , reserve r, user u WHERE r.patientID=p.patientID AND p.userID=u.userID";
        $result =mysqli_query($con,$q);
        while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row['patientID'].'">'.$row['name'].'</option>';
}
?>
</select>
<span class=input__text>Date : </span><input class="inputs" type=date name=d placeholder="Date"></input>
<span class=input__text>Medication consumed by Patient: </span><input class="inputs" type=text name=med placeholder="Medication Description"></input>
<span class=input__text>Allergies?: </span><input type="text" class="inputs" placeholder="Allergies" name=all>
<span class=input__text>Does the patient inherit any Diseases? </span><input type="text" placeholder="Disease" class="inputs" name=check2 >
<span class=input__text>Surgery Done: </span><input class="inputs" name=surgery type=text placeholder="Surgery Description"></input>
<span class=input__text>Tests Done: </span><input class="inputs" name=test type=text placeholder="Test Description"></input>
<div class="buttons"><input class="register" type=submit name=save value=Save></input>
<input type="button" value="Back" class="back" onclick="history.back()"></div>
</div>
<?php
  if(isset($_POST['save'])){
    $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $doctorID = $row['doctorID'];
    $sql="INSERT INTO `report` (`reportID`, `patientID`, `doctorID`, `allergy`, `inherit`, `surgery`, `date`, `medication`, `tests`) VALUES (NULL, '{$_POST['sel']}', '$doctorID','{$_POST['all']}','{$_POST['check2']}','{$_POST['surgery']}','{$_POST['d']}','{$_POST['med']}','{$_POST['test']}')";
    mysqli_query($con,$sql);
echo $sql;
    }
  ?>
  </body>
  </div>
</html>
