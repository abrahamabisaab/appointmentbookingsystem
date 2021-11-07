<!DOCTYPE html>
<?php
session_start();
include 'topbar.php';
include 'Connection.php';
include 'navbar.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Patient</title>
  </head>
  <style>
  body{

    overflow-y: scroll;
  }

    .fieldset{
      padding-bottom: 15px;
      padding-top: 5px;
      border-radius: 1.5em;
      box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
      height: auto;
      width: 430px;
      margin-left: 36%;
      margin-top: 8%;
      margin-bottom: 6%;
      background-color: white;

    }
    .text{
      font-size: 19px;
      font-family: Arial, Helvetica, sans-serif;
      margin-left: 20%;
    }
    .input1{
      display: inline-block;
      border-radius: 4px;
      background-color: dodgerblue;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 20px;
      padding: 10px;
      width: 100px;
      transition: all 0.5s;
      cursor: pointer;
      margin-left: 20%;
}
      .input2{
        display: inline-block;
        border-radius: 4px;
        background-color: grey;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 20px;
        padding: 10px;
        width: 100px;
        transition: all 0.5s;
        cursor: pointer;
        margin-left: 7%;

    }
    .inputs{
      width: 35%;
      padding: 6px 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .title{
      color: #0066cc;
      font-family: 'Aclonica';
      font-size: 40px;
      font-weight: bold;
    }
  </style>
  <body>

    <form action=addPatient.php method=POST>
    <div class=fieldset>
    <h1 align=center class='title'>Add Patient</h1>
    <span class=text>Name: </span><input class="inputs" type=text name=fn placeholder="Your Full Name"><br><br></input>
    <span class=text>Username : </span><input class="inputs" type=username name=username placeholder="Your Username"><br><br></input>
    <span class=text>Password : </span><input class="inputs" type=password name=password><br><br></input>
    <span class=text>Date Of Birth : </span><input class="inputs" type=date name=dob placeholder="Date of Birth"><br><br></input>
    <span class=text>Gender: </span><select class="inputs" name=gender>
    <option value=0>Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Not Specified">Not Specified</option>
</select>
    <span class=text>Phone Number : </span><input class="inputs" type=number name=phonenb placeholder="Your Phone Number"><br><br></input>
    <input class="input1" type=submit name=save value=Save></input>
    <input class="input2" type=button onclick="history.back()" value=Back></input>
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
</html>
