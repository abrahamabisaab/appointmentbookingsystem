<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add a Comment</title>
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
    <form method="post"> 
      <div class=fieldset__comment>
        <h1 class='sign' align=center>Add Comment</h1>
      <span class=input__text>Select Doctor Username: </span>

      <select class="inputs" name="sel" id="sel" required>
                              <?php


                    if(!$con){
                          die("Connection Error: ".mysqli_connnect_error());
                                  }
                      $qquery="SELECT * FROM `user` u, `doctor` d WHERE u.userID = d.userID";
                      $result =mysqli_query($con,$qquery);
      while($row=mysqli_fetch_array($result)){
      echo '<option value="'.$row['doctorID'].'">'.$row['name'].'</option>';
      }
                  //mysqli_close($con);

      ?>

                          </select>
      <span class=input__text>Title: </span><input class="inputs" type=text name=title placeholder="Title"></input>
      <span class=input__text>Description: </span><textarea class="desc" type=text name=description placeholder="Description"></textarea>
      <div class="buttons"><input class="register" type=submit name=save value=Publish></input>
      <input type="button" value="Back" class="back" onclick="history.back()"></div>
</div>
    </div>

      <?php

        if(isset($_POST['save'])){
          $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
          $result =mysqli_query($con,$q);
          $row = mysqli_fetch_array($result);
          $patientID = $row['patientID'];
          $sql="INSERT INTO `comment` (`commentID`, `patientID`, `doctorID`, `commentTitle`, `commentDescription`) VALUES (NULL, '$patientID', '{$_POST['sel']}', '{$_POST['title']}', '{$_POST['description']}')";
          mysqli_query($con,$sql);
          }
        ?>
  </body>
</html>
