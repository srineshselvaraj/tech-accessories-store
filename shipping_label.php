<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip_code = $_POST["zip_code"];
    $ship_date = $_POST["ship_date"];
    $order_number = $_POST["order_number"];
    $length = $_POST["length"];
    $width = $_POST["width"];
    $height = $_POST["height"];
    $total_value = $_POST["total_value"];

    $error_message = "";
    //if($first_name === FALSE || $last_name === FALSE || $address === FALSE || $city === FALSE || $state === FALSE || $zip_code === FALSE || $ship_date === FALSE || $order_number === FALSE || $length === FALSE || $width === FALSE || $height === FALSE || $total_value === FALSE){
    if(empty($first_name) || empty($last_name) || empty($address) || empty($city) || empty($state) || empty($zip_code) || empty($ship_date) || empty($order_number) || empty($length) || empty($width) || empty($height) || empty($total_value)){    
        $error_message = "All fields must be filled out.";
    }
    else if(strlen($state) != 2 || !ctype_alpha($state) || !ctype_upper($state)){
        $error_message = "The state must be an uppercase two-letter abbreviation.";
    }
    else if(strlen($zip_code) != 5 || !(intval($zip_code) > 0)){
        $error_message = "The zip code must be 5 digits.";
    }
    else if($length > 36 || $width > 36 || $height > 36){
        $error_message = "The package dimensions cannot be greater than 36 inches.";
    }
    else if($total_value > 1000){
        $error_message = "The total declared value of the package cannot be more than $1000.";
    }

    if($error_message !== ''){
        include("shipping.php");
        exit();
    }

    $from_address_text = "From: <br>Tech Accessories Store<br>999 Tech Street, <br>Newark, NJ 07010";
    $to_address_text = "To: <br>". $first_name . " " . $last_name . "<br>" . $address . ", <br>" . $city . ", " . $state . " " . $zip_code;
    $ship_date_text = "Ship Date: " . $ship_date;
    $order_number_text = "Order Number: " . $order_number;
    $dimensions_text = "Dimensions: " . $length . " in. x " . $width . " in. x " . $height . " in.";
    $total_value_text = "Total Declared Value: $" . $total_value;

    $shipping_company = "FedEx";
    $shipping_class = "Shipping Class: Next Day Air";
    $tracking_number = "Tracking Number: " . rand();

    session_start();
?>

<html>
    <head>
        <title>Tech Accessories Store - Shipping Label</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php"); ?>
        </nav>
        <main>
            <div id="label">
                <h2>Shipping Label</h2>
                <p><?php echo $shipping_company; ?><br><?php echo $shipping_class; ?></p>
                <div id="from">
                    <p><?php echo $from_address_text; ?></p>
                </div>
                <div id="to">
                    <p><?php echo $to_address_text; ?></p>
                </div>
                <p><?php echo $order_number_text; ?><br>
                <?php echo $ship_date_text; ?><br>
                <?php echo $dimensions_text; ?><br>
                <?php echo $total_value_text; ?></p>
                <figure>
                    <figcaption><?php echo $tracking_number; ?></figcaption>
                    <img src="images/barcode.jpg" alt="Tracking Barcode">
                </figure>
            </div>
        </main>
        <?php include("footer.php"); ?>
    </body>
</html>