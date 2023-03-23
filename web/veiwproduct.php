<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $product = mysqli_real_escape_string($connection, $_POST['product']);
    $qunatity = $_POST['qunatity'];

    $select = "SELECT * FROM `request` WHERE email = '$email' && product= '$product' && qunatity= '$qunatity' ";

    $result = mysqli_query($connection, $select);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    


    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
        $insert = "INSERT INTO `request` (email, product, qunatity) VALUES ('$email', '$product', '$qunatity')";
          mysqli_query($connection, $insert) or die("Couldn't insert<br/>".mysqli_error($connection));
		echo "dr.customer, your oder has been sent..";
        // header('location:login.html');
     
    }
 
 }
else
{
	echo "Can't Inserted".mysqli_error($connection);
}
 
 

mysqli_close($connection);
?>














