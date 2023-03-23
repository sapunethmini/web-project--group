
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

   

   
      $update = "UPDATE `user` SET first_name='$fname', last_name='$lname', phone='$phone', password='$password', roler='$roler' WHERE email='$email'";
      mysqli_query($connection, $update) or die("Couldn't update record<br>".mysqli_error($connection));
   
    
     
         echo "Record Sucessfully Updated";
               // Record inserted successfully, redirect to admin page
               header('Location: userlistshow.php');
               exit();
           
 
}
else
{
   echo "Error<br>" . $connection->error;
}

$connection->close();
?>
