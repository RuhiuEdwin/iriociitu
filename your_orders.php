<html>
<?php
include("./partials/head.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/your_orders.css">
    <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
    <title>irio ciitu</title>
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
    <div class="hero">
            <div class="hero_content">
                <h1 class="animate-hero">CHEKI ORDER</h1>
                <button>
                    <a href="orders.php">piga order</a> 
                </button>
            </div>
    </div>
    <div class="orders">
        <ul>
            <li>item</li>
            <li>quantity</li>
            <li>price</li>
            <li>status</li>
            <li>action</li>
        </ul>
    </div>
	<?php
		include("./partials/global.php")
	?>
    </body>
</html>