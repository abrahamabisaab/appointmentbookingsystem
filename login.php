
<!DOCTYPE html>
<?php
session_start();
include('Connection.php');
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/main.css" />
<title>Login Page</title>
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
          <a href="signup.php"><button class="signIn">Register</button></a>
</nav>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="fieldset__patient">
  <span class="login__span">Welcome Back! Login to your account</span>
    <span class="input__span">Username</span><input class="username inputs" type="username" name="username" placeholder="Username" id="inputEmail">
    <span class="input__span">Password</span><input class="password inputs" type="password" name="password" placeholder="Password" id="inputPassword">
    <div class="remember__div"><input class="rememberme" name="rememberme" value="remember" type="checkbox" id="rememberme"><span class="remembertext"> Remember Me</span></div>
    <button class="submit register" type="submit" name="submit" align="center">Sign In</button>
    <p class= "forgot">Don't Have an Account? <a href=signup.php><u>Sign Up</u></p>
</div>
</div>
</form>
<?php
   if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
    if(!$con){
            die("Connection Error: ".mysqli_connnect_error());
        }
            $sql="select * from user where password='{$_COOKIE['password']}'
            AND username='{$_COOKIE['username']}'";
            $result=mysqli_query($con,$sql);//execute the query
            $nbrows=mysqli_num_rows($result);//return the number of rows
    if ($nbrows == 1) {
            $res = mysqli_fetch_array($result);
    if($res['roleID'] ==1){//admin
            header("location: admin.php"); // Redirecting To Other Page
}
    else if('roleID'==2)
            header("location: patient.php"); // Redirecting To Other Page
   }
    else if ('roleID'==3){
            header("location: doctor.php");
          }
   }
   else{
     if (isset($_POST['submit'])) {
       if (empty($_POST['username']) || empty($_POST['password']))
            echo '<h2 style="color:red" >Username or Password is empty</h2>';
   else{
            $username=$_POST['username'];
            $password=$_POST['password'];
   if(isset($_POST['rememberme'])){
            setcookie('username',$username,time()+60*60*24*7,'/senior');
            setcookie('password',$password,time()+60*60*24*7,'/senior');
        }

            $username = stripslashes($username);
            $password = stripslashes($password);
   if(!$con){
            die("Connection Error: ".mysqli_connnect_error());
        }

            $sql="select * from user where password='$password'
            AND username='$username'";
            $_SESSION['password']=$password;
            $result=mysqli_query($con,$sql);//execute the query
            $nbrows=mysqli_num_rows($result);//return the number of rows
  if ($nbrows == 1) {
            $res = mysqli_fetch_array($result);
            $_SESSION['userID']=$res['userID'];
      //session_start();
    //  $_SESSION['un'] = $username;
  if($res['roleID'] ==1){//admin
            header("location: admin.php"); // Redirecting To Other Page
}
  else if($res['roleID']==2)
            header("location: patient.php"); // Redirecting To Other Page

  else if ($res['roleID']==3){
            header("location: doctor.php");
   }
 }

            mysqli_close($con); // Closing Connection
  }
}

    }


?>
</body>
</html>
