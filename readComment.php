<!DOCTYPE html>
<?php
session_start();
include 'Connection.php';
$userID = $_SESSION['userID'];
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Read All Comments</title>
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
<h1 class="sign">All Comments</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Description</th>
    </tr>
    </thead>
    <?php

    $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $doctorID = $row['doctorID'];
    $query="SELECT DISTINCT c.*, u.name FROM `comment` c , `user` u, `patient` p, `doctor` d WHERE p.userID = u.userID AND c.patientID = p.patientID";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['commentTitle']."</td>";
            echo "<td>".$row['commentDescription']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
      </div>
  </body>
</html>
