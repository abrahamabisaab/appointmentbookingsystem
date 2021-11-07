<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  table.steelBlueCols {
    font-family: Arial, Helvetica, sans-serif;
    border: 0px solid #555555;
    background-color: #bbb;
    width: auto;
    height: auto;
    text-align: center;
    border-collapse: collapse;
    margin-left: 30%;
  }
  table.steelBlueCols td, table.steelBlueCols th {
    border: 1px solid #ccc;
    padding: 7px 10px;
  }
  table.steelBlueCols tbody td {
    font-size: 14px;
    font-weight: bold;
    color: #FFFFFF;
  }
  table.steelBlueCols tr:nth-child(even) {
    background: #CCCCCC;
  }
  table.steelBlueCols thead {
    background: dodgerblue;
    border-bottom: 1px solid #CCCCCC;
  }
  table.steelBlueCols thead th {
    font-size: 15px;
    font-weight: bold;
    color: #FFFFFF;
    text-align: center;
    border-left: 1px solid #CCCCCC;
  }
  table.steelBlueCols thead th:first-child {
    border-left: none;
  }
  }
  </style>
  <body>
    <?php
    include 'Connection.php';
    $q=$_GET["q"];
    $query = "Select * from user u, doctor d where name like'$q%' AND roleID=3 AND d.userID=u.userID";
    $r = mysqli_query($con,$query) ;
    echo "<table class=steelBlueCols>";
    echo "<tr>"."<td>"."Name"."</td>"."<td>"."Username"."</td>"."<td>"."Gender"."</td>"."<td>"."Cell Number"."</td>"."<td>"."Speciality"."</td>"."<td>"."Region"."</td>"."</tr>";
     while($row = mysqli_fetch_array($r) ) {

        echo "<tr><td>".$row['name']."</td>";
    	  echo "<td>".$row['username']."</td>";
    	  echo "<td>".$row['gender']."</td>";
    	  echo "<td>".$row['cellNB']."</td>";
        echo "<td>".$row['Speciality']."</td>";
        echo "<td>".$row['Region']."</td></tr>";
    echo "</table>";
     }
     mysqli_close($con);

    ?>

  </body>
</html>
