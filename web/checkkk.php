<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$email = "sapu@gmail.com";
$password = "123";
$fname="sapuni";
$lname="nethmini";
$phone="0768069648";
$roler="Admin";
$username_error="";
$password_error="";
$success="";

if(isset($_POST['email']) && isset($_POST['password'])){
    if($_POST['email']===$email && $_POST['password']===$password){
        $sql = "INSERT INTO `user`(email, password, first_name, last_name, phone, roler) VALUES ('$email', '$password', '$fname', '$lname', '$phone', '$roler')";
        if ($connection->query($sql) === TRUE) {
            header('Location: admin.php');
            exit();
        } else {
            echo "Error inserting record: " . $connection->error;
        }

        if(empty(trim($username)))
        {
           $username_error="empty";
        }
        else
        {
          if(empty(tirm($password)))
          {
             $password_error="empty";
          }
          else
          {
             $success="thank you";
          }
        }

    }
    else {
        echo "Invalid username or password";
    }
}




$connection->close();

?>

