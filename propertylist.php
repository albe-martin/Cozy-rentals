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

/* Side Nav Bar */
.sidenav {
  height: 100%;
  top:48px;
  width: 29%;
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  left: 0;
  background-color: rgb(219, 219, 219);
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 0px;
  padding-right: 10px;
}

.sidenav p {
  padding: 6px 8px 6px 16px;
  text-decoration:solid;
  font-size: 25px;
  color: #333;
  display: block;
}

.sidenav form {
  width: 90%;
  margin:auto;
  padding: 10px;
}

.sidenav form input[type=search]{
  width: 95.5%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
}

.sidenav form input[type=number]{
  width: 40%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
}

.sidenav button {
  margin-top: 3px;
  margin-bottom: 16px;
  margin-left: 12;
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #333;
  color: #fff;
  cursor: pointer;
}

.sidenav button:hover {
  background-color: #555;
}

.sidenav label {
  font-size: 16px;
}

.sidenav select{
  padding: 10px;
  width: 100%;
  border-radius: 5px;
  margin-top: 3px;
  border: 1px solid #ddd;
  text-transform: uppercase;
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
    ?> 


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
      <form action="propertylist.php" method="post">
        <input type="search" name="pidInput" placeholder="Search by Property ID..">
        <button type="submit">Search</button>
        <!--Filters (values has to match with database)-->
        <label for="p_type">Property Type:</label>
        <select name="p_type">
          <option value="-">-</option>
          <option value="Apartment">Apartment</option>
          <option value="Condo">Condo</option>
          <option value="House">House</option>
        </select>

        <label for="price_min">Price Range:</label><br/>
        <input type="number" name="price_min" placeholder="MIN">
        <label for="price_max"> ~ </label>
        <input type="number" name="price_max" placeholder="MAX"><br/>

        <label for="size_min">Size Range:</label><br/>
        <input type="number" name="size_min" placeholder="MIN">
        <label for="size_max"> ~ </label>
        <input type="number" name="size_max" placeholder="MAX"><br/>

        <label for="num_bedroom">Number of Bedrooms:</label><br/>
        <input type="number" name="num_bedroom" placeholder="-"><br/>
        <label for="num_bathroom">Number of Bathrooms:</label><br/>
        <input type="number" name="num_bathroom" placeholder="-"><br/>

        <label for="district">District:</label>
        <select name="district">
          <option value="-">-</option>
          <option value="NW">NW</option>
          <option value="NE">NE</option>
          <option value="SW">SW</option>
          <option value="SE">SE</option>
          <option value="CC">CITY CENTER</option>
        </select>
        <label for="pet">Pet:</label>
        <select name="pet">
          <option value="-">-</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
          <option value="Limitid">Limitid</option>
        </select>
        <label for="smoking">Smoking:</label>
        <select name="smoking">
          <option value="-">-</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
          <option value="Out">Outdoor only</option> <!--NEED to database decision -->
        </select>
        <label for="utilities">Utility Fees:</label>
        <select name="utilities">
          <option value="-">-</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
          <option value="Partial">Partial</option> <!--NEED to database decision -->
        </select>
        <label for="furnish">Furnishing:</label>
        <select name="furnish">
          <option value="-">-</option>
          <option value="Yes">Yes</option>
          <option value="No">No</option>
        </select>
        <button type="submit">Apply Filter</button>
      </form>
    </div>

    <!-- Page content -->
    <div class="main">
      <?php
        // display properties
        include "db_connect.php";
        $sql = "SELECT * FROM property WHERE rental_status= 'Yes' ";  // properties that are still open for rent
	      $result = mysqli_query($conn, $sql);
        if (isset($_POST['pidInput']) && $_POST['pidInput'] != ""){
          // user is searching with pid
          echo "<p>Result of seaching PID which contains ".$_POST['pidInput']." ... </p>";
          $pid = validate($_POST['pidInput']);
          $sql = "SELECT * FROM property WHERE Property_id LIKE '%{$pid}%' ";
          $result = mysqli_query($conn, $sql);
        }
        $num_prop_displayed = 0;
        if (mysqli_num_rows($result) > 0) {
          // display every properties
          while($row = $result->fetch_assoc()) {
            // Filtering...
            // filters property type
            if (isset($_POST['p_type'])) {
              if ($_POST['p_type'] == "-") {
                // don't care
              } else if ($row['Property_type'] != $_POST['p_type']){
                 continue;
              } 
            }

            // filter min/max price
            if (isset($_POST['price_min'])){
              if ($_POST['price_min'] == ""){
                // dont't care
              } else if ($row['Cost_Per_Month'] < $_POST['price_min']){
                continue;
              }
            }
            if (isset($_POST['price_max'])){
              if ($_POST['price_max'] == ""){
                // dont't care
              } else if ($row['Cost_Per_Month'] > $_POST['price_max']){
                continue;
              }
            }
            // filter min/max size
            if (isset($_POST['size_min'])){
              if ($_POST['size_min'] == ""){
                // dont't care
              } else if ($row['Size'] < $_POST['size_min']){
                continue;
              }
            }
            if (isset($_POST['size_max'])){
              if ($_POST['size_max'] == ""){
                // dont't care
              } else if ($row['Size'] > $_POST['size_max']){
                continue;
              }
            }

            //filters num_bedroom
            if (isset($_POST['num_bedroom'])){
              if ($_POST['num_bedroom'] == ""){
                // dont't care
              } else if ($row['num_bedrooms'] != $_POST['num_bedroom']){
                continue;
              }
            }
            //filters num_bathroom
            if (isset($_POST['num_bathroom'])){
              if ($_POST['num_bathroom'] == ""){
                // dont't care
              } else if ($row['num_bathrooms'] != $_POST['num_bathroom']){
                continue;
              }
            }

            // filters district
            if (isset($_POST['district'])) {
              if ($_POST['district'] == "-") {
                // don't care
              } else if ($row['District'] != $_POST['district']) {
                continue;
              } 
            }
            // filters pet
            if (isset($_POST['pet'])) {
              if ($_POST['pet'] == "-") {
                // don't care
              } else if ($row['Pet'] != $_POST['pet']) {
                continue;
              }
            }
            // filters smoke
            if (isset($_POST['smoking'])) {
              if ($_POST['smoking'] == "-") {
                // don't care
              } else if ($row['Smoke'] != $_POST['smoking']) {
                continue;
              }
            }
            // filters utilities
            if (isset($_POST['utilities'])) {
              if ($_POST['utilities'] == "-") {
                // don't care
              } else if ($row['Utility'] != $_POST['utilities']) {
                continue;
              }
            }

            // filters furnish
            if (isset($_POST['furnish'])) {
              if ($_POST['furnish'] == "-") {
                // don't care
              } else if ($row['Furnish'] != $_POST['furnish']) {
                continue;
              }
            }
            
            // survived from filtering
            $num_prop_displayed++;
            displayProperty($row['Property_id']);
          }
        }
        if (mysqli_num_rows($result) === 0 || $num_prop_displayed == 0){
          // no properties to displaay
          ?>
          <div class="card">
            <h2>No Result Found. :<</h2>
          </div>
          <?php
        }
      ?>
    </div>
</body>
</html>