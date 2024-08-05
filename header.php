<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<header>
    <div id="header">
        <img src="images/taslogo.jpg" alt="Logo">
        <?php if(isset($_SESSION['is_valid_admin'])) { ?>
            <div id="welcome">
                <p id="loggedin"><?php echo "Welcome " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (" . $_SESSION['email'] . ")"; ?></p>
            </div>
        <?php }?>
        <ul>
            <li><a href="home.php">Home</a></li>

            <?php if(isset($_SESSION['is_valid_admin'])) {?>
                <li><a href="shipping.php">Shipping</a></li>
            <?php } ?>

            <li><a href="products.php">Products</a></li>

            <?php if(isset($_SESSION['is_valid_admin'])) {?>
                <li><a href="create.php">Create</a></li>
            <?php } ?>
            
            <?php if(isset($_SESSION['is_valid_admin'])) {?>
                <li><a href="logout.php">Logout</a>
            <?php } else {?>
                <li><a href="login.php">Login</a>
            <?php } ?>
        </ul>
    </div>
    <div style="width: auto; margin:auto; height: 64px; margin-bottom: 20px;"></div>
</header>