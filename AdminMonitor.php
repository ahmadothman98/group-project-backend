<?php
include("connection.php");

$query = $mysqli->prepare("SELECT User_review from reviews");
$query->execute();
$array = $query->get_result();
$review_list = [];
while($reviews = $array->fetch_assoc()){
    $review_list[] = $reviews;
} 

$json = json_encode($review_list);
echo $json;

?>