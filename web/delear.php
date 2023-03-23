<?php
  
  session_start();
  if(!isset($_SESSION['uname'])) {
      header("Location: login.php");
  }
?>

<!DOCTYPE html> 
<html> 
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  background-color: #FFFF00;
  border: none;
  color: black;
  padding: 25px 42px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 32px;
  margin: 4px 2px;
  cursor: pointer;
}

.ssp {
  color:green;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #333eb2;
}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>

    </head>


<body bgcolor="#E0E6F8">

    <h1 class="ssp">HI DEALER!!!</h1><br/><br/>

    <table>
        <tr>
            <div class="show">
            <th><a href="1stpage.php" target="_self" class="button">Home</a></th>
            <th><a href="product.html" target="f1" class="button">Add product</a></th>
            <th><a href="history.php" target="f1" class="button">History</a></th>
            <th><a href="feedpack.php" target="f1" class="button">Feedback</a></th>
            <th><a href="facility.html" target="f1" class="button">Facility</a></th> 
            <th><a href="qa2.html" target="f1" class="button">Help</a></th>           


           
           
       </tr>
    </table>
    <hr>
  <br/>
  <p></p>
    <!-- <iframe src="sup.png" name="f1" height="900px" width="100%" > -->
    <iframe src="sup.png" name="f1" style="height: 100vh; width: 100%;"></iframe>

    <!-- </iframe> -->
</html>