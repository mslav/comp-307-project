<?php 
session_start();
$servername = "localhost";
$username = "comp307";
$password = "password";
$database = "USER_BASE";

$conn = new mysqli($servername, $username, $password, $database);

$user = $_SESSION['username'];

$sql = "SELECT * FROM EVENTS INNER JOIN $user ON EVENTS.id = $user.id";
$result = mysqli_query($conn,$sql);

echo "<table>";

while($row = mysqli_fetch_array($result)){   
    echo "<tr><td>" . $row['name'] . "</td><td>"; 
}

echo "</table>"; 


$conn->close();
?>
