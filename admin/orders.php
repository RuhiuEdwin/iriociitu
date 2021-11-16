<html>
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
                    orders
                </h1>
            </div>
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Status</th>												
                                                <th>Date</th>							 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql="SELECT * FROM users_orders order by u_id desc";
                                                $query=mysqli_query($db,$sql);		
                                                if(!mysqli_num_rows($query) > 0 )
                                                {
                                                echo '<td colspan="7"><center>No User-Data!</center></td>';
                                                }
                                                else
                                                {				
                                                while($rows=mysqli_fetch_array($query))
                                                {									
                                                echo ' <tr><td>'.$rows['title'].'</td>
                                                <td>'.$rows['quantity'].'</td>
                                                <td>'.$rows['price'].'</td>
                                                <td>'.$rows['status'].'</td>																							
                                                <td>'.$rows['date'].'</td>';
                                                }	
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <?php
            include("./partials/footer.php")
        ?>
    </body>
</html>