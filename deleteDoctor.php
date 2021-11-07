<!DOCTYPE html>
<?php
session_start();
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Doctor</title>
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
    <form action=deleteDoctor.php method=POST>
      <div class="fieldset__doctor">
<span class=input__text>Select Doctor: </span>

    <select class="inputs" name="sel" id="sel"required>
                            <?php
                  if(!$con){
                        die("Connection Error: ".mysqli_connnect_error());
                                }
                    $query="SELECT * FROM `user` u,`doctor` d WHERE roleID='3' AND d.userID=u.userID";
                    $result =mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
echo '<option value="'.$row['userID'].'">'.$row['name'].'</option>';
}


?>
                        </select>
<div class="buttons"><input type="submit" class="register" value="Confirm" name="del">
<input type="button" class=back value="Back" onclick="history.back()"></div>
</div>
</form>
</body>
<?php

if(isset($_POST['del'])){
                  if(!$con){
                        die("Connection Error: ".mysqli_connnect_error());
                                }
                                $userID = $_POST['sel'];
                                $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
                                $result =mysqli_query($con,$q);
                                $row = mysqli_fetch_array($result);
                                $pid = $row['doctorID'];
                                $query="DELETE FROM `comment` WHERE doctorID = '$pid'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `reserve` WHERE doctorID = '$pid'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `doctor` WHERE userID ='$userID'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `user` WHERE userID ='$userID'";
                                mysqli_query($con,$query);
                                $query="DELETE FROM `report` WHERE userID ='$userID'";
                                mysqli_query($con,$query);


}
?>
  </body>
</div>
</html>
