<<?php 
session_start();

	include("connect.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
        $email= $_POST['email'];
		$password = $_POST['password'];


		if(!empty($username) && !empty($password) && !empty($email) && !is_numeric($username))
		{

			//save to database
			
			$query = "insert into form (username,email,password) values ('$username','$email','$password')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<html>
    <head>
        <title>register-form</title>
        <link rel="stylesheet" href="registerstyle.css">
    </head>
    <body>
        <div class="input-group">
            <form method="POST" class="input">
                <h1 class="register">Registration</h1><br><br>
                <label>Username:-</label>
                <input type="text" name="username" class="form-group" required><br><br>
                <label>Email:-</label>
                <input type="email" name="email" class="form-group" required><br><br>
                <label>Password:-</label>
                <input type="Password" name="password" class="form-group" required>
<br><br>
                <input type="submit" name="registration" class="btn" value="Register" ><br>
                <label>Already have an account..?</label>
                <a href="login.php" class="text">Login here</a>
            </form>
        </div>         
    </body>
</html>
