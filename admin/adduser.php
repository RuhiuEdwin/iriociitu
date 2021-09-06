<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{

	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['uname']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".md5($_POST['password'])."','".$_POST['address']."')";
	mysqli_query($db, $mql);

}


?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/main.css">
        <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
        <title>irio ciitu</title>
    </head>
    <body>
        <?php
            include("./partials/menu.php")
        ?>
        <div class="container">
            <div class="sidebar">
                <a href="dashboard.php"><img src="./assets/png/back.png" alt="" class="back"> dashboard</a>
                <div class="right">
                    <img src="./assets/png/4.png" alt="">
                    <a href="logout.php">log out</a>
                </div>
            </div>
            <div class="dashboard">
                <h1 class="title">
                    add user
                </h1>
                <a href="users.php" class="button">
                    back to users
                </a>
            </div>
            <form action="" method="post">
                <input type="text" placeholder="username" name="uname">
                <input type="text" placeholder="first name" name="fname">
                <input type="text" placeholder="last name" name="lname">
                <input type="phone" placeholder="phone number" name="phone">
                <input type="email" placeholder="email address" name="email">
                <input type="password" placeholder="password" name="password">
                <input type="text" placeholder="address" name="address">
   				<input type="submit" id="buttn" name="submit" value="add user" />
            </form>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>