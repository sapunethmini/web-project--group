<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($connection, $_POST['first_name']);
   $lname = mysqli_real_escape_string($connection, $_POST['last_name']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $password = $_POST['password'];
   $phone = $_POST['phone'];
   $roler = $_POST['roler'];

   

   $select = " SELECT * FROM `user` WHERE email = '$email' && password = '$password' ";

 
   $result = mysqli_query($connection, $select);


   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      
         $insert = "INSERT INTO `user` (first_name, last_name, phone, email, password, roler) VALUES ('$fname', '$lname', '$phone', '$email', '$password', '$roler')";
         mysqli_query($connection, $insert);
         header('location:login.html');
    
   }

};


?>