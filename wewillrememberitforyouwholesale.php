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

$sql = "select np.guid as 'id', np.name as 'name', np.pic as 'pic', np.website as 'website', np.description as 'description', np.textColor as 'textColor', np.background as 'background', count(v.ip) as \"votes\" FROM `desireStream`.nonProfits np left join desireStream.votes v on v.nonProf = np.guid where np.active = 1 GROUP BY np.name;";

$result = $conn->query($sql);
$output = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$id = $row["id"];
		$output[$id]['name'] = $row["name"];
		$output[$id]['pic'] = $row["pic"];
		$output[$id]['website'] = $row["website"];
		$output[$id]['description'] = $row["description"];
		$output[$id]['textColor'] = $row["textColor"];
		$output[$id]['background'] = $row["background"];
		$output[$id]['votes'] = $row["votes"];
    }
}

echo json_encode($output);

$conn->close();

?>