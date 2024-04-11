<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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

        .login-form {
            margin: 120px auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .login-form input[type=email], .login-form input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px -10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #555;
        }

        .login-form .register {
            text-align: center;
            margin-top: 15px;
        }

        .login-form .register a {
            color: tan;
            text-decoration: none;
        }

        #title{
            margin-bottom: 1.5rem;
            font-size: 200%;
            text-align:center;
        }  

        .error {
            background: #F2DEDE;
            color: #a52e1b;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
            }

        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <a href="index.php">Index</a>
        <a href="propertylist.php">Properties</a>
        <a href="contact.php">Contact</a>
        <a class="active" href="login.php">Log In</a>
        <a href="register.php">Register</a>
    </div>
    <div class="login-form">
        <form action="login-check.php" method="post">
            <h1 id=title>LOG IN</h1>
            <?php if (isset($_GET['error'])) { ?>
  		        <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Log In</button>
            <p class="register">New user? <a href="register.php">Register here.</a></p>
        </form>
    </div>
    
</body>
</html>
