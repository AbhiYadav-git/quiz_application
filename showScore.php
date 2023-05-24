<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `user_name`, `user_score` FROM `user_scores` ORDER BY `id` DESC";
$result = $conn->query($sql);

$sendData = array();
if ($result->num_rows > 0) {
  $i = 0;
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $sendData[$i] = $row;
    $i++;
  }
}
echo json_encode($sendData);
$conn->close();


?>

