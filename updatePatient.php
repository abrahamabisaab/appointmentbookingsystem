<!DOCTYPE html>
<?php
session_start();
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Patient</title>
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
    <form action=editPatient.php method=POST>
    <?php


echo "<div class=fieldset__patient>";
  echo '<span class=input__text>Select the Name of the Patient: </span><select class=inputs name="name">';
  echo"</div>";
        if(!$con) die(mysqli_connect_error());
        $q="SELECT * FROM user WHERE roleID='2'";
        $result=mysqli_query($con,$q);
        while($row=mysqli_fetch_array($result)){
            echo '<option value="'.$row['userID'].'">'.$row['name'].'</option>';
          }

echo "</select>";
    echo '<div class=""buttons><input type=submit class=register name="name_selected" value="Submit">';
    echo '<input type=button class=back onclick="history.back()" value="Back"></div>';
echo "</form>";

?>
</div>
  </body>
</html>
