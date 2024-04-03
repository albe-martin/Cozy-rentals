<?php
  // note: only login as client and not login user get to see this page
?>

<!DOCTYPE html>
<html lang="en">
<style>
.topnav {
  overflow: hidden;
  width: 100%;
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

/* good reference */
/* https://www.w3schools.com/howto/howto_js_filter_elements.asp */
.sidenav {
  height: 100%;
  width: 30%; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 10; /* Stay at the top */
  left: 1;
  background-color: rgb(219, 219, 219);
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 0px;
}

.sidenav p {
  padding: 6px 8px 6px 16px;
  text-decoration:solid;
  font-size: 25px;
  color: #333;
  display: block;
}

/* Style page content */
.main {
  margin-left: 30%; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
</head>
<body>
    <!-- Top navigation -->
    <?php
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

    <!-- Side navigation -->
    <div class="sidenav">
      <p>Filter</p>
    </div>

    <!-- Page content -->
    <div class="main">
      <p>TEST, here should have list of properties</p>
    </div>
</body>
</html>