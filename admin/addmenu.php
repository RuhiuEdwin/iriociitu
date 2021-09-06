<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{
    if(isset($_FILES['image']['name']))
    {
        $image = $_FILES['image']['name'];
        $source_path = $_FILES['images']['tmp_name'];
        $destination_path = "../assets/images/menu/".$image;

        $upload = move_uploaded_file($source_path, $destination_path);
    }

	$mql = "INSERT INTO menu (title,slogan,price,image,category) VALUES('".$_POST['title']."','".$_POST['description']."','".$_POST['price']."','".$_POST['image']."','".$_POST['c_name']."')";
	mysqli_query($db, $mql);
    $mql = "INSERT INTO c_name(title,slogan,price,image) VALUES('".$_POST['title']."','".$_POST['description']."','".$_POST['price']."','".$_POST['image']."')";
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
                    add menu
                </h1>
                <a href="menu.php" class="button">
                    back to menu
                </a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text"  name="title" placeholder="title">
                <input type="text"  name="description" placeholder="description">
                <input type="text"  name="price" placeholder="price">
                <input type="file"  name="image" src="" alt="" placeholder="image" value="image">
                <select name="c_name" class="option" data-placeholder="Choose a Category" tabindex="1">
                    <option>--Select category--</option>
                    <?php $ssql ="select * from category";
						$res=mysqli_query($db, $ssql); 
						while($row=mysqli_fetch_array($res))  
						{
                       echo' <option value="'.$row['c_name'].'">'.$row['c_name'].'</option>';;
						}  
					?> 
			    </select>
                <input type="submit" id="buttn" name="submit" value="add item"/>
            </form>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>