<!DOCTYPE html>
<?php
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Doctor</title>
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
    <form action=addDoctor.php method=POST>
    <div class=fieldset__doctor>
    <h1 class='sign'>Add Doctor</h1>
    <span class=input__text>Name: </span><input class="inputs" type=text name=fn placeholder="Full Name"><br><br></input>
    <span class=input__text>Username : </span><input class="inputs" type=username name=username placeholder="Username"><br><br></input>
    <span class=input__text>Password: </span><input class="inputs" type=password name=password><br><br></input>
    <span class=input__text>Date of Birth: </span><input class="inputs" type=date name=dob placeholder="Date of Birth"><br><br></input>
    <span class=input__text>Gender: </span><select class="inputs" name=gender>
    <option value=0>Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Not Specified">Not Specified</option>
</select>
    <span class=input__text>Cell Number: </span><input class="inputs" type=number name=phonenb placeholder="Your Phone Number"><br><br></input>
    <span class=input__text>Speciality: </span><input class="inputs" type=text name=spec placeholder="Speciality"><br><br></input>
    <span class=input__text>Region: </span><select class="inputs" name=region>
    <option value=0>Select Region</option>
    <option value="Tripoli">Tripoli</option>
    <option value="Koura">Koura</option>
</select>
    <div class="buttons"><input class="register" type=submit name=save value=Save></input>
    <input class="back" type=button onclick="history.back()" value=Back></input></div>
    </div>

    <?php

      if(isset($_POST['save'])){
        $sql="INSERT INTO `user` VALUES ('','{$_POST['fn']}','{$_POST['username']}','{$_POST['password']}','{$_POST['dob']}','{$_POST['gender']}','{$_POST['phonenb']}','3')";
        mysqli_query($con,$sql);
        $user_id = mysqli_insert_id($con);
        $sql2="INSERT INTO `doctor` VALUES('NULL','$user_id','{$_POST['spec']}','{$_POST['region']}')";
        mysqli_query($con,$sql2);
        }
      ?>
  </body>
      </div>
</html>
