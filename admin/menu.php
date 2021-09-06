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
                    menu
                </h1>
                <a href="addmenu.php" class="button">
                    add item
                </a>
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
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Action</th>								 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $sql="SELECT * FROM menu order by id desc";
                                                $query=mysqli_query($db,$sql);		
                                                if(!mysqli_num_rows($query) > 0 )
                                                {
                                                echo '<td colspan="7"><center>No menu items</center></td>';
                                                }
                                                else
                                                {				
                                                while($rows=mysqli_fetch_array($query))
                                                {
                                                    $mql="select * from category where c_name='".$rows['category']."'";
													$newquery=mysqli_query($db,$mql);
													$fetch=mysqli_fetch_array($newquery);									
                                                echo ' <tr><td>'.$rows['title'].'</td>
                                                <td>'.$rows['slogan'].'</td>
                                                <td>'.$rows['price'].'</td>
                                                <td>'.$rows['image'].'</td>
                                                <td>'.$rows['category'].'</td>
                                                <td><a href="delete_menu.php?menu_del='.$rows['u_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i>delete</a> 
                                                <a href="update_menu.php?menu_upd='.$rows['u_id'].'" " class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="ti-settings"></i>update</a>
                                                </td></tr>';
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