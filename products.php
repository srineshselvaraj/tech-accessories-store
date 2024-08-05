<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    function getProducts($category_id){
        require_once('database_njit.php');
        $db = getDatabase();
        $query = 'SELECT * FROM techAccessoriesStore WHERE techCategoryID = :category_id ORDER BY techID';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }
    require_once('database_njit.php');
    $db = getDatabase();
    $query = 'SELECT * FROM techCategories ORDER BY techCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    session_start();
?>
<html>
    <head>
        <title>Tech Accessories Store - Products</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php") ?>
        </nav>
        <main>
            <div id="products">
                <h1>Products</h1>
                <?php foreach ($categories as $category) : ?>
                    <h2><?php echo $category['techCategoryName']; ?></h2>
                    <table>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Color</th>
                                <th>Price</th>
                                <?php if(isset($_SESSION['is_valid_admin'])) {?>
                                    <th>Delete</th>
                                <?php } ?>
                            </tr>
                            <?php $products = getProducts($category['techCategoryID']); ?>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><a id="product_details" href=<?php echo "product_details.php?product_id=".$product['techID']?>><?php echo $product['techCode']; ?></a></td>
                                    <td><?php echo $product['techName']; ?></td>
                                    <td><?php echo $product['description']; ?></td>
                                    <td><?php echo $product['color']; ?></td>
                                    <td><?php echo '$' . $product['price']; ?></td>
                                    <?php if(isset($_SESSION['is_valid_admin'])) {?>
                                        <td>
                                            <form action="delete_product.php" onsubmit="return showConfirmation();" method="post">
                                                <input type="hidden" name="techID" value="<?php echo $product['techID'] ?>" />
                                                <input type="hidden" name="techCategoryID" value="<?php echo $product['techCategoryID'] ?>" />
                                                <input class="button" type="submit" value= "Delete"/>
                                            </form>
                                            <script>
                                                function showConfirmation(){
                                                    if(confirm("Are you sure?") == false){
                                                        return false;
                                                    }
                                                    else{
                                                        return true;
                                                    }
                                                }
                                            </script>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>
            </div>
        </main>
        <?php include("footer.php") ?>
    </body>
</html>