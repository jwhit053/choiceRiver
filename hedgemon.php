<?php
$subject = $_SERVER['QUERY_STRING'];
$pattern = '/\d+/';
$servername = "localhost";
$username = "root";
$password = "MyNewPass";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

date_default_timezone_set('UTC');
$objDateTime = new DateTime();
preg_match($pattern, $subject, $matches);
$sql = "insert into desireStream.votes (nonprof, ip) values ('".$matches[0]."', '".$_SERVER['REMOTE_ADDR']."')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>