<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/dashboard.css">
        <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
        <title>irio ciitu</title>
    </head>
    <body>
        <?php
            include("./partials/menu.php")
        ?>
        <div class="container">
            <div class="sidebar">
                <a href="dashboard.php"><img src="./assets/png/back.png" alt="" class="back"></a>
                <div class="right">
                    <img src="./assets/png/4.png" alt="">
                    <a href="logout.php">log out</a>
                </div>
            </div>
            <div class="dashboard">
                <h1 class="title">
                    admin dashboard
                </h1>
                <div class="wrapper">
                    <a href="admin.php" class="admin">
                        <h1>
                            admin
                        </h1>
                        <h2>
                            <?php $sql="select * from tbl_admin";
                                $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                            ?>
                        </h2>
                    </a>
                    <a href="menu.php" class="menu">
                        <h1>
                            menu
                        </h1>
                        <h2>
                            <?php $sql="select * from menu";
                                $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                            ?>
                        </h2>
                    </a>
                    <a href="users.php" class="users">
                        <h1>
                            users
                        </h1>
                        <h2>
                            <?php $sql="select * from users";
                                $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                            ?>
                        </h2>
                    </a>
                    <a href="orders.php" class="orders">
                        <h1>
                            orders
                        </h1>
                        <h2>
                            <?php $sql="select * from users_orders";
                                $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                            ?>
                        </h2>
                    </a>
                    <a href="categories.php" class="category">
                        <h1>
                            catergories
                        </h1>
                        <h2>
                            <?php $sql="select * from category";
                                $result=mysqli_query($db,$sql); 
                                    $rws=mysqli_num_rows($result);
                                    echo $rws;
                            ?>
                        </h2>
                    </a>
                </div>
            </div>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>