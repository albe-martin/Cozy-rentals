<?php
  // note: only login as client and not login user get to see this page
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

.topnav p{
  float: right;
  color: #f2f2f2;
  font-size: 14px;
  text-decoration: underline;
  padding-left: 10px;
  padding-right: 10px;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
</head>
<body>
    <?php // coder for top navigation bar
      session_start();  // call this for every page that you need to use $_SESSION
      if (!isset($_SESSION['login'])) { // if not login
    ?>
      <div class="topnav">
      <a href="index.php">Index</a>
      <a class="active" href="propertylist.php">Properties</a>
      <a href="contact.php">Contact</a>
      <a href="login.php">Log In</a>
      <a href="register.php">Register</a>
      </div>
    <?php
      } else if ($_SESSION['type'] === 'client') { // when login as client
    ?>
      <div class="topnav">
      <a href="index.php">Index</a>
      <a class="active" href="propertylist.php">Properties</a>
      <a href="watchlist.php">Watchlist</a>
      <a href="paymentlist.php">Payments</a>
      <a href="contact.php">Contact</a>
      <a href="logout.php">Log Out</a>
      <p><?php echo "Hello, " . $_SESSION['fname'] ." ". $_SESSION['lname']; ?></p>
      </div>
    <?php
      } else if ($_SESSION['type'] === 'admin') { // when login as admin
        header("Location: index.php");  // redirect back to index
      }
    ?>
</body>
</html>