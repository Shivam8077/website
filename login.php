<?php 

session_start();

	include("connect.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password']; 
		echo "$username,$password";

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from form where username = '$username' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					
					if($user_data['password'] === $password)
					{

						$_SESSION['username'] = $user_data['username'];
						header("Location: welcome.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<html>
    <head>
        <title>Login-form</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div class="input-group">
            <form method="POST"  class="input">
                <h1 class="login">Login Form</h1><br><br>
                <label>Username:-</label>
                <input type="text" name="username" class="form-group" required><br><br>
                <label>Password:-</label>
                <input type="Password" name="password" class="form-group" required>
                <br><br>
                <input type="submit" name="login" value="Login" class="btn" ><br>
                <label>Don't have an account..?</label>
                <a href="register.php" class="text">Register here</a>
            </form>
        </div>  	       
    </body>
</html>