<?php 
session_start();

$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$tryName = $_POST['username'];
$tryPassword = $_POST['password'];


$sql = "SELECT id FROM USERS WHERE username = '$tryName' and password = '$tryPassword'";
$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);


if($count == 1){
	$_SESSION['username'] = $tryName;
	header('location: dashboard.html');
	
}else{	
	
	echo "Invalid input.";
}

$conn->close();
?>