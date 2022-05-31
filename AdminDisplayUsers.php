<?php
include("connection.php");

$query = $mysqli->prepare("SELECT * from users");
$query->execute();
$array = $query->get_result();
$users_list = [];
while($users = $array->fetch_assoc()){
    $users_list[] = $users;
} 
$json = json_encode($users_list);
echo $json;

?>