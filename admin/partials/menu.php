
    <?php
        include("../connection/connect.php");
        error_reporting(0);
        session_start();
    ?>
        <nav class="navbar">
            <a href="index.php" class="navbar_logo">irio ciitu</a>
            <div class="navbar_toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <div class="navbar_menu">
                <ul>
                    <li><a href="admin.php" class="navbar_link active">admin</a></li>
                    <li><a href="users.php" class="navbar_link">users</a></li>
                    <li><a href="menu.php" class="navbar_link">menu</a></li>
                    <li><a href="orders.php" class="navbar_link">orders</a></li>
                </ul>
            </div>
        </nav>