
<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "farmvegetables";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>
