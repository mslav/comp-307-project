<?php 

$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";
$database2 = "USER_EVENTS";

$conn = new mysqli($servername, $username, $password, $database);

$newName = $_POST['username'];
$newPassword = $_POST['password'];
$newEmail = $_POST['email'];


	// Check if the username is available:
	$sql = "SELECT id FROM USERS WHERE username = '$newName'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

	
	if($count == 1){
		
	exit("Unavailable username.");

	}else if(empty($newName) or empty($newPassword) or empty($newEmail) ){
		
		exit("Missing information.");
		
	}else{	// Create the account:
	
	
		$sql = "INSERT INTO USERS (username, password, email)
		VALUES ('$newName', '$newPassword', '$newEmail')";
		
		// add a table to store the events
		$conn2 = new mysqli($servername, $username, $password, $database2);
		$sql2 = "CREATE TABLE `{$newName}` (
		id INT(11))";
		
		
		if ($conn->query($sql) === TRUE && $conn2->query($sql2) === TRUE) {
			echo "New account created successfully !";
		} else {
			echo "Error, try again later ";
		}
	}
$conn->close();
?>
