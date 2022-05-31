<?php
header('Access-Control-Allow-Origin: *');
// Admin must be able to upload restaurant's name, location, cuisine, wheelchair accessibility
include("connection.php");
$resto_name = $_POST["resto_name"];
$resto_loc = $_POST["resto_loc"];
$resto_desc = $_POST["resto_desc"];
$resto_cuisine = $_POST["resto_cuisine"];
$resto_rating = 0;
$resto_picture = $_POST["resto_pictures"];
$resto_socials = $_POST["resto_socials"];
$resto_menu = $_POST["resto_menu"];
$resto_avg_cost = 0;

$query = $mysqli->prepare("INSERT INTO Restaurants(Resto_Name, Resto_Address, Resto_Cat, Resto_rating, Resto_socials, Resto_menu, Resto_average_cost) VALUES (?, ?, ?, ?, ? ,? ,?)"); //these should be the same name as the names in the database
$query->bind_param("sssissi", $resto_name, $resto_loc, $resto_cuisine, $resto_rating, $resto_socials, $resto_menu,$resto_avg_cost);
$query->execute();


$response = [];
$response["success"] = true;

function encodeImage($image){
    $path = "C:\\xampp\\htdocs\\assets\\".$image;
    echo($path);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
?>