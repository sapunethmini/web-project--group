<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $select = " SELECT * FROM `product` WHERE email = '$email'";

    $result = mysqli_query($connection, $select);
    if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    
	

    if(mysqli_num_rows($result) < 0){
 
       $error[] = 'user already exist!';
 
    }else{
 		
       
         echo "<center><table border=10 cellspacing = 5 cellpadding=5></center>";
		echo "<caption>Your History</caption>";
		echo "<tr><th>Id<th>First Name<th>Last Name<th>Phone<th>Email<th>Product<th>Quantity</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<th>",$row['id'],"<th>",$row['first_name'],"<th>",$row['last_name'],"<th>",$row['phone'],"<th>",$row['email'],"<th>",$row['product'],"<th>",$row['quantity'];
			echo "</tr>";
		}
         
     
    }
 
 }

 
 

mysqli_close($connection);
?>

<html>
<head></head>
<body>
  <form action="history.php" method="POST">
    
    <label for="email">Email:</label>
		<input type="text" id="email" name="email" required><br/><br/>
        <input type="submit" name="submit" value="submit"><br/>
<a href="login.html">Go Back</a><br/><br/>
</body>
</html>