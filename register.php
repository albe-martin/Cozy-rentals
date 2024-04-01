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
  background-color: tan;
  color: black;
  margin: 20px;
  padding: .8rem 2.5em;
  text-transform: uppercase;
  border-radius: 10px;
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
    <section class="form-container">
        <form action="register-check.php" method="post" align=center >
            <h1 id=title>REGISTER NOW</h1>
            <?php if (isset($_GET['error'])) { ?>
  		        <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <input type="email" name="email" placeholder="enter your email" required> <br> <br>
            <input type="phone" name="phone" placeholder="enter your phone number" required> <br> <br>
            <input type="fname" name="fname" placeholder="enter your first name" required> <br>
            <input type="lname" name="lanme" placeholder="enter your last name" required> <br> <br>
            <input type="password" name="password" placeholder="enter your password" required> <br>
            <button type="submit" class="btn">register now</button> <br>
            <p>already have an account ? <a href="login.php">login now</a></p>
        </form>
    </section>
</body>
</html>>