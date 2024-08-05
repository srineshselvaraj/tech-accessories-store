<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    if(!isset($first_name)){
        $first_name = '';
    }
    if(!isset($last_name)){
        $last_name = '';
    }
    if(!isset($address)){
        $address = '';
    }
    if(!isset($city)){
        $city = '';
    }
    if(!isset($state)){
        $state = '';
    }
    if(!isset($zip_code)){
        $zip_code = '';
    }
    if(!isset($ship_date)){
        $ship_date = '';
    }
    if(!isset($order_number)){
        $order_number = '';
    }
    if(!isset($length)){
        $length = '';
    }
    if(!isset($width)){
        $width = '';
    }
    if(!isset($height)){
        $height = '';
    }
    if(!isset($total_value)){
        $total_value = '';
    }

    session_start();
?>

<html>
    <head>
        <title>Tech Accessories Store - Shipping</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php") ?>
        </nav>
        <main>
            <div id="shipping">
                <?php if(isset($_SESSION['is_valid_admin'])) { ?>
                    <h2>Shipping Details</h2>
                    <?php if(!empty($error_message)) { ?>
                        <p id="error"><?php echo htmlspecialchars($error_message); ?></p>
                    <?php } ?>
                    <form action="shipping_label.php" method="post">
                        <div class="input">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" />
                        </div>
                        <div class="input">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" />
                        </div>
                        <div class="input">
                            <label>Street Address</label>
                            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" />
                        </div>
                        <div class="input">
                            <label>City</label>
                            <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>" />
                        </div>
                        <div class="input">
                            <label>State</label>
                            <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"/>
                        </div>
                        <div class="input">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" value="<?php echo htmlspecialchars($zip_code); ?>"/>
                        </div>
                        <div class="input">
                            <label>Ship Date</label>
                            <input type="date" name="ship_date" value="<?php echo htmlspecialchars($ship_date)?>" />
                        </div>
                        <div class="input">
                            <label>Order Number</label>
                            <input type="number" name="order_number" value="<?php echo htmlspecialchars($order_number)?>" min="0" />
                        </div>
                        <div class="input">
                            <label>Length (in)</label>
                            <input type="number" name="length" value="<?php echo htmlspecialchars($length)?>" min="0" />
                        </div>
                        <div class="input">
                            <label>Width (in)</label>
                            <input type="number" name="width" value="<?php echo htmlspecialchars($width)?>" min="0" />
                        </div>
                        <div class="input">
                            <label>Height (in)</label>
                            <input type="number" name="height" value="<?php echo htmlspecialchars($height)?>" min="0" />
                        </div>
                        <div class="input">
                            <label>Total Declared Value ($)</label>
                            <input type="number" name="total_value" value="<?php echo htmlspecialchars($total_value)?>" min="0"/>
                        </div>
                        <input class="button" type="submit" value="Ship" />
                        <input class="button" type="reset" value="Clear" />
                    </form>
                <?php } else {?>
                    <p id="error">You must be logged in to view this page.</p>
                <?php } ?>
            </div>
        </main>
        <?php include("footer.php") ?>
    </body>
</html>