<?php 

$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);


$code = $_POST['code'];

$result = $conn->query("SELECT * FROM EVENTS WHERE id = $code");
if($result->num_rows == 0) {
     echo "Event not found";
}


$user = $_SESSION['username'];

$sql = "INSERT INTO $user (id) VALUES ('$code')";

if ($conn->query($sql) === TRUE) {
	header('location: eventsJoined.php');
	
} else {
	echo "Error, try again later ";
}

$conn->close();
?>
