<html>
<?php
    session_start();
    error_reporting(0);
    include("../connection/connect.php");

    if(isset($_POST['submit'] ))
    {
        if(empty($_POST['uname']) ||
            empty($_POST['email'])||
            empty($_POST['password']))
            {
                $error = '<div class="error">
                    <strong>All fields Required!</strong>
                </div>';
            }
        else
        {   
        $check_username= mysqli_query($db, "SELECT username FROM tbl_admin where username = '".$_POST['uname']."' ");
        $check_email = mysqli_query($db, "SELECT email FROM tbl_admin where email = '".$_POST['email']."' ");

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $error = '<div class="error"><strong>invalid email!</strong></div>';
        }
        elseif(strlen($_POST['password']) < 6)
        {
            $error = '<div class="error"><strong>Password must be >=6!</strong></div>';
        }
        elseif(mysqli_num_rows($check_username) > 0)
        {
            $error = '<div class="error"><strong>Username already exist!</strong></div>';
        }
        elseif(mysqli_num_rows($check_email) > 0)
        {
            $error = '<div class="error"><strong>email already exist!</strong></div>';
        }
        else
        {
            $mql = "INSERT INTO tbl_admin (username,email,password) VALUES('".$_POST['uname']."','".$_POST['email']."','".md5($_POST['password'])."')";
            mysqli_query($db, $mql);
                $success = 	'<div class="error"><strong>Congrass!</strong> New Admin Added Successfully.</br></div>';}
        }
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