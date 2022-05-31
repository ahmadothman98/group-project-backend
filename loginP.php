<?php
include("connection.php");
$username = $_POST["username"]; //we should get the data from the user, no?
$password = hash("sha256", $_POST["password"]);
$query = $mysqli->prepare("Select id from users where username = ? AND password = ?");
$query->bind_param("ss", $username, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();
$response = [];
if($num_rows == 0){
    $response["response"] = "User Not Found";
}else{
    $response["response"] = "Logged in";
    $response["user_id"] = $id;
}
$json == json_encode($response);
echo $json;
?>