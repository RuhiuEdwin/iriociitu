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
		<div class="navbar_toggle" id="mobile-menu">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
        <div class="navbar_menu">
            <ul>
			<li><a href="index.php" class="navbar_link">home</a></li>
			<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li ><a href="login.php" class="navbar_link">login</a> </li>
							  <li ><a href="login.php" class="navbar_link">signup</a> </li>';
							}
						else
							{
								echo  '<li ><a href="your_orders.php" class="navbar_link">your orders</a> </li>';
								echo  '<li ><a href="logout.php" class="navbar_link">logout</a> </li>';
                                echo '<i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i>';
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
        
        <div class="wrapper">
            <!--tabs-->
            <div class="tabs">
                <ul>
                    <?php
                        $sql="SELECT * FROM category order by c_id desc";
                        $query=mysqli_query($db,$sql);		
                        if(!mysqli_num_rows($query) > 0 )
                        {
                        echo '<td colspan="7"><center>No caterories</center></td>';
                        }
                        else
                        {				
                        while($rows=mysqli_fetch_array($query))
                        {									
                        echo '<li><span class="text">'.$rows['c_name'].'</span></li>';
                        }	
                        }
                    ?>
                    <!--active tab-->
                </ul>
            </div>
        
            <div class="content">
                <div class="tab_wrap" style="display: block;">
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
                                <div class="tab_content">
                                    <div class="fooditem">
                                        <img src="assets/images/menu'.$rows['image'].'">
                                        <h4 class="food-tittle">'.$rows['title'].'</h4>
                                        <p class="food-desc">'.$rows['slogan'].'</p>
                                        <div class="desc">
                                            <div class="price">'.$rows['price'].'</div>
                                            <div class="buy">add to cart</div>
                                        </div>
                                    </div>
                                </div>
                                ';
                                }	
                                }
                            ?>
                </div>
                <div class="tab_wrap" style="display: none;">
                    <div class="tab_content">
                            <div class="fooditem">
                                <img src="./assets/images/11.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>
                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$15</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/16.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$5</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/14.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$15</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/21.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$5</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/24.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$15</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/25.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$5</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/28.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$15</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                            <div class="fooditem">
                                <img src="./assets/images/31.jpg" alt="" class="food-img">
                                <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                </p>
                                <div class="desc">
                                    <div class="price">$5</div>
                                    <div class="buy">add to cart</div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="tab_wrap" style="display: none;">
                    <div class="tab_content">
                        
                        <div class="fooditem">
                            <img src="./assets/images/18.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="desc">
                                <div class="price">$15</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                        <div class="fooditem">
                            <img src="./assets/images/19.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="desc">
                                <div class="price">$5</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                        <div class="fooditem">
                            <img src="./assets/images/20.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                            <div class="desc">
                                <div class="price">$15</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                        <div class="fooditem">
                            <img src="./assets/images/22.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="desc">
                                <div class="price">$5</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                        <div class="fooditem">
                            <img src="./assets/images/30.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>



                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="desc">
                                <div class="price">$15</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                        <div class="fooditem">
                            <img src="./assets/images/27.jpg" alt="" class="food-img">
                            <h4 class="food-tittle">Lorem Ipsum</h4>


                                <p class="food-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <div class="desc">
                                <div class="price">$5</div>
                                <div class="buy">add to cart</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	<?php
		include("./partials/global.php")
	?>
    </body>
</html>