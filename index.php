<?php
// php code here 
/* test and run: 
http://localhost:8012/Rental-Project/index.php
*/
?>
<!DOCTYPE html>
<html lang="en">
    
<style>
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: tan;
  color: white;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

#myheader{
    background-color:white;
    font-size:500%;
    color:black;
    padding:30;
    text-align:center;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cozy Rentals</title>
</head>
<body bgcolor="white">
    <div class="topnav">
    <a class="active" href="index.php">Index</a>
    <a href="propertylist.php">Properties</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Log In</a>
    <a href="register.php">Register</a>
    </div>
    <h1 id = "myheader"> Cozy Rentals </h1>
    <p class="center">There should be some discription here</p>
    <img src="img/index.webp" alt="Cozy interior design by DECORILLA" class="center">
</body>
</html>