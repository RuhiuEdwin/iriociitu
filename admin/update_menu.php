<html>
<?php

session_start();
error_reporting(0);
include("../connection/connect.php");


if(isset($_POST['submit'] ))
{
    if(isset($_FILES['image']['name']))
    {
        $fname = $_FILES['image']['name'];
		$temp = $_FILES['image']['tmp_name'];
		$fsize = $_FILES['image']['size'];
		$extension = explode('.',$fname);
		$extension = strtolower(end($extension));  
		$fnew = uniqid().'.'.$extension;
		$store = "image/".basename($fnew); 
    }

	$sql = "update menu set id='$_POST[c_name]',title='$_POST[title]',slogan='$_POST[description]',price='$_POST[price]',image='$_POST[image]' where id='$_GET[menu_upd]'";  // update the submited data ino the database :images
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
                    update menu
                </h1>
                <a href="menu.php" class="button">
                    back to menu
                </a>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php $qml ="select * from menu where id='$_GET[menu_upd]'";
					$rest=mysqli_query($db, $qml); 
					$roww=mysqli_fetch_array($rest);
				?>
                <input type="text" name="title" value="<?php echo $roww['title'];?>" placeholder="title">    
                <input type="text" name="description" value="<?php echo $roww['slogan'];?>" placeholder="description">
                <input type="text" name="price" value="<?php echo $roww['price'];?>"placeholder="$">
                <input type="file" name="image"  id="lastName"placeholder="12n">
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