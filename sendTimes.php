<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$user = $_SESSION['username'];
$id = $_POST['eventId'];

$eventQuery = "SELECT userslist FROM EVENTS WHERE id = '$id'";
$eventId = $conn->query($eventQuery);

if ($eventId->num_rows > 0 ){
	$row = $eventId->fetch_assoc();
	$users = $row["userslist"];
}else{
	echo "failed";
}

$eventQuery = "SELECT name FROM EVENTS WHERE id = '$id'";
$eventId = $conn->query($eventQuery);

if ($eventId->num_rows > 0 ){
	$row = $eventId->fetch_assoc();
	$eName = $row["name"];
}else{
	echo "failed";
}

$delimeter = ';';
$allTimes = '';
$a = explode($delimeter,$users);
foreach ($a as &$userId) {
    $eventQuery = "SELECT username FROM USERS WHERE id = '$userId'";
    $eventId = $conn->query($eventQuery);
    if ($eventId->num_rows > 0 ){
        $row = $eventId->fetch_assoc();
        $tempUser = $row["username"];
    }else{
        echo "failed";
    }




    $eventQuery = "SELECT availableTime FROM $tempUser WHERE id = '$id'";
    $eventId = $conn->query($eventQuery);
    
    if ($eventId->num_rows > 0 ){
        $row = $eventId->fetch_assoc();
        $time = $row["availableTime"];
    }else{
        echo "failed";
    }

    $allTimes = $allTimes . $time;
}

echo '<form name="myForm" id="myForm" action="eventGroup.html" method="get"> 
        <input type=\'hidden\' name="allTimes" value=" ' . $allTimes . ' " /> 
        <input type=\'hidden\' name="eName" value=" ' . $eName . ' " />
      </form> 

    
  
  <script type="text/javascript">
      window.onload=function(){
        document.forms["myForm"].submit();     
      }
  </script> ';

$conn->close();
?>