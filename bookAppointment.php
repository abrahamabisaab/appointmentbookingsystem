<!DOCTYPE html>
<?php
session_start();
include('Connection.php');
 ?>
<html>
    <head>
      <link rel="stylesheet" href="./css/main.css">
        <title>Book an Appointment</title>
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
        <div class="fieldset__appointment">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h1 class="sign">Book An Appointment</h2>
				<span class=input__text>Choose Doctor: </span><select class=inputs id="drp" name=doc>
				<?php
					$query= "SELECT * FROM `doctor` d, `user` u where u.userID = d.userID";
					$result = mysqli_query($con,$query);
					while($row = mysqli_fetch_array($result)) {
						echo "<option value=".$row['doctorID'].">" . $row['name'] . "</option>";
					}
				?>
      </select>
				<span class= input__text>Choose Date: </span><input class= inputs type=date name=date>
				<span class= input__text>Choose Start Time: </span><input class=inputs type=time name=Stime>
				<span class= input__text>Choose End Time: </span><input class=inputs type=time name=Etime>
        <div class="buttons"><input type="submit"class="register" name="submit" value="Reserve"/>
                <input type="button" class="back" value="Back" onclick="history.back()"></div>

            </div>

        </div>
</form>
        </div>
    </body>
</html>

<?php
	if (isset($_POST['submit'])){

    $did = $_POST["doc"];
		$Date = $_POST["date"];
		$STime = $_POST["Stime"];
		$ETime = $_POST["Etime"];
		$ok = false;
		$reservable = true;
		$starttime;
		$endtime;
		if(isset($Date) && isset($STime) && isset($ETime)){
			if(!empty($Date) && !empty($STime) && !empty($ETime)){
				$ok = true;
			}else echo"All fields required!";
		}else echo"Invaild Input Data!";

		if($ok){
			$query = "SELECT * FROM `reserve` WHERE doctorID='$did' AND Date='$Date'";
			$result=mysqli_query($con, $query);
			$nbrows=mysqli_num_rows($result);
			if ($nbrows > 0){
				while($row = mysqli_fetch_array($result)){
					$starttime = strtotime($row['StartTime']);
					$endtime = strtotime($row['EndTime']);
					$s=strtotime($STime);
					$e=strtotime($ETime);
					if((($e >= $starttime) && ($e <= $endtime))
					|| (($s >= $starttime) && ($s <= $endtime)))
					{
						echo "This Doctor is not available at this time";
						$reservable = false;
					}
				}
			}
		}
    else $reservable = false;
    $userID = $_SESSION['userID'];
    $q= "SELECT * FROM `patient` WHERE userID = '$userID'";
    $result =mysqli_query($con,$q);
    $row = mysqli_fetch_array($result);
    $pid = $row['patientID'];

		if($reservable){
      $query="INSERT INTO `reserve` (`appointmentID`, `patientID`, `doctorID`, `Date`, `StartTime`, `EndTime`) VALUES (NULL, '$pid', '$did', '$Date', '$STime', '$ETime')";
			if(!$result=mysqli_query($con, $query)) echo mysqli_error($con);
			else echo "Reserved Successfully";
		}
}
?>
