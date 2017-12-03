<?php 

$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$newName = $_POST['username'];
$newPassword = $_POST['password'];
$newEmail = $_POST['email'];


$sql = "INSERT INTO USERS (username, password, email)
VALUES ('$newName', '$newPassword', '$newEmail')";

if ($conn->query($sql) === TRUE) {
	echo "New account created successfully !";
} else {
	echo "Error, try again later ";
}

$conn->close();
?>
