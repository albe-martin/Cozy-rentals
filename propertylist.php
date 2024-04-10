<?php
  // note: only login as client and not login user get to see this page
  session_start();  // call this for every page that you need to use $_SESSION
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

/* reference if want to use java script to filter*/
/* https://www.w3schools.com/howto/howto_js_filter_elements.asp */
.sidenav {
  height: 100%;
  top:48px;
  width: 30%;
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  left: 0;
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

/* main content */
.main {
  height:100%;
  margin-top: 60px;
  margin-left: 30%; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* Property Card */
.card {
  border: 3px solid transparent;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
  text-align: left;
  font-family: arial;
  padding: 2px 16px;
}

.card:hover {
  border: 3px solid tan;
}

.card img{
  float:center;
  width:100%;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: #f2f2f2;
  background-color: #333;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  width: 32.5%;
}

.card button:hover {
  background-color: #ddd;
  color: black;
}

</style>

<?php
function displayProperty($pid) {
  include "db_connect.php";
  $sql = "SELECT * FROM property WHERE Property_id= $pid ";
	$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['Property_type']." ID ".$pid;
    $img_source = "img/".$pid."/temp.png";
    $address = "Address: ".$row['No.']." ".$row['Street']." ".$row['District']." ".$row['Province'];
?>
  <div class="card">
    <?php echo "<h2>$title</h2>"; ?>
    <?php echo "<p>$address</p>"; ?>
    <?php echo "<img src = " . $img_source . " alt= <qProperty Image/q>"; ?> 
    <?php echo "<h1>"."$".$row['Cost_Per_Month']." / month"."</h1>"; ?> 
    <?php echo "<p>"."Size: ".$row['Size']." ft²"."</p>"; ?> 
    <?php echo "<p>"."Number of Bedrooms: ".$row['num_bedrooms']."</p>"; ?> 
    <?php echo "<p>"."Number of Bathrooms: ".$row['num_bathrooms']."</p>"; ?> 
    <?php echo "<p>"."Pet: ".$row['Pet']."</p>"; ?> 
    <?php echo "<p>"."Smoking: ".$row['Smoke']."</p>"; ?> 
    <?php echo "<p>"."Utility Fees Included: ".$row['Utility']."</p>"; ?> 
    <?php echo "<p>"."Furnitures: ".$row['Furnish']."</p>"; ?> 

    <p style="text-align:center"><button>Add to Watchlist</button>
    <button>Book a Showing</button>
    <button>Rent Now</button></p>
  </div>
<?php
  } else {
    // error: property not exist
    $err_msg = "Property ID ".$pid." does not exist.";
?>
    <div class="card">
    <?php echo "<h2>Error</h2>"; ?>
    <?php echo "<p>$err_msg</p>"; ?>
    </div>
<?php
  }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
</head>
<body>
    <!-- Top navigation -->
    <?php
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
      <?php
        $pid = 101;
        displayProperty($pid);
        $pid = 102;
        displayProperty($pid);
      ?>
    </div>
</body>
</html>