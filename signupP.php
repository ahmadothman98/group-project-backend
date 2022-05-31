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
$query = $mysqli->prepare("INSERT INTO users(User_email, username, User_Lname, User_password) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $email,$username,$last_name,$password);
$query->execute();

$result = [];

$result ["success"] = true;

echo json_encode($result);

//$query = $mysqli->prepare("SELECT ID FROM USERS WHERE EMAIL = ? AND PASSWORD = ?");
// $query->bind_param("ss", $email, $password, $Date_of_birth,$choice_gender);


?>
