<?php

$connection=mysqli_connect('localhost','root','','project');

if(mysqli_connect_errno())
{
    echo "Database connection failed. Error: " . mysqli_connect_error();
}

?>


