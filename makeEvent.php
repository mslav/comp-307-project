<?php 
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";
$conn = new mysqli($servername, $username, $password, $database);
$newName = $_POST['name'];
$newDate = $_POST['date'];
$sql = "INSERT INTO EVENTS (name, date)
VALUES ('$newName', '$newDate')";
if ($conn->query($sql) === TRUE) {
	echo "Event Created!";
} else {
	echo "Error, try again later ";
}
$conn->close();
?>
