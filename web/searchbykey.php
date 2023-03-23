<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$product=$_POST['product'];
// $quantity=$_POST['quantity'];

$sql="SELECT * FROM `product` WHERE  product = '$product' ";//table name

  $result=  $connection-> query($sql);


  if($result->num_rows >0)
{
    echo '<table border=3> '; 
     
    echo'<tr>
           <th>first_name</th>
           <th>last_name</th>
           <th>phone</th>
           <th>email</th>
           <th>product</th>
           <th>quantity</th>
         </tr>';
         while($row = $result->fetch_assoc())
         {

            echo'<tr>
                  <td>'.$row['first_name'].'</td>
                  <td>'.$row['last_name'].'</td>
                  <td>'.$row['phone'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['product'].'</td>
                  <td>'.$row['quantity'].'</td>
                 </tr>';
             //   echo 'first_name:' .$row['first_name'] . 'last_name:' .$row['last_name'] . 'phone:' .$row['phone'] . 'email:' .$row['email']  .'product:' .$row['product']  .'quantity:' .$row['quantity'] ;   
             //   echo '<br>';
         }
    
   
}
else
{
    echo 'sold out';
}

?>