<!DOCTYPE html>
<?php
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Files for Download</title>
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <?php
    $thelist="";
    include('../Connection.php');
    session_start();
    $userID = $_SESSION['userID'];
    $q= "SELECT * FROM `doctor` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $doctorID = $row['doctorID'];

    $q = "SELECT DISTINCT up.filename, u.name FROM `uploads` up, `reserve` r, `patient` p, `user` u WHERE up.patientID = r.patientID AND r.doctorID ='$doctorID' AND up.patientID = p.patientID AND u.userID = p.userID";
    $res = mysqli_query($con, $q);
    $x = array();
    $a;
    if ($handle = opendir('.')) {
      while($row = mysqli_fetch_array($res)) {
        $x['name'] = $row['name'];
        $x['filename'] = $row['filename'];
        $a[] = $x;
        //array_push($x, array($row['name'],$row['filename']));
      }
      while (false !== ($file = readdir($handle))) {
        if($file != "." && $file != ".."){
          for($i = 0; $i<sizeof($x); $i++) if($a[$i]['filename'] == $file)
          $thelist .= "<li>".$a[$i]['name'].": <a href=\"".$file."\">".$file."</a></li>";
        }
      }
      closedir($handle);
    }

?>
<div class="container">
<nav class="navbar">
          <span class="logo">What'sUpDoc?</span>
          <ul class="nav__list">
            <li><a href="index.php" class="nav__link">home</a></li>
            <li><a href="#" class="nav__link">about</a></li>
            <li><a href="#" class="nav__link">contact</a></li>
          </ul>
          <a href="../login.php"><button class="signIn">Logout</button></a>
</nav>  
<h1 class="sign">List of files:</h1>
<ul><?php echo $thelist; ?></ul>
  </body></div>
</html>
