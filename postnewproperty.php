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

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group select,
.form-group input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
}

button {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}
</style>
<head>
<body>
    <div class="topnav">
    <a href="index.php">Index</a>
    <a href="adminpropertylist.php">Manage Properties</a>
    <a class="active" href="postnewproperty.php">Post Property</a>
    <a href="logout.php">Log Out</a>
    <p>Admin: <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></p>
    </div>

    <div class="main">
        <h2>Post a New Property</h2>
        <form action="submit_property.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="propertyid">Property ID:</label>
                <input type="text" id="propertyid" name="propertyid" required>
            </div>
            <div class="form-group">
                <label for="owneremail">Owner's Email:</label>
                <input type="email" id="owneremail" name="owneremail" required>
                <label for="ownerphone">Owner's Phone Number:</label>
                <input type="text" id="ownerphone" name="ownerphone" required>
                <label for="ownerfname">Owner's First Name:</label>
                <input type="text" id="ownerfname" name="ownerfname" required>
                <label for="ownerlname">Owner's Last Name:</label>
                <input type="text" id="ownerlname" name="ownerlname" required>
            </div>
            <div class="form-group">
                <label for="numbedrooms">Number of Bedrooms:</label>
                <input type="number" id="numbedrooms" name="numbedrooms" min="0" required>
                <label for="numbathrooms">Number of Bathrooms:</label>
                <input type="number" id="numbathrooms" name="numbathrooms" min="0" required>
            </div>
            <div class="form-group">
                <label for="size">Size (sq ft):</label>
                <input type="number" id="size" name="size" min="0" required>
            </div>
            <div class="form-group">
                <label for="propertytype">Property Type:</label>
                <select id="propertytype" name="propertytype">
                    <option value="Apartment">Apartment</option>
                    <option value="House">House</option>
                    <option value="Condo">Condo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cost">Cost Per Month ($):</label>
                <input type="number" id="cost" name="cost" min="0" required>
            </div>
            <div class="form-group">
                <label for="utilityfees">Utility Fees Included:</label>
                <select id="utilityfees" name="utilityfees">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Partial">Partial</option>
                </select>
            </div>
            <div class="form-group">
                <label for="district">District:</label>
                <select id="district" name="district">
                    <option value="NW">NW</option>
                    <option value="NE">NE</option>
                    <option value="SW">SW</option>
                    <option value="SE">SE</option>
                    <option value="CITY CENTER">City Center</option>
                </select>
                <input type="text" id="no" name="no" placeholder="House No" required>
                <input type="text" id="street" name="street" placeholder="Street" required>
                <input type="text" id="postalcode" name="postalcode" placeholder="Postal Code" required>
                <input type="text" id="province" name="province" placeholder="Province" required>
            </div>
            <div class="form-group">
                <label for="pets">Pets Allowed:</label>
                <select id="pets" name="pets">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="Limited">Limited</option>
                </select>
            </div>
            <div class="form-group">
                <label for="smoke">Smoking Allowed:</label>
                <select id="smoke" name="smoke">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="OUTDOOR ONLY">Outdoor Only</option>
                </select>
            </div>
            <div class="form-group">
                <label for="interiordesign">Interior Design:</label>
                <select multiple id="interiordesign" name="interiordesign[]">
                    <option value="EAST ASIAN">East Asian</option>
                    <option value="EUROPEAN">European</option>
                    <option value="INDIAN">Indian</option>
                </select>
            </div>
            <div class="form-group">
                <label for="propertyimage">Property Image:</label>
                <input type="file" id="propertyimage" name="propertyimage" accept="image/*">
            </div>
            <button type="submit" name="submit">Submit Property</button>
        </form>
    </div>
</body>
</html>
