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

#title{
    margin-bottom: 1.5rem;
    font-size: 200%;
    text-align:center;
}

.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}


* {
  box-sizing: border-box;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="propertylist.php">Properties</a>
        <a class="active" href="contact.php">Contact</a>
        <a href="login.php">Log In</a>
        <a href="register.php">Register</a>
    </div>
    <h1 id = "title"> Contact Us </h1>
    <div class="contain">
      <div style="text-align:center">
        <p>Unlock the door to convenience with us, Leave us a message:</p>
      </div>
      <div class = "row">
        <div class= "column">
          <ul>
            <li>Email: contact@example.com</li>
            <li>Phone: +123456789</li>
            <li>Address: 1234 Street, City, Country</li>
          </ul>
        </div> 
        <div class="column">
          <img src="img/contactus.webp" style="width:100%">
        </div>
      </div>
    </div>
</body>
</html>