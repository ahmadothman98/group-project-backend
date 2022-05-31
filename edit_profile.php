
<?php
include("connection.php");
$u_id = $_POST["idUsers"];
$User_Ppic = $_POST["User_Ppic"];
$user_fname = $_POST["user_fname"];
$User_Lname = $_POST["User_Lname"];
$User_bio = $_POST["User_bio"];
$User_email = $_POST["User_email"];
$User_password = hash("sha256", $_POST["User_password"]);
$query = $mysqli->prepare("update users set user_fname = ? ,User_Lname = ?,User_Ppic=?, User_bio = ?,User_email = ?,User_password =? where idUsers = ?");
$query->bind_param("sssssss",$user_fname,$User_Lname,$User_Ppic,$User_bio,$User_email,$User_password,$u_id);
$query->execute();

$result = [];
$result ["success"] = true;
echo json_encode($result);

?>