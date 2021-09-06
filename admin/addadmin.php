<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{

	$mql = "INSERT INTO tbl_admin(username,email,password) VALUES('".$_POST['uname']."','".$_POST['email']."','".md5($_POST['password'])."')";
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
                    add admin
                </h1>
                <a href="admin.php" class="button">
                    back to admin
                </a>
            </div>
            <form action="" method="post">
                <input type="text"  name="uname" placeholder="username">
                <input type="email"  name="email" placeholder="email address">
                <input type="password"  name="password" placeholder="password">
   				<input type="submit" id="buttn" name="submit" value="add admin" />
            </form>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>