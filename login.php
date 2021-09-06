<?php
	include("./partials/head.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/log-in.css">
    <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
	<title>irio ciitu log in</title>
</head>
<body>
	<nav class="navbar">
		<a href="index.php" class="navbar_logo">irio ciitu</a>
		<div class="navbar_toggle" id="mobile-menu">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
        <div class="navbar_menu">
            <ul>
			<li><a href="index.php" class="navbar_link">home</a></li>
			<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li ><a href="login.php" class="navbar_link">login</a> </li>
							  <li ><a href="registration.php" class="navbar_link">signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li ><a href="your_orders.php" class="navbar_link">your orders</a> </li>';
									echo  '<li ><a href="logout.php" class="navbar_link">logout</a> </li>';
							}

						?>
            </ul>
        </div>
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
			$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; //selecting matching records
			$result=mysqli_query($db, $loginquery); //executing
			$row=mysqli_fetch_array($result);
		
			if(is_array($row))  // if matching records in the array & if everything is right
			{
				$_SESSION["user_id"] = $row['u_id']; // put user id into temp session
				header("refresh:1;url=orders.php"); // redirect to index.php page
			} 
			else
			{
				$message = "Invalid Username or Password!"; // throw error
			}
		}	
	}

	if(isset($_POST['submit'] ))
	{

		$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['uname']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
		mysqli_query($db, $mql);

	}


?>
	<div class="login">
		<div class="wrapper">
			<!--tabs-->
			<div class="tabs">
				<ul>
					<!--active tab-->
					<li class="active">
						<span class="text">log-in</span>
					</li>
					<li>
						<span class="text">sign-up</span>
					</li>
				</ul>
			</div>
			<div class="content">
				<div class="tab_wrap" style="display: block;">
					<div class="tab_content">
							<form action="" method="POST">
								<h1 class="title">
									Log in to order
								</h1>
								<input type="text" placeholder="username" name="username">
								<input type="password" placeholder="password" name="password">
      							<input type="submit" id="buttn" name="submit" value="login" />
							</form>  
					</div>
				</div>
				<div class="tab_wrap" style="display: none;">
					<div class="tab_content">
							<form action="" method="POST">
								<h1 class="title">
									Sign-in
								</h1>
								<input type="text" placeholder="username" name="uname">
								<input type="text" placeholder="first name" name="fname">
								<input type="text" placeholder="last name" name="lname">
								<input type="phone" placeholder="phone number" name="phone">
								<input type="email" placeholder="email address" name="email">
								<input type="password" placeholder="password" name="password">
								<input type="text" placeholder="address" name="address">
   								<input type="submit" id="buttn" name="submit" value="sign up" />
							</form>  
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['submit']))
		{
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "INSERT INTO users SET
				email='$email',
				phone='$phone',
				address='$address',
				username='$username',
				password='$password'
			";
			$res = mysqli_query($conn, $sql) or die(mysqli_error());
			if($res==TRUE)
			{
				echo "data inserted";
			}
			else{
				echo "failed";
			}
		}
	?>
	<?php
		include("./partials/global.php")
	?>

</body>
	
</body>
</html>