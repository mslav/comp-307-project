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
		<h4>Login</h4>
		<div class="alert alert-danger">
			<strong>Invalid login!</strong> Please check your username and password and try again.
		</div>
		<a href="index.html" class="btn btn-default" role="button">Return</a>
	</div>
</body>

</html>';
}

$conn->close();
?>
