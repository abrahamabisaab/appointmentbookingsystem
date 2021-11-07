<!DOCTYPE html>
<?php
session_start();
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Patient</title>
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
    <form action=addPatient.php method=POST>
    <div class=fieldset__patient>
    <h1 class='sign'>Add Patient</h1>
    <span class=input__text>Name: </span><input class="inputs" type=text name=fn placeholder="Your Full Name"><br><br></input>
    <span class=input__text>Username : </span><input class="inputs" type=username name=username placeholder="Your Username"><br><br></input>
    <span class=input__text>Password : </span><input class="inputs" type=password name=password><br><br></input>
    <span class=input__text>Date Of Birth : </span><input class="inputs" type=date name=dob placeholder="Date of Birth"><br><br></input>
    <span class=input__text>Gender: </span><select class="inputs" name=gender>
    <option value=0>Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Not Specified">Not Specified</option>
</select>
    <span class=input__text>Phone Number : </span><input class="inputs" type=number name=phonenb placeholder="Your Phone Number"><br><br></input>
    <input class="register" type=submit name=save value=Save></input>
    <input class="back" type=button onclick="history.back()" value=Back></input>
    </div>

    <?php
    	if(isset($_POST['save'])){
    		$sql="INSERT INTO `user` VALUES ('','{$_POST['fn']}','{$_POST['username']}','{$_POST['password']}','{$_POST['dob']}','{$_POST['gender']}','{$_POST['phonenb']}','2')";
        mysqli_query($con,$sql);
        $user_id = mysqli_insert_id($con);
        $sql2="INSERT INTO `patient` VALUES('','$user_id')";
        mysqli_query($con,$sql2);
        }
    	?>
  </body>
      </div>
</html>
