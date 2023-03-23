<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['id']) && !empty($_POST['id']))
   {
    $id=$_POST['id'];

    $sql="DELETE FROM `user` WHERE id=$id";
    $query=mysqli_query($connection,$sql);
    if($query)
    {
        echo"delete ok";

        header('Location: userlistshow.php');
    }
    else
    {
        die(mysqli_error($connection));
    }

   }
$connection->close();
?>