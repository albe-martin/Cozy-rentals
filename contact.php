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

input[type=submit]:hover {
  background-color: #45a049;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
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
          <form action="/action_page.php">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            <label for="email">Email ID</label>
            <input type="text" id="email" name="emailid" placeholder="Your E-mail ID..">
            <label for="subject">Subject</label>
            <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
            <input type="submit" value="Submit">
          </form>
        </div> 
        <div class="column">
          <img src="img/contactus.webp" style="width:100%">
        </div>
      </div>
    </div>
</body>
</html>>