<?php
include("connection.php");
$email = $_POST["User_email"]; 
$username = $_POST["username"];
$password =  hash("sha256", $_POST["User_password"]);
$Date_of_birth = $_POST["Date_of_birth"];
$choice_gender = rand(0, 1);
if($choice_gender == 0){
    $gender = "Male";
}else{
    $gender = "Female";
}
$number = rand();
$query = $mysqli->prepare("INSERT INTO users(User_email, f_name, User_password) VALUES (?, ?, ?)");
$query->bind_param("sss", $email, $username, $password);
$query->execute();

$result = [];

$result ["success"] = true;

echo json_encode($result);

?>
