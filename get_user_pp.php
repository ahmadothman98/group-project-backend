<?php
header('Access-Control-Allow-Origin: *');  
include("connection.php");

$u_id=$_POST["idUsers"];
$query = $mysqli->prepare("SELECT User_Ppic from users where idUsers = ? ");
$query->bind_param("s",$u_id);
$query->execute();
$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
}
$json = json_encode($response);
echo $json;


?>