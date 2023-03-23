<?php
session_start();
require_once('connection.php');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($Connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($Connection, $_POST['lname']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    $roler = $_POST['roler'];

    $select = "SELECT * FROM `user` WHERE email = '$email' && password = '$password' roler='$roler'";

    $result = mysqli_query($connection, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['roler'] == 'customer'){

            $_SESSION['roler'] = $row['roler'];
            header('Location: /customer.php'); // Add header file location here

        }elseif($row['roler'] == 'delear'){

            $_SESSION['roler'] = $row['roler'];
            header('Location: /delear.php'); // Add header file location here

        }

    }else{
        $error[] = 'incorrect email or password!';
    }

}
?>
