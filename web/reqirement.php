<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

function fetchData($connection){
    
    $sql = "SELECT * FROM `reuest`";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;  
}else{
    return $row=[];
}
}
?>
