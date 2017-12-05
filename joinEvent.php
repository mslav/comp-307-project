<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);


$code = $_POST['code'];
$_SESSION['eventID'] = $code;

$result = $conn->query("SELECT * FROM EVENTS WHERE id = $code");
if($result->num_rows == 0) {
     echo "Event not found";
}


$user = $_SESSION['username'];



$a1 = "SELECT id FROM USERS WHERE username = '$user'";
$a2 = $conn->query($a1);

if ($a2->num_rows > 0 ){
	$row1 = $a2->fetch_assoc();
	$id1 = (int) $row1["id"];
}else{
	echo "failed";
}




$a1 = "SELECT userslist FROM EVENTS WHERE id = '$code'";
$a2 = $conn->query($a1);

if ($a2->num_rows > 0 ){
	$row1 = $a2->fetch_assoc();
	$idString = $row1["userslist"];
}else{
	echo "failed";
}
$idString = $idString . ";" . $id1;


$sql2 = "UPDATE EVENTS SET userslist = '$idString' WHERE id = '$code'";




$sql = "INSERT INTO $user (id) VALUES ('$code')";

if ($conn->query($sql) === TRUE and $conn->query($sql2) === TRUE) {
	header('location: event.html');
	
} else {
	echo "Error, try again later ";
}

$conn->close();
?>
