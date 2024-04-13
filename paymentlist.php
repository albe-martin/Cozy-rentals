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

</style>

<?php
// PHP FUNCTIONS
function displayPayment($pid) {
  // this pid = payment id
  include "db_connect.php";
  $sql = "SELECT * FROM payment WHERE Payment_id= $pid ";
	$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $title = "Payment ID ".$pid;
?>
  <div class="card">
    <?php echo "<h2>$title</h2>";
    echo "<p>Amount: $".$row['amount']."</p>";
    echo "<p>Card #: **** **** **** ".substr($row['card_num'], -4)."</p>";
    echo "<p>Rented Property ID: ".$row['property_id']."</p>";
    echo "<hr/>";
    // (owner)receiver info
    $sql_receive = "SELECT * FROM `receive` WHERE payment_id= '$pid' ";
    $result_receive= mysqli_query($conn, $sql_receive);
    if (mysqli_num_rows($result_receive) === 1) {
      $row_receive = mysqli_fetch_assoc($result_receive);
      $owner_email = $row_receive['Owner_email'];
      $sql_owner = "SELECT * FROM `owner` WHERE Email = '$owner_email' ";
      $result_owner = mysqli_query($conn, $sql_owner);
      if (mysqli_num_rows($result_owner) === 1) {
        $row_owner = mysqli_fetch_assoc($result_owner);
        echo "<p>Owner of Property: ".$row_owner['FName']." ".$row_owner['LName']."</p>";
        echo "<p>Owner Phone Number: ".$row_owner['Phone_no']."</p>";
        echo "<p>Owner Email: ".$row_owner['Email']."</p>";
      } else {
        echo "<p>Error in the database: unknown receiver (check table `owner`)</p>";
      }
    } else {
      echo "<p>Error in the database: unknown receiver (check table `receive`)</p>";
    }
    ?> 
  </div>
<?php
  } else {
    // error: payment not exist
    $err_msg = "Payment ID ".$pid." does not exist.";
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
    <title>My Payments</title>
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
      <a href="watchlist.php">Watchlist</a>
      <a class="active" href="paymentlist.php">Payments</a>
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
        // display payments
        include "db_connect.php";
        $sql = "SELECT * FROM pay WHERE Clients_email = '$_SESSION[email]' "; 
	      $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // display every properties
          while($row = $result->fetch_assoc()) {
            displayPayment($row['payment_id']);
          }
        } else if (mysqli_num_rows($result) === 0){
          // no payments to display
          ?>
          <div class="card">
            <h2>"No payments in your record.."</h2>
          </div>
          <?php
        }
      ?>
    </div>

</body>
</html>