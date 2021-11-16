<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{
	$sql = "update users set u_id='$_POST[c_name]',username='$_POST[username]',email='$_POST[email]',f_name='$_POST[f_name]',l_name='$_POST[l_name]',phonenumber='$_POST[phonenumber]',password='$_POST[password]',address='$_POST[address]' where id='$_GET[menu_upd]'";  // update the submited data ino the database :images
	mysqli_query($db, $sql); 
	move_uploaded_file($temp, $store);

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
                    update user
                </h1>
                <a href="users.php" class="button">
                    back to users
                </a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php $qml ="select * from users where u_id='$_GET[user_upd]'";
					$rest=mysqli_query($db, $qml); 
					$roww=mysqli_fetch_array($rest);
				?>
                <input type="text" name="username" value="<?php echo $roww['username'];?>" placeholder="username">  
                <input type="text" name="email" value="<?php echo $roww['email'];?>" placeholder="email">    
                <input type="text" name="phonenumber" value="<?php echo $roww['phone'];?>" placeholder="phonenumber">
                <input type="text" name="address" value="<?php echo $roww['address'];?>"placeholder="$">
                <input type="text" name="password" value="<?php echo $roww['password'];?>"placeholder="$">
                <input type="text" name="f_name" value="<?php echo $roww['f_name'];?>"placeholder="$">
                <input type="text" name="l_name" value="<?php echo $roww['l_name'];?>"placeholder="$">
                <input type="submit" id="buttn" name="submit" value="add item"/>
            </form>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>