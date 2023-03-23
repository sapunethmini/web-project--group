<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

    //$fname = mysqli_real_escape_string($connection, $_POST['fname']);
    //$lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = $_POST['password'];
    //$phone = $_POST['phone'];
    //$roler = $_POST['roler'];;

   $select = " SELECT roler,first_name FROM `user` WHERE email = '$email' && password = '$password'";

   $result = mysqli_query($connection, $select) or die("sql error<br/>".mysqli_error($connection));

   if(mysqli_num_rows($result) > 0){
      
      $row = mysqli_fetch_array($result);

      if($row[0] == 'customer'){
         
         $_SESSION['uname'] = $row[1];
         $_SESSION['roler'] = $row[0];
         header("refresh:2; url=customer.php");

      }elseif($row[0] == 'delear'){
         
         $_SESSION['uname'] = $row[1];
         $_SESSION['roler'] = $row[0];
         header("refresh:2; url=delear.php");

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

}
else
{
   echo "Can't login <br/>".mysqli_error($connection);
}
?>