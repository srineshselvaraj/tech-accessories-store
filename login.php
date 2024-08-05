<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php 
if (!isset($login_message)) {
    $login_message = '';
}
?>
<html>
    <head>
        <title>Tech Accessories Store - Login</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php") ?> 
        </nav>
        <main>
            <?php //include('add_user.php'); ?>
            <div id="login">
                <h2>Login</h2>
                <p id="error"><?php echo $login_message; ?></p>
                <form action="authenticate.php" method="post">
                    <label>Email:</label>
                    <input type="text" name="email" value="">
                    <br>
                    <label>Password:</label>
                    <input type="password" name="password" value="">
                    <br>
                    <input class="button" type="submit" value="Login">
                </form>
            </div>
        </main>
        <?php include("footer.php") ?>
    </body>
</html>