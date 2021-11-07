<!DOCTYPE html>
<?php
include 'Connection.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Choose Account</title>
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
    <div class="fieldset">
    <div class="container">
    <div class="fieldset__patient">
    <h2 class=fieldset__title>Patient Account</h2>
    <p class=fieldset__paragraph>Looking for a doctor?  Want to book an appointment? Sign up as a patient and use these features among others.</p>
    <br>
<a class="register" href="signupPatient.php">Sign Up As Pateint</a>

</div>
<div class="fieldset__doctor">
    <h2 class="fieldset__title">Doctor Account</h2>
    <p class="fieldset__paragraph">Looking to join the community and find patients? Sign up as a doctor for more features!</p>
<br>
<a class="register" href="signupDoctor.php">Sign Up As Doctor</a>
  </div>
    </div>
    </div>
</div>
</body>
</html>
