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
   $phone = $_POST['phone'];
   $pname = $_POST['pname'];
   $id = $_POST['id'];
   $quantity = $_POST['quantity'];


   

   $select = " SELECT * FROM `user` WHERE id = '$id' ";


 
   $result = mysqli_query($connection, $select);


   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      
         $insert = "INSERT INTO `product` (first_name, last_name, phone, email, product,id,quantity) VALUES ('$fname', '$lname', '$phone', '$email', '$pname','$id','$quantity')";
         mysqli_query($connection, $insert);
        header('location:s.html');
    
   }

};


?>