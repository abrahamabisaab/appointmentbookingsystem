<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="patient__login">  
  <section class="patient__options">
    <h3 class="option__title">Add a patient account</h3>
    <button class="register"><a href="addPatient.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">View a Patient's Account</h3>
    <button class="register"><a href="viewPatient.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Update a Patient's Account</h3>
    <button class="register"><a href="updatePatient.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Delete a Patient's Account</h3>
    <button class="register"><a href="deletePatient.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Add a Doctor's Account</h3>
    <button class="register"><a href="addDoctor.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">View a Doctor's Account</h3>
    <button class="register"><a href="viewDoctor.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Update a Doctor's Account</h3>
    <button class="register"><a href="updateDoctor.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Delete a Doctor's Account</h3>
    <button class="register"><a href="deleteDoctor.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">Delete a Comment</h3>
    <button class="register"><a href="deleteComment.php">Click to learn more</a></button>
  </section>
  <section class="patient__options">
    <h3 class="option__title">View All Comments</h3>
    <button class="register"><a href="readComment.php">Click to learn more</a></button>
  </section>
</div>
</div>
</body>
</html>