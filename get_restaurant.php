<?php
header('Access-Control-Allow-Origin: *');  
include("connection.php");

$r_id=$_GET["idRestaurants"];
$query = $mysqli->prepare("SELECT * from restaurants where idRestaurants = ? ");
$query->bind_param("s",$r_id);
$query->execute();
$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
}


$json = json_encode($response);
echo $json;

?>