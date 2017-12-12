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
		
	exit('<html>

<head>
	<title>Online Meeting Planner</title>
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
	<link rel="manifest" href="/icons/manifest.json">
	<link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-config" content="/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- external stylesheet -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery -->
	<script src="jquery-3.2.1.min.js"></script>
	<!-- BootStrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="jumbotron text-center">
		<h1>Online Meeting Planner</h1>
		<p>Plan your meeting without hassle!</p>
	</div>
	<div class="container">
		<h4>Create an account</h4>
		<div class="alert alert-warning">
			<strong>Unavailable username!</strong> Please choose another username and try again.
		</div>
		<a href="createAccount.html" class="btn btn-default" role="button">Return</a>
	</div>
</body>

</html>');
	}else if(empty($newName) or empty($newPassword) or empty($newEmail)){
		
		exit('<html>

<head>
	<title>Online Meeting Planner</title>
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
	<link rel="manifest" href="/icons/manifest.json">
	<link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-config" content="/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- external stylesheet -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery -->
	<script src="jquery-3.2.1.min.js"></script>
	<!-- BootStrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="jumbotron text-center">
		<h1>Online Meeting Planner</h1>
		<p>Plan your meeting without hassle!</p>
	</div>
	<div class="container">
		<h4>Create an account</h4>
		<div class="alert alert-warning">
			<strong>Missing information!</strong> Please make sure you fill out all the forms.
		</div>
		<a href="createAccount.html" class="btn btn-default" role="button">Return</a>
	</div>
</body>

</html>');
		
	}else{	// Create the account:
	
	
		$sql = "INSERT INTO USERS (username, password, email)
		VALUES ('$newName', '$newPassword', '$newEmail')";
		
		// add a table to store the events
		$sql2 = "CREATE TABLE `{$newName}` (id INT(11) AUTO_INCREMENT PRIMARY KEY, availableTime VARCHAR(60))";
		
		// add a row to ATTEMPTS:
		$sql3 = "INSERT INTO ATTEMPTS (username, number)
		VALUES ('$newName', '0')";
		
		
		
		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
			echo '<!DOCTYPE html>
<html>

<head>
	<title>Online Meeting Planner</title>
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/icons/favicon-16x16.png">
	<link rel="manifest" href="/icons/manifest.json">
	<link rel="mask-icon" href="/icons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-config" content="/icons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- external stylesheet -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery -->
	<script src="jquery-3.2.1.min.js"></script>
	<!-- BootStrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="jumbotron text-center">
		<h1>Online Meeting Planner</h1>
		<p>Plan your meeting without hassle!</p>
	</div>
	<div class="container">
		<h4>Create an account</h4>
		<div class="alert alert-success">
			<strong>Account created!</strong> Login and plan your meeting now.
		</div>
		<a href="index.html" class="btn btn-default" role="button">Login</a>
	</div>
</body>

</html>';
		} else {
			echo "Error, try again later ";
		}
	}
$conn->close();
?>
