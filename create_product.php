<!-- 
    Srinesh Selvaraj
    4/19/2024
    IT202-002
    IT-202 Phase 5 Assignment: Read SQL Data with PHP and JavaScript
    ss4872@njit.edu
-->
<?php 
    $category = $_POST["category"];
    $code = $_POST["code"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $color = $_POST["color"];
    $price = $_POST["price"];

    $error_message = "";
    if(empty($category) || empty($code) || empty($name) || empty($description) || empty($price)){
        $error_message = "All fields must be filled out.";
    }
    else if(!is_numeric($price) || floatval($price) < 0){
        $error_message = "The price must be a positive number.";
    }
    else if(floatval($price) > 1000){
        $error_message = "The price must be less than $1000.";
    }
    require_once('database_njit.php'); 
    $db = getDatabase();
    $query = 'SELECT * FROM techAccessoriesStore WHERE techCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $codes = $statement->fetchAll();
    $statement->closeCursor();

    if(sizeof($codes) > 0){
        $error_message = "This code already exists.";
    }

    if($error_message !== ''){
        include("create.php");
        exit();
    }

    require_once('database_njit.php'); 
    $db = getDatabase();
    $query = 'SELECT techCategoryID FROM techCategories WHERE techCategoryName = :category';
    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $category_id = $statement->fetchColumn();
    $statement->closeCursor();

    $query = 'INSERT INTO techAccessoriesStore
                 (techCategoryID, techCode, techName, description, color, price, dateCreated)
              VALUES
                 (:category_id, :code, :name, :description, :color, :price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':color', $color);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();

    $query = 'SELECT techID FROM techAccessoriesStore WHERE techCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $row = $statement->fetch();
    $id = $row['techID'];
    $statement->closeCursor();

    $image = "images/details/" . $id . ".jpg";
    $size = getimagesize($_FILES["image"]["tmp_name"]);
    if(file_exists($image)){
        $error_message = "Image already exists.";
    }
    else if($_FILES["image"]["size"] > 10000000){
        $error_message = "File size must be less than 10MB.";
    }
    if($error_message !== ''){
        include("create.php");
        exit();
    }
    move_uploaded_file($_FILES['image']['tmp_name'], $image);

    include("products.php");
?>