<!DOCTYPE html>
<html lang="en">

<style>
#title{
    margin-bottom: 1.5rem;
    font-size: 200%;
    text-align:center;
}

.btn {
  background-color: tan;
  color: black;
  margin: 20px;
  padding: .8rem 2.5em;
  text-transform: uppercase;
  border-radius: 10px;
  cursor: pointer;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <section class="form-container">
        <form method="post" align=center >
            <h1 id=title>REGISTER NOW</h1>
            <input type="email" name="email" placeholder="enter your email" required> <br> <br>
            <input type="phone" name="phone" placeholder="enter your phone number" required> <br> <br>
            <input type="fname" name="fname" placeholder="enter your first name" required> <br>
            <input type="lname" name="lanme" placeholder="enter your last name" required> <br> <br>
            <input type="password" name="password" placeholder="enter your password" required> <br>
            <input type="submit" name="submit-btn" value="register now" class="btn"> <br>
            <p>already have an account ? <a href="login.php">login now</a></p>
        </form>
    </section>
</body>
</html>>