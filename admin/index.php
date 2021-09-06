<html>
<head>
<?php
include("../connection/connect.php")
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
    <title>irio ciitu</title>
    </head>
    <body>
        <nav class="navbar">
            <a href="index.php" class="navbar_logo">irio ciitu</a>
        </nav>
<?php
	error_reporting(0); // hide undefine index errors
	session_start(); // temp sessions
	if(isset($_POST['submit']))   // if button is submit
	{
		$username = $_POST['username'];  //fetch records from login form
		$password = $_POST['password'];
		
		if(!empty($_POST["submit"]))   // if records were not empty
		{
			$loginquery ="SELECT * FROM admin WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
			$result=mysqli_query($db, $loginquery); //executing
			$row=mysqli_fetch_array($result);
		
			if(is_array($row))  // if matching records in the array & if everything is right
			{
				$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
				header("refresh:1;url=dashboard.php"); // redirect to index.php page
			} 
			else
			{
				$message = "Invalid Username or Password!"; // throw error
			}
		}	
	}
?>
        <div class="login">
            <form action="" method="POST">		
        		<h1 class="title">
					admin login panel
				</h1>
				<input type="text" placeholder="username" name="username">
				<input type="password" placeholder="password" name="password">
      			<input type="submit" id="buttn" name="submit" value="login" />
			</form>  
        </div>

    <?php
        include("./partials/footer.php")
    ?>
</html>