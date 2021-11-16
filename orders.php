<html>
<?php
    include("./partials/head.php");  //include connection file
    error_reporting(0);  // using to hide undefine undex errors
    session_start(); //start temp session until logout/browser closed
?>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/orders.css">
    <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
    <title>irio ciitu</title>
    </head>
    <body>
	<nav class="navbar">
		<a href="index.php" class="navbar_logo">irio ciitu</a>
		</div>
        <div class="navbar_menu">
            <ul>
			<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li ><a href="login.php" class="navbar_link">login</a> </li>
							  <li ><a href="login.php" class="navbar_link">signup</a> </li>';
							}
						else
							{
                                echo ' <li><a href="shoppingcart.php" class="navbar_link"><i class="fa fa-shopping-cart f-s-40" aria-hidden="true">cart</i></a></li>';
                                echo ' <li><a href="" class="navbar_link"><i class="fa fa-shopping-cart f-s-40" aria-hidden="true">user</i></a></li>';
							}

						?>
            </ul>
        </div>
	</nav>
        <!--hero-->
        <div class="hero">   
            <div class="hero_content">
                <h1>PIGA ORDER</h1>
                <div class="topline">how to order</div>
                <p class="orders">i. order online</p>
                <p class="orders">ii. we deliver</p>
                <p class="orders">iii. pay on delivery</p>
                <p class="orders">iv. enjoy your meal</p>
            </div>
        </div>
        <!--how to order-->
        <div class="ourfoods">
            <div class="topline">irio ciitu</div>
        </div>
        <?php
        if (isset($_POST['add_to_cart'])) {
            if (isset($_SESSION['cart'])) {
                $session_array_id = array_column($_SESSION['cart'], "id");
                if (!in_array($_GET['id'], $session_array_id)){
                   
                    $session_array = array(
                        'id' => $_GET['id'],
                        "title" => $_POST['title'],
                        "price" => $_POST['price'],
                        "quantity" => $_POST['quantity'],
                    );
                    $_SESSION['cart'][] = $session_array;
                } 
            }
        }else{
            $session_array = array(
                'id' => $_GET['id'],
                "title" => $_POST['title'],
                "price" => $_POST['price'],
                "quantity" => $_POST['quantity'],
            );
            $_SESSION['cart'][] = $session_array;
        
        }
        ?>
        <div class="wrapper">
            <div class="tab_content">
                <?php
                    $sql="SELECT * FROM menu order by id desc";
                    $query=mysqli_query($db,$sql);		
                    if(!mysqli_num_rows($query) > 0 )
                    {
                    echo '<td colspan="7"><center>No caterories</center></td>';
                    }
                    else
                    {				
                    while($rows=mysqli_fetch_array($query))
                    {									
                     echo '
                     <form method="post" action="orders.php'.$row['id'].'">
                        <div class="inputs">
                            <input type="hidden" name="title" value="'.$rows['title'].'">
                            <input type="hidden" name="price" value="'.$rows['price'].'">
                        </div>
                        <div class="fooditem">
                            <img src="./admin/image/'.$rows['image'].'"style="height:150px;width:150px;" />
                            <h2 class="food-tittle">'.$rows['title'].'</h2>
                            <p class="food-desc">'.$rows['slogan'].'</p>
                            <div class="desc">
                                <div class="price">$'.number_format($rows['price'],2).'</div>
                                <div class="buy">
                                    <input type="submit" id="buttn" name="add_to_cart" value="add to cart" />
                                </div>
                            </div>
                        </div>
                    </form>
                    ';
                    }	
                   }
                ?>
            </div>
        </div>
	<?php
		include("./partials/global.php")
	?>
    </body>
</html>