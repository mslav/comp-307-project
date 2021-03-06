<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$user = $_SESSION['username'];
$id = $_SESSION['eventID'];


$times = $_POST['userAvailability'];
$eName = $_POST['eName'];

$sql2 = "UPDATE $user SET availableTime = '$times' WHERE id = '$id'";


if ($conn->query($sql2) === TRUE) {
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
		<h4>Event ' . $eName . '</h4>
		<div class="alert alert-success">
			<strong>Time set!</strong> Hooray.
		</div>
		<a href="dashboard.html" class="btn btn-default" role="button">Return to dashboard</a>
	</div>
</body>

</html>';
} else {
	echo "Error, try again later ";
}



$conn->close();
?>