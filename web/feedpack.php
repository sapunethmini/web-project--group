<?php 
session_start();
require_once('connection.php'); 

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['submit'])){

    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $user_type = $_POST['user_type'];
    $subject = $_POST['subject'];


    $select = " SELECT * FROM `feedback` WHERE email = '$email' ";


     
   $result = mysqli_query($connection, $select) or die("Query Failed<br/>".mysqli_error($select));


   if(mysqli_num_rows($result) > 0){

      $error[] = 'feedback already exist!';

   }else{

      
         $insert = "INSERT INTO `feedback`(fname, lname, subject, email, user_type) VALUES ('$fname', '$lname', '$subject', '$email','$user_type')";
         $result = mysqli_query($connection, $insert) or die("Query Failed<br/>".mysqli_error($insert));
		echo " Feedback sucessfully submitted";
         header('Location:thanks.html');
    
   }

};


?>
<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <style>    
        * {    
          box-sizing: border-box;    
        }    
            
         input[type=text], select, textarea {    
          width: 100%;    
          padding: 12px;    
          border: 1px solid rgb(70, 68, 68);    
          border-radius: 4px;    
          resize: vertical;    
        }    
        input[type=email], select, textarea {    
          width: 100%;    
          padding: 12px;    
          border: 1px solid rgb(70, 68, 68);    
          border-radius: 4px;    
          resize: vertical;    
        }    
            
        label {    
          padding: 12px 12px 12px 0;    
          display: inline-block;    
        }    
            
        input[type=submit] {    
          background-color: rgb(37, 116, 161);    
          color: white;    
          padding: 12px 20px;    
          border: none;    
          border-radius: 4px;    
          cursor: pointer;    
          float: right;    
        }    
            
        input[type=submit]:hover {    
          background-color: #45a049;    
        }    
            
        .container {    
          border-radius: 5px;    
          background-color: #abacaa;    
          padding: 20px;    
        }    
            
         .col-25 {    
          float: left;    
          width: 25%;    
          margin-top: 6px;    
        }   
            
         .col-75 {    
          float: left;    
          width: 75%;    
          margin-top: 6px;    
        }    
            
        .row:after {    
          content: "";    
          display: table;    
          clear: both;    
        }    
            
        </style>    
        </head>    
        <body>    
        <h2>FEEDBACK_FORM</h2>    
        <div class="container">    
        <form action="feedpack.php" method="POST"> 
        <div class="row">
    <div class="col-25">
        <label>Customer Type</label>
     </div>
                <div class="col-75">
        <label><input type="radio" name="user_type" value="Customer"> Customer</label>
        <label><input type="radio" name="user_type" value="Dealer"> Dealer</label>
                        </div>
              </div>
   
            <div class="row">    
              <div class="col-25">    
                <label for="fname">First Name</label>    
              </div>    
              <div class="col-75">    
                <input type="text" id="fname" name="fname" >    
              </div>    
            </div>    
            <div class="row">    
              <div class="col-25">    
                <label for="lname">Last Name</label>    
              </div>    
              <div class="col-75">    
                <input type="text" id="lname" name="lname" >    
              </div>    
            </div>    
            <div class="row">    
                <div class="col-25">    
                  <label for="email">Mail Id</label>    
                </div>    
                <div class="col-75">    
                  <input type="email" id="email" name="email" >    
                </div>    
              </div>    
              
            <div class="row">    
              <div class="col-25">    
                <label for="feed_back">Feed Back</label>    
              </div>    
              <div class="col-75">    
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>    
              </div>    
            </div>    
            <div class="row">    
              <input type="submit" name = "submit" value="submit">    
            </div>    
          </form>    
        </div>    
            
        </body>  
</html>
   