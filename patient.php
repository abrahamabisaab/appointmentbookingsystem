<!DOCTYPE html>
<?php
session_start();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Patient Login</title>
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
<div class="search__bar">
<span class="option__title">Search for a Doctor to book an appointment with</span>
<input class="inputs search" type="text" onkeyup="showHint(this.value)" placeholder="Seach...">
  <div id="txtHint"></div> 
  </div> 
<div class="patient__login">  
  <section class="patient__options">
    <h3 class="option__title">Book an appointment</h3>
    <button class="register"><a href="bookAppointment.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">View My Appointments</h3>
    <button class="register"><a href="viewAppointment.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Add a comment to give feedback on your experience</h3>
    <button class="register"><a href="addComment.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Read a comment you've previously posted</h3>
    <button class="register"><a href="readCommentPatient.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Read other people's comments regarding doctor feedback</h3>
    <button class="register"><a href="readComment.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Upload File</h3>
    <button class="register"><a href="upload.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">My Medical Reports</h3>
    <button class="register"><a href="viewReport.php">Click to learn more</a></button>
  </section>
</div>
</div>
  <script>
  function showHint(str)
  {
  	if (str.length==0)	{
  		document.getElementById("txtHint").innerHTML="";
  		return;
  	}
  	xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200)   {
  			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
  		}
  	}
  	xmlhttp.open("GET","hintDoctor.php?q="+str,true);
  	xmlhttp.send();
  }
  </script>
  </body>
</html>
