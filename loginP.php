<?php
include("connection.php");

$username = $_POST["user_fname"];
$password = hash("sha256", $_POST["User_password"]);
echo($password);
echo($username);
$query = $mysqli->prepare("Select idUsers from Users where user_fname = ? AND User_password = ?");
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
$json = Null;
$json == json_encode($response);
echo $json;
?>