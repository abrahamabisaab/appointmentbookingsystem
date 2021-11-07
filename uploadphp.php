<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $target_dir = "files/";
    include('Connection.php');
    session_start();
    $userID = $_SESSION['userID'];
    $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $patientID = $row['patientID'];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
           $q = "INSERT INTO `uploads` VALUES (NULL, '$patientID', '{$_FILES["fileToUpload"]["name"]}')";
           mysqli_query($con, $q);
    } else {
            echo "Sorry, there was an error uploading your file.";
      }
    ?>
  </body>
</html>
