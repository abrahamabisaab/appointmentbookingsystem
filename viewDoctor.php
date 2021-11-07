<!DOCTYPE html>
<?php
include 'Connection.php'; 
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Doctors</title>
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
    <h1 class='h1'>List of Doctors</h1>
    <table class="steelBlueCols">
    <thead>
    <tr>
    <th>Name</th>
    <th>Username</th>
    <th>Date of Brith</th>
    <th>Gender</th>
    <th>Speciality</th>
    <th>Cell Number</th>
    <th>Region</th>
    </tr>
    </thead>
    <?php
    $query="SELECT * FROM `doctor` d, user u WHERE d.userID=u.userID AND roleID='3'";
        $result =mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result)){
            echo "<tbody>";
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['cellNB']."</td>";
            echo "<td>".$row['Speciality']."</td>";
            echo "<td>".$row['Region']."</td>";
            echo "</tbody>";
            echo "</tr>";
        }
        mysqli_close($con);
    ?>
    </table>
      </div>
  </body>
</html>
