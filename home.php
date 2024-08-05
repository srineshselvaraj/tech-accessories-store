<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    session_start();
?>
<html>
    <head>
        <title>Tech Accessories Store - Home</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php") ?>
        </nav>
        <main>
            <div id="title">
                <h1>Tech Accessories Store</h1>
                <p>This is a store dedicated to selling popular and practical tech accessories.
                It was founded in 2024, and it has been very successful since its launch.
                The goal of this store is to sell high quality and affordable tech products.
                So far, there are 5 categories of products, but more might be added soon.</p>
            </div>
            <div id="images">
                <figure>
                    <img src="images/wirelessearbuds.jpg" alt="Wireless Earbuds">
                    <figcaption>Wireless Earbuds</figcaption>
                </figure>
                <figure>
                    <img src="images/laptopstand.jpg" alt="Laptop Stand">
                    <figcaption>Laptop Stand</figcaption>
                </figure>
                <figure>
                    <img src="images/portablephonecharger.jpg" alt="Portable Phone Charger">
                    <figcaption>Portable Phone Charger</figcaption>
                </figure>
                <figure>
                    <img src="images/bluetoothkeyboard.jpg" alt="Bluetooth Keyboard">
                    <figcaption>Bluetooth Keyboard</figcaption>
                </figure>
                <figure>
                    <img src="images/laptopbackpack.jpg" alt="Laptop Backpack">
                    <figcaption>Laptop Backpack</figcaption>
                </figure>
            </div>
        </main>
        <?php include("footer.php") ?>
    </body>
</html>