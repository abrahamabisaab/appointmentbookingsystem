<?php
session_start();
include("Connection.php");
?>
<html lang="en">
<head>
    <title>Patient Sign Up</title>
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
          <a href="login.php"><button class="signIn">Sign In</button></a>
</nav>  
<div class=fieldset__patient>
<form method="POST" id="signup-form" class="signup-form">
<h2 class="sign">Sign up to book appointments</h2>
<span class="input__text">Name</span>
<input type="text" class="inputs" name="name" id="name" placeholder="Your Name"/>
<span class="input__text">Username</span>
<input type="text" class="inputs" name="username" id="username" placeholder="Username"/>
<span class="input__text">Phone Number</span>
<input type="Number" class="inputs" name="phonenumber" id="phonenumber" placeholder="Phone Number"/>
<span class="input__text">Date of Birth</span>
<input type="date" class="inputs" name="dob" id="date"/>
<span class="input__text">Gender</span>
<select class="inputs" name=gender id=gender >
  <option value=0>Select Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Not Specified">Not Specified</option>
</select>
<span class="input__text">Password</span>
<input type="password" class="inputs" minlength="6" name="password" id="password" placeholder="Password"/>
<span class="input__text">Confirm Password</span>
<span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
<input type="password" class="inputs" minlength="6" name="re_password" id="re_password" placeholder="Repeat your password"/>
<div class="agreament"><input type="checkbox" name="agree-term" id="agree-term" class="check" required="true" />
<label for="agree-term" class="text">I agree all statements in Terms of Service</label></div>
<input type="submit" name="submit" id="submit" class=register value="Sign up"/>
</form>
    </div>
<div>
    <?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=$_POST["username"];
    $name=$_POST["name"];
		$password=$_POST["password"];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $re_password=$_POST["re_password"];
    $phonenumber=$_POST["phonenumber"];
		$roleID=2;
	  $count=0;
        foreach($_POST as $key => $value){
        if(empty($value)){
         $messages[] = "Hey you forgot to fill this field: $key";
            $count++;
    }
}

if($count==0){
  $query="INSERT INTO `user`(`userID`, `name`, `username`, `password`, `dob`, `gender`, `cellNB`, `roleID`) VALUES (NULL,'$name','$username',  '$password','$dob','$gender','$phonenumber', '$roleID')";
  mysqli_query($con, $query);
  $user_id = mysqli_insert_id($con);
  $sql2="INSERT INTO `patient` VALUES('','$user_id')";
  mysqli_query($con,$sql2);
}
        if($password!=$re_password){
            echo "Passwords don't match";
            $count=1234;
            }

        if($count>=1)
        print_r($messages);

            $q="SELECT username FROM `user` ";
             $res = mysqli_query($con,$q);
         while($row=mysqli_fetch_array($res)){
             if($row['username']==$username)
                   echo "Username Exsisted Before";
                   return ;
         }
    }
    ?>

</body>
</html
