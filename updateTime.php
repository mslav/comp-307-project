<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$user = $_SESSION['username'];
$id = $_SESSION['eventID'];


$times = $_POST['userAvailability'];  

$sql2 = "UPDATE $user SET availableTime = '$times' WHERE id = '$id'";


if ($conn->query($sql2) === TRUE) {
	echo "Time Set!";
	echo '<a href="dashboard.html">Go back to dashboard</a> <br>';
	
} else {
	echo "Error, try again later ";
}



$conn->close();
?>