<?php
    session_start();
    // note: only login as admin gets to see this page
?>

<!DOCTYPE html>
<html lang="en">
    
<style>
.topnav {
  overflow: hidden;
  float:top;
  top:0;
  left:0;
  width: 100%;
  background-color: #333;
  position:fixed;
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
    <title>Post Property</title>
</head>
<body>
    <?php // code for top navigation bar
      if (!isset($_SESSION['login'])) { // if not login
        header("Location: index.php");  // redirect back to index
      } else if ($_SESSION['type'] === 'client') { // when login as client
        header("Location: index.php");  // redirect back to index
      } else if ($_SESSION['type'] === 'admin') { // when login as admin
    ?>
      <div class="topnav">
      <a href="index.php">Index</a>
      <a href="adminpropertylist.php">Manage Properties</a>
      <a class="active" href="postnewproperty.php">Post Property</a>
      <a href="logout.php">Log Out</a>
      <p><?php echo "Admin: " . $_SESSION['fname'] ." ". $_SESSION['lname']; ?></p>
      </div>
    <?php 
      }
    ?>

</body>
</html>