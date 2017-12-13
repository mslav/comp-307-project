<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$newName = $_POST['name'];
$newDate = $_POST['date'];
$user = $_SESSION['username'];

$newName = $newName . ' on ' . $newDate;

$a1 = "SELECT id FROM USERS WHERE username = '$user'";
$a2 = $conn->query($a1);

if ($a2->num_rows > 0 ){
	$row1 = $a2->fetch_assoc();
	$id1 = (int) $row1["id"];
}else{
	echo "failed";
}



$sql = "INSERT INTO EVENTS (name, date, userslist) VALUES ('$newName', '$newDate','$id1')";

$conn->query($sql);

$eventQuery = "SELECT id FROM EVENTS WHERE name = '$newName'";
$eventId = $conn->query($eventQuery);

if ($eventId->num_rows > 0 ){
	$row = $eventId->fetch_assoc();
	$id = (int) $row["id"];
}else{
	echo "failed";
}
$_SESSION['eventID'] = $id;

$sql2 = "INSERT INTO $user (id) VALUES ('$id')";


if ($conn->query($sql2) === TRUE) {
	header('location: event.html?eventName=' . $newName . '&eventCode=' . $id);
	
} else {
	echo "Error, try again later ";
}

$conn->close();
?>
