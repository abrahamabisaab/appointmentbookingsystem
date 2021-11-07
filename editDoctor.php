<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Doctor</title>
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
    <?php
    session_start();
    include 'Connection.php';
    $x=$_POST['name'];
        echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=post>";
        if(!$con) die(mysqli_connect_error());
        $q="SELECT * FROM user WHERE userID='$x'";
        $result=mysqli_query($con,$q);
        $row=mysqli_fetch_array($result);
        echo"<div class=fieldset__doctor>";
        echo "<input type=hidden name=ID value=$x>";
        echo "<span class=input__text>Name: </span><input type=text class=inputs name=Name value='{$row['name']}'><br><br>";
        echo "<span class=input__text>Date of Birth: </span><input type=date class=inputs name=dob value={$row['dob']}><br><br>";
        echo "<span class=input__text>Gender: </span><input type=text class=inputs name=gender value={$row['gender']}><br><br>";
        echo "<span class=input__text>Cell Number: </span><input type=number class=inputs name=cellnb value={$row['cellNB']}><br><br>";
        echo "<div class=buttons><input type=submit class=register name='edit_Doctor'>";
        echo "<input type=button class=back value=Back onclick=history.back()></div>";
        echo "</form>";
        echo"</div>";
        if(isset($_POST["edit_Doctor"])){
                $qq="UPDATE `user` SET `name`='{$_POST['Name']}',`dob`='{$_POST['dob']}',
                `gender`='{$_POST['gender']}',`cellNB`={$_POST['cellnb']} WHERE userID='{$_POST['ID']}'";
                mysqli_query($con,$qq);
    }
?>
  </body>
  </div>
</html>
