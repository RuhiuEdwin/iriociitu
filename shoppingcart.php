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
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="shortcut icon" type="image/jpg" href="./assets/png/spoons.png">
    <title>irio ciitu</title>
    </head>
    <body>
	<nav class="navbar">
		<a href="index.php" class="navbar_logo">irio ciitu</a>
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
                                echo ' <li><a href="" class="navbar_link"><i class="fa fa-shopping-cart f-s-40" aria-hidden="true">cart</i></a></li>';
                                echo ' <li><a href="" class="navbar_link"><i class="fa fa-shopping-cart f-s-40" aria-hidden="true">user</i></a></li>';
							}

			?>
            </ul>
        </div>
	</nav>
    <div class="hero">
            <div class="hero_content">
                <h1 class="animate-hero">cheki cart</h1>
            </div>
    </div>
    <div class="cart"> 
        <?php
        $output ="";

        $output .="
        <table>
            <tr>
                <th>ID</>
                <th>Name</>
                <th>Price</>
                <th>Quantity</>
                <th>Total Price</>
                <th>Action</>
            </tr>
        ";
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $output .="
                <tr>
                <td>".$value['id']."</td>
                <td>".$value['title']."</td>
                <td>".$value['price']."</td>
                <td>".$value['quantity']."</td>
                <td>$".number_format($value['price'] * $value['quantity'])."</td>
                <td>
                 <a href='shoppingcart.php?action=remove$id=".$value['id']."'>
                 <button class='remove'>Remove</button>
                 </a>
                 </td>
                ";
                $total = $total + $value['quantity'] * $value['price'];

            }
            $output .="
                <tr>
                <td colspan='3'></td>
                <td></b>Total Price</b></td>
                <td>".number_format($total, 2)."</td>
                </tr>
                ";
        }

        echo $output;
        ?>
        <div class="cart_buttons">
            <button>
                checkout
            </button>
            <button>
                clear
            </button>
        </div> 
    </div>
	<?php
		include("./partials/global.php")
	?>
    </body>
</html>