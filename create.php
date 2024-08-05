<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php
    if(!isset($category)){
        $category = '';
    }
    if(!isset($code)){
        $code = '';
    }
    if(!isset($name)){
        $name = '';
    }
    if(!isset($description)){
        $description = '';
    }
    if(!isset($color)){
        $color = '';
    }
    if(!isset($price)){
        $price = '';
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
        <title>Tech Accessories Store - Create</title>
        <link rel="icon" href="images/taslogo.jpg" type="image/jpg" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <nav>
            <?php include("header.php") ?>
        </nav>
        <main>
            <div id="create">
                <?php if(isset($_SESSION['is_valid_admin'])) { ?>
                    <h2>Create Product</h2>
                    <?php if(!empty($error_message)) { ?>
                        <p id="error"><?php echo htmlspecialchars($error_message); ?></p>
                    <?php } ?>
                    <form id="create_product" action="create_product.php" method="post" enctype="multipart/form-data">
                        <div class="input">
                            <label>Category</label>
                            <select name="category" id="category">
                                <?php foreach($categories as $cat) : ?>
                                    <?php if($cat['techCategoryName'] == $category){?>
                                        <option value="<?php echo $cat['techCategoryName'] ?>" selected><?php echo $cat['techCategoryName'] ?></option>
                                    <?php } else {?>
                                        <option value="<?php echo $cat['techCategoryName'] ?>" ><?php echo $cat['techCategoryName']; ?></option>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input">
                            <label>Code</label>
                            <input type="text" id="code" name="code" value="<?php echo htmlspecialchars($code); ?>" />
                            <span id="error"></span>
                        </div>
                        <div class="input">
                            <label>Name</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" />
                            <span id="error"></span>
                        </div>
                        <div class="input">
                            <label>Description</label>
                            <textarea name="description" id="description" rows="5"><?php echo htmlspecialchars($description) ?></textarea>
                            <span id="error"></span>
                        </div>
                        <div class="input">
                            <label>Color</label>
                            <input type="text" id="color" name="color" value="<?php echo htmlspecialchars($color); ?>" />
                            <span id="error"></span>
                        </div>
                        <div class="input">
                            <label>Price ($)</label>
                            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" />
                            <span id="error"></span>
                        </div>
                        <div class="input">
                            <label>Image File</label>
                            <input type="file" id="image" name="image" />
                            <span id="error"></span>
                        </div>
                        <input class="button" type="submit" value="Create" />
                        <input class="button" type="reset" value="Clear" />
                    </form>
                    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
                    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
                    crossorigin="anonymous"></script>
                    <script src="create_product.js"></script>
                <?php } else {?>
                    <p id="error">You must be logged in to view this page.</p>
                <?php } ?>
            </div>
        </main>
        <?php include("footer.php") ?>
    </body>
</html>