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
	 exit('<!DOCTYPE html>
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
		<h4>Join Event</h4>
		<div class="alert alert-danger">
			<strong>Event not found!</strong> Check your event code and try again.
		</div>
		<a href="join.html" class="btn btn-default" role="button">Return</a>
	</div>
</body>

</html>');
}


$user = $_SESSION['username'];



$a1 = "SELECT id FROM USERS WHERE username = '$user'";
$a2 = $conn->query($a1);

if ($a2->num_rows > 0 ){
	$row1 = $a2->fetch_assoc();
	$id1 = (int) $row1["id"];
}else{
	echo "failed retreiving user id";
}




$a1 = "SELECT userslist FROM EVENTS WHERE id = '$code'";
$a2 = $conn->query($a1);

if ($a2->num_rows > 0 ){
	$row1 = $a2->fetch_assoc();
	$idString = $row1["userslist"];
}else{
	echo "failed to retreive users";
}
$idString = $idString . ";" . $id1;


$sql2 = "UPDATE EVENTS SET userslist = '$idString' WHERE id = '$code'";




$sql = "INSERT INTO $user (id) VALUES ('$code')";

if ($conn->query($sql) === TRUE and $conn->query($sql2) === TRUE) {
	header('location: event.html');
	
} else {
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
		<h4>Join Event</h4>
		<div class="alert alert-info">
			<strong>Event already joined!</strong> To make a new event, please go to the dashboard.
		</div>
		<a href="dashboard.html" class="btn btn-default" role="button">Return to dashboard</a>
	</div>
</body>

</html>';
}

$conn->close();
?>
