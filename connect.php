<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_bank";

// Create connection
$con=mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if(!$con)
{
  echo"Not connected";
}

?>
