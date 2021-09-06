<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{

	$mql = "INSERT INTO category(c_name) VALUES('".$_POST['category']."')";
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
                    add category
                </h1>
                <a href="categories.php" class="button">
                    back to categories
                </a>
            </div>
            <form action="" method="post">
                <input type="text"  name="category" placeholder="category">
   				<input type="submit" id="buttn" name="submit" value="add category" />
            </form>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>