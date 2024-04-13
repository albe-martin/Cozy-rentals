<?php
    session_start();
    // note: only login as admin gets to see this page
    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
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

    $sql2 = "SELECT * FROM `interior design` WHERE Property_id= $pid ";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      echo "<p>"."Interior Designs: "."</p>"; 
      ?><ul><?php
      while($row2 = $result2->fetch_assoc()) {
        echo "<li>"."\t".$row2['interior_design']."</li>"; 
      }
      ?></ul><?php
    } else if (mysqli_num_rows($result2) === 0) {
      echo "<p>"."Interior Designs: "."None"."</p>"; 
    }
    echo "<hr/>"; 
    // special contents for admin
    // TODO: ADD MORE CONTENT ABOUT THE PROPERTY
    // SUCH AS OWNER'S NAME and EMAIL
    // REANTAL STATus
    // IF IS RENTED, ALSO SHOW THE CLIENTS NAME AND EMAIL
    // posted by 
    $admin_email = validate($row['admin_who_post']);
    $sql_admin_name = "SELECT * FROM `user` WHERE Email = '$admin_email' ";
    $result_admin_name = mysqli_query($conn, $sql_admin_name);
    if ($result_admin_name == FALSE) {
      echo mysqli_error($conn);
    } else if (mysqli_num_rows($result_admin_name) == 1) {
      $admin_names = $result_admin_name->fetch_assoc();
      echo "<p>"."Posted by: ".$admin_names['FName']." ".$admin_names['LName']." (".$row['admin_who_post'].")</p>"; 
    } else {
      echo "<p>"."Posted by: Unknown Admin (".$row['admin_who_post'].")</p>"; 
    }
    // owner info 
    $sql_own = "SELECT * FROM `own` WHERE `property_id` = '$pid' ";
    $result_own = mysqli_query($conn, $sql_own);
    if ($result_own == FALSE) {
      echo mysqli_error($conn);
    } else if (mysqli_num_rows($result_own) == 1) {
      $row_own = $result_own->fetch_assoc();
      $owner_email = $row_own['owner_email'];
      //get owner row
      $sql_owner = "SELECT * FROM `owner` WHERE `Email` = '$owner_email' ";
      $result_owner = mysqli_query($conn, $sql_owner);
      if ($result_owner == FALSE) {
        echo mysqli_error($conn);
      } else if (mysqli_num_rows($result_owner) == 1) {
        $row_owner = $result_owner->fetch_assoc();
        echo "<p>Owner: ".$row_owner['FName']." ".$row_owner['LName']." (".$owner_email.")</p>";
        echo "<p>Owner Phone#: ".$row_owner['Phone_no']."</p>";
      } else {
        echo "<p>Owner: Identity Unknown (".$owner_email.")</p>";
      }
    } else {
      echo "<p>Owner: Email Unknown</p>"; 
    }
    // rental status info
    echo "<p>Is open for rent: " .$row['rental_status']. "</p>";
    $sql_rent = "SELECT * FROM `rent` WHERE `Property_id` = '$pid' ";
    $result_rent = mysqli_query($conn, $sql_rent);
    if ($result_rent == FALSE) {
    } else if (mysqli_num_rows($result_rent) == 1) {
      $row_rent = $result_rent->fetch_assoc();
      $client_email = $row_rent['client_email'];
      //get user row
      $sql_user = "SELECT * FROM `user` WHERE `Email` = '$client_email' ";
      $result_user = mysqli_query($conn, $sql_user);
      if ($result_user == FALSE) {
        echo mysqli_error($conn);
      } else if (mysqli_num_rows($result_user) == 1) {
        $row_user = $result_user->fetch_assoc();
        echo "<p>Rented by: ".$row_user['FName']." ".$row_user['LName']." (".$client_email.")</p>";
        echo "<p>Renter Phone#: ".$row_user['Phone_no']."</p>";
      } else {
        echo "<p>Rented by: Identity Unknown (".$client_email.")</p>";
      }
    } else {
      echo "<p>Rented by: - </p>"; 
    }
    ?> 

    <!--Buttons-->
    <form action="deleteproperty.php" method="POST">
      <input type="hidden" name="delete_id" value="<?php echo $pid; ?>">
      <p style="text-align:center"><button type="submit" name="delete">Delete</button></p>
     </form>
    </p>
    </p>
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
    <title>Admin Property List</title>
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
      <a class="active" href="adminpropertylist.php">Manage Properties</a>
      <a href="postnewproperty.php">Post Property</a>
      <a href="logout.php">Log Out</a>
      <p><?php echo "Admin: " . $_SESSION['fname'] ." ". $_SESSION['lname']; ?></p>
      </div>
    <?php 
      }
    ?>

    <!-- Page content -->
    <div class="main">
      <?php
        // display properties
        include "db_connect.php";
        $sql = "SELECT * FROM property ";  // every property
	      $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // display every properties
          while($row = $result->fetch_assoc()) {
            displayProperty($row['Property_id']);
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