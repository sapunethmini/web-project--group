<?php
if(isset($_GET['login'])) {
  $role = $_GET['roler'];
  switch ($role) {
    case "Admin":
      header("Location: login1.html");
      break;
    case "Delear":
      header("Location: login.html");
      break;
    case "Customer":
      header("Location: login.html");
      break;
    default:
      header("Location: login.html");
  }
  exit(); // Always exit after redirecting
}
?>

<html>
    <head>
        <title>interface page</title>
        <style>
            h1 {
                text-align: center; 
                font-size:100px; 
                color:rgb(248, 5, 139)
            }
            h2 {
                text-align: center; 
                font-size:30px; 
                color:white;
            }
            form { 
                  margin: 0px auto; 
                  width:250px;
                 }
            p {
                text-align: center;
            }

            #myVideo {
                position: fixed;
                z-index: -1;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .btn {
                background-color: #0ee223;
                color: rgb(7, 0, 0);
                padding: 15px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }

            .btn:hover {
                background-color: rgb(237, 8, 8);
            }
        </style>
    </head>
    <body >
    <video autoplay muted loop id="myVideo">
  <source src="wallpaper.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
        <br/><br/><br/><br/><br/>
        <h1><b>SUPPLY CHAIN MANAGEMENT</b></h1>
        <br/><br/><br/>
        <h2>__________SELECT YOUR ROLE__________</h2>
        <form action="#">
            <label for="roler"></label>
            <select id="roler" name="roler">
            <option value="">Roler</option>
              <option value="Admin">Admin</option>
              <option value="Delear">Dealer</option>
              <option value="Customer">Customer</option>
            </select> <br/><br/><br/><br/><br/>
            <button name="login" type="submit" class="btn" value="LOGIN" target="_self"><p>LOGIN</p></button>
           
          </form>
          <script>
var video = document.getElementById("myVideo");


function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>        
        <br/><br/><br/><br/><br/>
        
    
        

    </body>
</html>
