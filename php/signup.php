<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$securityquestion = $_POST['securityquestion'];
$securityquestionanswer = $_POST['securityquestionanswer'];

// database connection
$conn = new mysqli('localhost', 'root', '', 'itech_college');

if($conn->connect_error){
    die('Connection Failed : ' .$conn->connect_error);
}else{
    $stmt  = $conn->prepare("insert into users(username, email, password, 
    confirmpassword, securityquestion,securityquestionanswer) values (?,?,?,?,?,?)");
    $stmt -> bind_param("ssssss", $username, $email, $password, $confirmpassword,
    $securityquestion, $securityquestionanswer);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}


?>