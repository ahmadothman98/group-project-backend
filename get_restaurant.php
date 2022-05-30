<?php
header('Access-Control-Allow-Origin: *');  
include("connection.php");

$r_id=$_POST["idRestaurants"];
$query = $mysqli->prepare("SELECT Resto_Name, Resto_Address,Resto_Acc,Resto_rating,Resto_picture,Resto_menu,Resto_average_cost from restaurants where idRestaurants = ? ");
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