<!DOCTYPE html>
<?php
session_start();
include 'Connection.php';
$userID = $_SESSION['userID'];
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Appointments</title>
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
    <h1 class="input__title">My Appointments</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>Doctor Name</th>
    <th>Date</th>
    <th>Start Time</th>
    <th>End Time</th>
    </tr>
    </thead>
    <?php
    $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $patientID = $row['patientID'];
    $query="SELECT r.*, u.name FROM `reserve` r, `user` u, `patient` p, `doctor` d WHERE p.patientID = '$patientID' and r.patientID='$patientID'and d.userID = u.userID AND r.doctorID = d.doctorID";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['Date']."</td>";
            echo "<td>".$row['StartTime']."</td>";
            echo "<td>".$row['EndTime']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
      </div>
  </body>
</html>
