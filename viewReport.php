<!DOCTYPE html>
<?php
session_start();
$userID = $_SESSION['userID'];
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Report</title>
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
      <h1 class="sign">My Medical Reports</h1>
      <table class="steelBlueCols">
      <thead>
      <tr>
      <th>Patient Name</th>
      <th>Date of Report</th>
      <th>Allergy</th>
      <th>Inherited Diseases</th>
      <th>Surgery Done</th>
      <th>Medication Prescribed</th>
      <th>Tests Done</th>
      </tr>
      </thead>
      <?php
      $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
      $result =mysqli_query($con,$q);
      $row = mysqli_fetch_array($result);
      $patientID = $row['patientID'];

      $query="SELECT DISTINCT r.*,u.name FROM user u, report r, patient p, reserve res WHERE r.patientID=p.patientID AND p.userID=u.userID AND res.patientID = r.patientID AND res.patientID=$patientID ";
          $result =mysqli_query($con,$query);
          while($row=mysqli_fetch_array($result)){
              echo "<tbody>";
              echo "<tr>";
              echo "<td>".$row['name']."</td>";
              echo "<td>".$row['date']."</td>";
              echo "<td>".$row['allergy']."</td>";
              echo "<td>".$row['inherit']."</td>";
              echo "<td>".$row['surgery']."</td>";
              echo "<td>".$row['medication']."</td>";
              echo "<td>".$row['tests']."</td>";
              echo "</tbody>";
              echo "</tr>";
          }
          mysqli_close($con);
      ?>
      </table>
        </div>
  </body>
</html>
