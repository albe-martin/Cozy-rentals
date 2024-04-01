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

.btn {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #333;
  color: #fff;
  cursor: pointer;
}

.error {
   background: #F2DEDE;
   color: #a52e1b;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.register-form{
    margin: 20px auto;
    width: 300px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.register-form input[type=email], .register-form input[type=phone], .register-form input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 10px -10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.register-form input[type=fname], .register-form input[type=lname] {
    width: 42%;
    padding: 10px;
    margin: 10px 0px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.btn:hover {
    background-color: #555;
}

.register-form .login {
    text-align: center;
    margin-top: 15px;
}

.register-form .login a {
    color: tan;
    text-decoration: none;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="propertylist.php">Properties</a>
        <a href="contact.php">Contact</a>
        <a href="login.php">Log In</a>
        <a class="active" href="register.php">Register</a>
    </div>

    <section class="register-form">
        <form action="register-check.php" method="post" >
            <h1 id=title>REGISTER NOW</h1>
            <?php if (isset($_GET['error'])) { ?>
  		        <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="enter your email" required>
            <label for="phone">Phone Number:</label>
            <input type="phone" name="phone" placeholder="enter your phone number" required> 
            <label for="name">Name:</label> <br>
            <input type="fname" name="fname" placeholder="first name" required>
            <input type="lname" name="lanme" placeholder="last name" required> 
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="enter your password" required>
            <input type="submit" name="submit-btn" value="Register Now" class="btn">
            <p class="login">Already have an account ? <a href="login.php" color=tan>login now.</a></p>
        </form>
    </section>
</body>
</html>>