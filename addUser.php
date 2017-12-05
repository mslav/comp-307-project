<?php 
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";
$conn = new mysqli($servername, $username, $password, $database);
$newName = $_POST['username'];
$newPassword = $_POST['password'];
$newEmail = $_POST['email'];
	// Check if the username is available:
	$sql = "SELECT id FROM USERS WHERE username = '$newName'";
	$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	
	if($count == 1 or $newName === "ATTEMPTS" or $newName === "EVENTS" or $newName === "USERS"){
		
	exit("Unavailable username.");
	}else if(empty($newName) or empty($newPassword) or empty($newEmail)){
		
		exit("Missing information.");
		
	}else{	// Create the account:
	
	
		$sql = "INSERT INTO USERS (username, password, email)
		VALUES ('$newName', '$newPassword', '$newEmail')";
		
		// add a table to store the events
		$sql2 = "CREATE TABLE `{$newName}` (id INT(11), availableTime VARCHAR(60))";
		
		// add a row to ATTEMPTS:
		$sql3 = "INSERT INTO ATTEMPTS (username, number)
		VALUES ('$newName', '0')";
		
		
		
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
			echo "New account created successfully !";
			echo '<html><a href="index.html">Login!</a></html>';
		} else {
			echo "Error, try again later ";
		}
	}
$conn->close();
?>