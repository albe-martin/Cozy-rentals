<?php
    session_start();
    // note: only login as client gets to see this page
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

/* main content */
.main {
  height:100%;
  margin-top: 60px;
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
// PHP FUNCTIONS
function validate($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


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
    <?php echo "<h2>$title</h2>";
    echo "<p>$address</p>";
    echo "<img src = " . $img_source . " alt= <qProperty Image/q>";
    echo "<h1>"."$".$row['Cost_Per_Month']." / month"."</h1>";
    echo "<p>"."Size: ".$row['Size']." ft²"."</p>";
    echo "<p>"."Number of Bedrooms: ".$row['num_bedrooms']."</p>";
    echo "<p>"."Number of Bathrooms: ".$row['num_bathrooms']."</p>";
    echo "<p>"."Pet: ".$row['Pet']."</p>";
    echo "<p>"."Smoking: ".$row['Smoke']."</p>";
    echo "<p>"."Utility Fees Included: ".$row['Utility']."</p>";
    echo "<p>"."Furnitures: ".$row['Furnish']."</p>"; 

    $sql_interior = "SELECT * FROM `interior design` WHERE Property_id= $pid ";
    $result_interior = mysqli_query($conn, $sql_interior);
    if (mysqli_num_rows($result_interior) > 0) {
      echo "<p>"."Interior Designs: "."</p>"; 
      ?><ul><?php
      while($row2 = $result_interior->fetch_assoc()) {
        echo "<li>"."\t".$row2['interior_design']."</li>"; 
      }
      ?></ul><?php
    } else if (mysqli_num_rows($result_interior) === 0) {
      echo "<p>"."Interior Designs: "."None"."</p>"; 
    }
    ?> 
    <!--Buttons for each property-->
    <p style="text-align:center">
    <button>Remove From Watchlist</button>
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
    <title>My Watchlist</title>
</head>
<body>
    <?php // code for top navigation bar
      if (!isset($_SESSION['login'])) { // if not login
        header("Location: index.php");  // redirect back to index
      } else if ($_SESSION['type'] === 'client') { // when login as client
    ?>
      <div class="topnav">
      <a href="index.php">Index</a>
      <a href="propertylist.php">Properties</a>
      <a class="active" href="watchlist.php">Watchlist</a>
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

    <!-- Page content -->
    <div class="main">
      <?php
        // display properties
        include "db_connect.php";
        $sql = "SELECT * FROM watchlist WHERE Client_email = '$_SESSION[email]' ";
        if (mysqli_num_rows($result) > 0) {
          // display every properties
          while($row = $result->fetch_assoc()) {
            displayProperty($row['property_id']);
          }
        } else if (mysqlii_num_rows($result) === 0){
          // no properties to displaay
          ?>
          <div class="card">
            <h2>"No Result Found. :<"</h2>
          </div>
          <?php
        }
      ?>
    </div>
</body>
</html>