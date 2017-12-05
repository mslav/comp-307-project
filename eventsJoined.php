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


while($row = mysqli_fetch_array($result)){   
    echo $row['name'] . '<form action="sendTimes.php" method="post"> <input type=\'hidden\' name="eventId" value=" ' . $row['id'] . ' " /> <input type="submit" value="go"> </form> <br>'; 
}

echo '<a href="dashboard.html">Go back to dashboard</a> <br>';


$conn->close();
?>