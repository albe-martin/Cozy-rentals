<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="adminpropertylist.php">Manage Properties</a>
        <a class="active" href="postnewproperty.php">Post Property</a>
        <a href="logout.php">Log Out</a>
        <p>Admin: <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></p>
    </div>

    <div class="main mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Property Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Use this form to add a new property to the database.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="addproperty.php" method="POST" enctype="multipart/form-data">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- Property ID -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="property_id" class="block text-sm font-medium text-gray-700">Property ID</label>
                                    <input type="text" name="property_id" id="property_id" autocomplete="property-id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                
                                <!-- Property Type -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="property_type" class="block text-sm font-medium text-gray-700">Property Type</label>
                                    <select id="property_type" name="property_type" autocomplete="property-type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Apartment">Apartment</option>
                                        <option value="House">House</option>
                                        <option value="Condo">Condo</option>
                                        <option value="Townhouse">Townhouse</option>
                                    </select>
                                </div>

                                <!-- Number of Bedrooms and Bathrooms -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="num_bedrooms" class="block text-sm font-medium text-gray-700">Number of Bedrooms</label>
                                    <input type="number" name="num_bedrooms" id="num_bedrooms" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="num_bathrooms" class="block text-sm font-medium text-gray-700">Number of Bathrooms</label>
                                    <input type="number" name="num_bathrooms" id="num_bathrooms" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <!-- Size and Cost -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="size" class="block text-sm font-medium text-gray-700">Size (sq ft)</label>
                                    <input type="number" name="size" id="size" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="cost_per_month" class="block text-sm font-medium text-gray-700">Cost Per Month ($)</label>
                                    <input type="text" name="cost_per_month" id="cost_per_month" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <!-- Location Details -->
                                <div class="col-span-6">
                                    <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                                    <input type="text" name="street" id="street" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="district" class="block text-sm font-medium text-gray-700">District</label>
                                    <input type="text" name="district" id="district" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                                    <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                    <input type="text" name="province" id="province" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>

                                <!-- Utilities, Pets, and Smoking -->
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="utility" class="block text-sm font-medium text-gray-700">Utilities Included</label>
                                    <select id="utility" name="utility" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="pet" class="block text-sm font-medium text-gray-700">Pets Allowed</label>
                                    <select id="pet" name="pet" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="None">None</option>
                                        <option value="Cats">Cats</option>
                                        <option value="Dogs">Dogs</option>
                                        <option value="Cats and Dogs">Cats and Dogs</option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-2">
                                    <label for="smoke" class="block text-sm font-medium text-gray-700">Smoking Allowed</label>
                                    <select id="smoke" name="smoke" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <!-- Interior Design -->
                                <div class="col-span-6">
                                    <label for="interior_design" class="block text-sm font-medium text-gray-700">Interior Design (comma-separated)</label>
                                    <input type="text" name="interior_design" id="interior_design" placeholder="e.g., Modern, Minimalist, Industrial" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .topnav {
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
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
            background-color: #4CAF50;
            color: white;
        }
        .topnav p {
            float: right;
            color: #f2f2f2;
            font-size: 14px;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>

</body>
</html>
