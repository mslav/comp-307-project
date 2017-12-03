<?php 

$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$user = $_SESSION['username'];

$sql = "SELECT * FROM EVENTS INNER JOIN $user ON EVENTS.id = $user.id; ";
$result = mysql_query($sql);

if ($conn->query($sql) === TRUE) {
} else {
	echo "Error, try again later ";
}

echo "<table>";

while($row = mysql_fetch_array($result)){   
    echo "<tr><td>" . $row['name'] . "</td><td>"; 
}

echo "</table>"; 


$conn->close();
?>