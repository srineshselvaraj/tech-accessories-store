<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->

<?php 
    if(isset($_GET['product_id'])){
        $id = $_GET['product_id'];
    }
    require_once('database_njit.php');
    $db = getDatabase();
    $query = 'SELECT * FROM techAccessoriesStore WHERE techID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $details = $statement->fetch();
    $statement->closeCursor();

    session_start();
?>

<html>
    <head>
        <title>Tech Accessories Store - Product Details</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php"); ?>
        </nav>
        <main>
            <div id="details">
                <?php if($details != NULL) {?>
                    <h2>Product Details</h2>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Color</th>
                            <th>Price</th>
                        </tr>
                        <tr>
                            <td><?php echo $details['techName']; ?></td>
                            <td><?php echo $details['description']; ?></td>
                            <td><?php echo $details['color']; ?></td>
                            <td><?php echo '$' . $details['price']; ?></td>
                        </tr>
                    </table>
                    <img id="details_img" src=<?php echo "images/details/" . $details['techID'] . ".jpg" ?> alt="Details Image">
                    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
                    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
                    crossorigin="anonymous"></script>
                    <script src="product_details.js"></script>
                <?php } else { ?>
                    <p id="error">Product ID does not exist.</p>
                <?php } ?>
            </div>
        </main>
        <?php include("footer.php"); ?>
    </body>
</html>